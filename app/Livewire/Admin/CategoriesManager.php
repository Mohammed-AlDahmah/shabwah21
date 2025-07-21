<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesManager extends Component
{
    use WithPagination;

    public $search = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editingCategory = null;

    // Form fields
    public $form = [
        'name_ar' => '',
        'name_en' => '',
        'description' => '',
        'color' => '#C08B2D',
        'icon' => 'bi bi-newspaper',
        'slug' => '',
        'type' => 'article',
    ];

    protected $rules = [
        'form.name_ar' => 'required|string|max:255',
        'form.name_en' => 'required|string|max:255',
        'form.description' => 'nullable|string|max:500',
        'form.color' => 'required|string|max:7',
        'form.icon' => 'required|string|max:50',
        'form.slug' => 'nullable|string|max:255|unique:categories,slug',
        'form.type' => 'required|in:news,report,article,infographic,video,opinion',
    ];

    protected $listeners = [
        'categoryCreated' => 'loadCategories',
        'categoryUpdated' => 'loadCategories',
        'categoryDeleted' => 'loadCategories',
        'deleteConfirmed' => 'deleteCategoryConfirmed',
        'closeModal' => 'closeModal',
    ];

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        // This will be handled by the query in render()
    }

    public function createCategory()
    {
        $this->resetForm();
        $this->showCreateModal = true;
    }

    public function editCategory($categoryId)
    {
        $category = Category::find($categoryId);
        if ($category) {
            $this->editingCategory = $category;
            $this->form = [
                'name_ar' => $category->name_ar,
                'name_en' => $category->name_en,
                'description' => $category->description,
                'color' => $category->color,
                'icon' => $category->icon,
                'slug' => $category->slug,
                'type' => $category->type,
            ];
            $this->showEditModal = true;
        }
    }

    public function saveCategory()
    {
        $this->validate();

        $data = [
            'name_ar' => $this->form['name_ar'],
            'name_en' => $this->form['name_en'],
            'description' => $this->form['description'],
            'color' => $this->form['color'],
            'icon' => $this->form['icon'],
            'slug' => $this->form['slug'] ?: Str::slug($this->form['name_ar']),
            'type' => $this->form['type'],
        ];

        if ($this->editingCategory) {
            // Update unique rule for editing
            $this->validate([
                'form.name_ar' => 'required|string|max:255|unique:categories,name_ar,' . $this->editingCategory->id,
                'form.name_en' => 'required|string|max:255|unique:categories,name_en,' . $this->editingCategory->id,
                'form.slug' => 'nullable|string|max:255|unique:categories,slug,' . $this->editingCategory->id,
            ]);
            
            $this->editingCategory->update($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => 'تم تحديث القسم بنجاح'
            ]);
            $this->dispatch('categoryUpdated');
        } else {
            Category::create($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الإنشاء بنجاح',
                'message' => 'تم إنشاء القسم بنجاح'
            ]);
            $this->dispatch('categoryCreated');
        }

        $this->closeModal();
    }

    public function deleteCategory($categoryId)
    {
        $this->dispatch('confirmDelete', ['id' => $categoryId]);
    }

    public function deleteCategoryConfirmed($data)
    {
        $categoryId = $data['id'] ?? null;
        if (!$categoryId) return;

        $category = Category::find($categoryId);
        if ($category) {
            if ($category->articles()->count() > 0) {
                $this->dispatch('showToast', [
                    'type' => 'error',
                    'title' => 'لا يمكن الحذف',
                    'message' => 'لا يمكن حذف القسم لوجود مقالات مرتبطة به'
                ]);
                return;
            }
            
            $category->delete();
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الحذف بنجاح',
                'message' => 'تم حذف القسم بنجاح'
            ]);
            $this->dispatch('categoryDeleted');
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
            'name_ar' => '',
            'name_en' => '',
            'description' => '',
            'color' => '#C08B2D',
            'icon' => 'bi bi-newspaper',
            'slug' => '',
            'type' => 'article',
        ];
        $this->editingCategory = null;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Category::withCount('articles')
            ->when($this->search, function ($query) {
                $query->where('name_ar', 'like', '%' . $this->search . '%')
                      ->orWhere('name_en', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            });

        $categories = $query->latest()->paginate(10);

        return view('livewire.admin.categories-manager', compact('categories'));
    }
} 