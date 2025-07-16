<div>
<footer id="footer" class="bg-gray-900 text-white py-12" style="background-color: var(--footer-bg);">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="md:col-span-2">
                <div class="flex items-center mb-6">
                    <img src="{{ asset('images/logo.png') }}" alt="شبوة21" class="h-12 me-4">
                    <h3 class="text-2xl font-bold">شبوة21</h3>
                </div>
                <p class="text-gray-400 mb-6 text-lg leading-relaxed">
                    شبوة21: موقع اخباري كاشف للمستجدات بمهنيه وحياد، رسالته الدفاع عن حقوق المواطن واعلاء كلمته وذراعه شبكة المراسلين المنتشرين في عموم الوطن.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="bg-blue-600 hover:bg-blue-700 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="bg-black hover:bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="#" class="bg-red-600 hover:bg-red-700 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="#" class="bg-blue-500 hover:bg-blue-600 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                        <i class="bi bi-telegram"></i>
                    </a>
                    <a href="#" class="bg-green-600 hover:bg-green-700 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-6 border-b border-gray-700 pb-2">الأقسام</h3>
                <ul class="space-y-3 text-gray-400">
                    <li>
                        <a href="#" class="hover:text-white transition-colors">
                            أخبار حضرموت
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-white transition-colors">
                            المجلس الانتقالي
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-white transition-colors">
                            محليات
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-white transition-colors">
                            تقارير وتحقيقات
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-white transition-colors">
                            عربي وعالمي
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-6 border-b border-gray-700 pb-2">اتصل بنا</h3>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-center">
                        <i class="bi bi-envelope me-3 text-red-400"></i>
                        info@h21.news
                    </li>
                    <li class="flex items-center">
                        <i class="bi bi-telephone me-3 text-red-400"></i>
                        +967 123 456 789
                    </li>
                    <li class="flex items-center">
                        <i class="bi bi-geo-alt me-3 text-red-400"></i>
                        حضرموت، اليمن
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Site Info Section -->
<div id="site-info" class="py-6 text-center text-gray-400" style="background-color: var(--footer-info-bg);">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="mb-4 md:mb-0">
                <p>&copy; 2025 شبوة21. جميع الحقوق محفوظة.</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="#" class="text-gray-400 hover:text-white transition-colors">
                    سياسة الخصوصية
                </a>
                <span class="text-gray-600">|</span>
                <a href="#" class="text-gray-400 hover:text-white transition-colors">
                    شروط الاستخدام
                </a>
                <span class="text-gray-600">|</span>
                <a href="#" class="text-gray-400 hover:text-white transition-colors">
                    اتصل بنا
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    /* تنسيق الفوتر */
    #footer {
        position: relative;
        background-color: var(--footer-bg);
        color: white;
    }
    
    #site-info {
        background-color: var(--footer-info-bg);
        color: #9ca3af;
    }
    
    .footer-boxed-widget-area {
        border-color: rgba(255, 255, 255, 0.1);
    }
    
    /* تنسيق الأيقونات الاجتماعية */
    .social-icons a {
        transition: all 0.3s ease;
    }
    
    .social-icons a:hover {
        transform: translateY(-2px);
    }
    
    /* تنسيق الروابط */
    footer a {
        transition: all 0.3s ease;
    }
    
    footer a:hover {
        color: var(--primary-color);
    }
    
    /* تنسيق متجاوب */
    @media (max-width: 768px) {
        #footer {
            padding: 2rem 0;
        }
        
        .social-icons {
            justify-content: center;
        }
        
        #site-info {
            padding: 1.5rem 0;
        }
        
        #site-info .flex {
            flex-direction: column;
            gap: 1rem;
        }
    }
</style>
</div>
