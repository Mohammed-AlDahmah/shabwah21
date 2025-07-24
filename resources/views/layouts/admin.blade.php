<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم - شبوة21')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <style>
        /* Custom CSS Variables */
        :root {
            --primary-color: #C08B2D;
            --secondary-color: #B22B2B;
            --primary-hover: #B22B2B;
        }
        
        /* RTL Support */
        body {
            direction: rtl;
            text-align: right;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-hover);
        }
        
        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(192, 139, 45, 0.3);
            color: white;
        }
        
        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: 1px solid #d1d5db;
            cursor: pointer;
            text-decoration: none;
        }
        
        .btn-secondary:hover {
            background: #e5e7eb;
            color: #1f2937;
        }
        
        /* Sidebar Styles */
        .sidebar {
            background: linear-gradient(180deg, #1f2937 0%, #111827 100%);
            color: white;
            width: 280px;
            height: 100vh;
            position: fixed;
            top: 0;
            right: 0;
            z-index: 50;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }
        
        .sidebar.collapsed {
            transform: translateX(100%);
        }
        
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid #374151;
        }
        
        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .sidebar-logo img {
            width: 40px;
            height: 40px;
        }
        
        .sidebar-logo h1 {
            font-size: 1.25rem;
            font-weight: 700;
            color: white;
        }
        
        .sidebar-nav {
            padding: 1rem 0;
        }
        
        .nav-section {
            margin-bottom: 1.5rem;
        }
        
        .nav-section-title {
            padding: 0.5rem 1.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            color: #d1d5db;
            text-decoration: none;
            transition: all 0.2s ease;
            border-right: 3px solid transparent;
        }
        
        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-right-color: var(--primary-color);
        }
        
        .nav-item.active {
            background: rgba(192, 139, 45, 0.2);
            color: white;
            border-right-color: var(--primary-color);
        }
        
        .nav-item i {
            font-size: 1.125rem;
            width: 1.25rem;
            text-align: center;
        }
        
        /* Main Content */
        .main-content {
            margin-right: 280px;
            min-height: 100vh;
            background: #f9fafb;
            transition: margin-right 0.3s ease;
        }
        
        .main-content.expanded {
            margin-right: 0;
        }
        
        /* Header */
        .header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 1rem 2rem;
            display: flex;
            justify-content: between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 40;
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .sidebar-toggle {
            background: none;
            border: none;
            color: #6b7280;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease;
        }
        
        .sidebar-toggle:hover {
            background: #f3f4f6;
            color: #374151;
        }
        
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6b7280;
            font-size: 0.875rem;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .notifications {
            position: relative;
        }
        
        .notification-btn {
            background: none;
            border: none;
            color: #6b7280;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease;
            position: relative;
        }
        
        .notification-btn:hover {
            background: #f3f4f6;
            color: #374151;
        }
        
        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--secondary-color);
            color: white;
            font-size: 0.75rem;
            padding: 0.125rem 0.375rem;
            border-radius: 9999px;
            min-width: 1.25rem;
            text-align: center;
        }
        
        .user-menu {
            position: relative;
        }
        
        .user-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
            border: none;
            color: #374151;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease;
        }
        
        .user-btn:hover {
            background: #f3f4f6;
        }
        
        .user-avatar {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(100%);
                z-index: 60;
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-right: 0;
            }
            
            .header {
                padding: 1rem;
            }
            
            /* Mobile Overlay */
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 55;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
        }
        
        /* SweetAlert2 Custom Styles */
        .swal2-toast {
            border-radius: 0.5rem !important;
            font-family: inherit !important;
        }
        
        .swal2-toast .swal2-title {
            font-size: 1rem !important;
            font-weight: 600 !important;
        }
        
        .swal2-toast .swal2-html-container {
            font-size: 0.875rem !important;
        }
    </style>
</head>
<body>
    <!-- Mobile Overlay -->
    <div class="sidebar-overlay"></div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="{{ asset('images/logo.png') }}" alt="شبوة21">
                <h1>شبوة21</h1>
            </div>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">الرئيسية</div>
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>لوحة التحكم</span>
                </a>
            </div>
            
            <div class="nav-section">
                <div class="nav-section-title">إدارة المحتوى</div>
                <a href="{{ route('admin.news') }}" class="nav-item {{ request()->routeIs('admin.news') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i>
                    <span>الأخبار</span>
                </a>
                <a href="{{ route('admin.reports') }}" class="nav-item {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>التقارير</span>
                </a>
                <a href="{{ route('admin.opinions') }}" class="nav-item {{ request()->routeIs('admin.opinions') ? 'active' : '' }}">
                    <i class="bi bi-chat-quote"></i>
                    <span>مقالات الرأي</span>
                </a>
                <a href="{{ route('admin.articles') }}" class="nav-item {{ request()->routeIs('admin.articles') ? 'active' : '' }}">
                    <i class="bi bi-file-text"></i>
                    <span>المقالات</span>
                </a>
                <a href="{{ route('admin.authors') }}" class="nav-item {{ request()->routeIs('admin.authors') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    <span>المؤلفين</span>
                </a>
                <a href="{{ route('admin.infographics') }}" class="nav-item {{ request()->routeIs('admin.infographics') ? 'active' : '' }}">
                    <i class="bi bi-bar-chart"></i>
                    <span>الإنفوجرافيك</span>
                </a>
                <a href="{{ route('admin.categories') }}" class="nav-item {{ request()->routeIs('admin.categories') ? 'active' : '' }}">
                    <i class="bi bi-folder"></i>
                    <span>الأقسام</span>
                </a>
                <a href="{{ route('admin.videos') }}" class="nav-item {{ request()->routeIs('admin.videos') ? 'active' : '' }}">
                    <i class="bi bi-camera-video"></i>
                    <span>الفيديوهات</span>
                </a>
            </div>
            
            <div class="nav-section">
                <div class="nav-section-title">إدارة النظام</div>
              
            
            <a href="{{ route('admin.about') }}" class="nav-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
            <i class="bi bi-info-circle me-2"></i>  
       
                    <span>من نحن</span>
                </a>
                <a href="{{ route('admin.contact') }}" class="nav-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
            <i class="bi bi-info-circle me-2"></i>  
       
                    <span>اتصل بنا</span>
                </a>
                <a href="{{ route('admin.users') }}" class="nav-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    <span>المستخدمين</span>
                </a>
                 
                <a href="{{ route('admin.roles') }}" class="nav-item {{ request()->routeIs('admin.roles') ? 'active' : '' }}">
                    <i class="bi bi-shield-check"></i>
                    <span>الصلاحيات</span>
                </a>
                <a href="{{ route('admin.settings') }}" class="nav-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="bi bi-gear"></i>
                    <span>الإعدادات</span>
                </a>
                <a href="{{ route('admin.backup') }}" class="nav-item {{ request()->routeIs('admin.backup') ? 'active' : '' }}">
                    <i class="bi bi-cloud-arrow-up"></i>
                    <span>النسخ الاحتياطية</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <button class="sidebar-toggle">
                    <i class="bi bi-list"></i>
                </button>
                <nav class="breadcrumb">
                    <span>لوحة التحكم</span>
                    <i class="bi bi-chevron-left"></i>
                    <span>@yield('title', 'الرئيسية')</span>
                </nav>
            </div>
            
            <div class="header-right">
                <div class="notifications">
                    <button class="notification-btn">
                        <i class="bi bi-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                </div>
                
                <div class="user-menu">
                    <button class="user-btn">
                        <div class="user-avatar">
                            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                        </div>
                        <span class="hidden md:block">{{ auth()->user()->name ?? 'المدير' }}</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Alpine.js Store -->
    <script>
        // Simple sidebar toggle without Alpine
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const sidebarOverlay = document.querySelector('.sidebar-overlay');
            
            if (sidebarToggle && sidebar && mainContent && sidebarOverlay) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('mobile-open');
                    sidebarOverlay.classList.toggle('active');
                });

                // Close sidebar when clicking overlay
                sidebarOverlay.addEventListener('click', function() {
                    sidebar.classList.remove('mobile-open');
                    sidebarOverlay.classList.remove('active');
                });

                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', function(event) {
                    if (window.innerWidth <= 768) {
                        if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                            sidebar.classList.remove('mobile-open');
                            sidebarOverlay.classList.remove('active');
                        }
                    }
                });
            }
        });
    </script>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Custom JavaScript for Livewire Events -->
    <script>
        // Wait for Livewire to be ready
        document.addEventListener('livewire:init', () => {
            console.log('Livewire initialized');
            
            // SweetAlert2 Toast Function
            Livewire.on('showToast', (event) => {
                console.log('showToast event received:', event);
                const { type, title, message } = event;
                
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

            // Delete Confirmation
            Livewire.on('confirmDelete', (event) => {
                console.log('confirmDelete event received:', event);
                const { id, name } = event;
                
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
                        console.log('Delete confirmed, dispatching deleteConfirmed');
                        // Dispatch the confirmed delete event
                        if (id) {
                            Livewire.dispatch('deleteConfirmed', { id: id });
                        } else if (name) {
                            Livewire.dispatch('deleteConfirmed', { name: name });
                        }
                    }
                });
            });

            // Restore Confirmation
            Livewire.on('confirmRestore', (event) => {
                console.log('confirmRestore event received:', event);
                const { name } = event;
                
                Swal.fire({
                    title: 'هل أنت متأكد؟',
                    text: "سيتم استبدال البيانات الحالية بالنسخة الاحتياطية!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3b82f6',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'نعم، استعيد!',
                    cancelButtonText: 'إلغاء'
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log('Restore confirmed, dispatching restoreConfirmed');
                        Livewire.dispatch('restoreConfirmed', { name: name });
                    }
                });
            });
        });

        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('modal');
            if (event.target === modal) {
                Livewire.dispatch('closeModal');
            }
        });

        // Debug: Log all Livewire events
        document.addEventListener('livewire:update', () => {
            console.log('Livewire updated');
        });

        // Test if Livewire is working
        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM loaded, checking Livewire...');
            if (typeof Livewire !== 'undefined') {
                console.log('Livewire is available');
            } else {
                console.log('Livewire is not available');
            }
        });
    </script>
</body>
</html> 