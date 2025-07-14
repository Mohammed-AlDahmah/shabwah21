<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Author extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'avatar',
        'bio',
        'email',
        'twitter',
        'facebook',
        'website',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($author) {
            if (empty($author->slug)) {
                $author->slug = Str::slug($author->name);
            }
        });
    }
} 