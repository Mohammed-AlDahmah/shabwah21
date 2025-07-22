<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use App\Models\User;
use Illuminate\Support\Str;

class NewsManager extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $categoryFilter = '';
    public $statusFilter = '';
    public $breakingFilter = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editingArticle = null;

    // Form fields - News specific
    public $form = [
        'title' => '',
        'excerpt' => '',
        'content' => '',
        'category_id' => '',
        'author_id' => '',
        'type' => 'news', // Fixed for news
        'is_published' => true,
        'is_featured' => false,
        'is_breaking' => false,
        // News specific fields
        'news_source' => '',
        'news_location' => '',
        'news_date' => '',
        'news_priority' => 'normal', // low, normal, high, urgent
        'news_tags' => '',
        'news_related_articles' => '',
    ];

    public $image;

    protected $rules = [
        'form.title' => 'required|string|max:255',
        'form.excerpt' => 'required|string|max:500',
        'form.content' => 'required|string',
        'form.category_id' => 'required|exists:categories,id',
        'form.author_id' => 'nullable|exists:users,id',
        'form.is_published' => 'boolean',
        'form.is_featured' => 'boolean',
        'form.is_breaking' => 'boolean',
        // News specific validation
        'form.news_source' => 'nullable|string|max:255',
        'form.news_location' => 'nullable|string|max:255',
        'form.news_date' => 'nullable|date',
        'form.news_priority' => 'required|in:low,normal,high,urgent',
        'form.news_tags' => 'nullable|string|max:500',
        'form.news_related_articles' => 'nullable|string|max:500',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    protected $listeners = [
        'articleCreated' => 'loadArticles',
        'articleUpdated' => 'loadArticles',
        'articleDeleted' => 'loadArticles',
        'deleteConfirmed' => 'deleteArticleConfirmed',
        'closeModal' => 'closeModal',
    ];

    public function mount()
    {
        $this->loadArticles();
    }

    public function loadArticles()
    {
        // This will be handled by the query in render()
    }

    public function createArticle()
    {
        $this->resetForm();
        $this->showCreateModal = true;
    }

    public function editArticle($articleId)
    {
        $article = Article::find($articleId);
        if ($article) {
            $this->editingArticle = $article;
            $this->form = [
                'title' => $article->title,
                'excerpt' => $article->excerpt,
                'content' => $article->content,
                'category_id' => $article->category_id,
                'author_id' => $article->author_id,
                'type' => 'news',
                'is_published' => $article->is_published,
                'is_featured' => $article->is_featured,
                'is_breaking' => $article->is_breaking,
                // News specific fields
                'news_source' => $article->news_source ?? '',
                'news_location' => $article->news_location ?? '',
                'news_date' => $article->news_date ?? '',
                'news_priority' => $article->news_priority ?? 'normal',
                'news_tags' => $article->news_tags ?? '',
                'news_related_articles' => $article->news_related_articles ?? '',
            ];
            $this->showEditModal = true;
        }
    }

    public function saveArticle()
    {
        $this->validate();

        $data = [
            'title' => $this->form['title'],
            'excerpt' => $this->form['excerpt'],
            'content' => $this->form['content'],
            'category_id' => $this->form['category_id'],
            'author_id' => $this->form['author_id'],
            'type' => 'news',
            'is_published' => $this->form['is_published'],
            'is_featured' => $this->form['is_featured'],
            'is_breaking' => $this->form['is_breaking'],
            'slug' => Str::slug($this->form['title']),
            // News specific data
            'news_source' => $this->form['news_source'],
            'news_location' => $this->form['news_location'],
            'news_date' => $this->form['news_date'],
            'news_priority' => $this->form['news_priority'],
            'news_tags' => $this->form['news_tags'],
            'news_related_articles' => $this->form['news_related_articles'],
        ];

        if ($this->image) {
            $imagePath = $this->image->store('articles', 'public');
            $data['featured_image'] = $imagePath;
        }

        if ($this->editingArticle) {
            $this->editingArticle->update($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => 'تم تحديث الخبر بنجاح'
            ]);
            $this->dispatch('articleUpdated');
        } else {
            Article::create($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الإنشاء بنجاح',
                'message' => 'تم إنشاء الخبر بنجاح'
            ]);
            $this->dispatch('articleCreated');
        }

        $this->closeModal();
    }

    public function deleteArticle($articleId)
    {
        $this->dispatch('confirmDelete', ['id' => $articleId]);
    }

    public function deleteArticleConfirmed($data)
    {
        $articleId = $data['id'] ?? null;
        if (!$articleId) return;

        $article = Article::find($articleId);
        if ($article) {
            $article->delete();
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الحذف بنجاح',
                'message' => 'تم حذف الخبر بنجاح'
            ]);
            $this->dispatch('articleDeleted');
        }
    }

    public function togglePublish($articleId)
    {
        $article = Article::find($articleId);
        if ($article) {
            $article->update(['is_published' => !$article->is_published]);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => $article->is_published ? 'تم نشر الخبر' : 'تم إلغاء نشر الخبر'
            ]);
        }
    }

    public function toggleBreaking($articleId)
    {
        $article = Article::find($articleId);
        if ($article) {
            $article->update(['is_breaking' => !$article->is_breaking]);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => $article->is_breaking ? 'تم تعيين الخبر كعاجل' : 'تم إلغاء تعيين الخبر كعاجل'
            ]);
        }
    }

    public function closeModal()
    {
        $this->showCreateModal = false;
        $this->showEditModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->form = [
            'title' => '',
            'excerpt' => '',
            'content' => '',
            'category_id' => '',
            'author_id' => '',
            'type' => 'news',
            'is_published' => true,
            'is_featured' => false,
            'is_breaking' => false,
            'news_source' => '',
            'news_location' => '',
            'news_date' => '',
            'news_priority' => 'normal',
            'news_tags' => '',
            'news_related_articles' => '',
        ];
        $this->image = null;
        $this->editingArticle = null;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategoryFilter()
    {
        $this->resetPage();
    }

    public function updatedStatusFilter()
    {
        $this->resetPage();
    }

    public function updatedBreakingFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Article::with(['category', 'author'])
            ->where('type', 'news')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('excerpt', 'like', '%' . $this->search . '%')
                      ->orWhere('news_source', 'like', '%' . $this->search . '%')
                      ->orWhere('news_location', 'like', '%' . $this->search . '%');
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->statusFilter !== '', function ($query) {
                $query->where('is_published', $this->statusFilter === 'published');
            })
            ->when($this->breakingFilter !== '', function ($query) {
                $query->where('is_breaking', $this->breakingFilter === 'breaking');
            });

        $articles = $query->latest()->paginate(10);
        $categories = Category::getActiveByType('news');
        $authors = Author::active()->get();

        return view('livewire.admin.news-manager', compact('articles', 'categories', 'authors'));
    }
} 