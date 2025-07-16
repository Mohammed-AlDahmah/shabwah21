<div>
    <footer class="bg-slate-900 text-white">
        <!-- Main Footer -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- About Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3 mb-6">
                        <img src="/images/logo.png" alt="شبوة21" class="h-12 w-auto">
                        <div>
                            <h3 class="text-2xl font-bold">شبوة<span class="text-blue-400">21</span></h3>
                            <p class="text-slate-400 text-sm">منبرك الأول والخبر</p>
                        </div>
                    </div>
                    <p class="text-slate-300 leading-relaxed">
                        موقع إخباري شامل يغطي آخر المستجدات في محافظة شبوة واليمن والعالم العربي، 
                        برسالة مهنية وحيادية وموضوعية.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg transition-all duration-300 transform hover:scale-110">
                            <i class="bi bi-facebook text-lg"></i>
                        </a>
                        <a href="#" class="bg-blue-400 hover:bg-blue-500 text-white p-3 rounded-lg transition-all duration-300 transform hover:scale-110">
                            <i class="bi bi-twitter-x text-lg"></i>
                        </a>
                        <a href="#" class="bg-red-600 hover:bg-red-700 text-white p-3 rounded-lg transition-all duration-300 transform hover:scale-110">
                            <i class="bi bi-youtube text-lg"></i>
                        </a>
                        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-lg transition-all duration-300 transform hover:scale-110">
                            <i class="bi bi-telegram text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="space-y-4">
                    <h4 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <i class="bi bi-link-45deg text-blue-400"></i>
                        روابط سريعة
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('home') }}" class="text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-2">
                                <i class="bi bi-house text-blue-400"></i>
                                الرئيسية
                            </a>
                        </li>
                        <li>
                            <a href="/news" class="text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-2">
                                <i class="bi bi-newspaper text-blue-400"></i>
                                الأخبار
                            </a>
                        </li>
                        <li>
                            <a href="/videos" class="text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-2">
                                <i class="bi bi-play-circle text-blue-400"></i>
                                الفيديوهات
                            </a>
                        </li>
                        <li>
                            <a href="/about" class="text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-2">
                                <i class="bi bi-info-circle text-blue-400"></i>
                                عن الموقع
                            </a>
                        </li>
                        <li>
                            <a href="/contact" class="text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-2">
                                <i class="bi bi-envelope text-blue-400"></i>
                                اتصل بنا
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Categories -->
                <div class="space-y-4">
                    <h4 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <i class="bi bi-grid-3x3-gap text-blue-400"></i>
                        الأقسام
                    </h4>
                    <ul class="space-y-3">
                        @foreach(\App\Models\Category::take(6)->get() as $category)
                        <li>
                            <a href="{{ route('news.category', $category->slug) }}" class="text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-2">
                                <i class="bi bi-folder text-blue-400"></i>
                                {{ $category->name_ar ?? $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="space-y-4">
                    <h4 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <i class="bi bi-geo-alt text-blue-400"></i>
                        معلومات التواصل
                    </h4>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <i class="bi bi-geo-alt-fill text-blue-400 mt-1"></i>
                            <div>
                                <p class="text-slate-300 font-semibold">العنوان</p>
                                <p class="text-slate-400 text-sm">محافظة شبوة، اليمن</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="bi bi-envelope-fill text-blue-400 mt-1"></i>
                            <div>
                                <p class="text-slate-300 font-semibold">البريد الإلكتروني</p>
                                <p class="text-slate-400 text-sm">info@shabwah21.com</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="bi bi-telephone-fill text-blue-400 mt-1"></i>
                            <div>
                                <p class="text-slate-300 font-semibold">الهاتف</p>
                                <p class="text-slate-400 text-sm">+967 XXX XXX XXX</p>
                            </div>
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="mt-6 p-4 bg-slate-800 rounded-xl">
                        <h5 class="font-semibold mb-3">اشترك في النشرة</h5>
                        <div class="space-y-3">
                            <input type="email" placeholder="بريدك الإلكتروني" 
                                   class="w-full px-3 py-2 rounded-lg bg-slate-700 border border-slate-600 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold transition-colors">
                                اشترك الآن
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-slate-700">
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="text-slate-400 text-sm">
                        © {{ date('Y') }} شبوة21. جميع الحقوق محفوظة.
                    </div>
                    <div class="flex items-center gap-6 text-sm">
                        <a href="/privacy" class="text-slate-400 hover:text-blue-400 transition-colors">سياسة الخصوصية</a>
                        <a href="/terms" class="text-slate-400 hover:text-blue-400 transition-colors">شروط الاستخدام</a>
                        <a href="/sitemap" class="text-slate-400 hover:text-blue-400 transition-colors">خريطة الموقع</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
