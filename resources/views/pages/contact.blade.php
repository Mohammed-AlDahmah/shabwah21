@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- عنوان الصفحة -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">تواصل معنا</h1>
            <p class="text-xl text-gray-600">نحن هنا للإجابة على استفساراتكم واقتراحاتكم</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- نموذج التواصل -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">أرسل رسالة</h2>
                
                <form action="#" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم الكامل</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   required 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   required 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف</label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">الموضوع</label>
                        <select id="subject" 
                                name="subject" 
                                required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <option value="">اختر الموضوع</option>
                            <option value="general">استفسار عام</option>
                            <option value="news">اقتراح خبر</option>
                            <option value="technical">مشكلة تقنية</option>
                            <option value="advertising">إعلانات</option>
                            <option value="other">أخرى</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">الرسالة</label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="6" 
                                  required 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                  placeholder="اكتب رسالتك هنا..."></textarea>
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-red-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-red-700 transition-colors duration-200">
                        إرسال الرسالة
                    </button>
                </form>
            </div>

            <!-- معلومات التواصل -->
            <div class="space-y-6">
                <!-- معلومات الاتصال -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">معلومات التواصل</h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">البريد الإلكتروني</div>
                                <div class="text-gray-600">htnews21@gmail.com</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">الهاتف</div>
                                <div class="text-gray-600">+967 734 605 929</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">العنوان</div>
                                <div class="text-gray-600">حضرموت، اليمن</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ساعات العمل -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">ساعات العمل</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">الأحد - الخميس</span>
                            <span class="font-semibold">8:00 ص - 6:00 م</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">الجمعة</span>
                            <span class="font-semibold">9:00 ص - 2:00 م</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">السبت</span>
                            <span class="font-semibold">مغلق</span>
                        </div>
                    </div>
                </div>

                <!-- روابط التواصل الاجتماعي -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">تابعنا</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="#" class="flex items-center p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                            <span>تويتر</span>
                        </a>
                        
                        <a href="#" class="flex items-center p-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span>فيسبوك</span>
                        </a>
                        
                        <a href="#" class="flex items-center p-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            <span>يوتيوب</span>
                        </a>
                        
                        <a href="#" class="flex items-center p-3 bg-blue-400 text-white rounded-lg hover:bg-blue-500 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            <span>تليجرام</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- خريطة الموقع -->
        <div class="mt-12 bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">موقعنا</h3>
            <div class="bg-gray-200 h-64 rounded-lg flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="text-gray-600">خريطة تفاعلية لموقعنا</p>
                    <p class="text-sm text-gray-500">حضرموت، اليمن</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 