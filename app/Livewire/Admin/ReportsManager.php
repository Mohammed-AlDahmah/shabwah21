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

class ReportsManager extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $categoryFilter = '';
    public $statusFilter = '';
    public $reportTypeFilter = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editingArticle = null;

    // Form fields - Report specific
    public $form = [
        'title' => '',
        'excerpt' => '',
        'content' => '',
        'category_id' => '',
        'author_id' => '',
        'type' => 'report', // Fixed for reports
        'is_published' => true,
        'is_featured' => false,
        'is_breaking' => false,
        // Report specific fields
        'report_type' => 'investigation', // investigation, analysis, field, research
        'report_duration' => '',
        'report_location' => '',
        'report_interviews' => '',
        'report_sources' => '',
        'report_conclusions' => '',
        'report_recommendations' => '',
        'report_attachments' => '',
    ];

    public $image;
    public $attachments = [];

    protected $rules = [
        'form.title' => 'required|string|max:255',
        'form.excerpt' => 'required|string|max:500',
        'form.content' => 'required|string',
        'form.category_id' => 'required|exists:categories,id',
        'form.author_id' => 'nullable|exists:users,id',
        'form.is_published' => 'boolean',
        'form.is_featured' => 'boolean',
        'form.is_breaking' => 'boolean',
        // Report specific validation
        'form.report_type' => 'required|in:investigation,analysis,field,research',
        'form.report_duration' => 'nullable|string|max:255',
        'form.report_location' => 'nullable|string|max:255',
        'form.report_interviews' => 'nullable|string|max:1000',
        'form.report_sources' => 'nullable|string|max:1000',
        'form.report_conclusions' => 'nullable|string|max:1000',
        'form.report_recommendations' => 'nullable|string|max:1000',
        'form.report_attachments' => 'nullable|string|max:500',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'attachments.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:5120',
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
                'type' => 'report',
                'is_published' => $article->is_published,
                'is_featured' => $article->is_featured,
                'is_breaking' => $article->is_breaking,
                // Report specific fields
                'report_type' => $article->report_type ?? 'investigation',
                'report_duration' => $article->report_duration ?? '',
                'report_location' => $article->report_location ?? '',
                'report_interviews' => $article->report_interviews ?? '',
                'report_sources' => $article->report_sources ?? '',
                'report_conclusions' => $article->report_conclusions ?? '',
                'report_recommendations' => $article->report_recommendations ?? '',
                'report_attachments' => $article->report_attachments ?? '',
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
            'type' => 'report',
            'is_published' => $this->form['is_published'],
            'is_featured' => $this->form['is_featured'],
            'is_breaking' => $this->form['is_breaking'],
            'slug' => Str::slug($this->form['title']),
            // Report specific data
            'report_type' => $this->form['report_type'],
            'report_duration' => $this->form['report_duration'],
            'report_location' => $this->form['report_location'],
            'report_interviews' => $this->form['report_interviews'],
            'report_sources' => $this->form['report_sources'],
            'report_conclusions' => $this->form['report_conclusions'],
            'report_recommendations' => $this->form['report_recommendations'],
            'report_attachments' => $this->form['report_attachments'],
        ];

        if ($this->image) {
            $imagePath = $this->image->store('articles', 'public');
            $data['featured_image'] = $imagePath;
        }

        if ($this->attachments) {
            $attachmentPaths = [];
            foreach ($this->attachments as $attachment) {
                $attachmentPaths[] = $attachment->store('reports/attachments', 'public');
            }
            $data['report_attachments'] = implode(',', $attachmentPaths);
        }

        if ($this->editingArticle) {
            $this->editingArticle->update($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => 'تم تحديث التقرير بنجاح'
            ]);
            $this->dispatch('articleUpdated');
        } else {
            Article::create($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الإنشاء بنجاح',
                'message' => 'تم إنشاء التقرير بنجاح'
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
                'message' => 'تم حذف التقرير بنجاح'
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
                'message' => $article->is_published ? 'تم نشر التقرير' : 'تم إلغاء نشر التقرير'
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
            'type' => 'report',
            'is_published' => true,
            'is_featured' => false,
            'is_breaking' => false,
            'report_type' => 'investigation',
            'report_duration' => '',
            'report_location' => '',
            'report_interviews' => '',
            'report_sources' => '',
            'report_conclusions' => '',
            'report_recommendations' => '',
            'report_attachments' => '',
        ];
        $this->image = null;
        $this->attachments = [];
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

    public function updatedReportTypeFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Article::with(['category', 'author'])
            ->where('type', 'report')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('excerpt', 'like', '%' . $this->search . '%')
                      ->orWhere('report_location', 'like', '%' . $this->search . '%')
                      ->orWhere('report_interviews', 'like', '%' . $this->search . '%');
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->statusFilter !== '', function ($query) {
                $query->where('is_published', $this->statusFilter === 'published');
            })
            ->when($this->reportTypeFilter, function ($query) {
                $query->where('report_type', $this->reportTypeFilter);
            });

        $articles = $query->latest()->paginate(10);
        $categories = Category::where('type', 'report')->where('is_active', true)->get();
        $authors = Author::active()->get();

        return view('livewire.admin.reports-manager', compact('articles', 'categories', 'authors'));
    }
} 