@extends('layouts.app')

@section('title', 'من نحن - شبوة 21')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">من نحن</h1>
                <p class="text-gray-600 text-lg">تعرف على فريق شبوة 21 ورؤيتنا ورسالتنا</p>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="prose prose-lg max-w-none">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">رؤيتنا</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        نسعى لأن نكون المنصة الإخبارية الأولى والأكثر موثوقية في محافظة شبوة واليمن، نقدم أخباراً دقيقة ومحايدة وموضوعية، ونكون صوتاً للشعب اليمني في نقل الحقائق والأحداث.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mb-6">رسالتنا</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        تقديم محتوى إخباري عالي الجودة، محايد وموضوعي، يلبي احتياجات القراء في محافظة شبوة واليمن والعالم العربي. نلتزم بالدقة والشفافية والمسؤولية في نقل الأخبار والمعلومات.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mb-6">قيمنا</h2>
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-yellow-600 mb-2">الدقة والموثوقية</h3>
                            <p class="text-gray-700">نحرص على التحقق من صحة المعلومات قبل نشرها</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-yellow-600 mb-2">الحيادية والموضوعية</h3>
                            <p class="text-gray-700">نقدم الأخبار بموضوعية دون تحيز أو توجيه</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-yellow-600 mb-2">الشفافية</h3>
                            <p class="text-gray-700">نكون شفافين في مصادرنا وطرق عملنا</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-yellow-600 mb-2">المسؤولية الاجتماعية</h3>
                            <p class="text-gray-700">نخدم المجتمع ونعزز الوعي والمعرفة</p>
                        </div>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-800 mb-6">فريق العمل</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        يتكون فريق شبوة 21 من مجموعة من الصحفيين المحترفين والمحررين ذوي الخبرة، الذين يعملون بجد لتقديم أفضل محتوى إخباري لقرائنا الكرام.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mb-6">خدماتنا</h2>
                    <ul class="list-disc list-inside text-gray-700 mb-6 space-y-2">
                        <li><strong>الأخبار المحلية:</strong> تغطية شاملة لأحداث محافظة شبوة</li>
                        <li><strong>الأخبار الوطنية:</strong> متابعة آخر التطورات في اليمن</li>
                        <li><strong>الأخبار الدولية:</strong> تغطية الأحداث العالمية المهمة</li>
                        <li><strong>التحليلات والتقارير:</strong> تحليلات عميقة وتقارير مفصلة</li>
                        <li><strong>الفيديوهات:</strong> محتوى مرئي عالي الجودة</li>
                        <li><strong>النشرات الإخبارية:</strong> تحديثات دورية عبر البريد الإلكتروني</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-800 mb-6">إحصائياتنا</h2>
                    <div class="grid md:grid-cols-3 gap-6 mb-8">
                        <div class="text-center bg-yellow-50 p-6 rounded-lg">
                            <div class="text-3xl font-bold text-yellow-600 mb-2">1000+</div>
                            <div class="text-gray-700">مقال منشور</div>
                        </div>
                        <div class="text-center bg-yellow-50 p-6 rounded-lg">
                            <div class="text-3xl font-bold text-yellow-600 mb-2">50K+</div>
                            <div class="text-gray-700">قارئ شهرياً</div>
                        </div>
                        <div class="text-center bg-yellow-50 p-6 rounded-lg">
                            <div class="text-3xl font-bold text-yellow-600 mb-2">24/7</div>
                            <div class="text-gray-700">تغطية مستمرة</div>
                        </div>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-800 mb-6">التواصل معنا</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        نحن نرحب بتواصلكم وملاحظاتكم. يمكنكم الوصول إلينا عبر:
                    </p>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">معلومات الاتصال</h3>
                                <div class="space-y-2">
                                    <p class="text-gray-700"><i class="bi bi-envelope ml-2"></i> info@shabwah21.com</p>
                                    <p class="text-gray-700"><i class="bi bi-telephone ml-2"></i> +967 123 456 789</p>
                                    <p class="text-gray-700"><i class="bi bi-geo-alt ml-2"></i> محافظة شبوة، اليمن</p>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">ساعات العمل</h3>
                                <div class="space-y-2">
                                    <p class="text-gray-700">الأحد - الخميس: 8:00 ص - 6:00 م</p>
                                    <p class="text-gray-700">الجمعة - السبت: 9:00 ص - 4:00 م</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Last Updated -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-500">
                        آخر تحديث: {{ date('Y-m-d') }}
                    </p>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-8">
                <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg transition-colors">
                    <i class="bi bi-house ml-2"></i>
                    العودة للرئيسية
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 