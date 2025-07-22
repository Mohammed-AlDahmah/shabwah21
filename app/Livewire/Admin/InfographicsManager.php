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
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InfographicsManager extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $categoryFilter = '';
    public $statusFilter = '';
    public $infographicTypeFilter = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editingArticle = null;

    // Form fields - Infographic specific
    public $form = [
        'title' => '',
        'excerpt' => '',
        'content' => '',
        'category_id' => '',
        'author_id' => '',
        'type' => 'infographic', // Fixed for infographics
        'is_published' => true,
        'is_featured' => false,
        'is_breaking' => false,
        // Infographic specific fields
        'infographic_type' => 'statistical', // statistical, timeline, comparison, process, geographic
        'infographic_data_source' => '',
        'infographic_designer' => '',
        'infographic_dimensions' => '',
        'infographic_colors' => '',
        'infographic_language' => 'ar', // ar, en, both
        'infographic_downloadable' => false,
        'infographic_interactive' => false,
        'infographic_embed_code' => '',
    ];

    public $image;
    public $infographicFile;

    protected $rules = [
        'form.title' => 'required|string|max:255',
        'form.excerpt' => 'required|string|max:500',
        'form.content' => 'required|string',
        'form.category_id' => 'required|exists:categories,id',
        'form.author_id' => 'nullable|exists:authors,id',
        'form.is_published' => 'boolean',
        'form.is_featured' => 'boolean',
        'form.is_breaking' => 'boolean',
        // Infographic specific validation
        'form.infographic_type' => 'required|in:statistical,timeline,comparison,process,geographic',
        'form.infographic_data_source' => 'nullable|string|max:255',
        'form.infographic_designer' => 'nullable|string|max:255',
        'form.infographic_dimensions' => 'nullable|string|max:100',
        'form.infographic_colors' => 'nullable|string|max:255',
        'form.infographic_language' => 'required|in:ar,en,both',
        'form.infographic_downloadable' => 'boolean',
        'form.infographic_interactive' => 'boolean',
        'form.infographic_embed_code' => 'nullable|string|max:1000',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'infographicFile' => 'nullable|file|mimes:pdf,svg,png,jpg,jpeg|max:10240',
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
                'type' => 'infographic',
                'is_published' => $article->is_published,
                'is_featured' => $article->is_featured,
                'is_breaking' => $article->is_breaking,
                // Infographic specific fields
                'infographic_type' => $article->infographic_type ?? 'statistical',
                'infographic_data_source' => $article->infographic_data_source ?? '',
                'infographic_designer' => $article->infographic_designer ?? '',
                'infographic_dimensions' => $article->infographic_dimensions ?? '',
                'infographic_colors' => $article->infographic_colors ?? '',
                'infographic_language' => $article->infographic_language ?? 'ar',
                'infographic_downloadable' => $article->infographic_downloadable ?? false,
                'infographic_interactive' => $article->infographic_interactive ?? false,
                'infographic_embed_code' => $article->infographic_embed_code ?? '',
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
            'type' => 'infographic',
            'is_published' => $this->form['is_published'],
            'is_featured' => $this->form['is_featured'],
            'is_breaking' => $this->form['is_breaking'],
            'slug' => Str::slug($this->form['title']),
            // Infographic specific data
            'infographic_type' => $this->form['infographic_type'],
            'infographic_data_source' => $this->form['infographic_data_source'],
            'infographic_designer' => $this->form['infographic_designer'],
            'infographic_dimensions' => $this->form['infographic_dimensions'],
            'infographic_colors' => $this->form['infographic_colors'],
            'infographic_language' => $this->form['infographic_language'],
            'infographic_downloadable' => $this->form['infographic_downloadable'],
            'infographic_interactive' => $this->form['infographic_interactive'],
            'infographic_embed_code' => $this->form['infographic_embed_code'],
        ];

        if ($this->image) {
            $imagePath = $this->image->store('articles', 'public');
            $data['featured_image'] = $imagePath;
        }

        if ($this->infographicFile) {
            $infographicPath = $this->infographicFile->store('infographics', 'public');
            $data['infographic_file'] = $infographicPath;
        }

        if ($this->editingArticle) {
            $this->editingArticle->update($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => 'تم تحديث الإنفوجرافيك بنجاح'
            ]);
            $this->dispatch('articleUpdated');
        } else {
            Article::create($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الإنشاء بنجاح',
                'message' => 'تم إنشاء الإنفوجرافيك بنجاح'
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
                'message' => 'تم حذف الإنفوجرافيك بنجاح'
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
                'message' => $article->is_published ? 'تم نشر الإنفوجرافيك' : 'تم إلغاء نشر الإنفوجرافيك'
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
            'type' => 'infographic',
            'is_published' => true,
            'is_featured' => false,
            'is_breaking' => false,
            'infographic_type' => 'statistical',
            'infographic_data_source' => '',
            'infographic_designer' => '',
            'infographic_dimensions' => '',
            'infographic_colors' => '',
            'infographic_language' => 'ar',
            'infographic_downloadable' => false,
            'infographic_interactive' => false,
            'infographic_embed_code' => '',
        ];
        $this->image = null;
        $this->infographicFile = null;
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

    public function updatedInfographicTypeFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Article::with(['category', 'author'])
            ->where('type', 'infographic')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('excerpt', 'like', '%' . $this->search . '%')
                      ->orWhere('infographic_data_source', 'like', '%' . $this->search . '%')
                      ->orWhere('infographic_designer', 'like', '%' . $this->search . '%');
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->statusFilter !== '', function ($query) {
                $query->where('is_published', $this->statusFilter === 'published');
            })
            ->when($this->infographicTypeFilter, function ($query) {
                $query->where('infographic_type', $this->infographicTypeFilter);
            });

        $articles = $query->latest()->paginate(10);
        $categories = Category::getActiveByType('infographic');
        $authors = Author::active()->get();
        return view('livewire.admin.infographics-manager', compact('articles', 'categories', 'authors'));
    }
} 