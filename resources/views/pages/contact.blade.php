@extends('layouts.app')

@section('title', 'اتصل بنا - شبوة 21')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">اتصل بنا</h1>
                <p class="text-gray-600 text-lg">نحن هنا للإجابة على استفساراتكم وملاحظاتكم</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">أرسل لنا رسالة</h2>
                    
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم الكامل</label>
                                <input type="text" id="name" name="name" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
                                <input type="email" id="email" name="email" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                            </div>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف</label>
                            <input type="tel" id="phone" name="phone" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">الموضوع</label>
                            <select id="subject" name="subject" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                                <option value="">اختر الموضوع</option>
                                <option value="general">استفسار عام</option>
                                <option value="news">اقتراح خبر</option>
                                <option value="technical">مشكلة تقنية</option>
                                <option value="advertising">إعلانات</option>
                                <option value="partnership">شراكة</option>
                                <option value="other">أخرى</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">الرسالة</label>
                            <textarea id="message" name="message" rows="6" required 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                                      placeholder="اكتب رسالتك هنا..."></textarea>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                            <i class="bi bi-send ml-2"></i>
                            إرسال الرسالة
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-6">
                    <!-- Contact Info -->
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">معلومات الاتصال</h2>
                        
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center ml-4">
                                    <i class="bi bi-envelope text-yellow-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">البريد الإلكتروني</h3>
                                    <p class="text-gray-600">info@shabwah21.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center ml-4">
                                    <i class="bi bi-telephone text-yellow-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">الهاتف</h3>
                                    <p class="text-gray-600">+967 123 456 789</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center ml-4">
                                    <i class="bi bi-geo-alt text-yellow-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">العنوان</h3>
                                    <p class="text-gray-600">محافظة شبوة، اليمن</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center ml-4">
                                    <i class="bi bi-clock text-yellow-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">ساعات العمل</h3>
                                    <p class="text-gray-600">الأحد - الخميس: 8:00 ص - 6:00 م</p>
                                    <p class="text-gray-600">الجمعة - السبت: 9:00 ص - 4:00 م</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">تابعنا على وسائل التواصل</h2>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <a href="#" class="flex items-center p-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                                <i class="bi bi-facebook text-xl ml-3"></i>
                                <span>فيسبوك</span>
                            </a>
                            
                            <a href="#" class="flex items-center p-4 bg-blue-400 hover:bg-blue-500 text-white rounded-lg transition-colors">
                                <i class="bi bi-twitter-x text-xl ml-3"></i>
                                <span>تويتر</span>
                            </a>
                            
                            <a href="#" class="flex items-center p-4 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                                <i class="bi bi-youtube text-xl ml-3"></i>
                                <span>يوتيوب</span>
                            </a>
                            
                            <a href="#" class="flex items-center p-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                                <i class="bi bi-telegram text-xl ml-3"></i>
                                <span>تليجرام</span>
                            </a>
                        </div>
                    </div>

                    <!-- FAQ -->
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">الأسئلة الشائعة</h2>
                        
                        <div class="space-y-4">
                            <div class="border-b border-gray-200 pb-4">
                                <h3 class="font-semibold text-gray-800 mb-2">كيف يمكنني إرسال خبر أو تقرير؟</h3>
                                <p class="text-gray-600 text-sm">يمكنك إرسال الأخبار والتقارير عبر البريد الإلكتروني أو نموذج الاتصال أعلاه.</p>
                            </div>
                            
                            <div class="border-b border-gray-200 pb-4">
                                <h3 class="font-semibold text-gray-800 mb-2">هل يمكنني إعادة نشر المحتوى؟</h3>
                                <p class="text-gray-600 text-sm">يجب الحصول على إذن مسبق قبل إعادة نشر أي محتوى من موقعنا.</p>
                            </div>
                            
                            <div class="border-b border-gray-200 pb-4">
                                <h3 class="font-semibold text-gray-800 mb-2">كيف يمكنني الاشتراك في النشرة الإخبارية؟</h3>
                                <p class="text-gray-600 text-sm">يمكنك الاشتراك في النشرة الإخبارية من خلال النموذج الموجود في أسفل الصفحة الرئيسية.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-12">
                <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg transition-colors">
                    <i class="bi bi-house ml-2"></i>
                    العودة للرئيسية
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 