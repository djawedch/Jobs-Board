<?php

namespace App\Http\Controllers;

use App\Models\{Job, Tag};
use App\Http\Requests\StoreJobRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index(): View
    {
        $jobs = Job::query()
            ->latest()
            ->with(['employer', 'tags'])
            ->get();

        return view('jobs.index', [
            'jobs' => $jobs,
            'tags' => Tag::all(),
        ]);
    }

    public function create(): View
    {
        return view('jobs.create');
    }

    public function store(StoreJobRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $attributes['featured'] = $request->boolean('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        $this->attachTags($job, $attributes['tags'] ?? null);

        return redirect()->route('jobs.index');
    }

    private function attachTags(Job $job, ?string $tags): void
    {
        if (!$tags) {
            return;
        }

        collect(explode(',', $tags))
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->each(fn($tag) => $job->tag($tag));
    }
}
