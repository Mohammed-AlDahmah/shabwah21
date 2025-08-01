<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'description_ar',
        'description_en',
        'color',
        'sort_order',
        'is_active',
        'show_in_nav',
        'order',
        'icon',
        'parent_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const TYPES = ['news', 'report', 'article', 'infographic', 'video', 'opinion'];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function getNameAttribute()
    {
        return $this->name_ar ?? $this->name_en;
    }

    public function getDescriptionAttribute()
    {
        return $this->description_ar ?? $this->description_en;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name_en ?: $category->name_ar);
            }
        });
    }

    public static function getActiveByType($type = 'article')
    {
        return \Cache::remember('categories_active_' . $type, 3600, function() use ($type) {
            return static::where('type', $type)->where('is_active', true)->get();
        });
    }
}
