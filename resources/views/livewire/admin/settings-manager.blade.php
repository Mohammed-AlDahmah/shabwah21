<div class="container py-5">
    <h2 class="text-3xl font-extrabold mb-8 text-[#B22B2B] flex items-center gap-2">
        <i class="bi bi-gear-fill text-2xl"></i>
        إعدادات <span class="text-[#C08B2D]">الموقع</span>
    </h2>

    @if(session()->has('success'))
        <div class="alert alert-success shadow mb-4">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="saveSettings" class="space-y-8">
        <!-- تبويبات الإعدادات -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex flex-wrap gap-2 mb-6">
                <button type="button" class="tab-btn active" data-tab="basic">
                    <i class="bi bi-info-circle"></i> المعلومات الأساسية
                </button>
                <button type="button" class="tab-btn" data-tab="contact">
                    <i class="bi bi-telephone"></i> معلومات التواصل
                </button>
                <button type="button" class="tab-btn" data-tab="social">
                    <i class="bi bi-share"></i> التواصل الاجتماعي
                </button>
                <button type="button" class="tab-btn" data-tab="about">
                    <i class="bi bi-people"></i> من نحن
                </button>
                <button type="button" class="tab-btn" data-tab="content">
                    <i class="bi bi-file-text"></i> المحتوى الإضافي
                </button>
                <button type="button" class="tab-btn" data-tab="display">
                    <i class="bi bi-eye"></i> إعدادات العرض
                </button>
            </div>

            <!-- تبويب المعلومات الأساسية -->
            <div class="tab-content active" id="basic">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">اسم الموقع</label>
                        <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.site_name">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">وصف الموقع</label>
                        <textarea class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.site_description" rows="3"></textarea>
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">الكلمات المفتاحية</label>
                        <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.site_keywords">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">رابط الشعار</label>
                        <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.site_logo">
                    </div>
                </div>
            </div>

            <!-- تبويب معلومات التواصل -->
            <div class="tab-content" id="contact">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">البريد الإلكتروني</label>
                        <input type="email" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.contact_email">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">رقم الهاتف</label>
                        <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.contact_phone">
                    </div>
                    <div class="md:col-span-2">
                        <label class="form-label font-bold text-[#B22B2B]">العنوان</label>
                        <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.contact_address">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">ساعات العمل</label>
                        <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.work_hours">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">رابط الخريطة</label>
                        <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.map_url">
                    </div>
                </div>
            </div>

            <!-- تبويب التواصل الاجتماعي -->
            <div class="tab-content" id="social">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">فيسبوك</label>
                        <input type="url" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.social_facebook">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">تويتر</label>
                        <input type="url" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.social_twitter">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">إنستغرام</label>
                        <input type="url" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.social_instagram">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">يوتيوب</label>
                        <input type="url" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.social_youtube">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">تليجرام</label>
                        <input type="url" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.social_telegram">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">واتساب</label>
                        <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.social_whatsapp">
                    </div>
                </div>
            </div>

            <!-- تبويب من نحن -->
            <div class="tab-content" id="about">
                <div class="space-y-6">
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">عنوان من نحن</label>
                        <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.about_title">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">الوصف المختصر</label>
                        <input type="text" class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.about_subtitle">
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">الرؤية</label>
                        <textarea class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.about_vision" rows="3"></textarea>
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">الرسالة</label>
                        <textarea class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.about_mission" rows="3"></textarea>
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">الوصف التفصيلي</label>
                        <textarea class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.about_description" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <!-- تبويب المحتوى الإضافي -->
            <div class="tab-content" id="content">
                <!-- القيم -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-[#B22B2B]">القيم</h3>
                        <button type="button" class="btn btn-success btn-sm" wire:click="addValue">
                            <i class="bi bi-plus-circle"></i> إضافة قيمة
                        </button>
                    </div>
                    <div class="space-y-4">
                        @foreach($values as $index => $value)
                        <div class="border rounded-lg p-4 bg-gray-50 relative">
                            <button type="button" class="btn btn-danger btn-sm absolute top-2 left-2" wire:click="removeValue({{ $index }})">
                                <i class="bi bi-x"></i>
                            </button>
                            <div class="grid md:grid-cols-3 gap-4 mt-4">
                                <div>
                                    <label class="form-label">العنوان</label>
                                    <input type="text" class="form-control" wire:model.defer="values.{{ $index }}.title">
                                </div>
                                <div>
                                    <label class="form-label">الوصف</label>
                                    <input type="text" class="form-control" wire:model.defer="values.{{ $index }}.description">
                                </div>
                                <div>
                                    <label class="form-label">الأيقونة</label>
                                    <input type="text" class="form-control" wire:model.defer="values.{{ $index }}.icon">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- الخدمات -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-[#B22B2B]">الخدمات</h3>
                        <button type="button" class="btn btn-success btn-sm" wire:click="addService">
                            <i class="bi bi-plus-circle"></i> إضافة خدمة
                        </button>
                    </div>
                    <div class="space-y-4">
                        @foreach($services as $index => $service)
                        <div class="border rounded-lg p-4 bg-gray-50 relative">
                            <button type="button" class="btn btn-danger btn-sm absolute top-2 left-2" wire:click="removeService({{ $index }})">
                                <i class="bi bi-x"></i>
                            </button>
                            <div class="grid md:grid-cols-3 gap-4 mt-4">
                                <div>
                                    <label class="form-label">العنوان</label>
                                    <input type="text" class="form-control" wire:model.defer="services.{{ $index }}.title">
                                </div>
                                <div>
                                    <label class="form-label">الوصف</label>
                                    <input type="text" class="form-control" wire:model.defer="services.{{ $index }}.description">
                                </div>
                                <div>
                                    <label class="form-label">الأيقونة</label>
                                    <input type="text" class="form-control" wire:model.defer="services.{{ $index }}.icon">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- الإحصائيات -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-[#B22B2B]">الإحصائيات</h3>
                        <button type="button" class="btn btn-success btn-sm" wire:click="addStat">
                            <i class="bi bi-plus-circle"></i> إضافة إحصائية
                        </button>
                    </div>
                    <div class="space-y-4">
                        @foreach($stats as $index => $stat)
                        <div class="border rounded-lg p-4 bg-gray-50 relative">
                            <button type="button" class="btn btn-danger btn-sm absolute top-2 left-2" wire:click="removeStat({{ $index }})">
                                <i class="bi bi-x"></i>
                            </button>
                            <div class="grid md:grid-cols-3 gap-4 mt-4">
                                <div>
                                    <label class="form-label">العنوان</label>
                                    <input type="text" class="form-control" wire:model.defer="stats.{{ $index }}.title">
                                </div>
                                <div>
                                    <label class="form-label">القيمة</label>
                                    <input type="text" class="form-control" wire:model.defer="stats.{{ $index }}.value">
                                </div>
                                <div>
                                    <label class="form-label">الأيقونة</label>
                                    <input type="text" class="form-control" wire:model.defer="stats.{{ $index }}.icon">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- الأسئلة الشائعة -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-[#B22B2B]">الأسئلة الشائعة</h3>
                        <button type="button" class="btn btn-success btn-sm" wire:click="addFaq">
                            <i class="bi bi-plus-circle"></i> إضافة سؤال
                        </button>
                    </div>
                    <div class="space-y-4">
                        @foreach($faq as $index => $item)
                        <div class="border rounded-lg p-4 bg-gray-50 relative">
                            <button type="button" class="btn btn-danger btn-sm absolute top-2 left-2" wire:click="removeFaq({{ $index }})">
                                <i class="bi bi-x"></i>
                            </button>
                            <div class="space-y-4 mt-4">
                                <div>
                                    <label class="form-label">السؤال</label>
                                    <input type="text" class="form-control" wire:model.defer="faq.{{ $index }}.question">
                                </div>
                                <div>
                                    <label class="form-label">الإجابة</label>
                                    <textarea class="form-control" wire:model.defer="faq.{{ $index }}.answer" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- تبويب إعدادات العرض -->
            <div class="tab-content" id="display">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">نص التذييل</label>
                        <textarea class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.footer_text" rows="3"></textarea>
                    </div>
                    <div>
                        <label class="form-label font-bold text-[#B22B2B]">كود التحليلات</label>
                        <textarea class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model.defer="form.analytics_code" rows="3"></textarea>
                    </div>
                </div>
                
                <div class="mt-6">
                    <h4 class="text-lg font-bold text-[#B22B2B] mb-4">إعدادات العرض</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <input type="checkbox" class="form-checkbox" wire:model.defer="form.show_hero_section">
                            <label class="ml-2">إظهار قسم البطل</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="form-checkbox" wire:model.defer="form.show_breaking_news">
                            <label class="ml-2">إظهار الأخبار العاجلة</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="form-checkbox" wire:model.defer="form.show_newsletter">
                            <label class="ml-2">إظهار النشرة الإخبارية</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="form-checkbox" wire:model.defer="form.show_video_in_nav">
                            <label class="ml-2">إظهار الفيديو في القائمة</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="form-checkbox" wire:model.defer="form.show_about_in_nav">
                            <label class="ml-2">إظهار من نحن في القائمة</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="form-checkbox" wire:model.defer="form.show_contact_in_nav">
                            <label class="ml-2">إظهار اتصل بنا في القائمة</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="form-checkbox" wire:model.defer="form.show_social_links_in_nav">
                            <label class="ml-2">إظهار روابط التواصل في القائمة</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- زر الحفظ -->
        <div class="text-center">
            <button type="submit" class="btn btn-lg px-8 py-3 rounded-2xl bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white font-bold shadow-lg hover:from-[#B22B2B] hover:to-[#C08B2D] transition-all" wire:loading.attr="disabled">
                <i class="bi bi-save me-2"></i> حفظ جميع الإعدادات
            </button>
        </div>
    </form>


<style>
.tab-btn {
    @apply px-4 py-2 rounded-lg font-semibold transition-all duration-200;
    @apply bg-gray-100 text-gray-600 hover:bg-gray-200;
}

.tab-btn.active {
    @apply bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white;
}

.tab-content {
    @apply hidden;
}

.tab-content.active {
    @apply block;
}
</style>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // إزالة الفئة النشطة من جميع الأزرار
            tabBtns.forEach(b => b.classList.remove('active'));
            // إضافة الفئة النشطة للزر المحدد
            this.classList.add('active');
            
            // إخفاء جميع المحتويات
            tabContents.forEach(content => content.classList.remove('active'));
            // إظهار المحتوى المحدد
            document.getElementById(targetTab).classList.add('active');
        });
    });
});
</script> 