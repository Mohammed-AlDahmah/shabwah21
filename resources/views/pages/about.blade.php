@php
    use App\Models\AboutPage;
    $about = AboutPage::first();
@endphp
@extends('layouts.app')

@section('title', ($about?->title ?? 'من نحن') . ' - شبوة 21')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-[#fff8e1] to-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="flex justify-center mb-4">
                    <img src="/images/logo.png" alt="شعار شبوة 21" class="h-20 w-20 rounded-full shadow-lg border-4 border-[#C08B2D] bg-white p-2">
                </div>
                <h1 class="text-4xl font-extrabold text-[#B22B2B] mb-2 tracking-tight">{{ $about?->title ?? 'من نحن' }}</h1>
                <div class="w-24 h-1 mx-auto bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] rounded mb-4"></div>
                <p class="text-gray-700 text-lg font-medium">{{ $about?->subtitle }}</p>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="prose prose-lg max-w-none">
                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">رؤيتنا</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">{{ $about?->vision }}</p>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">رسالتنا</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">{{ $about?->mission }}</p>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">قيمنا</h2>
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        @foreach(($about?->values ?? []) as $value)
                        <div class="flex items-start gap-4 bg-[#fff8e1] p-4 rounded-xl shadow-sm">
                            <div class="flex items-center justify-center w-12 h-12 rounded-full {{ $loop->index % 2 == 0 ? 'bg-[#C08B2D]' : 'bg-[#B22B2B]' }} text-white text-2xl">
                                <i class="bi {{ $value['icon'] ?? 'bi-star' }}"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold {{ $loop->index % 2 == 0 ? 'text-[#B22B2B]' : 'text-[#C08B2D]' }} mb-1">{{ $value['title'] ?? '' }}</h3>
                                <p class="text-gray-700">{{ $value['desc'] ?? '' }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">فريق العمل</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">{{ $about?->team }}</p>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">خدماتنا</h2>
                    <ul class="list-disc list-inside text-gray-700 mb-6 space-y-2">
                        @foreach(($about?->services ?? []) as $service)
                        <li>{{ $service }}</li>
                        @endforeach
                    </ul>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">إحصائياتنا</h2>
                    <div class="grid md:grid-cols-3 gap-6 mb-8">
                        @foreach(($about?->stats ?? []) as $stat)
                        <div class="text-center bg-gradient-to-b from-[#fff8e1] to-yellow-100 p-6 rounded-xl shadow">
                            <div class="text-3xl font-extrabold" style="color: {{ $stat['color'] ?? '#C08B2D' }}">{{ $stat['value'] ?? '' }}</div>
                            <div class="text-gray-700">{{ $stat['label'] ?? '' }}</div>
                        </div>
                        @endforeach
                    </div>

                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">التواصل معنا</h2>
                    <div class="bg-[#fff8e1] p-6 rounded-xl shadow flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-[#B22B2B] mb-2">معلومات الاتصال</h3>
                            <div class="space-y-2">
                                <p class="text-gray-700"><i class="bi bi-envelope ml-2"></i> {{ $about?->contact_email }}</p>
                                <p class="text-gray-700"><i class="bi bi-telephone ml-2"></i> {{ $about?->contact_phone }}</p>
                                <p class="text-gray-700"><i class="bi bi-geo-alt ml-2"></i> {{ $about?->contact_address }}</p>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-[#B22B2B] mb-2">ساعات العمل</h3>
                            <div class="space-y-2">
                                <p class="text-gray-700">{{ $about?->work_hours }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Last Updated -->
                <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                    <p class="text-sm text-gray-500">
                        آخر تحديث: {{ $about?->updated_at?->format('Y-m-d') }}
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