<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="w-100" style="max-width: 400px;">
        <div class="bg-white rounded-4 shadow p-4">
            <div class="text-center mb-4">
                <img src="/images/logo.png" alt="شبوة21" class="mb-2" style="height:56px;">
                <h2 class="fw-bold text-primary mb-1">لوحة تحكم شبوة21</h2>
                <p class="text-muted">يرجى تسجيل الدخول للمتابعة</p>
            </div>
            
            @if (session('status'))
                <div class="alert alert-success mb-3">
                    {{ session('status') }}
                </div>
            @endif

            <form wire:submit.prevent="login">
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="email" id="email" wire:model="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           required autofocus>
                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">كلمة المرور</label>
                    <input type="password" id="password" wire:model="password" 
                           class="form-control @error('password') is-invalid @enderror" required>
                    @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" wire:model="remember">
                        <label class="form-check-label" for="remember">تذكرني</label>
                    </div>
                    <a href="#" class="text-decoration-none text-muted small">نسيت كلمة المرور؟</a>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 py-2">
                    <span wire:loading.remove>دخول</span>
                    <span wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        جاري المعالجة...
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>