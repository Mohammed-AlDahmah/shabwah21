@php
    use App\Models\ContactPage;
    $contact = ContactPage::first();
@endphp
@extends('layouts.app')

@section('title', ($contact?->title ?? 'اتصل بنا') . ' - شبوة 21')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-[#fff8e1] to-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="flex justify-center mb-4">
                    <div class="h-20 w-20 rounded-full shadow-lg border-4 border-[#B22B2B] bg-white flex items-center justify-center">
                        <i class="bi bi-envelope-paper text-4xl text-[#B22B2B]"></i>
                    </div>
                </div>
                <h1 class="text-4xl font-extrabold text-[#B22B2B] mb-2 tracking-tight">{{ $contact?->title ?? 'اتصل بنا' }}</h1>
                <div class="w-24 h-1 mx-auto bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] rounded mb-4"></div>
                <p class="text-gray-700 text-lg font-medium">{{ $contact?->subtitle }}</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">أرسل لنا رسالة</h2>
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم الكامل</label>
                                <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
                                <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">الموضوع</label>
                            <select id="subject" name="subject" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent">
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
                            <textarea id="message" name="message" rows="6" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C08B2D] focus:border-transparent" placeholder="اكتب رسالتك هنا..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] hover:from-[#B22B2B] hover:to-[#C08B2D] text-white font-bold py-3 px-6 rounded-2xl shadow-lg text-lg transition-all">
                            <i class="bi bi-send ml-2"></i>
                            إرسال الرسالة
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-6">
                    <!-- Contact Info -->
                    <div class="bg-[#fff8e1] rounded-2xl shadow-xl p-8">
                        <h2 class="text-2xl font-bold text-[#B22B2B] mb-6">معلومات الاتصال</h2>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-[#C08B2D] rounded-full flex items-center justify-center ml-4">
                                    <i class="bi bi-envelope text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-[#B22B2B]">البريد الإلكتروني</h3>
                                    <p class="text-gray-700">{{ $contact?->contact_info['email'] ?? '' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-[#B22B2B] rounded-full flex items-center justify-center ml-4">
                                    <i class="bi bi-telephone text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-[#C08B2D]">الهاتف</h3>
                                    <p class="text-gray-700">{{ $contact?->contact_info['phone'] ?? '' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-[#C08B2D] rounded-full flex items-center justify-center ml-4">
                                    <i class="bi bi-geo-alt text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-[#B22B2B]">العنوان</h3>
                                    <p class="text-gray-700">{{ $contact?->contact_info['address'] ?? '' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-[#B22B2B] rounded-full flex items-center justify-center ml-4">
                                    <i class="bi bi-clock text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-[#C08B2D]">ساعات العمل</h3>
                                    @if(isset($contact->contact_info['work_hours']) && is_array($contact->contact_info['work_hours']))
                                        @foreach($contact->contact_info['work_hours'] as $wh)
                                            <p class="text-gray-700">{{ $wh }}</p>
                                        @endforeach
                                    @else
                                        <p class="text-gray-700">{{ $contact?->contact_info['work_hours'] ?? '' }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h2 class="text-2xl font-bold text-[#C08B2D] mb-6">تابعنا على وسائل التواصل</h2>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach(($contact?->social_links ?? []) as $link)
                            <a href="{{ $link['url'] ?? '#' }}" class="flex items-center p-4 {{ $link['color'] ?? 'bg-blue-600' }} hover:opacity-90 text-white rounded-lg transition-colors">
                                <i class="bi {{ $link['icon'] ?? 'bi-link' }} text-xl ml-3"></i>
                                <span>{{ $link['label'] ?? '' }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- FAQ -->
                    <div class="bg-[#fff8e1] rounded-2xl shadow-xl p-8">
                        <h2 class="text-2xl font-bold text-[#B22B2B] mb-6">الأسئلة الشائعة</h2>
                        <div class="space-y-4">
                            @foreach(($contact?->faq ?? []) as $item)
                            <div class="border-b border-gray-200 pb-4">
                                <h3 class="font-semibold text-[#C08B2D] mb-2">{{ $item['q'] ?? '' }}</h3>
                                <p class="text-gray-700 text-sm">{{ $item['a'] ?? '' }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-12">
                <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] hover:from-[#B22B2B] hover:to-[#C08B2D] text-white font-bold rounded-2xl shadow-lg text-lg transition-all">
                    <i class="bi bi-house ml-2"></i>
                    العودة للرئيسية
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 