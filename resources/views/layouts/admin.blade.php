<!DOCTYPE html>
<html lang="ar" dir="rtl" class="h-full">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? config('app.name', 'لوحة التحكّم') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="h-full bg-light text-dark font-arabic">
<div class="flex h-full">
    <!-- الشريط الجانبي -->
    <aside class="w-64 bg-primary text-white flex-shrink-0">
        <div class="p-6 text-center font-bold text-xl tracking-wide">
            حضرموت21
        </div>
        <nav class="px-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 rounded hover:bg-accent">الرئيسية</a>
            <a href="{{ route('admin.posts') }}" class="block py-2 px-3 rounded hover:bg-accent">المقالات</a>
            <!-- روابط إضافية -->
        </nav>
    </aside>

    <!-- المحتوى الرئيسي -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        <!-- الشريط العلوي -->
        <header class="flex items-center justify-between bg-white border-b px-6 h-16 shadow-sm">
            <div class="text-lg font-semibold">{{ $pageTitle ?? 'الرئيسية' }}</div>
            @livewire('admin.topbar')
        </header>

        <!-- محتوى الصفحة -->
        <main class="p-6">
            {{ $slot }}
        </main>
    </div>
</div>

@livewireScripts
</body>
</html>