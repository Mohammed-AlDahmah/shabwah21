<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
        'phone',
        'position',
        'department',
        'bio',
        'avatar',
        'last_login_at',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'last_login_at' => 'datetime',
        ];
    }

    /**
     * Get the articles for the user.
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    /**
     * Get the videos for the user.
     */
    public function videos()
    {
        return $this->hasMany(Video::class, 'author_id');
    }

    /**
     * Check if user is admin.
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is editor.
     */
    public function isEditor()
    {
        return $this->role === 'editor';
    }

    /**
     * Check if user is author.
     */
    public function isAuthor()
    {
        return $this->role === 'author';
    }

    /**
     * Check if user is active.
     */
    public function isActive()
    {
        return $this->is_active;
    }

    /**
     * Get user's role display name.
     */
    public function getRoleDisplayNameAttribute()
    {
        $roles = [
            'admin' => 'مدير',
            'editor' => 'محرر',
            'user' => 'مستخدم',
        ];

        return $roles[$this->role] ?? $this->role;
    }

    /**
     * Get user's avatar URL.
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return \App\Helpers\ImageHelper::getImageUrl($this->avatar);
        }
        return null;
    }

    /**
     * Get user's initials for avatar.
     */
    public function getInitialsAttribute()
    {
        $words = explode(' ', $this->name);
        $initials = '';
        
        foreach ($words as $word) {
            $initials .= mb_substr($word, 0, 1, 'UTF-8');
        }
        
        return mb_strtoupper($initials, 'UTF-8');
    }

    /**
     * Check if user has specific role.
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Check if user has any of the given roles.
     */
    public function hasAnyRole($roles)
    {
        return in_array($this->role, (array) $roles);
    }

    /**
     * Check if user is super admin.
     */
    public function isSuperAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user can manage content.
     */
    public function canManageContent()
    {
        return in_array($this->role, ['admin', 'editor']);
    }

    /**
     * Check if user can publish content.
     */
    public function canPublishContent()
    {
        return in_array($this->role, ['admin', 'editor', 'reporter']);
    }
}
