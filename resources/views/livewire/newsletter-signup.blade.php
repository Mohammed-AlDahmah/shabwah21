<div class="newsletter-signup">
    @if($isSubscribed)
        <div class="text-center">
            <i class="bi bi-check-circle text-4xl text-green-300 mb-3"></i>
            <p class="font-semibold">{{ $message }}</p>
        </div>
    @else
        <form wire:submit.prevent="subscribe" class="max-w-md mx-auto flex gap-4">
            <input type="email" 
                   wire:model="email" 
                   placeholder="أدخل بريدك الإلكتروني" 
                   class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white bg-white">
            <button type="submit" class="bg-white text-[#B22B2B] px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                اشتراك
            </button>
        </form>
        @error('email')
            <p class="text-red-300 text-sm mt-2">{{ $message }}</p>
        @enderror
    @endif
</div>