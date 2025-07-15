<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - لوحة التحكم</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <style>
        body {
            font-family: 'Noto Sans Arabic', sans-serif;
        }
    </style>
</head>
<body class="admin-layout">
    <!-- Sidebar Toggle for Mobile -->
    <div class="lg:hidden fixed top-4 right-4 z-50">
        <button id="sidebar-toggle" class="bg-primary text-white p-2 rounded-lg shadow-lg">
            <i class="bi bi-list text-xl"></i>
        </button>
    </div>

    <!-- Sidebar -->
    <aside id="admin-sidebar" class="admin-sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="bi bi-newspaper ml-2"></i>
                حضرموت21
            </div>
            <p class="text-gray-400 text-sm mt-2">لوحة التحكم الاحترافية</p>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link-admin {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>الرئيسية</span>
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.articles') }}" class="nav-link-admin {{ request()->routeIs('admin.articles*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>المقالات</span>
                    <span class="nav-badge">12</span>
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.videos') }}" class="nav-link-admin {{ request()->routeIs('admin.videos*') ? 'active' : '' }}">
                    <i class="bi bi-collection-play"></i>
                    <span>الفيديوهات</span>
                    <span class="nav-badge">5</span>
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.categories') }}" class="nav-link-admin {{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                    <i class="bi bi-tags"></i>
                    <span>التصنيفات</span>
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link-admin {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    <span>المستخدمون</span>
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.comments') }}" class="nav-link-admin {{ request()->routeIs('admin.comments*') ? 'active' : '' }}">
                    <i class="bi bi-chat-dots"></i>
                    <span>التعليقات</span>
                    <span class="nav-badge">3</span>
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.settings') }}" class="nav-link-admin {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <i class="bi bi-gear"></i>
                    <span>الإعدادات</span>
                </a>
            </div>
        </nav>
        
        <div class="mt-auto p-4">
            <div class="bg-gray-700 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                        <i class="bi bi-person text-white"></i>
                    </div>
                    <div class="mr-3">
                        <p class="text-white font-medium">أحمد محمد</p>
                        <p class="text-gray-400 text-sm">مدير النظام</p>
                    </div>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-600">
                    <a href="{{ route('logout') }}" class="flex items-center text-gray-300 hover:text-white transition-colors duration-300">
                        <i class="bi bi-box-arrow-right ml-2"></i>
                        <span>تسجيل الخروج</span>
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main id="admin-main" class="admin-main">
        <!-- Header -->
        <header class="admin-header">
            <div class="header-content">
                <div>
                    <h1 class="header-title">@yield('page-title', 'لوحة التحكم')</h1>
                    <nav class="breadcrumb-admin">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">الرئيسية</a>
                        <span class="breadcrumb-separator">/</span>
                        <span class="breadcrumb-item">@yield('breadcrumb', 'لوحة التحكم')</span>
                    </nav>
                </div>
                
                <div class="header-actions">
                    <div class="header-search">
                        <input type="text" placeholder="البحث..." class="search-input-admin">
                        <i class="bi bi-search search-icon"></i>
                    </div>
                    
                    <div class="dropdown-admin">
                        <button class="btn-admin btn-admin-outline">
                            <i class="bi bi-bell ml-2"></i>
                            <span>التنبيهات</span>
                            <span class="bg-accent text-dark text-xs font-bold px-2 py-1 rounded-full mr-2">3</span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">مقال جديد تم إضافته</a>
                            <a href="#" class="dropdown-item">تعليق جديد ينتظر الموافقة</a>
                            <a href="#" class="dropdown-item">مستخدم جديد انضم</a>
                        </div>
                    </div>
                    
                    <div class="dropdown-admin">
                        <button class="btn-admin btn-admin-primary">
                            <i class="bi bi-plus-lg ml-2"></i>
                            <span>إضافة جديد</span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">إضافة مقال</a>
                            <a href="#" class="dropdown-item">إضافة فيديو</a>
                            <a href="#" class="dropdown-item">إضافة تصنيف</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="p-6">
            @if (session('success'))
                <div class="alert-admin success">
                    <i class="bi bi-check-circle ml-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert-admin error">
                    <i class="bi bi-exclamation-triangle ml-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            @if (session('warning'))
                <div class="alert-admin warning">
                    <i class="bi bi-exclamation-circle ml-2"></i>
                    {{ session('warning') }}
                </div>
            @endif

            @if (session('info'))
                <div class="alert-admin info">
                    <i class="bi bi-info-circle ml-2"></i>
                    {{ session('info') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Livewire Scripts -->
    @livewireScripts
    
    <!-- Scripts -->
    <script>
        // Sidebar Toggle
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            const sidebar = document.getElementById('admin-sidebar');
            const main = document.getElementById('admin-main');
            
            sidebar.classList.toggle('collapsed');
            main.classList.toggle('expanded');
        });

        // Dropdown Toggle
        document.querySelectorAll('.dropdown-admin').forEach(dropdown => {
            const button = dropdown.querySelector('button');
            const menu = dropdown.querySelector('.dropdown-menu');
            
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                menu.classList.toggle('hidden');
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function() {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            document.querySelectorAll('.alert-admin').forEach(alert => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            });
        }, 5000);

        // Animate stats cards on load
        document.addEventListener('DOMContentLoaded', function() {
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>