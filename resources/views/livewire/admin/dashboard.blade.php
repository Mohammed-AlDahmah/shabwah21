@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark text-white p-0 d-flex flex-column" style="min-width:220px;">
            @livewire('admin.sidebar')
        </div>
        <!-- Main Content -->
        <div class="col-md-10 p-0 d-flex flex-column">
            <!-- Header -->
            <div class="bg-white shadow-sm p-3 mb-3">
                @livewire('admin.header')
            </div>
            <!-- Notifications -->
            <div class="px-4">
                @livewire('admin.notifications')
            </div>
            <!-- Main Dashboard Content -->
            <main class="flex-fill px-4">
                @livewire('admin.dashboard-stats')
                <!-- Welcome Card -->
                <div class="card my-4 shadow-sm border-0">
                    <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-2">مرحباً بك في لوحة التحكم!</h5>
                            <p class="mb-0 text-muted">يمكنك من هنا إدارة جميع محتوى الموقع من مقالات وفيديوهات وتصنيفات ومستخدمين بسهولة واحترافية.</p>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <a href="#" class="btn btn-primary me-2"><i class="bi bi-plus-circle me-1"></i> إضافة خبر جديد</a>
                            <a href="#" class="btn btn-outline-secondary"><i class="bi bi-gear me-1"></i> إعدادات الموقع</a>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    @yield('dashboard-content')
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
