<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Video extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'video_url',
        'is_featured',
        'is_published',
        'published_at',
        'meta_data',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'meta_data' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($video) {
            if (empty($video->slug)) {
                $video->slug = Str::slug($video->title);
            }
            if (empty($video->published_at)) {
                $video->published_at = now();
            }
        });
    }
} 