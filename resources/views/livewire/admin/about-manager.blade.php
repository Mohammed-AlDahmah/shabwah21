<div class="container py-5">
    <h2 class="text-2xl font-bold mb-6 text-[#B22B2B]">إدارة صفحة من نحن</h2>
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($about)
    <form wire:submit.prevent="save" class="space-y-6">
        <!-- العنوان والوصف -->
        <div class="card p-4 mb-4">
            <div class="mb-3">
                <label class="form-label">العنوان الرئيسي</label>
                <input type="text" class="form-control" wire:model.defer="about.title">
            </div>
            <div class="mb-3">
                <label class="form-label">الوصف المختصر</label>
                <input type="text" class="form-control" wire:model.defer="about.subtitle">
            </div>
        </div>
        <!-- الرؤية والرسالة -->
        <div class="card p-4 mb-4">
            <div class="mb-3">
                <label class="form-label">الرؤية</label>
                <textarea class="form-control" rows="2" wire:model.defer="about.vision"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">الرسالة</label>
                <textarea class="form-control" rows="2" wire:model.defer="about.mission"></textarea>
            </div>
        </div>
        <!-- القيم -->
        <div class="card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <label class="form-label mb-0">القيم</label>
                <button type="button" class="btn btn-sm btn-success" wire:click.prevent="$set('values', array_merge($values, [['icon'=>'','title'=>'','desc'=>'']]))">إضافة قيمة</button>
            </div>
            <div class="row g-2">
                @foreach($values as $i => $value)
                <div class="col-md-6 mb-2 border rounded p-2 bg-light">
                    <div class="mb-1">
                        <label class="form-label">الأيقونة</label>
                        <input type="text" class="form-control" wire:model.defer="values.{{$i}}.icon" placeholder="مثال: bi-shield-check">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">العنوان</label>
                        <input type="text" class="form-control" wire:model.defer="values.{{$i}}.title">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">الوصف</label>
                        <input type="text" class="form-control" wire:model.defer="values.{{$i}}.desc">
                    </div>
                    <button type="button" class="btn btn-danger btn-sm mt-1" wire:click.prevent="set('values', array_values(array_filter($values, function($v, $k) use($i) { return $k !== $i; }, ARRAY_FILTER_USE_BOTH)))">حذف</button>
                </div>
                @endforeach
            </div>
        </div>
        <!-- الخدمات -->
        <div class="card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <label class="form-label mb-0">الخدمات</label>
                <button type="button" class="btn btn-sm btn-success" wire:click.prevent="$set('services', array_merge($services, ['']))">إضافة خدمة</button>
            </div>
            <div class="row g-2">
                @foreach($services as $i => $service)
                <div class="col-md-6 mb-2 d-flex align-items-center">
                    <input type="text" class="form-control me-2" wire:model.defer="services.{{$i}}">
                    <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="set('services', array_values(array_filter($services, function($v, $k) use($i) { return $k !== $i; }, ARRAY_FILTER_USE_BOTH)))">حذف</button>
                </div>
                @endforeach
            </div>
        </div>
        <!-- الإحصائيات -->
        <div class="card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <label class="form-label mb-0">الإحصائيات</label>
                <button type="button" class="btn btn-sm btn-success" wire:click.prevent="$set('stats', array_merge($stats, [['label'=>'','value'=>'','color'=>'']]))">إضافة إحصائية</button>
            </div>
            <div class="row g-2">
                @foreach($stats as $i => $stat)
                <div class="col-md-4 mb-2 border rounded p-2 bg-light">
                    <div class="mb-1">
                        <label class="form-label">العنوان</label>
                        <input type="text" class="form-control" wire:model.defer="stats.{{$i}}.label">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">القيمة</label>
                        <input type="text" class="form-control" wire:model.defer="stats.{{$i}}.value">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">اللون (hex)</label>
                        <input type="text" class="form-control" wire:model.defer="stats.{{$i}}.color" placeholder="#C08B2D">
                    </div>
                    <button type="button" class="btn btn-danger btn-sm mt-1" wire:click.prevent="set('stats', array_values(array_filter($stats, function($v, $k) use($i) { return $k !== $i; }, ARRAY_FILTER_USE_BOTH)))">حذف</button>
                </div>
                @endforeach
            </div>
        </div>
        <!-- فريق العمل -->
        <div class="card p-4 mb-4">
            <label class="form-label">فريق العمل</label>
            <textarea class="form-control" rows="2" wire:model.defer="about.team"></textarea>
        </div>
        <!-- معلومات التواصل -->
        <div class="card p-4 mb-4">
            <div class="row g-2">
                <div class="col-md-6 mb-2">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input type="email" class="form-control" wire:model.defer="about.contact_email">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">رقم الهاتف</label>
                    <input type="text" class="form-control" wire:model.defer="about.contact_phone">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">العنوان</label>
                    <input type="text" class="form-control" wire:model.defer="about.contact_address">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">ساعات العمل</label>
                    <input type="text" class="form-control" wire:model.defer="about.work_hours">
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 py-2">حفظ التعديلات</button>
        </div>
    </form>
    @else
        <div class="alert alert-warning">لا يوجد بيانات لصفحة من نحن.</div>
    @endif
</div>
