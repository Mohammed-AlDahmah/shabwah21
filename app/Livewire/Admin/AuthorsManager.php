<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Author;
use Illuminate\Support\Str;

class AuthorsManager extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $statusFilter = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editingAuthor = null;

    // Form fields
    public $form = [
        'name' => '',
        'email' => '',
        'bio' => '',
        'specialization' => '',
        'experience_years' => '',
        'education' => '',
        'awards' => '',
        'social_media' => [
            'twitter' => '',
            'linkedin' => '',
            'facebook' => '',
            'instagram' => '',
            'website' => ''
        ],
        'is_active' => true,
        'is_featured' => false,
        'contact_info' => '',
        'location' => '',
        'languages' => '',
        'expertise_areas' => '',
        'publication_count' => '',
        'join_date' => '',
    ];

    public $avatar;

    protected $rules = [
        'form.name' => 'required|string|max:255',
        'form.email' => 'required|email|max:255',
        'form.bio' => 'nullable|string|max:1000',
        'form.specialization' => 'nullable|string|max:255',
        'form.experience_years' => 'nullable|integer|min:0|max:50',
        'form.education' => 'nullable|string|max:500',
        'form.awards' => 'nullable|string|max:500',
        'form.social_media.twitter' => 'nullable|url|max:255',
        'form.social_media.linkedin' => 'nullable|url|max:255',
        'form.social_media.facebook' => 'nullable|url|max:255',
        'form.social_media.instagram' => 'nullable|url|max:255',
        'form.social_media.website' => 'nullable|url|max:255',
        'form.is_active' => 'boolean',
        'form.is_featured' => 'boolean',
        'form.contact_info' => 'nullable|string|max:255',
        'form.location' => 'nullable|string|max:255',
        'form.languages' => 'nullable|string|max:255',
        'form.expertise_areas' => 'nullable|string|max:500',
        'form.publication_count' => 'nullable|integer|min:0',
        'form.join_date' => 'nullable|date',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    protected $listeners = [
        'authorCreated' => 'loadAuthors',
        'authorUpdated' => 'loadAuthors',
        'authorDeleted' => 'loadAuthors',
        'deleteConfirmed' => 'deleteAuthorConfirmed',
        'closeModal' => 'closeModal',
    ];

    public function mount()
    {
        $this->loadAuthors();
    }

    public function loadAuthors()
    {
        // This will be handled by the query in render()
    }

    public function createAuthor()
    {
        $this->resetForm();
        $this->showCreateModal = true;
    }

    public function editAuthor($authorId)
    {
        $author = Author::find($authorId);
        if ($author) {
            $this->editingAuthor = $author;
            $this->form = [
                'name' => $author->name,
                'email' => $author->email,
                'bio' => $author->bio ?? '',
                'specialization' => $author->specialization ?? '',
                'experience_years' => $author->experience_years ?? '',
                'education' => $author->education ?? '',
                'awards' => $author->awards ?? '',
                'social_media' => $author->social_media ?? [
                    'twitter' => '',
                    'linkedin' => '',
                    'facebook' => '',
                    'instagram' => '',
                    'website' => ''
                ],
                'is_active' => $author->is_active ?? true,
                'is_featured' => $author->is_featured ?? false,
                'contact_info' => $author->contact_info ?? '',
                'location' => $author->location ?? '',
                'languages' => $author->languages ?? '',
                'expertise_areas' => $author->expertise_areas ?? '',
                'publication_count' => $author->publication_count ?? '',
                'join_date' => $author->join_date ?? '',
            ];
            $this->showEditModal = true;
        }
    }

    public function saveAuthor()
    {
        $this->validate();

        $data = [
            'name' => $this->form['name'],
            'email' => $this->form['email'],
            'bio' => $this->form['bio'],
            'specialization' => $this->form['specialization'],
            'experience_years' => $this->form['experience_years'],
            'education' => $this->form['education'],
            'awards' => $this->form['awards'],
            'social_media' => $this->form['social_media'],
            'is_active' => $this->form['is_active'],
            'is_featured' => $this->form['is_featured'],
            'contact_info' => $this->form['contact_info'],
            'location' => $this->form['location'],
            'languages' => $this->form['languages'],
            'expertise_areas' => $this->form['expertise_areas'],
            'publication_count' => $this->form['publication_count'],
            'join_date' => $this->form['join_date'],
            'slug' => Str::slug($this->form['name']),
        ];

        if ($this->avatar) {
            $avatarPath = $this->avatar->store('authors', 'public');
            $data['avatar'] = $avatarPath;
        }

        if ($this->editingAuthor) {
            $this->editingAuthor->update($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => 'تم تحديث بيانات المؤلف بنجاح'
            ]);
            $this->dispatch('authorUpdated');
        } else {
            Author::create($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الإنشاء بنجاح',
                'message' => 'تم إنشاء المؤلف بنجاح'
            ]);
            $this->dispatch('authorCreated');
        }

        $this->closeModal();
    }

    public function deleteAuthor($authorId)
    {
        $this->dispatch('confirmDelete', ['id' => $authorId]);
    }

    public function deleteAuthorConfirmed($data)
    {
        $authorId = $data['id'] ?? null;
        if (!$authorId) return;

        $author = Author::find($authorId);
        if ($author) {
            // Check if author has articles
            if ($author->articles()->count() > 0) {
                $this->dispatch('showToast', [
                    'type' => 'error',
                    'title' => 'لا يمكن الحذف',
                    'message' => 'لا يمكن حذف المؤلف لوجود مقالات مرتبطة به'
                ]);
                return;
            }

            $author->delete();
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الحذف بنجاح',
                'message' => 'تم حذف المؤلف بنجاح'
            ]);
            $this->dispatch('authorDeleted');
        }
    }

    public function toggleActive($authorId)
    {
        $author = Author::find($authorId);
        if ($author) {
            $author->update(['is_active' => !$author->is_active]);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => $author->is_active ? 'تم تفعيل المؤلف' : 'تم إلغاء تفعيل المؤلف'
            ]);
        }
    }

    public function toggleFeatured($authorId)
    {
        $author = Author::find($authorId);
        if ($author) {
            $author->update(['is_featured' => !$author->is_featured]);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => $author->is_featured ? 'تم تمييز المؤلف' : 'تم إلغاء تمييز المؤلف'
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
            'name' => '',
            'email' => '',
            'bio' => '',
            'specialization' => '',
            'experience_years' => '',
            'education' => '',
            'awards' => '',
            'social_media' => [
                'twitter' => '',
                'linkedin' => '',
                'facebook' => '',
                'instagram' => '',
                'website' => ''
            ],
            'is_active' => true,
            'is_featured' => false,
            'contact_info' => '',
            'location' => '',
            'languages' => '',
            'expertise_areas' => '',
            'publication_count' => '',
            'join_date' => '',
        ];
        $this->avatar = null;
        $this->editingAuthor = null;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStatusFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Author::withCount('articles')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('specialization', 'like', '%' . $this->search . '%')
                      ->orWhere('bio', 'like', '%' . $this->search . '%');
            })
            ->when($this->statusFilter !== '', function ($query) {
                $query->where('is_active', $this->statusFilter === 'active');
            });

        $authors = $query->latest()->paginate(10);

        return view('livewire.admin.authors-manager', compact('authors'));
    }
} 