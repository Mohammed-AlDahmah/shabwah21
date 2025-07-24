<div class="settings-page-bg min-h-screen bg-gradient-to-br from-[#fff8e1] via-[#f8fafc] to-white py-8">
    <div class="container mx-auto max-w-5xl">
        <div class="bg-white rounded-3xl shadow-2xl p-8 mb-8 border border-[#C08B2D]/10">
            <h2 class="text-4xl font-extrabold mb-8 text-[#B22B2B] flex items-center gap-3">
                <i class="bi bi-gear-fill text-3xl"></i>
                إعدادات <span class="text-[#C08B2D]">الموقع</span>
            </h2>

            @if(session()->has('success'))
                <div class="alert alert-success shadow mb-4">{{ session('success') }}</div>
            @endif

            <form wire:submit.prevent="saveAllSettings" class="space-y-10 relative">
                @if ($errors->any())
                    <div class="input-error mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif
                <!-- التابات المحسنة -->
                <div class="relative mb-10">
                    <div class="flex gap-3 overflow-x-auto no-scrollbar pb-2 border-b-2 border-[#f3e7d1]">
                        <button type="button" class="tab-btn-modern {{ $activeTab === 'general' ? 'active' : '' }}" wire:click="switchTab('general')" title="الإعدادات العامة">
                            <i class="bi bi-info-circle"></i> <span>الإعدادات العامة</span>
                        </button>
                        <button type="button" class="tab-btn-modern {{ $activeTab === 'contact' ? 'active' : '' }}" wire:click="switchTab('contact')" title="معلومات التواصل">
                            <i class="bi bi-telephone"></i> <span>معلومات التواصل</span>
                        </button>
                        <button type="button" class="tab-btn-modern {{ $activeTab === 'social' ? 'active' : '' }}" wire:click="switchTab('social')" title="التواصل الاجتماعي">
                            <i class="bi bi-share"></i> <span>التواصل الاجتماعي</span>
                        </button>
                        <button type="button" class="tab-btn-modern {{ $activeTab === 'about' ? 'active' : '' }}" wire:click="switchTab('about')" title="من نحن">
                            <i class="bi bi-people"></i> <span>من نحن</span>
                        </button>
                        <button type="button" class="tab-btn-modern {{ $activeTab === 'content' ? 'active' : '' }}" wire:click="switchTab('content')" title="المحتوى الإضافي">
                            <i class="bi bi-file-text"></i> <span>المحتوى الإضافي</span>
                        </button>
                        <button type="button" class="tab-btn-modern {{ $activeTab === 'display' ? 'active' : '' }}" wire:click="switchTab('display')" title="إعدادات العرض">
                            <i class="bi bi-eye"></i> <span>إعدادات العرض</span>
                        </button>
                    </div>
                    <!-- خط سفلي متحرك للتاب النشط -->
                    <div class="tab-underline"></div>
                </div>

                <div class="py-2">
                    @if($activeTab === 'general')
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="md:col-span-2">
                                <label class="form-label">اسم الموقع</label>
                                <input type="text" class="form-control w-full" wire:model.defer="general.site_name">
                                @error('general.site_name') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">وصف الموقع</label>
                                <textarea class="form-control w-full min-h-[120px]" wire:model.defer="general.site_description" rows="3"></textarea>
                                @error('general.site_description') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">الكلمات المفتاحية</label>
                                <input type="text" class="form-control w-full" wire:model.defer="general.site_keywords">
                                @error('general.site_keywords') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">رابط الشعار</label>
                                <input type="text" class="form-control w-full" wire:model.defer="general.site_logo">
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">رابط الأيقونة</label>
                                <input type="text" class="form-control w-full" wire:model.defer="general.site_favicon">
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">نص التذييل</label>
                                <textarea class="form-control w-full min-h-[120px]" wire:model.defer="general.footer_text" rows="3"></textarea>
                                @error('general.footer_text') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">كود التحليلات</label>
                                <textarea class="form-control w-full min-h-[120px]" wire:model.defer="general.analytics_code" rows="4" placeholder="ضع كود Google Analytics أو أي كود تحليلات آخر"></textarea>
                                @error('general.analytics_code') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    @elseif($activeTab === 'contact')
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="md:col-span-2">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control w-full" wire:model.defer="contact.contact_email">
                                @error('contact.contact_email') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">رقم الهاتف</label>
                                <input type="text" class="form-control w-full" wire:model.defer="contact.contact_phone">
                                @error('contact.contact_phone') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">العنوان</label>
                                <input type="text" class="form-control w-full" wire:model.defer="contact.contact_address">
                                @error('contact.contact_address') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">ساعات العمل</label>
                                <input type="text" class="form-control w-full" wire:model.defer="contact.work_hours">
                                @error('contact.work_hours') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">رابط الخريطة</label>
                                <input type="text" class="form-control w-full" wire:model.defer="contact.map_url">
                                @error('contact.map_url') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    @elseif($activeTab === 'social')
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="md:col-span-2">
                                <label class="form-label">فيسبوك</label>
                                <input type="url" class="form-control w-full" wire:model.defer="social.social_facebook">
                                @error('social.social_facebook') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">تويتر</label>
                                <input type="url" class="form-control w-full" wire:model.defer="social.social_twitter">
                                @error('social.social_twitter') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">إنستغرام</label>
                                <input type="url" class="form-control w-full" wire:model.defer="social.social_instagram">
                                @error('social.social_instagram') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">يوتيوب</label>
                                <input type="url" class="form-control w-full" wire:model.defer="social.social_youtube">
                                @error('social.social_youtube') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">تليجرام</label>
                                <input type="url" class="form-control w-full" wire:model.defer="social.social_telegram">
                                @error('social.social_telegram') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">واتساب</label>
                                <input type="text" class="form-control w-full" wire:model.defer="social.social_whatsapp">
                                @error('social.social_whatsapp') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    @elseif($activeTab === 'about')
                        <div class="space-y-6">
                            <div>
                                <label class="form-label">عنوان من نحن</label>
                                <input type="text" class="form-control w-full" wire:model.defer="about.about_title">
                                @error('about.about_title') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <label class="form-label">الوصف المختصر</label>
                                <input type="text" class="form-control w-full" wire:model.defer="about.about_subtitle">
                                @error('about.about_subtitle') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <label class="form-label">الرؤية</label>
                                <textarea class="form-control w-full min-h-[120px]" wire:model.defer="about.about_vision" rows="3"></textarea>
                                @error('about.about_vision') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <label class="form-label">الرسالة</label>
                                <textarea class="form-control w-full min-h-[120px]" wire:model.defer="about.about_mission" rows="3"></textarea>
                                @error('about.about_mission') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <label class="form-label">الوصف التفصيلي</label>
                                <textarea class="form-control w-full min-h-[120px]" wire:model.defer="about.about_description" rows="5"></textarea>
                                @error('about.about_description') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    @elseif($activeTab === 'content')
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
                                <div class="border rounded-lg p-4 bg-gray-50 relative shadow-sm">
                                    <button type="button" class="btn btn-danger btn-sm absolute top-2 left-2" wire:click="removeValue({{ $index }})">
                                        <i class="bi bi-x"></i>
                                    </button>
                                    <div class="grid md:grid-cols-3 gap-4 mt-4">
                                        <div class="md:col-span-2">
                                            <label class="form-label">العنوان</label>
                                            <input type="text" class="form-control w-full" wire:model.defer="values.{{ $index }}.title">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="form-label">الوصف</label>
                                            <input type="text" class="form-control w-full" wire:model.defer="values.{{ $index }}.description">
                                        </div>
                                        <div>
                                            <label class="form-label">الأيقونة</label>
                                            <select class="form-control w-full" wire:model.defer="values.{{ $index }}.icon">
                                                <option value="">اختر أيقونة ...</option>
                                                <option value="bi bi-shield-check">درع/مصداقية</option>
                                                <option value="bi bi-lightning">سرعة</option>
                                                <option value="bi bi-eye">شفافية</option>
                                                <option value="bi bi-newspaper">جريدة/أخبار</option>
                                                <option value="bi bi-graph-up">تحليل</option>
                                                <option value="bi bi-geo-alt">موقع</option>
                                                <option value="bi bi-camera-video">فيديو</option>
                                                <option value="bi bi-people">أشخاص</option>
                                                <option value="bi bi-calendar-check">تقويم</option>
                                                <option value="bi bi-person-badge">مراسل</option>
                                            </select>
                                            @if($value['icon'])
                                                <div class="mt-2 text-2xl"><i class="{{ $value['icon'] }}"></i></div>
                                            @endif
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
                                <div class="border rounded-lg p-4 bg-gray-50 relative shadow-sm">
                                    <button type="button" class="btn btn-danger btn-sm absolute top-2 left-2" wire:click="removeService({{ $index }})">
                                        <i class="bi bi-x"></i>
                                    </button>
                                    <div class="grid md:grid-cols-3 gap-4 mt-4">
                                        <div class="md:col-span-2">
                                            <label class="form-label">العنوان</label>
                                            <input type="text" class="form-control w-full" wire:model.defer="services.{{ $index }}.title">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="form-label">الوصف</label>
                                            <input type="text" class="form-control w-full" wire:model.defer="services.{{ $index }}.description">
                                        </div>
                                        <div>
                                            <label class="form-label">الأيقونة</label>
                                            <select class="form-control w-full" wire:model.defer="services.{{ $index }}.icon">
                                                <option value="">اختر أيقونة ...</option>
                                                <option value="bi bi-shield-check">درع/مصداقية</option>
                                                <option value="bi bi-lightning">سرعة</option>
                                                <option value="bi bi-eye">شفافية</option>
                                                <option value="bi bi-newspaper">جريدة/أخبار</option>
                                                <option value="bi bi-graph-up">تحليل</option>
                                                <option value="bi bi-geo-alt">موقع</option>
                                                <option value="bi bi-camera-video">فيديو</option>
                                                <option value="bi bi-people">أشخاص</option>
                                                <option value="bi bi-calendar-check">تقويم</option>
                                                <option value="bi bi-person-badge">مراسل</option>
                                            </select>
                                            @if($service['icon'])
                                                <div class="mt-2 text-2xl"><i class="{{ $service['icon'] }}"></i></div>
                                            @endif
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
                                <div class="border rounded-lg p-4 bg-gray-50 relative shadow-sm">
                                    <button type="button" class="btn btn-danger btn-sm absolute top-2 left-2" wire:click="removeStat({{ $index }})">
                                        <i class="bi bi-x"></i>
                                    </button>
                                    <div class="grid md:grid-cols-3 gap-4 mt-4">
                                        <div class="md:col-span-2">
                                            <label class="form-label">العنوان</label>
                                            <input type="text" class="form-control w-full" wire:model.defer="stats.{{ $index }}.title">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="form-label">القيمة</label>
                                            <input type="text" class="form-control w-full" wire:model.defer="stats.{{ $index }}.value">
                                        </div>
                                        <div>
                                            <label class="form-label">الأيقونة</label>
                                            <select class="form-control w-full" wire:model.defer="stats.{{ $index }}.icon">
                                                <option value="">اختر أيقونة ...</option>
                                                <option value="bi bi-shield-check">درع/مصداقية</option>
                                                <option value="bi bi-lightning">سرعة</option>
                                                <option value="bi bi-eye">شفافية</option>
                                                <option value="bi bi-newspaper">جريدة/أخبار</option>
                                                <option value="bi bi-graph-up">تحليل</option>
                                                <option value="bi bi-geo-alt">موقع</option>
                                                <option value="bi bi-camera-video">فيديو</option>
                                                <option value="bi bi-people">أشخاص</option>
                                                <option value="bi bi-calendar-check">تقويم</option>
                                                <option value="bi bi-person-badge">مراسل</option>
                                            </select>
                                            @if($stat['icon'])
                                                <div class="mt-2 text-2xl"><i class="{{ $stat['icon'] }}"></i></div>
                                            @endif
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
                                <div class="border rounded-lg p-4 bg-gray-50 relative shadow-sm">
                                    <button type="button" class="btn btn-danger btn-sm absolute top-2 left-2" wire:click="removeFaq({{ $index }})">
                                        <i class="bi bi-x"></i>
                                    </button>
                                    <div class="space-y-4 mt-4">
                                        <div class="md:col-span-2">
                                            <label class="form-label">السؤال</label>
                                            <input type="text" class="form-control w-full" wire:model.defer="faq.{{ $index }}.question">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="form-label">الإجابة</label>
                                            <textarea class="form-control w-full min-h-[120px]" wire:model.defer="faq.{{ $index }}.answer" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @elseif($activeTab === 'display')
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="md:col-span-2">
                                <label class="form-label">نص التذييل</label>
                                <textarea class="form-control w-full min-h-[120px]" wire:model.defer="general.footer_text" rows="3"></textarea>
                                @error('general.footer_text') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">كود التحليلات</label>
                                <textarea class="form-control w-full min-h-[120px]" wire:model.defer="general.analytics_code" rows="4" placeholder="ضع كود Google Analytics أو أي كود تحليلات آخر"></textarea>
                                @error('general.analytics_code') <div class="input-error">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mt-6">
                            <h4 class="text-lg font-bold text-[#B22B2B] mb-4">إعدادات العرض</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox" wire:model.defer="display.show_hero_section">
                                    <label class="ml-2">إظهار قسم البطل</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox" wire:model.defer="display.show_breaking_news">
                                    <label class="ml-2">إظهار الأخبار العاجلة</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox" wire:model.defer="display.show_newsletter">
                                    <label class="ml-2">إظهار النشرة الإخبارية</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox" wire:model.defer="display.show_video_in_nav">
                                    <label class="ml-2">إظهار الفيديو في القائمة</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox" wire:model.defer="display.show_about_in_nav">
                                    <label class="ml-2">إظهار من نحن في القائمة</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox" wire:model.defer="display.show_contact_in_nav">
                                    <label class="ml-2">إظهار اتصل بنا في القائمة</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox" wire:model.defer="display.show_social_links_in_nav">
                                    <label class="ml-2">إظهار روابط التواصل في القائمة</label>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- زر الحفظ -->
                <div class="text-center sticky bottom-0 bg-white py-6 rounded-b-3xl shadow-inner z-20">
                    <button type="submit" class="btn btn-lg px-10 py-4 rounded-2xl bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white font-bold shadow-lg hover:from-[#B22B2B] hover:to-[#C08B2D] transition-all" wire:loading.attr="disabled">
                        <i class="bi bi-save me-2"></i> حفظ جميع الإعدادات
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
    .tab-btn-lg {
        @apply px-6 py-3 rounded-xl font-bold text-lg transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200 shadow-sm;
    }
    .tab-btn-lg.active {
        @apply bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white shadow-lg;
        border-bottom: 3px solid #C08B2D;
    }
    /* تحسين التابات الحديثة */
    .tab-btn-modern {
        @apply flex items-center gap-2 px-6 py-3 rounded-xl font-bold text-lg transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-[#f7e6c7] shadow-sm relative;
        min-width: 180px;
        justify-content: center;
        position: relative;
    }
    .tab-btn-modern.active {
        @apply bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white shadow-lg;
        border-bottom: 4px solid #C08B2D;
        z-index: 2;
    }
    .tab-btn-modern span {
        @apply font-bold text-base;
    }
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .tab-underline {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 4px;
        background: linear-gradient(90deg, #C08B2D 0%, #B22B2B 100%);
        opacity: 0.08;
        border-radius: 2px;
        z-index: 1;
    }
    .form-label {
        @apply block text-base font-semibold text-[#B22B2B] mb-2;
    }
    .btn {
        @apply inline-flex items-center px-4 py-2 border border-transparent text-base leading-5 font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-200;
    }
    .btn-lg {
        @apply text-lg px-8 py-3;
    }
    .btn-success {
        @apply bg-green-600 text-white hover:bg-green-700 focus:ring-green-500;
    }
    .btn-danger {
        @apply bg-red-600 text-white hover:bg-red-700 focus:ring-red-500;
    }
    .btn-secondary {
        @apply bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500;
    }
    .form-control {
        @apply w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#C08B2D] focus:border-[#C08B2D];
        font-size: 1.1rem;
    }
    .settings-page-bg {
        min-height: 100vh;
        background: linear-gradient(135deg, #fff8e1 0%, #f8fafc 60%, #fff 100%);
    }
    .min-h-\[120px\] {
        min-height: 120px;
    }
    .input-error {
        @apply text-red-500 text-sm mt-1;
    }
    </style>
 
</div> 