<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ForumThread extends Model
{
    protected $fillable = [
        'forum_category_id',
        'user_id',
        'title',
        'slug',
        'content',
        'is_pinned',
        'is_locked',
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
        'is_locked' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($thread) {
            if (empty($thread->slug)) {
                $thread->slug = Str::slug($thread->title);

                // Ensure uniqueness
                $originalSlug = $thread->slug;
                $count = 1;
                while (static::where('slug', $thread->slug)->exists()) {
                    $thread->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });

        static::updating(function ($thread) {
            if ($thread->isDirty('title') && empty($thread->slug)) {
                $thread->slug = Str::slug($thread->title);

                // Ensure uniqueness
                $originalSlug = $thread->slug;
                $count = 1;
                while (static::where('slug', $thread->slug)->where('id', '!=', $thread->id)->exists()) {
                    $thread->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ForumCategory::class, 'forum_category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(ForumReply::class);
    }
}
