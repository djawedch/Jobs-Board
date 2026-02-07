<?php

namespace App\Services;

use App\Models\{Job, Tag};

class TagService
{

    public function attachTags(Job $job, ?string $tags): void
    {
        if (!$tags) {
            return;
        }

        collect(explode(',', $tags))
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->each(fn($tag) => $job->tag($tag));
    }

    public function syncTags(Job $job, ?string $tags): void
    {
        if (!$tags) {
            $job->tags()->detach();
            return;
        }

        $tagIds = collect(explode(',', $tags))
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->map(fn($tag) => Tag::firstOrCreate(['name' => $tag])->id);

        $job->tags()->sync($tagIds);
    }
}