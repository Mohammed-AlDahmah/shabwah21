<div class="settings-management">
    <!-- Page Header -->
    <div class="page-header mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">إعدادات الموقع</h1>
                <p class="text-gray-600">إدارة إعدادات الموقع العامة</p>
            </div>
            <button wire:click="saveSettings" class="btn-primary">
                <i class="bi bi-check-circle ml-2"></i>
                حفظ الإعدادات
            </button>
        </div>
    </div>

    <!-- Settings Grid -->
    <div class="settings-grid">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- General Settings -->
            <div class="settings-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-gear ml-2"></i>
                        الإعدادات العامة
                    </h3>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label class="form-label">اسم الموقع</label>
                        <input type="text" wire:model="form.site_name" 
                               class="form-input"
                               placeholder="أدخل اسم الموقع">
                        @error('form.site_name') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">وصف الموقع</label>
                        <textarea wire:model="form.site_description" rows="3"
                                  class="form-input"
                                  placeholder="أدخل وصف الموقع"></textarea>
                        @error('form.site_description') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">كلمات مفتاحية</label>
                        <input type="text" wire:model="form.site_keywords" 
                               class="form-input"
                               placeholder="أدخل الكلمات المفتاحية مفصولة بفواصل">
                        @error('form.site_keywords') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">رابط الموقع</label>
                        <input type="url" wire:model="form.site_url" 
                               class="form-input"
                               placeholder="https://example.com">
                        @error('form.site_url') <span class="error-text">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Contact Settings -->
            <div class="settings-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-envelope ml-2"></i>
                        معلومات التواصل
                    </h3>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label class="form-label">البريد الإلكتروني</label>
                        <input type="email" wire:model="form.contact_email" 
                               class="form-input"
                               placeholder="info@example.com">
                        @error('form.contact_email') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">رقم الهاتف</label>
                        <input type="text" wire:model="form.contact_phone" 
                               class="form-input"
                               placeholder="+967 XXX XXX XXX">
                        @error('form.contact_phone') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">العنوان</label>
                        <textarea wire:model="form.contact_address" rows="3"
                                  class="form-input"
                                  placeholder="أدخل العنوان"></textarea>
                        @error('form.contact_address') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">ساعات العمل</label>
                        <input type="text" wire:model="form.working_hours" 
                               class="form-input"
                               placeholder="الأحد - الخميس: 8:00 ص - 5:00 م">
                        @error('form.working_hours') <span class="error-text">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Social Media Settings -->
            <div class="settings-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-share ml-2"></i>
                        وسائل التواصل الاجتماعي
                    </h3>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label class="form-label">فيسبوك</label>
                        <input type="url" wire:model="form.facebook_url" 
                               class="form-input"
                               placeholder="https://facebook.com/username">
                        @error('form.facebook_url') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">تويتر</label>
                        <input type="url" wire:model="form.twitter_url" 
                               class="form-input"
                               placeholder="https://twitter.com/username">
                        @error('form.twitter_url') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">إنستغرام</label>
                        <input type="url" wire:model="form.instagram_url" 
                               class="form-input"
                               placeholder="https://instagram.com/username">
                        @error('form.instagram_url') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">يوتيوب</label>
                        <input type="url" wire:model="form.youtube_url" 
                               class="form-input"
                               placeholder="https://youtube.com/channel">
                        @error('form.youtube_url') <span class="error-text">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Content Settings -->
            <div class="settings-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-file-text ml-2"></i>
                        إعدادات المحتوى
                    </h3>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label class="form-label">عدد المقالات في الصفحة</label>
                        <input type="number" wire:model="form.articles_per_page" 
                               class="form-input"
                               min="1" max="50">
                        @error('form.articles_per_page') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">عدد الفيديوهات في الصفحة</label>
                        <input type="number" wire:model="form.videos_per_page" 
                               class="form-input"
                               min="1" max="50">
                        @error('form.videos_per_page') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">عرض التعليقات</label>
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <label class="flex items-center">
                                <input type="radio" wire:model="form.enable_comments" value="1" 
                                       class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                <span class="text-sm text-gray-700">مفعل</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="form.enable_comments" value="0" 
                                       class="ml-2 text-[#C08B2D] focus:ring-[#C08B2D]">
                                <span class="text-sm text-gray-700">معطل</span>
                            </label>
                        </div>
                        @error('form.enable_comments') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    
                </div>
            </div>

            <!-- Navbar & Home Settings -->
            <div class="settings-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-layout-text-sidebar-reverse ml-2"></i>
                        إعدادات القائمة الرئيسية والواجهة
                    </h3>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label class="form-label">إظهار قسم الهيرو (Hero Section)</label>
                        <input type="checkbox" wire:model="form.show_hero_section">
                    </div>
                    <div class="form-group">
                        <label class="form-label">إظهار شريط الأخبار العاجلة (Breaking News)</label>
                        <input type="checkbox" wire:model="form.show_breaking_news">
                    </div>
                    <div class="form-group">
                        <label class="form-label">إظهار النشرة البريدية (Newsletter)</label>
                        <input type="checkbox" wire:model="form.show_newsletter">
                    </div>
                    <div class="form-group">
                        <label class="form-label">إظهار قسم الفيديو في القائمة</label>
                        <input type="checkbox" wire:model="form.show_video_in_nav">
                    </div>
                    <div class="form-group">
                        <label class="form-label">إظهار صفحة "عن الموقع" في القائمة</label>
                        <input type="checkbox" wire:model="form.show_about_in_nav">
                    </div>
                    <div class="form-group">
                        <label class="form-label">إظهار صفحة "اتصل بنا" في القائمة</label>
                        <input type="checkbox" wire:model="form.show_contact_in_nav">
                    </div>
                    <div class="form-group">
                        <label class="form-label">إظهار أيقونات التواصل الاجتماعي في القائمة</label>
                        <input type="checkbox" wire:model="form.show_social_links_in_nav">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    /* Settings Management Styles */
    .settings-management {
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

    .settings-card {
        background: white;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
    }

    .card-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 1.5rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1f2937;
        display: flex;
        align-items: center;
    }

    .card-content {
        padding: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: #C08B2D;
        box-shadow: 0 0 0 3px rgba(192, 139, 45, 0.1);
    }

    .error-text {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
        display: block;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .settings-management {
            padding: 1rem;
        }
        
        .page-header {
            padding: 1.5rem;
        }
        
        .settings-grid .grid {
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
             position: 'top-start',
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
    </script>
</div> 