<div class="section-skeleton animate-pulse">
    <div class="bg-white rounded-2xl p-6 shadow-lg mb-6">
        <!-- Header Skeleton -->
        <div class="flex items-center justify-between mb-6">
            <div class="space-y-2">
                <div class="h-8 bg-gray-200 rounded w-48"></div>
                <div class="h-4 bg-gray-200 rounded w-64"></div>
            </div>
            <div class="h-10 bg-gray-200 rounded w-32"></div>
        </div>
        
        <!-- Content Skeleton -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @for($i = 0; $i < 6; $i++)
            <div class="bg-gray-50 rounded-xl p-4">
                <div class="aspect-video bg-gray-200 rounded-lg mb-4"></div>
                <div class="space-y-2">
                    <div class="h-4 bg-gray-200 rounded"></div>
                    <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                    <div class="h-3 bg-gray-200 rounded w-1/2"></div>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <div class="h-3 bg-gray-200 rounded w-20"></div>
                    <div class="h-3 bg-gray-200 rounded w-16"></div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<style>
.section-skeleton {
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}
</style> 