<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'featured_image', 'images', 'category_id', 'author_id', 'author', 'source', 'source_url', 'views_count', 'is_featured', 'is_breaking', 'is_published', 'published_at', 'meta_data', 'type'
    ];

    // أنواع المقالات المسموحة
    public const TYPES = ['news', 'report', 'article', 'infographic'];

    // Scope لكل نوع
    public function scopeNews($query) { return $query->where('type', 'news'); }
    public function scopeReports($query) { return $query->where('type', 'report'); }
    public function scopeArticles($query) { return $query->where('type', 'article'); }
    public function scopeInfographics($query) { return $query->where('type', 'infographic'); }

    protected $casts = [
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_breaking' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'meta_data' => 'array',
    ];

    protected $dates = [
        'published_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeBreaking($query)
    {
        return $query->where('is_breaking', true);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return ceil($wordCount / 200); // Assuming 200 words per minute
    }

    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? $this->published_at->format('Y-m-d H:i') : '';
    }

    public function getTimeAgoAttribute()
    {
        return $this->published_at ? $this->published_at->diffForHumans() : '';
    }

    public function incrementViews()
    {
        $this->increment('views_count');
    }

    public function getImageAttribute()
    {
        return $this->featured_image;
    }

    public function setImageAttribute($value)
    {
        $this->featured_image = $value;
    }

    public function getAuthorNameAttribute()
    {
        if ($this->author_id && $this->author) {
            return $this->author->name;
        }
        return $this->author ?? 'غير محدد';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
            if (empty($article->published_at)) {
                $article->published_at = now();
            }
        });
    }
}
