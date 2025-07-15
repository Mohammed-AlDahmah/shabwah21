<footer class="site-footer">
    <div class="container mx-auto px-4">
        <!-- القسم العلوي من الفوتر -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 py-10">
            <!-- معلومات الموقع -->
            <div class="footer-widget">
                <h3 class="text-2xl font-bold mb-4">شبوة<span class="text-red-500">21</span></h3>
                <p class="text-gray-300 mb-4">
                    موقع إخباري شامل يغطي آخر الأخبار والتطورات في شبوة واليمن والعالم العربي.
                    نسعى لتقديم محتوى إخباري موثوق ومتوازن.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-telegram"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

            <!-- روابط سريعة -->
            <div class="footer-widget">
                <h3>روابط سريعة</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">الرئيسية</a></li>
                    <li><a href="{{ route('about') }}">من نحن</a></li>
                    <li><a href="{{ route('contact') }}">اتصل بنا</a></li>
                    <li><a href="{{ route('privacy') }}">سياسة الخصوصية</a></li>
                    <li><a href="#">شروط الاستخدام</a></li>
                </ul>
            </div>

            <!-- الأقسام -->
            <div class="footer-widget">
                <h3>الأقسام</h3>
                <ul class="footer-links">
                    @foreach($categories->take(6) as $category)
                        <li><a href="{{ route('news.category', $category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- النشرة البريدية -->
            <div class="footer-widget">
                <h3>النشرة البريدية</h3>
                <p class="text-gray-300 mb-4">اشترك في نشرتنا البريدية لتصلك آخر الأخبار</p>
                <form class="newsletter-form">
                    <div class="relative">
                        <input type="email" 
                               placeholder="بريدك الإلكتروني" 
                               class="w-full px-4 py-3 bg-gray-700 text-white rounded-lg focus:outline-none focus:bg-gray-600">
                        <button type="submit" 
                                class="absolute left-2 top-1/2 -translate-y-1/2 bg-primary hover:bg-yellow-600 text-white px-4 py-1 rounded">
                            اشترك
                        </button>
                    </div>
                </form>
                
                <!-- معلومات الاتصال -->
                <div class="mt-6 space-y-2 text-gray-300">
                    <p><i class="bi bi-envelope ml-2"></i> info@shabwa21.com</p>
                    <p><i class="bi bi-telephone ml-2"></i> +967 123 456 789</p>
                    <p><i class="bi bi-geo-alt ml-2"></i> شبوة، اليمن</p>
                </div>
            </div>
        </div>

        <!-- القسم السفلي -->
        <div class="footer-bottom">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    © 2024 شبوة21. جميع الحقوق محفوظة.
                </p>
                <p class="text-gray-400 text-sm mt-2 md:mt-0">
                    تطوير <a href="#" class="text-primary hover:underline">فريق شبوة21 التقني</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-widget h3 {
        @apply text-xl font-bold mb-4 text-white;
    }
    
    .footer-links li {
        @apply mb-2;
    }
    
    .footer-links a {
        @apply text-gray-300 hover:text-primary transition;
    }
    
    .social-icon {
        @apply w-10 h-10 bg-gray-700 hover:bg-primary text-white rounded-full flex items-center justify-center transition;
    }
    
    .social-icon:hover {
        @apply transform -translate-y-1;
    }
</style>
