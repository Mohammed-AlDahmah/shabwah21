@extends('layouts.app')

@section('title', 'من نحن - شبوة 21')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-[#fff8e1] to-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="flex justify-center mb-4">
                    <img src="/images/logo.svg" alt="شعار شبوة 21" class="h-20 w-20 rounded-full shadow-lg border-4 border-[#C08B2D] bg-white p-2">
                </div>
                <h1 class="text-4xl font-extrabold text-[#B22B2B] mb-2 tracking-tight">من نحن</h1>
                <div class="w-24 h-1 mx-auto bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] rounded mb-4"></div>
                <p class="text-gray-700 text-lg font-medium">تعرف على فريق شبوة 21 ورؤيتنا ورسالتنا</p>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="prose prose-lg max-w-none">
                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">رؤيتنا</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        نسعى لأن نكون المنصة الإخبارية الأولى والأكثر موثوقية في محافظة شبوة واليمن، نقدم أخباراً دقيقة ومحايدة وموضوعية، ونكون صوتاً للشعب اليمني في نقل الحقائق والأحداث.
                    </p>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">رسالتنا</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        تقديم محتوى إخباري عالي الجودة، محايد وموضوعي، يلبي احتياجات القراء في محافظة شبوة واليمن والعالم العربي. نلتزم بالدقة والشفافية والمسؤولية في نقل الأخبار والمعلومات.
                    </p>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">قيمنا</h2>
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div class="flex items-start gap-4 bg-[#fff8e1] p-4 rounded-xl shadow-sm">
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#C08B2D] text-white text-2xl"><i class="bi bi-shield-check"></i></div>
                            <div>
                                <h3 class="text-lg font-semibold text-[#B22B2B] mb-1">الدقة والموثوقية</h3>
                                <p class="text-gray-700">نحرص على التحقق من صحة المعلومات قبل نشرها</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 bg-[#fff8e1] p-4 rounded-xl shadow-sm">
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#B22B2D] text-white text-2xl"><i class="bi bi-balance-scale"></i></div>
                            <div>
                                <h3 class="text-lg font-semibold text-[#C08B2D] mb-1">الحيادية والموضوعية</h3>
                                <p class="text-gray-700">نقدم الأخبار بموضوعية دون تحيز أو توجيه</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 bg-[#fff8e1] p-4 rounded-xl shadow-sm">
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#C08B2D] text-white text-2xl"><i class="bi bi-eye"></i></div>
                            <div>
                                <h3 class="text-lg font-semibold text-[#B22B2B] mb-1">الشفافية</h3>
                                <p class="text-gray-700">نكون شفافين في مصادرنا وطرق عملنا</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 bg-[#fff8e1] p-4 rounded-xl shadow-sm">
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#B22B2D] text-white text-2xl"><i class="bi bi-people"></i></div>
                            <div>
                                <h3 class="text-lg font-semibold text-[#C08B2D] mb-1">المسؤولية الاجتماعية</h3>
                                <p class="text-gray-700">نخدم المجتمع ونعزز الوعي والمعرفة</p>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">فريق العمل</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        يتكون فريق شبوة 21 من مجموعة من الصحفيين المحترفين والمحررين ذوي الخبرة، الذين يعملون بجد لتقديم أفضل محتوى إخباري لقرائنا الكرام.
                    </p>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">خدماتنا</h2>
                    <ul class="list-disc list-inside text-gray-700 mb-6 space-y-2">
                        <li><strong>الأخبار المحلية:</strong> تغطية شاملة لأحداث محافظة شبوة</li>
                        <li><strong>الأخبار الوطنية:</strong> متابعة آخر التطورات في اليمن</li>
                        <li><strong>الأخبار الدولية:</strong> تغطية الأحداث العالمية المهمة</li>
                        <li><strong>التحليلات والتقارير:</strong> تحليلات عميقة وتقارير مفصلة</li>
                        <li><strong>الفيديوهات:</strong> محتوى مرئي عالي الجودة</li>
                        <li><strong>النشرات الإخبارية:</strong> تحديثات دورية عبر البريد الإلكتروني</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">إحصائياتنا</h2>
                    <div class="grid md:grid-cols-3 gap-6 mb-8">
                        <div class="text-center bg-gradient-to-b from-[#fff8e1] to-yellow-100 p-6 rounded-xl shadow">
                            <div class="text-3xl font-extrabold text-[#C08B2D] mb-2">1000+</div>
                            <div class="text-gray-700">مقال منشور</div>
                        </div>
                        <div class="text-center bg-gradient-to-b from-[#fff8e1] to-yellow-100 p-6 rounded-xl shadow">
                            <div class="text-3xl font-extrabold text-[#B22B2B] mb-2">50K+</div>
                            <div class="text-gray-700">قارئ شهرياً</div>
                        </div>
                        <div class="text-center bg-gradient-to-b from-[#fff8e1] to-yellow-100 p-6 rounded-xl shadow">
                            <div class="text-3xl font-extrabold text-[#C08B2D] mb-2">24/7</div>
                            <div class="text-gray-700">تغطية مستمرة</div>
                        </div>
                    </div>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">التواصل معنا</h2>
                    <div class="bg-[#fff8e1] p-6 rounded-xl shadow flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-[#B22B2B] mb-2">معلومات الاتصال</h3>
                            <div class="space-y-2">
                                <p class="text-gray-700"><i class="bi bi-envelope ml-2"></i> info@shabwah21.com</p>
                                <p class="text-gray-700"><i class="bi bi-telephone ml-2"></i> +967 123 456 789</p>
                                <p class="text-gray-700"><i class="bi bi-geo-alt ml-2"></i> محافظة شبوة، اليمن</p>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-[#B22B2B] mb-2">ساعات العمل</h3>
                            <div class="space-y-2">
                                <p class="text-gray-700">الأحد - الخميس: 8:00 ص - 6:00 م</p>
                                <p class="text-gray-700">الجمعة - السبت: 9:00 ص - 4:00 م</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Last Updated -->
                <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                    <p class="text-sm text-gray-500">
                        آخر تحديث: {{ date('Y-m-d') }}
                    </p>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-8">
                <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] hover:from-[#B22B2B] hover:to-[#C08B2D] text-white font-bold rounded-2xl shadow-lg text-lg transition-all">
                    <i class="bi bi-house ml-2"></i>
                    العودة للرئيسية
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 