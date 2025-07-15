<div class="flex items-center justify-between h-16 px-6" x-data="{ notificationsOpen: false }">
    <!-- Left Side - Mobile Menu Button & Breadcrumbs -->
    <div class="flex items-center">
        <!-- Mobile Menu Button -->
        <button @click="$dispatch('toggle-sidebar')" class="lg:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary">
            <i class="bi bi-list text-xl"></i>
        </button>
        
        <!-- Breadcrumbs -->
        <nav class="hidden lg:flex items-center space-x-2 space-x-reverse text-sm text-gray-500 mr-4">
            <a href="#" class="hover:text-gray-700">الرئيسية</a>
            <i class="bi bi-chevron-left text-xs"></i>
            <span class="text-gray-700">لوحة التحكم</span>
        </nav>
    </div>
    
    <!-- Right Side - Search, Notifications, Profile -->
    <div class="flex items-center space-x-4 space-x-reverse">
        <!-- Search -->
        <div class="relative hidden md:block">
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <i class="bi bi-search text-gray-400"></i>
            </div>
            <input type="text" 
                   class="w-64 pl-10 pr-10 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                   placeholder="البحث في المحتوى...">
        </div>
        
        <!-- Notifications -->
        <div class="relative">
            <button @click="notificationsOpen = !notificationsOpen" 
                    class="p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary relative">
                <i class="bi bi-bell text-xl"></i>
                <span class="absolute -top-1 -right-1 h-5 w-5 bg-secondary text-white text-xs rounded-full flex items-center justify-center">3</span>
            </button>
            
            <!-- Notifications Dropdown -->
            <div x-show="notificationsOpen" 
                 @click.away="notificationsOpen = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute left-0 mt-2 w-80 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                <div class="p-4 border-b border-gray-200">
                    <h3 class="text-sm font-medium text-gray-900">الإشعارات</h3>
                </div>
                <div class="py-2 max-h-96 overflow-y-auto">
                    <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                        <div class="flex-shrink-0">
                            <div class="w-2 h-2 bg-secondary rounded-full"></div>
                        </div>
                        <div class="mr-3 flex-1">
                            <p class="text-sm text-gray-900">مقال جديد في انتظار المراجعة</p>
                            <p class="text-xs text-gray-500">منذ 5 دقائق</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                        <div class="flex-shrink-0">
                            <div class="w-2 h-2 bg-accent rounded-full"></div>
                        </div>
                        <div class="mr-3 flex-1">
                            <p class="text-sm text-gray-900">تعليق جديد على المقال</p>
                            <p class="text-xs text-gray-500">منذ 15 دقيقة</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                        <div class="flex-shrink-0">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                        </div>
                        <div class="mr-3 flex-1">
                            <p class="text-sm text-gray-900">مستخدم جديد سجل في الموقع</p>
                            <p class="text-xs text-gray-500">منذ ساعة</p>
                        </div>
                    </a>
                </div>
                <div class="p-3 border-t border-gray-200">
                    <a href="#" class="text-sm text-primary hover:text-primary/80 font-medium">عرض جميع الإشعارات</a>
                </div>
            </div>
        </div>
        
        <!-- Profile Dropdown -->
        <div class="relative" x-data="{ profileOpen: false }">
            <button @click="profileOpen = !profileOpen" 
                    class="flex items-center space-x-2 space-x-reverse text-sm rounded-lg hover:bg-gray-100 p-2 transition-colors">
                <img class="w-8 h-8 rounded-full" 
                     src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'المسؤول') }}&background=C08B2D&color=fff" 
                     alt="المسؤول">
                <div class="hidden md:block text-right">
                    <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name ?? 'المسؤول' }}</p>
                    <p class="text-xs text-gray-500">مسؤول الموقع</p>
                </div>
                <i class="bi bi-chevron-down text-xs text-gray-400"></i>
            </button>
            
            <!-- Profile Dropdown Menu -->
            <div x-show="profileOpen" 
                 @click.away="profileOpen = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                <div class="py-1">
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="bi bi-person text-primary ml-3"></i>
                        الملف الشخصي
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="bi bi-gear text-primary ml-3"></i>
                        الإعدادات
                    </a>
                    <hr class="my-1 border-gray-200">
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="bi bi-box-arrow-left text-secondary ml-3"></i>
                        تسجيل الخروج
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> 