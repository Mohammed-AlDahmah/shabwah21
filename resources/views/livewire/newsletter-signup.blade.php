@if($isSubscribed)
    <div class="text-center">
        <i class="bi bi-check-circle text-4xl text-green-300 mb-3"></i>
        <p class="text-green-100 font-semibold">{{ $message }}</p>
    </div>
@else
    <form wire:submit.prevent="subscribe">
        <div class="mb-4">
            <input type="email" 
                   wire:model="email" 
                   placeholder="أدخل بريدك الإلكتروني"
                   class="w-full px-4 py-2 rounded-md border border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800">
            @error('email')
                <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <button type="submit" 
                class="w-full bg-white text-blue-600 py-2 px-4 rounded-md hover:bg-blue-50 transition-colors font-semibold">
            <i class="bi bi-envelope-at"></i>
            اشترك الآن
        </button>
    </form>
@endif