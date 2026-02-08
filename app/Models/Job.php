<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany};

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'salary',
        'location',
        'schedule',
        'employer_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function getFormattedSalaryAttribute(): string
    {
        if (is_numeric($this->salary)) {
            return '$' . number_format((float) $this->salary, 0, '.', ',') . ' USD';
        }

        return $this->salary;
    }

    protected static function booted()
    {
        static::deleting(function ($job) {
            $tags = $job->tags;
            $job->tags()->detach();

            foreach ($tags as $tag) {
                if ($tag->jobs()->count() === 0) {
                    $tag->delete();
                }
            }
        });
    }
}
