<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Author;

class ArticlesManager extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $categoryFilter = '';
    public $statusFilter = '';
    public $articleTypeFilter = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editingArticle = null;

    // Form fields - Article specific
    public $form = [
        'title' => '',
        'excerpt' => '',
        'content' => '',
        'category_id' => '',
        'author_id' => '',
        'type' => 'article', // Fixed for articles
        'is_published' => true,
        'is_featured' => false,
        'is_breaking' => false,
        // Article specific fields
        'article_type' => 'general', // general, analysis, feature, interview, review, tutorial
        'article_topic' => '',
        'article_keywords' => '',
        'article_summary' => '',
        'article_conclusion' => '',
        'article_references' => '',
        'article_reading_time' => '',
        'article_difficulty' => 'easy', // easy, medium, hard
        'article_target_audience' => 'general', // general, experts, beginners, students
    ];

    public $image;

    protected $rules = [
        'form.title' => 'required|string|max:255',
        'form.excerpt' => 'required|string|max:500',
        'form.content' => 'required|string',
        'form.category_id' => 'required|exists:categories,id',
        'form.author_id' => 'nullable|exists:authors,id',
        'form.is_published' => 'boolean',
        'form.is_featured' => 'boolean',
        'form.is_breaking' => 'boolean',
        // Article specific validation
        'form.article_type' => 'required|in:general,analysis,feature,interview,review,tutorial',
        'form.article_topic' => 'nullable|string|max:255',
        'form.article_keywords' => 'nullable|string|max:500',
        'form.article_summary' => 'nullable|string|max:1000',
        'form.article_conclusion' => 'nullable|string|max:1000',
        'form.article_references' => 'nullable|string|max:1000',
        'form.article_reading_time' => 'nullable|string|max:50',
        'form.article_difficulty' => 'required|in:easy,medium,hard',
        'form.article_target_audience' => 'required|in:general,experts,beginners,students',
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
                'type' => 'article',
                'is_published' => $article->is_published,
                'is_featured' => $article->is_featured,
                'is_breaking' => $article->is_breaking,
                // Article specific fields
                'article_type' => $article->article_type ?? 'general',
                'article_topic' => $article->article_topic ?? '',
                'article_keywords' => $article->article_keywords ?? '',
                'article_summary' => $article->article_summary ?? '',
                'article_conclusion' => $article->article_conclusion ?? '',
                'article_references' => $article->article_references ?? '',
                'article_reading_time' => $article->article_reading_time ?? '',
                'article_difficulty' => $article->article_difficulty ?? 'easy',
                'article_target_audience' => $article->article_target_audience ?? 'general',
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
            'type' => 'article',
            'is_published' => $this->form['is_published'],
            'is_featured' => $this->form['is_featured'],
            'is_breaking' => $this->form['is_breaking'],
            'slug' => Str::slug($this->form['title']),
            // Article specific data
            'article_type' => $this->form['article_type'],
            'article_topic' => $this->form['article_topic'],
            'article_keywords' => $this->form['article_keywords'],
            'article_summary' => $this->form['article_summary'],
            'article_conclusion' => $this->form['article_conclusion'],
            'article_references' => $this->form['article_references'],
            'article_reading_time' => $this->form['article_reading_time'],
            'article_difficulty' => $this->form['article_difficulty'],
            'article_target_audience' => $this->form['article_target_audience'],
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
                'message' => 'تم تحديث المقال بنجاح'
            ]);
            $this->dispatch('articleUpdated');
        } else {
            Article::create($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الإنشاء بنجاح',
                'message' => 'تم إنشاء المقال بنجاح'
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
                'message' => 'تم حذف المقال بنجاح'
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
                'message' => $article->is_published ? 'تم نشر المقال' : 'تم إلغاء نشر المقال'
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
            'type' => 'article',
            'is_published' => true,
            'is_featured' => false,
            'is_breaking' => false,
            'article_type' => 'general',
            'article_topic' => '',
            'article_keywords' => '',
            'article_summary' => '',
            'article_conclusion' => '',
            'article_references' => '',
            'article_reading_time' => '',
            'article_difficulty' => 'easy',
            'article_target_audience' => 'general',
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

    public function updatedArticleTypeFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Article::with(['category', 'author'])
            ->where('type', 'article')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('excerpt', 'like', '%' . $this->search . '%')
                      ->orWhere('article_topic', 'like', '%' . $this->search . '%')
                      ->orWhere('article_keywords', 'like', '%' . $this->search . '%');
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->statusFilter !== '', function ($query) {
                $query->where('is_published', $this->statusFilter === 'published');
            })
            ->when($this->articleTypeFilter, function ($query) {
                $query->where('article_type', $this->articleTypeFilter);
            });

        $articles = $query->latest()->paginate(10);
        $categories = Category::getActiveByType('article');
        $authors = Author::active()->get();

        return view('livewire.admin.articles-manager', compact('articles', 'categories', 'authors'));
    }
} 