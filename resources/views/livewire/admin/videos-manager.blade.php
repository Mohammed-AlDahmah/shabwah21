<div class="videos-management">
    <!-- Page Header -->
    <div class="page-header mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">إدارة الفيديوهات</h1>
                <p class="text-gray-600">إدارة جميع الفيديوهات في الموقع</p>
            </div>
            <button wire:click="createVideo" class="btn-primary">
                <i class="bi bi-plus-circle ml-2"></i>
                فيديو جديد
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="filters-section mb-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Search -->
                <div class="search-box">
                    <label class="block text-sm font-medium text-gray-700 mb-2">البحث</label>
                    <div class="relative">
                        <input type="text" wire:model.live="search" 
                               placeholder="ابحث في الفيديوهات..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <i class="bi bi-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="category-filter">
                    <label class="block text-sm font-medium text-gray-700 mb-2">القسم</label>
                    <select wire:model.live="categoryFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <option value="">جميع الأقسام</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Filter -->
                <div class="status-filter">
                    <label class="block text-sm font-medium text-gray-700 mb-2">الحالة</label>
                    <select wire:model.live="statusFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        <option value="">جميع الحالات</option>
                        <option value="published">منشور</option>
                        <option value="draft">مسودة</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Videos Grid -->
    <div class="videos-grid">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($videos as $video)
                <div class="video-card">
                    <div class="video-thumbnail">
                        @if($video->thumbnail)
                            <img src="{{ \App\Helpers\ImageHelper::getImageUrl($video->thumbnail) }}" 
                                 alt="{{ $video->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                <i class="bi bi-play-circle text-gray-400 text-4xl"></i>
                            </div>
                        @endif
                        <div class="video-overlay">
                            <div class="video-actions">
                                                            <button wire:click="editVideo({{ $video->id }})"
                                    class="action-btn edit" title="تعديل">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button wire:click="deleteVideo({{ $video->id }})"
                                    class="action-btn delete" title="حذف">
                                <i class="bi bi-trash"></i>
                            </button>
                                <a href="{{ route('videos.show', $video->slug) }}" 
                                   target="_blank" 
                                   class="action-btn view">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </div>
                        <div class="video-duration">
                            {{ $video->duration ?: '00:00' }}
                        </div>
                    </div>
                    
                    <div class="video-content">
                        <h3 class="video-title">{{ Str::limit($video->title, 50) }}</h3>
                        <p class="video-description">{{ Str::limit($video->description, 80) }}</p>
                        
                        <div class="video-meta">
                            <div class="meta-item">
                                <i class="bi bi-folder ml-1"></i>
                                <span>{{ $video->category->name ?? 'بدون قسم' }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-calendar ml-1"></i>
                                <span>{{ $video->created_at->format('Y/m/d') }}</span>
                            </div>
                        </div>
                        
                        <div class="video-status">
                            <span class="status-badge {{ $video->is_published ? 'published' : 'draft' }}">
                                {{ $video->is_published ? 'منشور' : 'مسودة' }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="empty-state">
                        <i class="bi bi-camera-video text-4xl text-gray-300 mb-4"></i>
                        <h3 class="text-lg font-semibold text-gray-600 mb-2">لا توجد فيديوهات</h3>
                        <p class="text-gray-500 mb-4">ابدأ بإنشاء فيديوك الأول</p>
                        <button wire:click="createVideo" class="btn-primary">
                            <i class="bi bi-plus-circle ml-2"></i>
                            إنشاء فيديو جديد
                        </button>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($videos->hasPages())
            <div class="pagination-section mt-8">
                {{ $videos->links() }}
            </div>
        @endif
    </div>

    <!-- Create/Edit Modal -->
    @if($showCreateModal || $showEditModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" id="modal">
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{ $editingVideo ? 'تعديل الفيديو' : 'فيديو جديد' }}
                        </h3>
                        <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                            <i class="bi bi-x text-2xl"></i>
                        </button>
                    </div>

                    <form wire:submit.prevent="saveVideo">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">عنوان الفيديو</label>
                                <input type="text" wire:model="form.title" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="أدخل عنوان الفيديو">
                                @error('form.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Category -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">القسم</label>
                                <select wire:model="form.category_id" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                                    <option value="">اختر القسم</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('form.category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Author -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">الكاتب</label>
                                <select wire:model="form.author_id" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                                    <option value="">اختر الكاتب</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('form.author_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">وصف الفيديو</label>
                                <textarea wire:model="form.description" rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                          placeholder="أدخل وصف الفيديو"></textarea>
                                @error('form.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Video URL -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">رابط الفيديو</label>
                                <input type="url" wire:model="form.video_url" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="أدخل رابط الفيديو (YouTube, Vimeo, etc.)">
                                @error('form.video_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Thumbnail -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">الصورة المصغرة</label>
                                <input type="file" wire:model="thumbnail" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       accept="image/*">
                                @error('thumbnail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                
                                @if($thumbnail)
                                    <div class="mt-2">
                                        <img src="{{ $thumbnail->temporaryUrl() }}" 
                                             class="w-32 h-24 object-cover rounded-lg border">
                                    </div>
                                @elseif($editingVideo && $editingVideo->thumbnail)
                                    <div class="mt-2">
                                        <img src="{{ \App\Helpers\ImageHelper::getImageUrl($editingVideo->thumbnail) }}" 
                                             class="w-32 h-24 object-cover rounded-lg border">
                                    </div>
                                @endif
                            </div>

                            <!-- Duration -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">مدة الفيديو</label>
                                <input type="text" wire:model="form.duration" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent"
                                       placeholder="00:00">
                                @error('form.duration') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Published Status -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">حالة النشر</label>
                                <div class="flex items-center space-x-4 space-x-reverse">
                                    <label class="flex items-center">
                                        <input type="radio" wire:model="form.is_published" value="1" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                        <span class="text-sm text-gray-700">منشور</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" wire:model="form.is_published" value="0" 
                                               class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                        <span class="text-sm text-gray-700">مسودة</span>
                                    </label>
                                </div>
                                @error('form.is_published') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 space-x-reverse mt-6">
                            <button type="button" wire:click="closeModal" 
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                إلغاء
                            </button>
                            <button type="submit" 
                                    class="px-4 py-2 bg-[#C08B2D] text-white rounded-lg hover:bg-[#B22B2B] transition-colors">
                                {{ $editingVideo ? 'تحديث الفيديو' : 'إنشاء الفيديو' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <style>
    /* Videos Management Styles */
    .videos-management {
        padding: 2rem;
    }

    .page-header {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
    }

    .btn-primary {
        background: linear-gradient(135deg, #C08B2D 0%, #B22B2B 100%);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(192, 139, 45, 0.3);
    }

    .video-card {
        background: white;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
        transition: all 0.3s ease;
    }

    .video-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .video-thumbnail {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .video-card:hover .video-overlay {
        opacity: 1;
    }

    .video-actions {
        display: flex;
        gap: 0.5rem;
    }

    .action-btn {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        border: none;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .action-btn.edit {
        background: rgba(192, 139, 45, 0.9);
    }

    .action-btn.delete {
        background: rgba(239, 68, 68, 0.9);
    }

    .action-btn.view {
        background: rgba(59, 130, 246, 0.9);
    }

    .action-btn:hover {
        transform: scale(1.1);
    }

    .video-duration {
        position: absolute;
        bottom: 0.5rem;
        right: 0.5rem;
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-size: 0.75rem;
    }

    .video-content {
        padding: 1.5rem;
    }

    .video-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .video-description {
        color: #6b7280;
        margin-bottom: 1rem;
        line-height: 1.5;
        font-size: 0.875rem;
    }

    .video-meta {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        font-size: 0.875rem;
        color: #6b7280;
    }

    .video-status {
        display: flex;
        justify-content: flex-end;
    }

    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .status-badge.published {
        background: #dcfce7;
        color: #166534;
    }

    .status-badge.draft {
        background: #fef3c7;
        color: #92400e;
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        background: white;
        border-radius: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
    }

    /* Modal Styles */
    #modal {
        backdrop-filter: blur(4px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .videos-management {
            padding: 1rem;
        }
        
        .page-header {
            padding: 1.5rem;
        }
        
        .videos-grid .grid {
            grid-template-columns: 1fr;
        }
    }
    </style>

    <script>
    // SweetAlert2 Toast Function
    window.addEventListener('showToast', event => {
        const { type, title, message } = event.detail;
        
        Swal.fire({
            icon: type,
            title: title,
            text: message,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6',
            color: '#ffffff',
            customClass: {
                popup: 'swal2-toast'
            }
        });
    });

    // Delete Confirmation
    window.addEventListener('confirmDelete', event => {
        const { id } = event.detail;
        
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "لا يمكن التراجع عن هذا الإجراء!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'نعم، احذف!',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.deleteVideoConfirmed(id);
            }
        });
    });
    </script>
</div> 