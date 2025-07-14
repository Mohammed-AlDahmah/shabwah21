<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;

class NewsManager extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $showCreateModal = false;
    public $title, $content, $category_id, $image, $published_at;
    public $editId, $editTitle, $editContent, $editCategoryId;
    public $showEditModal = false;
    public $deleteId = null;

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openCreateModal()
    {
        $this->reset(['title', 'content', 'category_id', 'image', 'published_at']);
        $this->showCreateModal = true;
    }

    public function closeCreateModal()
    {
        $this->showCreateModal = false;
    }

    public function createNews()
    {
        $this->validate();
        Article::create([
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->category_id,
            'type' => 'news',
            'is_published' => true,
            'published_at' => $this->published_at ?? now(),
        ]);
        $this->showCreateModal = false;
        session()->flash('success', 'تم إضافة الخبر بنجاح!');
    }

    public function openEditModal($id)
    {
        $news = Article::findOrFail($id);
        $this->editId = $news->id;
        $this->editTitle = $news->title;
        $this->editContent = $news->content;
        $this->editCategoryId = $news->category_id;
        $this->showEditModal = true;
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
    }

    public function updateNews()
    {
        $this->validate([
            'editTitle' => 'required|string|max:255',
            'editContent' => 'required|string',
            'editCategoryId' => 'required|exists:categories,id',
        ]);
        $news = Article::findOrFail($this->editId);
        $news->update([
            'title' => $this->editTitle,
            'content' => $this->editContent,
            'category_id' => $this->editCategoryId,
        ]);
        $this->showEditModal = false;
        session()->flash('success', 'تم تعديل الخبر بنجاح!');
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function deleteNews()
    {
        Article::findOrFail($this->deleteId)->delete();
        $this->deleteId = null;
        session()->flash('success', 'تم حذف الخبر بنجاح!');
    }

    public function render()
    {
        $news = Article::where('type', 'news')
            ->where(function($q) {
                $q->where('title', 'like', '%'.$this->search.'%')
                  ->orWhere('content', 'like', '%'.$this->search.'%');
            })
            ->orderByDesc('published_at')
            ->paginate($this->perPage);

        return view('livewire.admin.news-manager', compact('news'));
    }
} 