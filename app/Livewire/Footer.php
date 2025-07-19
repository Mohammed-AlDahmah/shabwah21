<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Article;
use App\Models\User;

class Footer extends Component
{
    public $email = '';
    public $subscribed = false;
    public $subscribing = false;
    public $stats = [];

    protected $rules = [
        'email' => 'required|email|max:255'
    ];

    protected $messages = [
        'email.required' => 'يرجى إدخال البريد الإلكتروني',
        'email.email' => 'يرجى إدخال بريد إلكتروني صحيح',
        'email.max' => 'البريد الإلكتروني طويل جداً'
    ];

    public function mount()
    {
        $this->loadStats();
    }

    public function loadStats()
    {
        // Get today's visitors (simulated)
        $todayVisitors = rand(1000, 9999);
        
        // Get today's articles count
        $todayArticles = Article::whereDate('created_at', today())->count();
        
        // Get total articles count
        $totalArticles = Article::count();
        
        // Get total categories count
        $totalCategories = Category::count();
        
        $this->stats = [
            'today_visitors' => $todayVisitors,
            'today_articles' => $todayArticles,
            'total_articles' => $totalArticles,
            'total_categories' => $totalCategories,
        ];
    }

    public function subscribe()
    {
        $this->validate();

        $this->subscribing = true;

        // Simulate API call
        sleep(1);

        // Here you would typically save to database or send to newsletter service
        // For now, we'll just show success message
        
        $this->subscribed = true;
        $this->email = '';
        $this->subscribing = false;

        session()->flash('newsletter_success', 'تم الاشتراك بنجاح في النشرة الإخبارية!');
    }

    public function render()
    {
        $categories = Category::take(6)->get();
        
        return view('livewire.footer', [
            'categories' => $categories,
            'stats' => $this->stats
        ]);
    }
}
