<?php

namespace App\Observers;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleObserver
{
    public function saved(Article $article)
    {
        Cache::forget('homepage_articles');
    }

    public function deleted(Article $article)
    {
        Cache::forget('homepage_articles');
    }
}