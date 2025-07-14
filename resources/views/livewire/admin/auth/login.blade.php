<div>
    <div style="background:yellow; color:red; padding:10px; text-align:center;">
        DEBUG: This is the login page.
    </div>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
            <div class="flex flex-col items-center mb-6">
                <img src="/images/logo.png" alt="شبوة21" class="h-16 mb-2">
                <h2 class="text-2xl font-bold text-primary mb-1">لوحة تحكم شبوة21</h2>
                <p class="text-gray-500">يرجى تسجيل الدخول للمتابعة</p>
            </div>
            <form wire:submit.prevent="login">
                <div class="mb-4">
                    <label for="email" class="block mb-1 text-gray-700">البريد الإلكتروني</label>
                    <input type="email" id="email" wire:model.defer="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" required autofocus>
                    @error('email') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-1 text-gray-700">كلمة المرور</label>
                    <input type="password" id="password" wire:model.defer="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent" required>
                    @error('password') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex items-center justify-between mb-4">
                    <label class="flex items-center text-sm text-gray-600">
                        <input type="checkbox" wire:model.defer="remember" class="mr-2 rounded border-gray-300">
                        تذكرني
                    </label>
                    <a href="#" class="text-sm text-secondary hover:underline">نسيت كلمة المرور؟</a>
                </div>
                <button type="submit" class="w-full py-2 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition-colors duration-200">دخول</button>
            </form>
        </div>
        <style>
            .text-primary { color: #C08B2D; }
            .bg-primary { background-color: #C08B2D; }
            .text-secondary { color: #B22B2B; }
            .bg-secondary { background-color: #B22B2B; }
        </style>
    </div>
</div>
