<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Job;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request): View
    {
        $searchTerm = $request->validated('q');

        $jobs = Job::query()
            ->with(['employer', 'tags'])
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhereHas('tags', function ($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%{$searchTerm}%");
                    });
            })
            ->latest()
            ->simplePaginate(10);

        $jobs->appends(['q' => $searchTerm]);

        return view('results', [
            'jobs' => $jobs,
            'searchTerm' => $searchTerm,
        ]);
    }
}