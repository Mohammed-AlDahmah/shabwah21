<!-- Dashboard Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Articles -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">إجمالي المقالات</p>
                <p class="text-3xl font-bold text-gray-900">{{ $totalArticles ?? 247 }}</p>
                <p class="text-sm text-green-600 mt-1">
                    <i class="bi bi-arrow-up text-xs"></i>
                    +12% من الشهر الماضي
                </p>
            </div>
            <div class="bg-primary/10 p-3 rounded-full">
                <i class="bi bi-file-earmark-text text-2xl text-primary"></i>
            </div>
        </div>
    </div>
    
    <!-- Total Users -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">إجمالي المستخدمين</p>
                <p class="text-3xl font-bold text-gray-900">{{ $totalUsers ?? 1854 }}</p>
                <p class="text-sm text-green-600 mt-1">
                    <i class="bi bi-arrow-up text-xs"></i>
                    +8% من الشهر الماضي
                </p>
            </div>
            <div class="bg-secondary/10 p-3 rounded-full">
                <i class="bi bi-people text-2xl text-secondary"></i>
            </div>
        </div>
    </div>
    
    <!-- Total Views -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">إجمالي المشاهدات</p>
                <p class="text-3xl font-bold text-gray-900">{{ $totalViews ?? '45.2K' }}</p>
                <p class="text-sm text-green-600 mt-1">
                    <i class="bi bi-arrow-up text-xs"></i>
                    +15% من الشهر الماضي
                </p>
            </div>
            <div class="bg-accent/10 p-3 rounded-full">
                <i class="bi bi-eye text-2xl text-accent"></i>
            </div>
        </div>
    </div>
    
    <!-- Total Comments -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">إجمالي التعليقات</p>
                <p class="text-3xl font-bold text-gray-900">{{ $totalComments ?? 892 }}</p>
                <p class="text-sm text-red-600 mt-1">
                    <i class="bi bi-arrow-down text-xs"></i>
                    -3% من الشهر الماضي
                </p>
            </div>
            <div class="bg-gray/10 p-3 rounded-full">
                <i class="bi bi-chat-dots text-2xl text-gray"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Visitors Chart -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">الزوار الشهريون</h3>
            <div class="flex items-center space-x-2 space-x-reverse">
                <span class="text-sm text-gray-500">آخر 6 أشهر</span>
                <i class="bi bi-info-circle text-gray-400"></i>
            </div>
        </div>
        <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
            <p class="text-gray-500">مخطط الزوار سيتم إضافته هنا</p>
        </div>
    </div>
    
    <!-- Popular Categories -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">التصنيفات الشائعة</h3>
            <a href="#" class="text-sm text-primary hover:text-primary/80">عرض الكل</a>
        </div>
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <div class="w-3 h-3 bg-primary rounded-full"></div>
                    <span class="text-sm text-gray-700">الأخبار المحلية</span>
                </div>
                <div class="flex items-center space-x-2 space-x-reverse">
                    <span class="text-sm font-medium text-gray-900">42%</span>
                    <div class="w-16 h-2 bg-gray-200 rounded-full">
                        <div class="w-8 h-2 bg-primary rounded-full"></div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <div class="w-3 h-3 bg-secondary rounded-full"></div>
                    <span class="text-sm text-gray-700">الرياضة</span>
                </div>
                <div class="flex items-center space-x-2 space-x-reverse">
                    <span class="text-sm font-medium text-gray-900">28%</span>
                    <div class="w-16 h-2 bg-gray-200 rounded-full">
                        <div class="w-6 h-2 bg-secondary rounded-full"></div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <div class="w-3 h-3 bg-accent rounded-full"></div>
                    <span class="text-sm text-gray-700">الثقافة</span>
                </div>
                <div class="flex items-center space-x-2 space-x-reverse">
                    <span class="text-sm font-medium text-gray-900">18%</span>
                    <div class="w-16 h-2 bg-gray-200 rounded-full">
                        <div class="w-4 h-2 bg-accent rounded-full"></div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <div class="w-3 h-3 bg-gray rounded-full"></div>
                    <span class="text-sm text-gray-700">التكنولوجيا</span>
                </div>
                <div class="flex items-center space-x-2 space-x-reverse">
                    <span class="text-sm font-medium text-gray-900">12%</span>
                    <div class="w-16 h-2 bg-gray-200 rounded-full">
                        <div class="w-3 h-2 bg-gray rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 