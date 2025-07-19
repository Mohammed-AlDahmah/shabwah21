<div>
    <footer class="bg-slate-900 text-white">
        <!-- Main Footer -->
        <div class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- About Section -->
                <div class="space-y-6 footer-grid-item">
                    <div class="flex items-center gap-4 mb-8">
                        <img src="/images/logo.png" alt="شبوة21" class="h-16 w-auto footer-logo">
                        <div>
                            <h3 class="text-3xl font-bold footer-brand-text">شبوة<span class="text-blue-400">21</span></h3>
                            <p class="text-slate-400 text-sm mt-1">منبرك الأول والخبر</p>
                        </div>
                    </div>
                    <p class="text-slate-300 leading-relaxed text-justify">
                        موقع إخباري شامل يغطي آخر المستجدات في محافظة شبوة واليمن والعالم العربي، 
                        برسالة مهنية وحيادية وموضوعية. نقدم لكم الأخبار العاجلة والتحليلات العميقة.
                    </p>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div class="text-center p-3 bg-slate-800 rounded-xl">
                            <div class="text-2xl font-bold text-blue-400">{{ number_format($stats['today_visitors']) }}</div>
                            <div class="text-xs text-slate-400">زائر اليوم</div>
                        </div>
                        <div class="text-center p-3 bg-slate-800 rounded-xl">
                            <div class="text-2xl font-bold text-green-400">{{ $stats['today_articles'] }}</div>
                            <div class="text-xs text-slate-400">مقال جديد</div>
                        </div>
                    </div>
                    
                    <div class="flex gap-4 mt-6">
                        <a href="#" class="social-icon bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-xl transition-all duration-300 transform hover:scale-110 shadow-lg">
                            <i class="bi bi-facebook text-xl"></i>
                        </a>
                        <a href="#" class="social-icon bg-blue-400 hover:bg-blue-500 text-white p-4 rounded-xl transition-all duration-300 transform hover:scale-110 shadow-lg">
                            <i class="bi bi-twitter-x text-xl"></i>
                        </a>
                        <a href="#" class="social-icon bg-red-600 hover:bg-red-700 text-white p-4 rounded-xl transition-all duration-300 transform hover:scale-110 shadow-lg">
                            <i class="bi bi-youtube text-xl"></i>
                        </a>
                        <a href="#" class="social-icon bg-blue-500 hover:bg-blue-600 text-white p-4 rounded-xl transition-all duration-300 transform hover:scale-110 shadow-lg">
                            <i class="bi bi-telegram text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="space-y-6 footer-grid-item">
                    <h4 class="text-xl font-bold text-white mb-8 flex items-center gap-3 footer-section-header">
                        <i class="bi bi-link-45deg text-blue-400 text-2xl"></i>
                        روابط سريعة
                    </h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('home') }}" class="footer-link text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-3 text-lg">
                                <i class="bi bi-house text-blue-400"></i>
                                الرئيسية
                            </a>
                        </li>
                        <li>
                            <a href="/news" class="footer-link text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-3 text-lg">
                                <i class="bi bi-newspaper text-blue-400"></i>
                                الأخبار
                            </a>
                        </li>
                        <li>
                            <a href="/videos" class="footer-link text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-3 text-lg">
                                <i class="bi bi-play-circle text-blue-400"></i>
                                الفيديوهات
                            </a>
                        </li>
                        <li>
                            <a href="/about" class="footer-link text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-3 text-lg">
                                <i class="bi bi-info-circle text-blue-400"></i>
                                عن الموقع
                            </a>
                        </li>
                        <li>
                            <a href="/contact" class="footer-link text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-3 text-lg">
                                <i class="bi bi-envelope text-blue-400"></i>
                                اتصل بنا
                            </a>
                        </li>
                        <li>
                            <a href="/sitemap" class="footer-link text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-3 text-lg">
                                <i class="bi bi-diagram-3 text-blue-400"></i>
                                خريطة الموقع
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Categories -->
                <div class="space-y-6 footer-grid-item">
                    <h4 class="text-xl font-bold text-white mb-8 flex items-center gap-3 footer-section-header">
                        <i class="bi bi-grid-3x3-gap text-blue-400 text-2xl"></i>
                        الأقسام
                    </h4>
                    <ul class="space-y-4">
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('news.category', $category->slug) }}" class="footer-link text-slate-300 hover:text-blue-400 transition-colors flex items-center gap-3 text-lg">
                                <i class="bi bi-folder text-blue-400"></i>
                                {{ $category->name_ar ?? $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    
                    <!-- View All Categories -->
                    <div class="mt-6">
                        <a href="/categories" class="inline-flex items-center gap-2 text-blue-400 hover:text-blue-300 transition-colors text-sm font-semibold">
                            <span>عرض جميع الأقسام</span>
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                    
                    <!-- Additional Stats -->
                    <div class="mt-8 p-4 bg-slate-800 rounded-xl">
                        <h5 class="font-semibold text-white mb-3 flex items-center gap-2">
                            <i class="bi bi-graph-up text-green-400"></i>
                            إحصائيات الموقع
                        </h5>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-slate-400">إجمالي المقالات:</span>
                                <span class="text-white font-semibold">{{ number_format($stats['total_articles']) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">عدد الأقسام:</span>
                                <span class="text-white font-semibold">{{ $stats['total_categories'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="space-y-6 footer-grid-item">
                    <h4 class="text-xl font-bold text-white mb-8 flex items-center gap-3 footer-section-header">
                        <i class="bi bi-geo-alt text-blue-400 text-2xl"></i>
                        معلومات التواصل
                    </h4>
                    <div class="space-y-6">
                        <div class="contact-item flex items-start gap-4">
                            <i class="bi bi-geo-alt-fill contact-icon text-xl mt-1"></i>
                            <div>
                                <p class="text-slate-300 font-semibold text-lg">العنوان</p>
                                <p class="text-slate-400 text-sm mt-1">محافظة شبوة، اليمن</p>
                            </div>
                        </div>
                        <div class="contact-item flex items-start gap-4">
                            <i class="bi bi-envelope-fill contact-icon text-xl mt-1"></i>
                            <div>
                                <p class="text-slate-300 font-semibold text-lg">البريد الإلكتروني</p>
                                <p class="text-slate-400 text-sm mt-1">info@shabwah21.com</p>
                            </div>
                        </div>
                        <div class="contact-item flex items-start gap-4">
                            <i class="bi bi-telephone-fill contact-icon text-xl mt-1"></i>
                            <div>
                                <p class="text-slate-300 font-semibold text-lg">الهاتف</p>
                                <p class="text-slate-400 text-sm mt-1">+967 XXX XXX XXX</p>
                            </div>
                        </div>
                        <div class="contact-item flex items-start gap-4">
                            <i class="bi bi-clock-fill contact-icon text-xl mt-1"></i>
                            <div>
                                <p class="text-slate-300 font-semibold text-lg">ساعات العمل</p>
                                <p class="text-slate-400 text-sm mt-1">24/7 - على مدار الساعة</p>
                            </div>
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="mt-8 p-6 newsletter-box rounded-2xl">
                        <h5 class="font-bold text-lg mb-4 text-white">اشترك في النشرة الإخبارية</h5>
                        <p class="text-slate-300 text-sm mb-4">احصل على آخر الأخبار والتحديثات مباشرة في بريدك الإلكتروني</p>
                        
                        @if($subscribed)
                            <div class="bg-green-600 text-white p-4 rounded-xl text-center">
                                <i class="bi bi-check-circle text-2xl mb-2"></i>
                                <p class="font-bold">تم الاشتراك بنجاح!</p>
                                <p class="text-sm">ستصلك آخر الأخبار قريباً</p>
                            </div>
                        @else
                            <form wire:submit.prevent="subscribe" class="space-y-4">
                                <div>
                                    <input type="email" wire:model="email" placeholder="أدخل بريدك الإلكتروني" 
                                           class="newsletter-input w-full px-4 py-3 rounded-xl bg-slate-700 border text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg">
                                    @error('email')
                                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="newsletter-btn w-full text-white px-6 py-3 rounded-xl font-bold transition-colors text-lg" 
                                        wire:loading.attr="disabled" wire:loading.class="opacity-50">
                                    <span wire:loading.remove>
                                        <i class="bi bi-envelope me-2"></i>
                                        اشترك الآن
                                    </span>
                                    <span wire:loading>
                                        <i class="bi bi-arrow-clockwise animate-spin me-2"></i>
                                        جاري الاشتراك...
                                    </span>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-slate-700 bottom-footer">
            <div class="container mx-auto px-4 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="text-slate-400 text-sm text-center md:text-right">
                        <p class="mb-2">© {{ date('Y') }} شبوة21. جميع الحقوق محفوظة.</p>
                        <p class="text-xs">تم التطوير بواسطة فريق شبوة21</p>
                        <p class="text-xs mt-1">آخر تحديث: {{ now()->format('Y-m-d H:i') }}</p>
                    </div>
                    <div class="flex items-center gap-8 text-sm">
                        <a href="/privacy" class="bottom-footer-link text-slate-400 hover:text-blue-400 transition-colors">سياسة الخصوصية</a>
                        <a href="/terms" class="bottom-footer-link text-slate-400 hover:text-blue-400 transition-colors">شروط الاستخدام</a>
                        <a href="/sitemap" class="bottom-footer-link text-slate-400 hover:text-blue-400 transition-colors">خريطة الموقع</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
