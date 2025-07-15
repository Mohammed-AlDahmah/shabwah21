@extends('layouts.admin')

@section('page-title', 'إضافة مقال جديد')
@section('breadcrumb', 'المقالات / إضافة جديد')

@section('content')
<div>
    <form class="space-y-6">
        <!-- معلومات أساسية -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">المعلومات الأساسية</h3>
                <div class="card-actions">
                    <button type="button" class="btn-admin btn-admin-outline">
                        <i class="bi bi-eye ml-2"></i>
                        معاينة
                    </button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="form-label">عنوان المقال <span class="text-red-500">*</span></label>
                    <input type="text" class="form-input" placeholder="أدخل عنوان المقال" required>
                    <div class="text-xs text-gray-500 mt-1">يجب أن يكون العنوان واضحاً ومختصراً</div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">التصنيف <span class="text-red-500">*</span></label>
                    <select class="form-select" required>
                        <option value="">اختر التصنيف</option>
                        <option value="local">الأخبار المحلية</option>
                        <option value="sports">الرياضة</option>
                        <option value="tech">التقنية</option>
                        <option value="culture">الثقافة</option>
                        <option value="economy">الاقتصاد</option>
                        <option value="politics">السياسة</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">الكاتب</label>
                    <select class="form-select">
                        <option value="">اختر الكاتب</option>
                        <option value="1">أحمد محمد</option>
                        <option value="2">فاطمة أحمد</option>
                        <option value="3">محمد علي</option>
                        <option value="4">علي حسن</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">تاريخ النشر</label>
                    <input type="datetime-local" class="form-input">
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label">ملخص المقال</label>
                <textarea class="form-textarea" rows="3" placeholder="أدخل ملخص مختصر للمقال"></textarea>
                <div class="text-xs text-gray-500 mt-1">سيظهر هذا الملخص في صفحة البحث وفي وسائل التواصل الاجتماعي</div>
            </div>
        </div>

        <!-- محتوى المقال -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">محتوى المقال</h3>
                <div class="card-actions">
                    <button type="button" class="btn-admin btn-admin-outline">
                        <i class="bi bi-type ml-2"></i>
                        محرر النصوص
                    </button>
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label">المحتوى <span class="text-red-500">*</span></label>
                <div class="border border-gray-300 rounded-lg">
                    <!-- شريط أدوات المحرر -->
                    <div class="bg-gray-50 p-3 border-b border-gray-300">
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <button type="button" class="btn-admin btn-admin-outline text-xs px-2 py-1">
                                <i class="bi bi-type-bold"></i>
                            </button>
                            <button type="button" class="btn-admin btn-admin-outline text-xs px-2 py-1">
                                <i class="bi bi-type-italic"></i>
                            </button>
                            <button type="button" class="btn-admin btn-admin-outline text-xs px-2 py-1">
                                <i class="bi bi-type-underline"></i>
                            </button>
                            <div class="w-px h-6 bg-gray-300"></div>
                            <button type="button" class="btn-admin btn-admin-outline text-xs px-2 py-1">
                                <i class="bi bi-list-ul"></i>
                            </button>
                            <button type="button" class="btn-admin btn-admin-outline text-xs px-2 py-1">
                                <i class="bi bi-list-ol"></i>
                            </button>
                            <div class="w-px h-6 bg-gray-300"></div>
                            <button type="button" class="btn-admin btn-admin-outline text-xs px-2 py-1">
                                <i class="bi bi-link-45deg"></i>
                            </button>
                            <button type="button" class="btn-admin btn-admin-outline text-xs px-2 py-1">
                                <i class="bi bi-image"></i>
                            </button>
                            <button type="button" class="btn-admin btn-admin-outline text-xs px-2 py-1">
                                <i class="bi bi-play-circle"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- منطقة النص -->
                    <textarea class="w-full p-4 border-0 focus:outline-none focus:ring-0 resize-none" rows="15" placeholder="اكتب محتوى المقال هنا..."></textarea>
                </div>
                <div class="text-xs text-gray-500 mt-1">يمكنك استخدام أدوات التنسيق أعلاه لتنسيق النص</div>
            </div>
        </div>

        <!-- الصور والوسائط -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">الصور والوسائط</h3>
                <div class="card-actions">
                    <button type="button" class="btn-admin btn-admin-primary">
                        <i class="bi bi-upload ml-2"></i>
                        رفع ملفات
                    </button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="form-label">الصورة الرئيسية</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-primary transition-colors duration-300">
                        <i class="bi bi-image text-4xl text-gray-400 mb-4"></i>
                        <p class="text-gray-600 mb-2">اسحب الصورة هنا أو انقر للاختيار</p>
                        <p class="text-xs text-gray-500">JPG, PNG, GIF حتى 5MB</p>
                        <input type="file" class="hidden" accept="image/*">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">معرض الصور</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-primary transition-colors duration-300">
                        <i class="bi bi-images text-4xl text-gray-400 mb-4"></i>
                        <p class="text-gray-600 mb-2">اسحب الصور هنا أو انقر للاختيار</p>
                        <p class="text-xs text-gray-500">يمكنك رفع عدة صور</p>
                        <input type="file" class="hidden" accept="image/*" multiple>
                    </div>
                </div>
            </div>
            
            <!-- الصور المرفوعة -->
            <div class="mt-6">
                <h4 class="text-lg font-medium mb-4">الصور المرفوعة</h4>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <div class="relative group">
                        <img src="https://via.placeholder.com/150x100" alt="صورة" class="w-full h-24 object-cover rounded-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                            <div class="flex space-x-2 space-x-reverse">
                                <button class="bg-white text-gray-800 p-1 rounded" title="تعديل">
                                    <i class="bi bi-pencil text-xs"></i>
                                </button>
                                <button class="bg-red-500 text-white p-1 rounded" title="حذف">
                                    <i class="bi bi-trash text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- إعدادات متقدمة -->
        <div class="content-card">
            <div class="card-header-admin">
                <h3 class="card-title">الإعدادات المتقدمة</h3>
                <div class="card-actions">
                    <button type="button" class="btn-admin btn-admin-outline" onclick="toggleAdvancedSettings()">
                        <i class="bi bi-gear ml-2"></i>
                        إعدادات إضافية
                    </button>
                </div>
            </div>
            
            <div id="advanced-settings" class="hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-group">
                        <label class="form-label">الكلمات المفتاحية</label>
                        <input type="text" class="form-input" placeholder="أدخل الكلمات المفتاحية مفصولة بفواصل">
                        <div class="text-xs text-gray-500 mt-1">تساعد في تحسين محركات البحث</div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">الوصف للـ SEO</label>
                        <textarea class="form-textarea" rows="3" placeholder="وصف مختصر للمقال لتحسين محركات البحث"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">رابط مخصص</label>
                        <input type="text" class="form-input" placeholder="example-article">
                        <div class="text-xs text-gray-500 mt-1">سيتم إنشاؤه تلقائياً من العنوان</div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">ترتيب العرض</label>
                        <input type="number" class="form-input" placeholder="0" min="0">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <div class="form-group">
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary ml-2">
                            <span class="form-label mb-0">تعليقات مفتوحة</span>
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary ml-2">
                            <span class="form-label mb-0">مميز</span>
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary ml-2">
                            <span class="form-label mb-0">نشر على وسائل التواصل</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- شريط الإجراءات -->
        <div class="content-card">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <button type="button" class="btn-admin btn-admin-outline">
                        <i class="bi bi-arrow-right ml-2"></i>
                        حفظ كمسودة
                    </button>
                    <button type="button" class="btn-admin btn-admin-outline">
                        <i class="bi bi-eye ml-2"></i>
                        معاينة
                    </button>
                </div>
                
                <div class="flex items-center space-x-4 space-x-reverse">
                    <button type="button" class="btn-admin btn-admin-outline">
                        <i class="bi bi-x ml-2"></i>
                        إلغاء
                    </button>
                    <button type="submit" class="btn-admin btn-admin-primary">
                        <i class="bi bi-check ml-2"></i>
                        نشر المقال
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function toggleAdvancedSettings() {
    const advancedSettings = document.getElementById('advanced-settings');
    advancedSettings.classList.toggle('hidden');
}

// تفعيل رفع الملفات
document.addEventListener('DOMContentLoaded', function() {
    // رفع الصورة الرئيسية
    const mainImageUpload = document.querySelector('input[type="file"]');
    const mainImageArea = mainImageUpload.parentElement;
    
    mainImageArea.addEventListener('click', function() {
        mainImageUpload.click();
    });
    
    mainImageArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('border-primary');
    });
    
    mainImageArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('border-primary');
    });
    
    mainImageArea.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('border-primary');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            mainImageUpload.files = files;
            // هنا يمكن إضافة معاينة الصورة
        }
    });
    
    // تفعيل محرر النصوص
    const editorButtons = document.querySelectorAll('.btn-admin-outline');
    editorButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            // هنا يمكن إضافة منطق المحرر
        });
    });
});
</script>
@endsection