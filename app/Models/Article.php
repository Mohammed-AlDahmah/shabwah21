<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'featured_image', 'images', 'category_id', 'author_id', 'author', 'source', 'source_url', 'views_count', 'is_featured', 'is_breaking', 'is_published', 'published_at', 'meta_data', 'type',
        // News specific fields
        'news_source', 'news_location', 'news_date', 'news_priority', 'news_tags', 'news_related_articles',
        // Report specific fields
        'report_type', 'report_duration', 'report_location', 'report_interviews', 'report_sources', 'report_conclusions', 'report_recommendations', 'report_attachments',
        // Opinion specific fields
        'opinion_type', 'opinion_topic', 'opinion_perspective', 'opinion_expertise', 'opinion_credentials', 'opinion_related_events', 'opinion_call_to_action',
        // Infographic specific fields
        'infographic_type', 'infographic_data_source', 'infographic_designer', 'infographic_dimensions', 'infographic_colors', 'infographic_language', 'infographic_downloadable', 'infographic_interactive', 'infographic_embed_code', 'infographic_file',
        // Article specific fields
        'article_type', 'article_topic', 'article_keywords', 'article_summary', 'article_conclusion', 'article_references', 'article_reading_time', 'article_difficulty', 'article_target_audience'
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
        'news_date' => 'date',
        'infographic_downloadable' => 'boolean',
        'infographic_interactive' => 'boolean',
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
        return $this->belongsTo(Author::class, 'author_id');
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

    public function scopeWithIndex($query, $indexName)
    {
        return $query->from(DB::raw("`{$this->getTable()}` USE INDEX ({$indexName})"));
    }

    public function scopeOptimized($query)
    {
        // استخدام index محدد للاستعلامات المهمة
        return $query->from(DB::raw("`{$this->getTable()}` USE INDEX (idx_published_at)"));
    }

    public function scopeForHomePage($query)
    {
        return $query->select([
            'id', 'title', 'slug', 'excerpt', 'featured_image', 
            'published_at', 'views_count', 'category_id', 'author_id'
        ])
        ->with(['category:id,name_ar,slug', 'author:id,name'])
        ->optimized()
        ->published()
        ->orderBy('published_at', 'desc');
    }

    public function scopeForCategory($query)
    {
        return $query->select([
            'id', 'title', 'slug', 'excerpt', 'featured_image', 
            'published_at', 'views_count', 'category_id'
        ])
        ->with('category:id,name_ar,slug')
        ->optimized()
        ->published()
        ->orderBy('published_at', 'desc');
    }

    public function scopeForSearch($query, $searchTerm)
    {
        return $query->select([
            'id', 'title', 'slug', 'excerpt', 'featured_image', 
            'published_at', 'views_count', 'category_id'
        ])
        ->with('category:id,name_ar,slug')
        ->where(function($q) use ($searchTerm) {
            $q->where('title', 'LIKE', "%{$searchTerm}%")
              ->orWhere('excerpt', 'LIKE', "%{$searchTerm}%")
              ->orWhere('content', 'LIKE', "%{$searchTerm}%");
        })
        ->published()
        ->orderBy('published_at', 'desc');
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
        // استخدام update بدلاً من increment لتجنب race conditions
        $this->update(['views_count' => $this->views_count + 1]);
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
        if ($this->author_id && $this->author && is_object($this->author)) {
            return $this->author->name;
        }
        if (is_string($this->author)) {
            return $this->author;
        }
        return 'غير محدد';
    }

    protected static function boot()
{
    parent::boot();

    static::creating(function ($article) {
        $slug = Str::slug($article->title);
        $originalSlug = $slug;
        $counter = 1;

        // التحقق والتعديل إذا كان موجودًا
        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $article->slug = $slug;
    });
}
}
