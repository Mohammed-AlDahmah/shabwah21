<div class="container py-5">
    <h2 class="text-3xl font-extrabold mb-8 text-[#B22B2B] flex items-center gap-2">
        <i class="bi bi-telephone-fill text-2xl"></i>
        إدارة صفحة <span class="text-[#C08B2D]">اتصل بنا</span>
    </h2>
    @if(session()->has('success'))
        <div class="alert alert-success shadow mb-4">{{ session('success') }}</div>
    @endif
    @if($contact)
    <form wire:submit.prevent="save" class="space-y-8">
        <!-- العنوان والوصف -->
        <div class="rounded-2xl shadow-lg bg-gradient-to-br from-[#fff8e1] to-white p-6 border border-[#C08B2D]/20">
            <div class="mb-4">
                <label class="form-label font-bold text-[#B22B2B]">العنوان الرئيسي</label>
                <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="contact.title">
            </div>
            <div>
                <label class="form-label font-bold text-[#B22B2B]">الوصف المختصر</label>
                <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="contact.subtitle">
            </div>
        </div>
        <!-- معلومات التواصل -->
        <div class="rounded-2xl shadow-lg bg-white p-6 border border-[#C08B2D]/10">
            <div class="row g-2">
                <div class="col-md-6 mb-2">
                    <label class="form-label font-bold text-[#C08B2D]">البريد الإلكتروني</label>
                    <input type="email" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="contact.email">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label font-bold text-[#C08B2D]">رقم الهاتف</label>
                    <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="contact.phone">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label font-bold text-[#C08B2D]">العنوان</label>
                    <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="contact.address">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label font-bold text-[#C08B2D]">ساعات العمل</label>
                    <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="contact.work_hours">
                </div>
            </div>
        </div>
        <!-- روابط التواصل الاجتماعي -->
        <div class="rounded-2xl shadow-lg bg-gradient-to-br from-[#fff8e1] to-white p-6 border border-[#C08B2D]/20">
            <div class="flex justify-between items-center mb-4">
                <label class="form-label font-bold text-[#B22B2B] text-lg mb-0 flex items-center gap-2"><i class="bi bi-share"></i> روابط التواصل الاجتماعي</label>
                <button type="button" class="btn btn-success rounded-lg px-4 py-1" wire:click.prevent="$set('social_links', array_merge($social_links, [['icon'=>'','url'=>'']]))"><i class="bi bi-plus-circle"></i> إضافة رابط</button>
            </div>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach($social_links as $i => $social)
                <div class="border rounded-xl p-3 bg-white flex flex-col gap-2 relative shadow-sm">
                    <button type="button" class="btn btn-danger btn-sm absolute top-2 left-2" title="حذف" wire:click.prevent="set('social_links', array_values(array_filter($social_links, function($v, $k) use($i) { return $k !== $i; }, ARRAY_FILTER_USE_BOTH)))"><i class="bi bi-x"></i></button>
                    <div>
                        <label class="form-label">الأيقونة</label>
                        <input type="text" class="form-control" wire:model.defer="social_links.{{$i}}.icon" placeholder="مثال: bi-facebook">
                    </div>
                    <div>
                        <label class="form-label">الرابط</label>
                        <input type="text" class="form-control" wire:model.defer="social_links.{{$i}}.url" placeholder="https://">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- خريطة الموقع -->
        <div class="rounded-2xl shadow-lg bg-white p-6 border border-[#C08B2D]/10">
            <label class="form-label font-bold text-[#B22B2B] text-lg mb-2 flex items-center gap-2"><i class="bi bi-geo-alt"></i> خريطة الموقع (رابط Google Maps)</label>
            <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="contact.map_url" placeholder="https://maps.google.com/...">
        </div>
        <div class="text-center mt-6">
            <button type="submit" class="btn btn-lg px-6 py-2 rounded-2xl bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white font-bold shadow-lg hover:from-[#B22B2B] hover:to-[#C08B2D] transition-all">
                <i class="bi bi-save me-2"></i> حفظ التعديلات
            </button>
        </div>
    </form>
    @else
        <div class="alert alert-warning">لا يوجد بيانات لصفحة اتصل بنا.</div>
    @endif
</div>

</div>
