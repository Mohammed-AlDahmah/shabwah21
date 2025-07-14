@extends('layouts.app')

@section('title', 'من نحن')
@section('description', 'تعرف على موقع شبوة21 الإخباري ورسالتنا في تغطية الأخبار')

@section('content')
<div class="bg-gradient-to-br from-red-600 to-red-800 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">من نحن</h1>
        <p class="text-xl text-gray-200">موقع شبوة21 الإخباري</p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">حول شبوة21</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                تأسس موقع شبوة21 ليصبح مصدراً موثوقاً للأخبار والتقارير المحلية والعربية، مع التركيز على الأحداث الجارية في شبوة والمنطقة الجنوبية من اليمن.
            </p>
            
            <div class="bg-gradient-to-r from-red-600 to-red-700 text-white p-6 rounded-lg text-center mb-6">
                <span class="text-white text-4xl font-bold">شبوة21</span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">رؤيتنا</h3>
                    <p class="text-gray-600">
                        نسعى لأن نكون المصدر الأول للأخبار الموثوقة والدقيقة في شبوة والمنطقة، 
                        مع التركيز على الشفافية والمهنية في تغطية الأحداث.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">رسالتنا</h3>
                    <p class="text-gray-600">
                        تقديم أخبار عالية الجودة ومعلومات دقيقة لجمهورنا الكريم، 
                        مع الحفاظ على المصداقية والحيادية في جميع تقاريرنا.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">فريق العمل</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-24 h-24 bg-red-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <span class="text-white text-2xl font-bold">م</span>
                    </div>
                    <h3 class="font-bold text-lg mb-2">فريق التحرير</h3>
                    <p class="text-gray-600 text-sm">محررون محترفون متخصصون في مختلف المجالات</p>
                </div>
                
                <div class="text-center">
                    <div class="w-24 h-24 bg-blue-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <span class="text-white text-2xl font-bold">م</span>
                    </div>
                    <h3 class="font-bold text-lg mb-2">المراسلون</h3>
                    <p class="text-gray-600 text-sm">شبكة من المراسلين المنتشرين في مختلف المناطق</p>
                </div>
                
                <div class="text-center">
                    <div class="w-24 h-24 bg-green-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <span class="text-white text-2xl font-bold">م</span>
                    </div>
                    <h3 class="font-bold text-lg mb-2">فريق التقنية</h3>
                    <p class="text-gray-600 text-sm">مطورون ومصممون لضمان تجربة مستخدم ممتازة</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 