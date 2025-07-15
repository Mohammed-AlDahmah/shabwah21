@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')
<div class="bg-slate-50 text-slate-800">

    <!-- Hero Section -->
    <section class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                <div class="lg:col-span-2">
                    @livewire('featured-news-hero')
                </div>
                <div class="space-y-6">
                    <h2 class="text-2xl font-bold text-slate-700 border-b-2 border-blue-600 pb-2">أبرز العناوين</h2>
                    @livewire('featured-news', ['limit' => 4])
                </div>
            </div>
        </div>
    </section>

    <!-- Breaking News Ticker -->
    <section class="bg-slate-800 text-white py-3">
        <div class="container mx-auto px-4">
            @livewire('breaking-news')
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">

            <!-- Main Content Area -->
            <div class="lg:col-span-3 space-y-12">

                <!-- Latest News Section -->
                <section id="latest-news">
                    <div class="flex justify-between items-center mb-6 border-b border-slate-200 pb-4">
                        <h2 class="text-3xl font-bold text-slate-800">آخر الأخبار</h2>
                        <a href="/news" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors flex items-center gap-2">
                            عرض الكل <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                    @livewire('latest-news-grid', ['limit' => 6])
                </section>

                <!-- Video & Articles Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Video Section -->
                    <section id="videos">
                        <div class="flex justify-between items-center mb-6 border-b border-slate-200 pb-4">
                            <h2 class="text-3xl font-bold text-slate-800">مرئيات</h2>
                            <a href="/videos" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors flex items-center gap-2">
                                كل الفيديوهات <i class="bi bi-arrow-left"></i>
                            </a>
                        </div>
                        @livewire('video-section', ['limit' => 3])
                    </section>

                    <!-- Articles Section -->
                    <section id="articles">
                        <div class="flex justify-between items-center mb-6 border-b border-slate-200 pb-4">
                            <h2 class="text-3xl font-bold text-slate-800">مقالات وتقارير</h2>
                            <a href="/articles" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors flex items-center gap-2">
                                كل المقالات <i class="bi bi-arrow-left"></i>
                            </a>
                        </div>
                        @livewire('articles-section', ['limit' => 3])
                    </section>
                </div>

            </div>

            <!-- Sidebar -->
            <aside class="space-y-8">
                <!-- Most Read Articles -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-xl font-bold text-slate-800 mb-4 border-b pb-3">الأكثر قراءة</h3>
                    <div class="space-y-4">
                        @livewire('most-read-articles', ['limit' => 5])
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-xl font-bold text-slate-800 mb-4 border-b pb-3">الأقسام</h3>
                    @livewire('category-cards', ['limit' => 6])
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-xl font-bold text-slate-800 mb-4 border-b pb-3">تابعنا</h3>
                    <div class="flex justify-around">
                        <a href="#" class="text-2xl text-slate-500 hover:text-blue-600 transition-colors"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-2xl text-slate-500 hover:text-sky-500 transition-colors"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-2xl text-slate-500 hover:text-red-600 transition-colors"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="text-2xl text-slate-500 hover:text-sky-600 transition-colors"><i class="bi bi-telegram"></i></a>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="bg-blue-600 text-white rounded-lg shadow-lg p-6 text-center">
                    <i class="bi bi-envelope-paper-heart text-4xl mb-3"></i>
                    <h3 class="text-xl font-bold mb-2">النشرة البريدية</h3>
                    <p class="text-blue-100 mb-4 text-sm">اشترك لتصلك آخر الأخبار مباشرة.</p>
                    <form class="flex">
                        <input type="email" placeholder="بريدك الإلكتروني" class="w-full px-4 py-2 rounded-s-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        <button class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded-e-lg font-semibold transition-colors">
                            <i class="bi bi-send"></i>
                        </button>
                    </form>
                </div>
            </aside>

        </div>
    </div>

</div>
@endsection

@push('styles')
<style>
    /* You can add any additional specific styles here if needed */
    .news-card-small a:hover h4 {
        color: #2563eb; /* blue-600 */
    }
</style>
@endpush
