<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Video;
use App\Models\Category;
use App\Models\Author;
use App\Models\User;
use Illuminate\Support\Str;

class VideosManager extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $categoryFilter = '';
    public $statusFilter = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editingVideo = null;

    // Form fields
    public $form = [
        'title' => '',
        'description' => '',
        'video_url' => '',
        'category_id' => '',
        'author_id' => '',
        'duration' => '',
        'is_published' => true,
    ];

    public $thumbnail;

    protected $rules = [
        'form.title' => 'required|string|max:255',
        'form.description' => 'required|string|max:500',
        'form.video_url' => 'required|url',
        'form.category_id' => 'required|exists:categories,id',
        'form.author_id' => 'nullable|exists:users,id',
        'form.duration' => 'nullable|string|max:10',
        'form.is_published' => 'boolean',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    protected $listeners = [
        'videoCreated' => 'loadVideos',
        'videoUpdated' => 'loadVideos',
        'videoDeleted' => 'loadVideos',
        'deleteConfirmed' => 'deleteVideoConfirmed',
        'closeModal' => 'closeModal',
    ];

    public function mount()
    {
        $this->loadVideos();
    }

    public function loadVideos()
    {
        // This will be handled by the query in render()
    }

    public function createVideo()
    {
        $this->resetForm();
        $this->showCreateModal = true;
    }

    public function editVideo($videoId)
    {
        $video = Video::find($videoId);
        if ($video) {
            $this->editingVideo = $video;
            $this->form = [
                'title' => $video->title,
                'description' => $video->description,
                'video_url' => $video->video_url,
                'category_id' => $video->category_id,
                'author_id' => $video->author_id,
                'duration' => $video->duration,
                'is_published' => $video->is_published,
            ];
            $this->showEditModal = true;
        }
    }

    public function saveVideo()
    {
        $this->validate();

        $data = [
            'title' => $this->form['title'],
            'description' => $this->form['description'],
            'video_url' => $this->form['video_url'],
            'category_id' => $this->form['category_id'],
            'author_id' => $this->form['author_id'],
            'duration' => $this->form['duration'],
            'is_published' => $this->form['is_published'],
            'slug' => Str::slug($this->form['title']),
        ];

        if ($this->thumbnail) {
            $thumbnailPath = $this->thumbnail->store('videos', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        if ($this->editingVideo) {
            $this->editingVideo->update($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => 'تم تحديث الفيديو بنجاح'
            ]);
            $this->dispatch('videoUpdated');
        } else {
            Video::create($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الإنشاء بنجاح',
                'message' => 'تم إنشاء الفيديو بنجاح'
            ]);
            $this->dispatch('videoCreated');
        }

        $this->closeModal();
    }

    public function deleteVideo($videoId)
    {
        $this->dispatch('confirmDelete', ['id' => $videoId]);
    }

    public function deleteVideoConfirmed($data)
    {
        $videoId = $data['id'] ?? null;
        if (!$videoId) return;

        $video = Video::find($videoId);
        if ($video) {
            $video->delete();
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الحذف بنجاح',
                'message' => 'تم حذف الفيديو بنجاح'
            ]);
            $this->dispatch('videoDeleted');
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
            'description' => '',
            'video_url' => '',
            'category_id' => '',
            'author_id' => '',
            'duration' => '',
            'is_published' => true,
        ];
        $this->thumbnail = null;
        $this->editingVideo = null;
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

    public function render()
    {
        $query = Video::with(['category', 'author'])
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->statusFilter !== '', function ($query) {
                $query->where('is_published', $this->statusFilter === 'published');
            });

        $videos = $query->latest()->paginate(12);
        $categories = Category::all();
        $authors = Author::active()->get();
        return view('livewire.admin.videos-manager', compact('videos', 'categories', 'authors'));
    }
} 