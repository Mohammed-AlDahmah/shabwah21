<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Author extends Model
{
    protected $fillable = [
        'name',
        'email',
        'bio',
        'avatar',
        'slug',
        'specialization',
        'experience_years',
        'education',
        'awards',
        'social_media',
        'is_active',
        'is_featured',
        'contact_info',
        'location',
        'languages',
        'expertise_areas',
        'publication_count',
        'join_date',
        // Legacy fields
        'twitter',
        'facebook',
        'website',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'social_media' => 'array',
        'experience_years' => 'integer',
        'publication_count' => 'integer',
        'join_date' => 'date',
    ];

    protected $dates = [
        'join_date',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getFullNameAttribute()
    {
        return $this->name;
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return \App\Helpers\ImageHelper::getImageUrl($this->avatar);
        }
        return null;
    }

    public function getSocialMediaLinksAttribute()
    {
        return $this->social_media ?? [];
    }

    public function getExperienceLevelAttribute()
    {
        if ($this->experience_years >= 15) {
            return 'خبير';
        } elseif ($this->experience_years >= 10) {
            return 'محترف';
        } elseif ($this->experience_years >= 5) {
            return 'متوسط';
        } else {
            return 'مبتدئ';
        }
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($author) {
            if (empty($author->slug)) {
                $author->slug = Str::slug($author->name);
            }
            if (empty($author->join_date)) {
                $author->join_date = now();
            }
        });
    }
} 