<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class OpinionsManager extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $categoryFilter = '';
    public $statusFilter = '';
    public $opinionTypeFilter = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editingArticle = null;

    // Form fields - Opinion specific
    public $form = [
        'title' => '',
        'excerpt' => '',
        'content' => '',
        'category_id' => '',
        'author_id' => '',
        'type' => 'opinion', // Fixed for opinions
        'is_published' => true,
        'is_featured' => false,
        'is_breaking' => false,
        // Opinion specific fields
        'opinion_type' => 'editorial', // editorial, column, analysis, commentary
        'opinion_topic' => '',
        'opinion_perspective' => 'neutral', // neutral, supportive, critical, balanced
        'opinion_expertise' => '',
        'opinion_credentials' => '',
        'opinion_related_events' => '',
        'opinion_call_to_action' => '',
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
        // Opinion specific validation
        'form.opinion_type' => 'required|in:editorial,column,analysis,commentary',
        'form.opinion_topic' => 'nullable|string|max:255',
        'form.opinion_perspective' => 'required|in:neutral,supportive,critical,balanced',
        'form.opinion_expertise' => 'nullable|string|max:255',
        'form.opinion_credentials' => 'nullable|string|max:500',
        'form.opinion_related_events' => 'nullable|string|max:500',
        'form.opinion_call_to_action' => 'nullable|string|max:500',
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
                'type' => 'opinion',
                'is_published' => $article->is_published,
                'is_featured' => $article->is_featured,
                'is_breaking' => $article->is_breaking,
                // Opinion specific fields
                'opinion_type' => $article->opinion_type ?? 'editorial',
                'opinion_topic' => $article->opinion_topic ?? '',
                'opinion_perspective' => $article->opinion_perspective ?? 'neutral',
                'opinion_expertise' => $article->opinion_expertise ?? '',
                'opinion_credentials' => $article->opinion_credentials ?? '',
                'opinion_related_events' => $article->opinion_related_events ?? '',
                'opinion_call_to_action' => $article->opinion_call_to_action ?? '',
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
            'type' => 'opinion',
            'is_published' => $this->form['is_published'],
            'is_featured' => $this->form['is_featured'],
            'is_breaking' => $this->form['is_breaking'],
            'slug' => Str::slug($this->form['title']),
            // Opinion specific data
            'opinion_type' => $this->form['opinion_type'],
            'opinion_topic' => $this->form['opinion_topic'],
            'opinion_perspective' => $this->form['opinion_perspective'],
            'opinion_expertise' => $this->form['opinion_expertise'],
            'opinion_credentials' => $this->form['opinion_credentials'],
            'opinion_related_events' => $this->form['opinion_related_events'],
            'opinion_call_to_action' => $this->form['opinion_call_to_action'],
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
                'message' => 'تم تحديث مقال الرأي بنجاح'
            ]);
            $this->dispatch('articleUpdated');
        } else {
            Article::create($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الإنشاء بنجاح',
                'message' => 'تم إنشاء مقال الرأي بنجاح'
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
                'message' => 'تم حذف مقال الرأي بنجاح'
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
                'message' => $article->is_published ? 'تم نشر مقال الرأي' : 'تم إلغاء نشر مقال الرأي'
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
            'type' => 'opinion',
            'is_published' => true,
            'is_featured' => false,
            'is_breaking' => false,
            'opinion_type' => 'editorial',
            'opinion_topic' => '',
            'opinion_perspective' => 'neutral',
            'opinion_expertise' => '',
            'opinion_credentials' => '',
            'opinion_related_events' => '',
            'opinion_call_to_action' => '',
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

    public function updatedOpinionTypeFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Article::with(['category', 'author'])
            ->where('type', 'opinion')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('excerpt', 'like', '%' . $this->search . '%')
                      ->orWhere('opinion_topic', 'like', '%' . $this->search . '%')
                      ->orWhere('opinion_expertise', 'like', '%' . $this->search . '%');
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->statusFilter !== '', function ($query) {
                $query->where('is_published', $this->statusFilter === 'published');
            })
            ->when($this->opinionTypeFilter, function ($query) {
                $query->where('opinion_type', $this->opinionTypeFilter);
            });

        $articles = $query->latest()->paginate(10);
        $categories = Category::getActiveByType('opinion');
         $authors = Author::active()->get();
        return view('livewire.admin.opinions-manager', compact('articles', 'categories', 'authors'));
    }
} 