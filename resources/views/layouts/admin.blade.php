<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم - حضرموت21')</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <style>
        :root {
            --color-primary: #C08B2D;
            --color-secondary: #B22B2B;
            --color-accent: #F4B905;
            --color-dark: #2C3E50;
            --color-light: #F8F9FA;
            --color-gray: #6C757D;
        }
        
        body {
            font-family: 'Noto Sans Arabic', sans-serif;
        }
        
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: var(--color-primary) var(--color-light);
        }
        
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: var(--color-light);
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: var(--color-primary);
            border-radius: 3px;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-light text-dark min-h-screen">
    <div class="flex h-screen bg-light">
        <!-- Sidebar -->
        <div class="w-64 bg-dark shadow-lg hidden lg:block">
            @livewire('admin.sidebar')
        </div>
        
        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" x-cloak class="fixed inset-0 z-50 lg:hidden" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="sidebarOpen = false"></div>
            <div class="relative flex flex-col w-full max-w-xs bg-dark">
                @livewire('admin.sidebar')
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                @livewire('admin.header')
            </header>
            
            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-light custom-scrollbar">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>