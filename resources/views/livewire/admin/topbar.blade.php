<div class="flex items-center gap-4">
    <!-- زر الإشعارات -->
    <button class="relative text-gray-500 hover:text-primary focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <span class="absolute -top-1 -right-1 bg-secondary text-xs rounded-full h-4 w-4 flex items-center justify-center text-white">3</span>
    </button>

    <!-- صورة المستخدم -->
    <img src="{{ auth()->user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name ?? 'User') }}" alt="Profile"
         class="w-8 h-8 rounded-full border-2 border-primary">
</div>