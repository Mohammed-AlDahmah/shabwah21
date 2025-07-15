<div class="admin-layout">
    <!-- الشريط الجانبي -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-brand">
                <i class="bi bi-speedometer2"></i>
                <span>حضرموت21</span>
            </a>
        </div>
        <nav class="admin-sidebar-nav">
            <div class="admin-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link">
                    <i class="bi bi-speedometer2 admin-nav-icon"></i>
                    <span>الرئيسية</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.news') }}" class="admin-nav-link">
                    <i class="bi bi-file-earmark-text admin-nav-icon"></i>
                    <span>المقالات</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="#" class="admin-nav-link">
                    <i class="bi bi-collection-play admin-nav-icon"></i>
                    <span>الفيديوهات</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.categories') }}" class="admin-nav-link">
                    <i class="bi bi-tags admin-nav-icon"></i>
                    <span>التصنيفات</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.users') }}" class="admin-nav-link">
                    <i class="bi bi-people admin-nav-icon"></i>
                    <span>المستخدمون</span>
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.settings') }}" class="admin-nav-link active">
                    <i class="bi bi-gear admin-nav-icon"></i>
                    <span>الإعدادات</span>
                </a>
            </div>
        </nav>
        <div class="mt-auto p-3">
            <div class="admin-nav-item">
                <a href="#" class="admin-nav-link">
                    <i class="bi bi-box-arrow-right admin-nav-icon"></i>
                    <span>تسجيل الخروج</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="admin-main">
        <!-- الهيدر -->
        <header class="admin-header">
            <div class="admin-header-title">
                <i class="bi bi-gear me-2"></i>
                إعدادات الموقع
            </div>
            <div class="admin-header-actions">
                <button wire:click="saveSettings" class="admin-btn admin-btn-primary">
                    <i class="bi bi-check-circle"></i>
                    حفظ الإعدادات
                </button>
                <div class="admin-user-menu">
                    <i class="bi bi-person-circle"></i>
                    <span>المدير</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>
        </header>

        <!-- المحتوى -->
        <div class="admin-content">
            <!-- التنبيهات -->
            @if(session()->has('message'))
            <div class="admin-alert admin-alert-success">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('message') }}
            </div>
            @endif

            @if($errors->any())
            <div class="admin-alert admin-alert-danger">
                <i class="bi bi-exclamation-triangle me-2"></i>
                يرجى تصحيح الأخطاء التالية:
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- تبويبات الإعدادات -->
            <div class="admin-card mb-4">
                <div class="admin-card-body">
                    <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">
                                <i class="bi bi-gear me-2"></i>
                                إعدادات عامة
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="appearance-tab" data-bs-toggle="tab" data-bs-target="#appearance" type="button" role="tab">
                                <i class="bi bi-palette me-2"></i>
                                المظهر
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab">
                                <i class="bi bi-share me-2"></i>
                                وسائل التواصل
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab">
                                <i class="bi bi-search me-2"></i>
                                تحسين محركات البحث
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab">
                                <i class="bi bi-envelope me-2"></i>
                                إعدادات البريد
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- محتوى التبويبات -->
            <div class="tab-content" id="settingsTabContent">
                <!-- الإعدادات العامة -->
                <div class="tab-pane fade show active" id="general" role="tabpanel">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5 class="admin-card-title">
                                <i class="bi bi-gear me-2"></i>
                                الإعدادات العامة
                            </h5>
                        </div>
                        <div class="admin-card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">اسم الموقع</label>
                                        <input type="text" wire:model="settings.site_name" class="admin-form-input" placeholder="حضرموت21">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">شعار الموقع</label>
                                        <input type="file" wire:model="settings.site_logo" class="admin-form-input" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">وصف الموقع</label>
                                        <textarea wire:model="settings.site_description" class="admin-form-input" rows="3" placeholder="وصف مختصر عن الموقع"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">كلمات مفتاحية</label>
                                        <textarea wire:model="settings.site_keywords" class="admin-form-input" rows="3" placeholder="كلمات مفتاحية مفصولة بفواصل"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">البريد الإلكتروني للتواصل</label>
                                        <input type="email" wire:model="settings.contact_email" class="admin-form-input" placeholder="info@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">رقم الهاتف</label>
                                        <input type="tel" wire:model="settings.contact_phone" class="admin-form-input" placeholder="+967 XXX XXX XXX">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">المنطقة الزمنية</label>
                                        <select wire:model="settings.timezone" class="admin-form-input">
                                            <option value="Asia/Aden">Asia/Aden (GMT+3)</option>
                                            <option value="UTC">UTC (GMT+0)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">اللغة الافتراضية</label>
                                        <select wire:model="settings.default_language" class="admin-form-input">
                                            <option value="ar">العربية</option>
                                            <option value="en">English</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- إعدادات المظهر -->
                <div class="tab-pane fade" id="appearance" role="tabpanel">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5 class="admin-card-title">
                                <i class="bi bi-palette me-2"></i>
                                إعدادات المظهر
                            </h5>
                        </div>
                        <div class="admin-card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">اللون الأساسي</label>
                                        <input type="color" wire:model="settings.primary_color" class="admin-form-input" style="height: 50px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">اللون الثانوي</label>
                                        <input type="color" wire:model="settings.secondary_color" class="admin-form-input" style="height: 50px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">اللون المميز</label>
                                        <input type="color" wire:model="settings.accent_color" class="admin-form-input" style="height: 50px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">نمط التصميم</label>
                                        <select wire:model="settings.theme_mode" class="admin-form-input">
                                            <option value="light">فاتح</option>
                                            <option value="dark">داكن</option>
                                            <option value="auto">تلقائي</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">الخط الأساسي</label>
                                        <select wire:model="settings.font_family" class="admin-form-input">
                                            <option value="Noto Sans Arabic">Noto Sans Arabic</option>
                                            <option value="Tahoma">Tahoma</option>
                                            <option value="Arial">Arial</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">حجم الخط الأساسي</label>
                                        <select wire:model="settings.font_size" class="admin-form-input">
                                            <option value="14px">صغير</option>
                                            <option value="16px">متوسط</option>
                                            <option value="18px">كبير</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- وسائل التواصل الاجتماعي -->
                <div class="tab-pane fade" id="social" role="tabpanel">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5 class="admin-card-title">
                                <i class="bi bi-share me-2"></i>
                                وسائل التواصل الاجتماعي
                            </h5>
                        </div>
                        <div class="admin-card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">رابط فيسبوك</label>
                                        <input type="url" wire:model="settings.facebook_url" class="admin-form-input" placeholder="https://facebook.com/...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">رابط تويتر</label>
                                        <input type="url" wire:model="settings.twitter_url" class="admin-form-input" placeholder="https://twitter.com/...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">رابط إنستغرام</label>
                                        <input type="url" wire:model="settings.instagram_url" class="admin-form-input" placeholder="https://instagram.com/...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">رابط يوتيوب</label>
                                        <input type="url" wire:model="settings.youtube_url" class="admin-form-input" placeholder="https://youtube.com/...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">رابط تليجرام</label>
                                        <input type="url" wire:model="settings.telegram_url" class="admin-form-input" placeholder="https://t.me/...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">رابط واتساب</label>
                                        <input type="url" wire:model="settings.whatsapp_url" class="admin-form-input" placeholder="https://wa.me/...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- تحسين محركات البحث -->
                <div class="tab-pane fade" id="seo" role="tabpanel">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5 class="admin-card-title">
                                <i class="bi bi-search me-2"></i>
                                تحسين محركات البحث
                            </h5>
                        </div>
                        <div class="admin-card-body">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">كود Google Analytics</label>
                                        <textarea wire:model="settings.google_analytics" class="admin-form-input" rows="4" placeholder="أدخل كود Google Analytics هنا"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">كود Facebook Pixel</label>
                                        <textarea wire:model="settings.facebook_pixel" class="admin-form-input" rows="4" placeholder="أدخل كود Facebook Pixel هنا"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">ملف robots.txt</label>
                                        <textarea wire:model="settings.robots_txt" class="admin-form-input" rows="6" placeholder="محتوى ملف robots.txt"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">خريطة الموقع XML</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" wire:model="settings.enable_sitemap" id="enableSitemap">
                                            <label class="form-check-label" for="enableSitemap">
                                                تفعيل خريطة الموقع التلقائية
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- إعدادات البريد -->
                <div class="tab-pane fade" id="email" role="tabpanel">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5 class="admin-card-title">
                                <i class="bi bi-envelope me-2"></i>
                                إعدادات البريد الإلكتروني
                            </h5>
                        </div>
                        <div class="admin-card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">خادم SMTP</label>
                                        <input type="text" wire:model="settings.smtp_host" class="admin-form-input" placeholder="smtp.gmail.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">منفذ SMTP</label>
                                        <input type="number" wire:model="settings.smtp_port" class="admin-form-input" placeholder="587">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">اسم المستخدم</label>
                                        <input type="text" wire:model="settings.smtp_username" class="admin-form-input" placeholder="your-email@gmail.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">كلمة المرور</label>
                                        <input type="password" wire:model="settings.smtp_password" class="admin-form-input" placeholder="كلمة مرور التطبيق">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">التشفير</label>
                                        <select wire:model="settings.smtp_encryption" class="admin-form-input">
                                            <option value="tls">TLS</option>
                                            <option value="ssl">SSL</option>
                                            <option value="">بدون تشفير</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label class="admin-form-label">اسم المرسل</label>
                                        <input type="text" wire:model="settings.mail_from_name" class="admin-form-input" placeholder="اسم الموقع">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
// تفعيل التبويبات
document.addEventListener('DOMContentLoaded', function() {
    var triggerTabList = [].slice.call(document.querySelectorAll('#settingsTabs button'))
    triggerTabList.forEach(function (triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl)
        triggerEl.addEventListener('click', function (event) {
            event.preventDefault()
            tabTrigger.show()
        })
    })
});
</script>