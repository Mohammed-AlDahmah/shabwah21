<section class="mb-10">
    @if($latestNews->count() > 0)
    <div class="mb-8 text-center">
        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">آخر الأخبار</h2>
        <div class="w-24 h-1 mx-auto rounded bg-yellow-400 mb-2"></div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($latestNews as $news)
            @include('livewire.partials.article-card', ['article' => $news])
        @endforeach
    </div>
    <div id="infinite-scroll-sentinel" class="h-4"></div>
    @endif
</section>
