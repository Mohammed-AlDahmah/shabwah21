<div class="d-flex justify-content-between align-items-center">
    <div>
        <h5 class="mb-0">مرحباً، {{ $user?->name ?? 'المسؤول' }}</h5>
    </div>
    <div class="d-flex align-items-center gap-2">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($user?->name ?? 'Admin') }}&background=0D8ABC&color=fff" alt="avatar" class="rounded-circle" width="40" height="40">
        <a href="#" class="btn btn-outline-danger btn-sm ms-2">تسجيل الخروج</a>
    </div>
</div> 