<div class="container py-5">
    <h2 class="text-2xl font-bold mb-6 text-[#B22B2B]">إدارة صفحة اتصل بنا</h2>
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($contact)
    <form wire:submit.prevent="save" class="space-y-6">
        <!-- العنوان والوصف -->
        <div class="card p-4 mb-4">
            <div class="mb-3">
                <label class="form-label">العنوان الرئيسي</label>
                <input type="text" class="form-control" wire:model.defer="contact.title">
            </div>
            <div class="mb-3">
                <label class="form-label">الوصف المختصر</label>
                <input type="text" class="form-control" wire:model.defer="contact.subtitle">
            </div>
        </div>
        <!-- معلومات التواصل -->
        <div class="card p-4 mb-4">
            <div class="row g-2">
                <div class="col-md-6 mb-2">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input type="email" class="form-control" wire:model.defer="contact_info.email">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">رقم الهاتف</label>
                    <input type="text" class="form-control" wire:model.defer="contact_info.phone">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">العنوان</label>
                    <input type="text" class="form-control" wire:model.defer="contact_info.address">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">ساعات العمل</label>
                    <input type="text" class="form-control" wire:model.defer="contact_info.work_hours.0" placeholder="الأحد - الخميس: 8:00 ص - 6:00 م">
                    <input type="text" class="form-control mt-2" wire:model.defer="contact_info.work_hours.1" placeholder="الجمعة - السبت: 9:00 ص - 4:00 م">
                </div>
            </div>
        </div>
        <!-- روابط التواصل الاجتماعي -->
        <div class="card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <label class="form-label mb-0">روابط التواصل الاجتماعي</label>
                <button type="button" class="btn btn-sm btn-success" wire:click.prevent="$set('social_links', array_merge($social_links, [['icon'=>'','label'=>'','url'=>'','color'=>'']]))">إضافة رابط</button>
            </div>
            <div class="row g-2">
                @foreach($social_links as $i => $link)
                <div class="col-md-6 mb-2 border rounded p-2 bg-light">
                    <div class="mb-1">
                        <label class="form-label">الأيقونة</label>
                        <input type="text" class="form-control" wire:model.defer="social_links.{{$i}}.icon" placeholder="مثال: bi-facebook">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">الاسم</label>
                        <input type="text" class="form-control" wire:model.defer="social_links.{{$i}}.label">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">الرابط</label>
                        <input type="text" class="form-control" wire:model.defer="social_links.{{$i}}.url">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">لون الخلفية (Tailwind/Bootstrap)</label>
                        <input type="text" class="form-control" wire:model.defer="social_links.{{$i}}.color" placeholder="bg-blue-600">
                    </div>
                    <button type="button" class="btn btn-danger btn-sm mt-1" wire:click.prevent="set('social_links', array_values(array_filter($social_links, function($v, $k) use($i) { return $k !== $i; }, ARRAY_FILTER_USE_BOTH)))">حذف</button>
                </div>
                @endforeach
            </div>
        </div>
        <!-- الأسئلة الشائعة -->
        <div class="card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <label class="form-label mb-0">الأسئلة الشائعة</label>
                <button type="button" class="btn btn-sm btn-success" wire:click.prevent="$set('faq', array_merge($faq, [['q'=>'','a'=>'']]))">إضافة سؤال</button>
            </div>
            <div class="row g-2">
                @foreach($faq as $i => $item)
                <div class="col-md-6 mb-2 border rounded p-2 bg-light">
                    <div class="mb-1">
                        <label class="form-label">السؤال</label>
                        <input type="text" class="form-control" wire:model.defer="faq.{{$i}}.q">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">الإجابة</label>
                        <textarea class="form-control" rows="2" wire:model.defer="faq.{{$i}}.a"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm mt-1" wire:click.prevent="set('faq', array_values(array_filter($faq, function($v, $k) use($i) { return $k !== $i; }, ARRAY_FILTER_USE_BOTH)))">حذف</button>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 py-2">حفظ التعديلات</button>
        </div>
    </form>
    @else
        <div class="alert alert-warning">لا يوجد بيانات لصفحة اتصل بنا.</div>
    @endif
</div>
