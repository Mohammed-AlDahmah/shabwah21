@php
        use App\Models\SiteSettings;
    @endphp
<footer class="footer-section bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white relative overflow-hidden">
    <!-- Animated Background Pattern -->
    <div class="footer-bg-pattern absolute inset-0 opacity-10">
        <div class="pattern-grid animate-pulse"></div>
        <div class="floating-particles"></div>
    </div>
    
    <div class="container mx-auto px-4 py-16 relative z-10">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <!-- About Section -->
            <div class="footer-section group">
                <div class="footer-logo mb-6 transform transition-transform duration-300 group-hover:scale-105">
                    <img src="{{ asset('images/logo.png') }}" alt="شبوة 21" class="h-16 filter drop-shadow-lg">
                    <div class="mt-3">
                        <h2 class="text-2xl font-bold text-[#C08B2D] mb-2">شبوة 21</h2>
                        <p class="text-sm text-gray-400">موقع إخباري احترافي</p>
                    </div>
                </div>
                <p class="text-gray-300 leading-relaxed mb-6 text-sm">
                    {{ SiteSettings::getValue('site_description', 'نحن نقدم آخر الأخبار والتقارير من شبوة واليمن، مع التركيز على الدقة والمصداقية في نقل المعلومات.') }}
                </p>
                <div class="social-links flex space-x-4 space-x-reverse">
                    @if(SiteSettings::getValue('social_facebook'))
                        <a href="{{ SiteSettings::getValue('social_facebook') }}" target="_blank" class="social-link facebook hover-lift">
                            <i class="bi bi-facebook text-lg"></i>
                        </a>
                    @endif
                    @if(SiteSettings::getValue('social_twitter'))
                        <a href="{{ SiteSettings::getValue('social_twitter') }}" target="_blank" class="social-link twitter hover-lift">
                            <i class="bi bi-twitter-x text-lg"></i>
                        </a>
                    @endif
                    @if(SiteSettings::getValue('social_instagram'))
                        <a href="{{ SiteSettings::getValue('social_instagram') }}" target="_blank" class="social-link instagram hover-lift">
                            <i class="bi bi-instagram text-lg"></i>
                        </a>
                    @endif
                    @if(SiteSettings::getValue('social_youtube'))
                        <a href="{{ SiteSettings::getValue('social_youtube') }}" target="_blank" class="social-link youtube hover-lift">
                            <i class="bi bi-youtube text-lg"></i>
                        </a>
                    @endif
                    @if(SiteSettings::getValue('social_telegram'))
                        <a href="{{ SiteSettings::getValue('social_telegram') }}" target="_blank" class="social-link telegram hover-lift">
                            <i class="bi bi-telegram text-lg"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h3 class="footer-title mb-6 flex items-center">
                    <i class="bi bi-link-45deg text-[#C08B2D] ml-2"></i>
                    روابط سريعة
                </h3>
                <ul class="footer-links space-y-3">
                    <li><a href="{{ route('home') }}" class="footer-link group flex items-center">
                        <i class="bi bi-house-door text-[#C08B2D] ml-2 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        الرئيسية
                    </a></li>
                    <li><a href="{{ route('news.index') }}" class="footer-link group flex items-center">
                        <i class="bi bi-newspaper text-[#C08B2D] ml-2 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        الأخبار
                    </a></li>
                    <li><a href="{{ route('videos.index') }}" class="footer-link group flex items-center">
                        <i class="bi bi-play-circle text-[#C08B2D] ml-2 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        الفيديوهات
                    </a></li>
                    <li><a href="{{ route('about') }}" class="footer-link group flex items-center">
                        <i class="bi bi-info-circle text-[#C08B2D] ml-2 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        من نحن
                    </a></li>
                    <li><a href="{{ route('contact') }}" class="footer-link group flex items-center">
                        <i class="bi bi-envelope text-[#C08B2D] ml-2 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        اتصل بنا
                    </a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="footer-section">
                <h3 class="footer-title mb-6 flex items-center">
                    <i class="bi bi-grid-3x3-gap text-[#C08B2D] ml-2"></i>
                    الأقسام
                </h3>
                <ul class="footer-links space-y-3">
                    @foreach(\App\Models\Category::where('is_active', true)->take(6)->get() as $category)
                        <li>
                            <a href="{{ route('news.category', $category->slug) }}" class="footer-link group flex items-center">
                                <i class="bi bi-chevron-left text-[#C08B2D] ml-2 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                {{ $category->name }}
                                <span class="text-xs text-gray-500 mr-auto">({{ $category->articles_count ?? 0 }})</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-section">
                <h3 class="footer-title mb-6 flex items-center">
                    <i class="bi bi-geo-alt text-[#C08B2D] ml-2"></i>
                    معلومات الاتصال
                </h3>
                <div class="contact-info space-y-4">
                    @if(SiteSettings::getValue('contact_email'))
                        <div class="contact-item flex items-center group">
                            <div class="contact-icon bg-[#C08B2D] p-2 rounded-full ml-3 group-hover:scale-110 transition-transform">
                                <i class="bi bi-envelope text-white text-sm"></i>
                            </div>
                            <a href="mailto:{{ SiteSettings::getValue('contact_email') }}" class="contact-link group-hover:text-[#C08B2D] transition-colors">
                                {{ SiteSettings::getValue('contact_email') }}
                            </a>
                        </div>
                    @endif
                    @if(SiteSettings::getValue('contact_phone'))
                        <div class="contact-item flex items-center group">
                            <div class="contact-icon bg-[#C08B2D] p-2 rounded-full ml-3 group-hover:scale-110 transition-transform">
                                <i class="bi bi-telephone text-white text-sm"></i>
                            </div>
                            <a href="tel:{{ SiteSettings::getValue('contact_phone') }}" class="contact-link group-hover:text-[#C08B2D] transition-colors">
                                {{ SiteSettings::getValue('contact_phone') }}
                            </a>
                        </div>
                    @endif
                    @if(SiteSettings::getValue('contact_address'))
                        <div class="contact-item flex items-center group">
                            <div class="contact-icon bg-[#C08B2D] p-2 rounded-full ml-3 group-hover:scale-110 transition-transform">
                                <i class="bi bi-geo-alt text-white text-sm"></i>
                            </div>
                            <span class="contact-text group-hover:text-[#C08B2D] transition-colors">{{ SiteSettings::getValue('contact_address') }}</span>
                        </div>
                    @endif
                    @if(SiteSettings::getValue('work_hours'))
                        <div class="contact-item flex items-center group">
                            <div class="contact-icon bg-[#C08B2D] p-2 rounded-full ml-3 group-hover:scale-110 transition-transform">
                                <i class="bi bi-clock text-white text-sm"></i>
                            </div>
                            <span class="contact-text group-hover:text-[#C08B2D] transition-colors">{{ SiteSettings::getValue('work_hours') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Newsletter Section -->
        @if(SiteSettings::getValue('show_newsletter', true))
        <div class="newsletter-section bg-gradient-to-r from-gray-800 to-gray-700 rounded-2xl p-8 mb-12 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-[#C08B2D]/10 to-[#B22B2B]/10"></div>
            <div class="relative z-10 text-center">
                <div class="newsletter-icon mb-4">
                    <i class="bi bi-envelope-paper text-4xl text-[#C08B2D]"></i>
                </div>
                <h3 class="newsletter-title text-2xl font-bold mb-3 text-white">اشترك في النشرة الإخبارية</h3>
                <p class="newsletter-description text-gray-300 mb-6 max-w-2xl mx-auto">
                    احصل على آخر الأخبار والتحديثات مباشرة في بريدك الإلكتروني. نرسل لك أهم الأخبار يومياً
                </p>
                <div class="newsletter-form flex max-w-md mx-auto bg-white rounded-xl overflow-hidden shadow-lg">
                    <input type="email" placeholder="أدخل بريدك الإلكتروني" 
                           class="newsletter-input flex-1 px-6 py-4 text-gray-800 placeholder-gray-500 focus:outline-none">
                    <button class="newsletter-btn bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white px-8 py-4 font-semibold hover:from-[#B22B2B] hover:to-[#C08B2D] transition-all duration-300 transform hover:scale-105">
                        <i class="bi bi-send ml-2"></i>
                        اشتراك
                    </button>
                </div>
                <p class="text-xs text-gray-400 mt-3">نحترم خصوصيتك ولن نشارك بريدك مع أي طرف ثالث</p>
            </div>
        </div>
        @endif

        <!-- Bottom Footer -->
        <div class="footer-bottom border-t border-gray-700 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="copyright text-gray-400 text-sm mb-4 md:mb-0 flex items-center">
                    <i class="bi bi-c-circle ml-2"></i>
                    © {{ date('Y') }} {{ SiteSettings::getValue('site_name', 'شبوة 21') }}. {{ SiteSettings::getValue('footer_text', 'جميع الحقوق محفوظة.') }}
                </div>
                <div class="footer-legal flex space-x-6 space-x-reverse text-sm">
                    <a href="{{ route('privacy') }}" class="legal-link hover:text-[#C08B2D] transition-colors">
                        <i class="bi bi-shield-check ml-1"></i>
                        {{ $privacyPolicy ?? 'سياسة الخصوصية' }}
                    </a>
                    <a href="{{ route('terms') }}" class="legal-link hover:text-[#C08B2D] transition-colors">
                        <i class="bi bi-file-text ml-1"></i>
                        {{ $termsOfService ?? 'شروط الاستخدام' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
