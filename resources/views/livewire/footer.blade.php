<footer class="footer-section bg-gray-900 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="footer-bg-pattern absolute inset-0 opacity-5">
        <div class="pattern-grid"></div>
    </div>
    
    <div class="container mx-auto px-4 py-12 relative z-10">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <!-- About Section -->
            <div class="footer-section">
                <div class="footer-logo mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="شبوة 21" class="h-12">
                </div>
                <p class="text-gray-300 leading-relaxed mb-4">
                    {{ $footerDescription }}
                </p>
                <div class="social-links flex space-x-4 space-x-reverse">
                    @if(isset($socialMediaLinks['facebook']))
                        <a href="{{ $socialMediaLinks['facebook'] }}" target="_blank" class="social-link facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                    @endif
                    @if(isset($socialMediaLinks['twitter']))
                        <a href="{{ $socialMediaLinks['twitter'] }}" target="_blank" class="social-link twitter">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                    @endif
                    @if(isset($socialMediaLinks['instagram']))
                        <a href="{{ $socialMediaLinks['instagram'] }}" target="_blank" class="social-link instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                    @endif
                    @if(isset($socialMediaLinks['youtube']))
                        <a href="{{ $socialMediaLinks['youtube'] }}" target="_blank" class="social-link youtube">
                            <i class="bi bi-youtube"></i>
                        </a>
                    @endif
                    @if(isset($socialMediaLinks['telegram']))
                        <a href="{{ $socialMediaLinks['telegram'] }}" target="_blank" class="social-link telegram">
                            <i class="bi bi-telegram"></i>
                        </a>
                    @endif
                    @if(isset($socialMediaLinks['linkedin']))
                        <a href="{{ $socialMediaLinks['linkedin'] }}" target="_blank" class="social-link linkedin">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h3 class="footer-title mb-4">روابط سريعة</h3>
                <ul class="footer-links space-y-2">
                    <li><a href="{{ route('home') }}" class="footer-link">الرئيسية</a></li>
                    <li><a href="{{ route('news.index') }}" class="footer-link">الأخبار</a></li>
                    <li><a href="{{ route('videos.index') }}" class="footer-link">الفيديوهات</a></li>
                    <li><a href="{{ route('about') }}" class="footer-link">من نحن</a></li>
                    <li><a href="{{ route('contact') }}" class="footer-link">اتصل بنا</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="footer-section">
                <h3 class="footer-title mb-4">الأقسام</h3>
                <ul class="footer-links space-y-2">
                    @foreach(\App\Models\Category::take(5)->get() as $category)
                        <li>
                            <a href="{{ route('news.category', $category->slug) }}" class="footer-link">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-section">
                <h3 class="footer-title mb-4">معلومات الاتصال</h3>
                <div class="contact-info space-y-3">
                    @if(isset($contactInfo['email']))
                        <div class="contact-item flex items-center">
                            <i class="bi bi-envelope text-yellow-400 ml-2"></i>
                            <a href="mailto:{{ $contactInfo['email'] }}" class="contact-link">
                                {{ $contactInfo['email'] }}
                            </a>
                        </div>
                    @endif
                    @if(isset($contactInfo['phone']))
                        <div class="contact-item flex items-center">
                            <i class="bi bi-telephone text-yellow-400 ml-2"></i>
                            <a href="tel:{{ $contactInfo['phone'] }}" class="contact-link">
                                {{ $contactInfo['phone'] }}
                            </a>
                        </div>
                    @endif
                    @if(isset($contactInfo['address']))
                        <div class="contact-item flex items-center">
                            <i class="bi bi-geo-alt text-yellow-400 ml-2"></i>
                            <span class="contact-text">{{ $contactInfo['address'] }}</span>
                        </div>
                    @endif
                    @if(isset($contactInfo['working_hours']))
                        <div class="contact-item flex items-center">
                            <i class="bi bi-clock text-yellow-400 ml-2"></i>
                            <span class="contact-text">{{ $contactInfo['working_hours'] }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Newsletter Section -->
        <div class="newsletter-section bg-gray-800 rounded-lg p-6 mb-8">
            <div class="text-center">
                <h3 class="newsletter-title text-xl font-bold mb-2">اشترك في النشرة الإخبارية</h3>
                <p class="newsletter-description text-gray-300 mb-4">
                    احصل على آخر الأخبار والتحديثات مباشرة في بريدك الإلكتروني
                </p>
                <div class="newsletter-form flex max-w-md mx-auto">
                    <input type="email" placeholder="أدخل بريدك الإلكتروني" 
                           class="newsletter-input flex-1 px-4 py-2 rounded-r-lg border-0 focus:ring-2 focus:ring-yellow-400">
                    <button class="newsletter-btn bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-l-lg transition-colors">
                        اشتراك
                    </button>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="footer-bottom border-t border-gray-700 pt-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="copyright text-gray-400 text-sm mb-4 md:mb-0">
                    © {{ date('Y') }} شبوة 21. جميع الحقوق محفوظة.
                </div>
                <div class="footer-legal flex space-x-6 space-x-reverse text-sm">
                    <a href="{{ route('privacy') }}" class="legal-link">{{ $privacyPolicy }}</a>
                    <a href="{{ route('terms') }}" class="legal-link">{{ $termsOfService }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>
