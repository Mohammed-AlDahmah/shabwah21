<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersManager extends Component
{
    use WithPagination;

    public $search = '';
    public $roleFilter = '';
    public $statusFilter = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editingUser = null;

    // Form fields
    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'role' => 'user',
        'is_active' => true,
    ];

    protected $rules = [
        'form.name' => 'required|string|max:255',
        'form.email' => 'required|email|max:255',
        'form.password' => 'nullable|string|min:8',
        'form.role' => 'required|in:admin,editor,author,user',
        'form.is_active' => 'boolean',
    ];

    protected $listeners = [
        'userCreated' => 'loadUsers',
        'userUpdated' => 'loadUsers',
        'userDeleted' => 'loadUsers',
        'deleteConfirmed' => 'deleteUserConfirmed',
        'closeModal' => 'closeModal',
    ];

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        // This will be handled by the query in render()
    }

    public function createUser()
    {
        $this->resetForm();
        $this->showCreateModal = true;
    }

    public function editUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $this->editingUser = $user;
            $this->form = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => '',
                'role' => $user->role,
                'is_active' => $user->is_active,
            ];
            $this->showEditModal = true;
        }
    }

    public function saveUser()
    {
        $this->validate();

        $data = [
            'name' => $this->form['name'],
            'email' => $this->form['email'],
            'role' => $this->form['role'],
            'is_active' => $this->form['is_active'],
        ];

        if ($this->form['password']) {
            $data['password'] = Hash::make($this->form['password']);
        }

        if ($this->editingUser) {
            // Update unique rule for editing
            $this->validate([
                'form.email' => 'required|email|max:255|unique:users,email,' . $this->editingUser->id,
            ]);
            
            $this->editingUser->update($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => 'تم تحديث المستخدم بنجاح'
            ]);
            $this->dispatch('userUpdated');
        } else {
            // Add password requirement for new users
            $this->validate([
                'form.password' => 'required|string|min:8',
                'form.email' => 'required|email|max:255|unique:users,email',
            ]);
            
            User::create($data);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الإنشاء بنجاح',
                'message' => 'تم إنشاء المستخدم بنجاح'
            ]);
            $this->dispatch('userCreated');
        }

        $this->closeModal();
    }

    public function deleteUser($userId)
    {
        $this->dispatch('confirmDelete', ['id' => $userId]);
    }

    public function deleteUserConfirmed($data)
    {
        $userId = $data['id'] ?? null;
        if (!$userId) return;

        $user = User::find($userId);
        if ($user && $user->id !== auth()->id()) {
            $user->delete();
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم الحذف بنجاح',
                'message' => 'تم حذف المستخدم بنجاح'
            ]);
            $this->dispatch('userDeleted');
        } else {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'لا يمكن الحذف',
                'message' => 'لا يمكن حذف حسابك الشخصي'
            ]);
        }
    }

    public function toggleStatus($userId)
    {
        $user = User::find($userId);
        if ($user && $user->id !== auth()->id()) {
            $user->update(['is_active' => !$user->is_active]);
            $this->dispatch('showToast', [
                'type' => 'success',
                'title' => 'تم التحديث بنجاح',
                'message' => $user->is_active ? 'تم تفعيل المستخدم' : 'تم إلغاء تفعيل المستخدم'
            ]);
        } else {
            $this->dispatch('showToast', [
                'type' => 'error',
                'title' => 'لا يمكن التحديث',
                'message' => 'لا يمكن تغيير حالة حسابك الشخصي'
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
            'password' => '',
            'role' => 'user',
            'is_active' => true,
        ];
        $this->editingUser = null;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedRoleFilter()
    {
        $this->resetPage();
    }

    public function updatedStatusFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = User::withCount('articles')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->when($this->roleFilter, function ($query) {
                $query->where('role', $this->roleFilter);
            })
            ->when($this->statusFilter !== '', function ($query) {
                $query->where('is_active', $this->statusFilter === 'active');
            });

        $users = $query->latest()->paginate(10);

        return view('livewire.admin.users-manager', compact('users'));
    }
} 