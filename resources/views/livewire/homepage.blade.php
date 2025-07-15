@extends('layouts.app')

@section('content')
<!-- Hero Section with Featured News -->
<div class="hero-section bg-white">
    <div class="container mx-auto px-4 py-6">
        <!-- Main featured news and sidebar -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Main Featured News (3 columns) -->
            <div class="lg:col-span-3">
                <!-- Breaking News Banner -->
                <div class="bg-red-600 text-white px-4 py-2 rounded-lg mb-6 flex items-center">
                    <span class="bg-white text-red-600 px-3 py-1 rounded-md text-sm font-bold me-3">عاجل</span>
                    <marquee class="text-white">آخر الأخبار العاجلة من محافظة شبوة واليمن</marquee>
                </div>
                
                <!-- Featured News Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Main Story -->
                    <div class="md:col-span-2">
                        <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div class="relative">
                                <img src="https://via.placeholder.com/800x400" alt="خبر رئيسي" class="w-full h-64 object-cover">
                                <div class="absolute top-4 left-4 bg-red-600 text-white px-3 py-1 rounded-md text-sm font-bold">
                                    محليات
                                </div>
                            </div>
                            <div class="p-6">
                                <h2 class="text-2xl font-bold text-gray-900 mb-3 hover:text-red-600 transition-colors">
                                    عنوان الخبر الرئيسي يظهر هنا بشكل واضح ومقروء
                                </h2>
                                <p class="text-gray-600 mb-4 leading-relaxed">
                                    نص مقتطف من الخبر يعطي فكرة عن محتوى الخبر ويشجع القارئ على قراءة المزيد من التفاصيل...
                                </p>
                                <div class="flex items-center justify-between text-sm text-gray-500">
                                    <span>منذ ساعتين</span>
                                    <div class="flex items-center gap-4">
                                        <span><i class="bi bi-eye me-1"></i>1.2K</span>
                                        <span><i class="bi bi-chat me-1"></i>45</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    
                    <!-- Secondary Stories -->
                    <div class="space-y-4">
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="flex">
                                <img src="https://via.placeholder.com/150x100" alt="خبر" class="w-24 h-16 object-cover">
                                <div class="p-3 flex-1">
                                    <h3 class="font-semibold text-gray-900 text-sm mb-1 hover:text-red-600 transition-colors">
                                        عنوان خبر فرعي مهم
                                    </h3>
                                    <p class="text-xs text-gray-600 mb-2">نص مختصر للخبر...</p>
                                    <span class="text-xs text-gray-500">منذ 3 ساعات</span>
                                </div>
                            </div>
                        </article>
                        
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="flex">
                                <img src="https://via.placeholder.com/150x100" alt="خبر" class="w-24 h-16 object-cover">
                                <div class="p-3 flex-1">
                                    <h3 class="font-semibold text-gray-900 text-sm mb-1 hover:text-red-600 transition-colors">
                                        خبر آخر مهم من المنطقة
                                    </h3>
                                    <p class="text-xs text-gray-600 mb-2">تفاصيل مختصرة...</p>
                                    <span class="text-xs text-gray-500">منذ 4 ساعات</span>
                                </div>
                            </div>
                        </article>
                        
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="flex">
                                <img src="https://via.placeholder.com/150x100" alt="خبر" class="w-24 h-16 object-cover">
                                <div class="p-3 flex-1">
                                    <h3 class="font-semibold text-gray-900 text-sm mb-1 hover:text-red-600 transition-colors">
                                        تطورات جديدة في القضية
                                    </h3>
                                    <p class="text-xs text-gray-600 mb-2">ملخص سريع...</p>
                                    <span class="text-xs text-gray-500">منذ 5 ساعات</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    
                    <div class="space-y-4">
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="flex">
                                <img src="https://via.placeholder.com/150x100" alt="خبر" class="w-24 h-16 object-cover">
                                <div class="p-3 flex-1">
                                    <h3 class="font-semibold text-gray-900 text-sm mb-1 hover:text-red-600 transition-colors">
                                        أخبار اقتصادية مهمة
                                    </h3>
                                    <p class="text-xs text-gray-600 mb-2">تفاصيل اقتصادية...</p>
                                    <span class="text-xs text-gray-500">منذ 6 ساعات</span>
                                </div>
                            </div>
                        </article>
                        
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="flex">
                                <img src="https://via.placeholder.com/150x100" alt="خبر" class="w-24 h-16 object-cover">
                                <div class="p-3 flex-1">
                                    <h3 class="font-semibold text-gray-900 text-sm mb-1 hover:text-red-600 transition-colors">
                                        أخبار رياضية
                                    </h3>
                                    <p class="text-xs text-gray-600 mb-2">نتائج مباريات...</p>
                                    <span class="text-xs text-gray-500">منذ 7 ساعات</span>
                                </div>
                            </div>
                        </article>
                        
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="flex">
                                <img src="https://via.placeholder.com/150x100" alt="خبر" class="w-24 h-16 object-cover">
                                <div class="p-3 flex-1">
                                    <h3 class="font-semibold text-gray-900 text-sm mb-1 hover:text-red-600 transition-colors">
                                        أخبار تقنية
                                    </h3>
                                    <p class="text-xs text-gray-600 mb-2">تطورات تقنية...</p>
                                    <span class="text-xs text-gray-500">منذ 8 ساعات</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar (1 column) -->
            <div class="lg:col-span-1">
                <!-- Trending News -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                        <i class="bi bi-fire text-red-600 me-2"></i>الأكثر قراءة
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <span class="bg-red-600 text-white text-xs px-2 py-1 rounded-full font-bold">1</span>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900 hover:text-red-600 transition-colors cursor-pointer">
                                    خبر شائع يهم الجميع
                                </h4>
                                <span class="text-xs text-gray-500">منذ ساعة</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="bg-gray-600 text-white text-xs px-2 py-1 rounded-full font-bold">2</span>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900 hover:text-red-600 transition-colors cursor-pointer">
                                    موضوع مهم آخر
                                </h4>
                                <span class="text-xs text-gray-500">منذ ساعتين</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="bg-gray-600 text-white text-xs px-2 py-1 rounded-full font-bold">3</span>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900 hover:text-red-600 transition-colors cursor-pointer">
                                    خبر مثير للاهتمام
                                </h4>
                                <span class="text-xs text-gray-500">منذ 3 ساعات</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Weather Widget -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6 mb-6">
                    <h3 class="text-lg font-bold mb-4">
                        <i class="bi bi-cloud-sun me-2"></i>الطقس - شبوة
                    </h3>
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-3xl font-bold">28°</div>
                            <div class="text-sm opacity-90">مشمس</div>
                        </div>
                        <div class="text-4xl opacity-80">
                            <i class="bi bi-sun"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Ad Space -->
                <div class="bg-gray-100 rounded-lg p-6 text-center">
                    <div class="text-gray-500 text-sm">مساحة إعلانية</div>
                    <div class="h-48 bg-gray-200 rounded-lg mt-4 flex items-center justify-center">
                        <span class="text-gray-400">إعلان</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">الأقسام الرئيسية</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Local News -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-red-600 text-white p-4">
                    <h3 class="text-lg font-bold">
                        <i class="bi bi-geo-alt me-2"></i>محليات
                    </h3>
                </div>
                <div class="p-4 space-y-3">
                    <article class="border-b border-gray-200 pb-3">
                        <h4 class="font-semibold text-gray-900 hover:text-red-600 transition-colors cursor-pointer">
                            خبر محلي من شبوة
                        </h4>
                        <span class="text-xs text-gray-500">منذ ساعة</span>
                    </article>
                    <article class="border-b border-gray-200 pb-3">
                        <h4 class="font-semibold text-gray-900 hover:text-red-600 transition-colors cursor-pointer">
                            تطورات في المحافظة
                        </h4>
                        <span class="text-xs text-gray-500">منذ ساعتين</span>
                    </article>
                    <article>
                        <h4 class="font-semibold text-gray-900 hover:text-red-600 transition-colors cursor-pointer">
                            أخبار الحكومة المحلية
                        </h4>
                        <span class="text-xs text-gray-500">منذ 3 ساعات</span>
                    </article>
                </div>
            </div>
            
            <!-- International News -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-blue-600 text-white p-4">
                    <h3 class="text-lg font-bold">
                        <i class="bi bi-globe me-2"></i>عربي وعالمي
                    </h3>
                </div>
                <div class="p-4 space-y-3">
                    <article class="border-b border-gray-200 pb-3">
                        <h4 class="font-semibold text-gray-900 hover:text-blue-600 transition-colors cursor-pointer">
                            أخبار من المنطقة العربية
                        </h4>
                        <span class="text-xs text-gray-500">منذ ساعة</span>
                    </article>
                    <article class="border-b border-gray-200 pb-3">
                        <h4 class="font-semibold text-gray-900 hover:text-blue-600 transition-colors cursor-pointer">
                            تطورات عالمية مهمة
                        </h4>
                        <span class="text-xs text-gray-500">منذ ساعتين</span>
                    </article>
                    <article>
                        <h4 class="font-semibold text-gray-900 hover:text-blue-600 transition-colors cursor-pointer">
                            أخبار دولية
                        </h4>
                        <span class="text-xs text-gray-500">منذ 3 ساعات</span>
                    </article>
                </div>
            </div>
            
            <!-- Sports -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-green-600 text-white p-4">
                    <h3 class="text-lg font-bold">
                        <i class="bi bi-trophy me-2"></i>رياضة
                    </h3>
                </div>
                <div class="p-4 space-y-3">
                    <article class="border-b border-gray-200 pb-3">
                        <h4 class="font-semibold text-gray-900 hover:text-green-600 transition-colors cursor-pointer">
                            نتائج المباريات
                        </h4>
                        <span class="text-xs text-gray-500">منذ ساعة</span>
                    </article>
                    <article class="border-b border-gray-200 pb-3">
                        <h4 class="font-semibold text-gray-900 hover:text-green-600 transition-colors cursor-pointer">
                            أخبار كرة القدم
                        </h4>
                        <span class="text-xs text-gray-500">منذ ساعتين</span>
                    </article>
                    <article>
                        <h4 class="font-semibold text-gray-900 hover:text-green-600 transition-colors cursor-pointer">
                            الرياضة المحلية
                        </h4>
                        <span class="text-xs text-gray-500">منذ 3 ساعات</span>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Video Section -->
<div class="bg-white py-8">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">
            <i class="bi bi-play-circle me-2"></i>فيديوهات
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Video 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x225" alt="فيديو" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center">
                            <i class="bi bi-play-fill text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-2 right-2 bg-black bg-opacity-70 text-white px-2 py-1 rounded text-xs">
                        05:30
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">عنوان الفيديو الإخباري</h3>
                    <p class="text-sm text-gray-600">وصف مختصر للفيديو والمحتوى المعروض</p>
                    <span class="text-xs text-gray-500 mt-2 block">منذ 4 ساعات</span>
                </div>
            </div>
            
            <!-- Video 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x225" alt="فيديو" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center">
                            <i class="bi bi-play-fill text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-2 right-2 bg-black bg-opacity-70 text-white px-2 py-1 rounded text-xs">
                        03:45
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">تقرير خاص من المنطقة</h3>
                    <p class="text-sm text-gray-600">تقرير مفصل حول الأوضاع الحالية</p>
                    <span class="text-xs text-gray-500 mt-2 block">منذ 6 ساعات</span>
                </div>
            </div>
            
            <!-- Video 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x225" alt="فيديو" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center">
                            <i class="bi bi-play-fill text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-2 right-2 bg-black bg-opacity-70 text-white px-2 py-1 rounded text-xs">
                        08:20
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">مقابلة حصرية</h3>
                    <p class="text-sm text-gray-600">مقابلة مع شخصية مؤثرة في المنطقة</p>
                    <span class="text-xs text-gray-500 mt-2 block">منذ 8 ساعات</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-bold mb-4">شبوة21</h3>
                <p class="text-gray-400 mb-4">منبرك الأول والخبر - موقع إخباري شامل يغطي أحدث الأخبار من محافظة شبوة واليمن</p>
                <div class="flex gap-4">
                    <a href="#" class="text-blue-400 hover:text-blue-300"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-blue-400 hover:text-blue-300"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="text-red-400 hover:text-red-300"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="text-blue-400 hover:text-blue-300"><i class="bi bi-telegram"></i></a>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-4">الأقسام</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-white">محليات</a></li>
                    <li><a href="#" class="hover:text-white">عربي وعالمي</a></li>
                    <li><a href="#" class="hover:text-white">رياضة</a></li>
                    <li><a href="#" class="hover:text-white">فيديو</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-4">اتصل بنا</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><i class="bi bi-envelope me-2"></i>info@shabwa21.com</li>
                    <li><i class="bi bi-telephone me-2"></i>+967 123 456 789</li>
                    <li><i class="bi bi-geo-alt me-2"></i>شبوة، اليمن</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-4 text-center text-gray-400">
            <p>&copy; 2025 شبوة21. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</footer>
@endsection
