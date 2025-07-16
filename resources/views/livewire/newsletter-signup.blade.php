<div class="bg-gradient-to-r from-red-600 to-red-700 text-white py-12">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">اشترك في النشرة الإخبارية</h2>
        <p class="text-red-100 mb-8 text-lg">احصل على آخر الأخبار والتحديثات مباشرة في بريدك الإلكتروني</p>
        
        @if($isSubscribed)
            <div class="text-center">
                <i class="bi bi-check-circle text-4xl text-green-300 mb-3"></i>
                <p class="text-green-100 font-semibold">{{ $message }}</p>
            </div>
        @else
            <form wire:submit.prevent="subscribe" class="max-w-md mx-auto flex gap-4">
                <input type="email" 
                       wire:model="email" 
                       placeholder="أدخل بريدك الإلكتروني" 
                       class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                <button type="submit" class="bg-white text-red-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    اشتراك
                </button>
            </form>
            @error('email')
                <p class="text-red-300 text-sm mt-2">{{ $message }}</p>
            @enderror
        @endif
    </div>
</div>