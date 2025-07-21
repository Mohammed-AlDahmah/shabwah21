@extends('layouts.admin')

@section('title', 'إنشاء مقال جديد - شبوة21')

@section('content')
<div class="create-article">
    <!-- Page Header -->
    <div class="page-header mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">إنشاء مقال جديد</h1>
                <p class="text-gray-600">أضف محتوى إخباري جديد للموقع</p>
            </div>
            <a href="{{ route('admin.articles') }}" class="btn-secondary">
                <i class="bi bi-arrow-right ml-2"></i>
                العودة للمقالات
            </a>
        </div>
    </div>

    <!-- Article Form -->
    <div class="article-form">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                        <!-- Title -->
                        <div class="form-group mb-6">
                            <label for="title" class="form-label">عنوان المقال *</label>
                            <input type="text" id="title" name="title" 
                                   value="{{ old('title') }}" 
                                   class="form-input @error('title') border-red-500 @enderror"
                                   placeholder="أدخل عنوان المقال هنا...">
                            @error('title')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Excerpt -->
                        <div class="form-group mb-6">
                            <label for="excerpt" class="form-label">ملخص المقال *</label>
                            <textarea id="excerpt" name="excerpt" rows="3" 
                                      class="form-textarea @error('excerpt') border-red-500 @enderror"
                                      placeholder="أدخل ملخص مختصر للمقال...">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="form-group mb-6">
                            <label for="content" class="form-label">محتوى المقال *</label>
                            <textarea id="content" name="content" rows="15" 
                                      class="form-textarea @error('content') border-red-500 @enderror"
                                      placeholder="أدخل محتوى المقال هنا...">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Publish Settings -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">إعدادات النشر</h3>
                        
                        <!-- Status -->
                        <div class="form-group mb-4">
                            <label class="form-label">الحالة</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="is_published" value="1" 
                                           {{ old('is_published', '1') == '1' ? 'checked' : '' }}
                                           class="form-radio">
                                    <span class="mr-2 text-sm text-gray-700">منشور</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="is_published" value="0" 
                                           {{ old('is_published') == '0' ? 'checked' : '' }}
                                           class="form-radio">
                                    <span class="mr-2 text-sm text-gray-700">مسودة</span>
                                </label>
                            </div>
                        </div>

                        <!-- Featured -->
                        <div class="form-group mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_featured" value="1" 
                                       {{ old('is_featured') ? 'checked' : '' }}
                                       class="form-checkbox">
                                <span class="mr-2 text-sm text-gray-700">مقال مميز</span>
                            </label>
                        </div>

                        <!-- Publish Button -->
                        <button type="submit" class="btn-primary w-full">
                            <i class="bi bi-check-circle ml-2"></i>
                            نشر المقال
                        </button>
                    </div>

                    <!-- Article Details -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">تفاصيل المقال</h3>
                        
                        <!-- Category -->
                        <div class="form-group mb-4">
                            <label for="category_id" class="form-label">القسم *</label>
                            <select id="category_id" name="category_id" 
                                    class="form-select @error('category_id') border-red-500 @enderror">
                                <option value="">اختر القسم</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Author -->
                        <div class="form-group mb-4">
                            <label for="author_id" class="form-label">الكاتب *</label>
                            <select id="author_id" name="author_id" 
                                    class="form-select @error('author_id') border-red-500 @enderror">
                                <option value="">اختر الكاتب</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}" 
                                            {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">الصورة المميزة</h3>
                        
                        <div class="form-group">
                            <label for="image" class="form-label">صورة المقال</label>
                            <div class="image-upload-area" id="imageUploadArea">
                                <input type="file" id="image" name="image" 
                                       accept="image/*" class="hidden" 
                                       onchange="previewImage(this)">
                                <div class="upload-placeholder" id="uploadPlaceholder">
                                    <i class="bi bi-cloud-upload text-3xl text-gray-400 mb-2"></i>
                                    <p class="text-sm text-gray-500">اضغط لاختيار صورة</p>
                                    <p class="text-xs text-gray-400 mt-1">JPG, PNG, GIF حتى 2MB</p>
                                </div>
                                <div class="image-preview hidden" id="imagePreview">
                                    <img id="previewImg" src="" alt="Preview" class="w-full h-32 object-cover rounded-lg">
                                    <button type="button" onclick="removeImage()" 
                                            class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>
                            </div>
                            @error('image')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
/* Create Article Styles */
.create-article {
    padding: 0;
}

.page-header {
    margin-bottom: 2rem;
}

.article-form {
    margin-bottom: 2rem;
}

/* Form Styles */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
}

.form-input,
.form-textarea,
.form-select {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    transition: all 0.2s ease;
    background: white;
}

.form-input:focus,
.form-textarea:focus,
.form-select:focus {
    outline: none;
    border-color: #C08B2D;
    box-shadow: 0 0 0 3px rgba(192, 139, 45, 0.1);
}

.form-textarea {
    resize: vertical;
    min-height: 100px;
}

.form-error {
    color: #dc2626;
    font-size: 0.75rem;
    margin-top: 0.25rem;
}

/* Radio and Checkbox */
.form-radio,
.form-checkbox {
    width: 1rem;
    height: 1rem;
    color: #C08B2D;
    border-color: #d1d5db;
    border-radius: 0.25rem;
}

.form-radio:focus,
.form-checkbox:focus {
    outline: none;
    border-color: #C08B2D;
    box-shadow: 0 0 0 3px rgba(192, 139, 45, 0.1);
}

/* Image Upload */
.image-upload-area {
    position: relative;
    border: 2px dashed #d1d5db;
    border-radius: 0.5rem;
    padding: 2rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.image-upload-area:hover {
    border-color: #C08B2D;
    background-color: #fefbf3;
}

.upload-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.image-preview {
    position: relative;
    display: block;
}

.image-preview img {
    width: 100%;
    height: 8rem;
    object-fit: cover;
    border-radius: 0.5rem;
}

.hidden {
    display: none;
}

/* Responsive */
@media (max-width: 1024px) {
    .grid {
        grid-template-columns: 1fr;
    }
    
    .lg\:col-span-2 {
        grid-column: span 1;
    }
    
    .lg\:col-span-1 {
        grid-column: span 1;
    }
}
</style>

<script>
// Image upload functionality
document.getElementById('imageUploadArea').addEventListener('click', function() {
    document.getElementById('image').click();
});

function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('uploadPlaceholder').classList.add('hidden');
            document.getElementById('imagePreview').classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    document.getElementById('image').value = '';
    document.getElementById('uploadPlaceholder').classList.remove('hidden');
    document.getElementById('imagePreview').classList.add('hidden');
}

// Auto-save functionality
let autoSaveTimer;
const form = document.querySelector('form');

form.addEventListener('input', function() {
    clearTimeout(autoSaveTimer);
    autoSaveTimer = setTimeout(function() {
        // Auto-save logic here
        console.log('Auto-saving...');
    }, 2000);
});

// Form validation
form.addEventListener('submit', function(e) {
    const title = document.getElementById('title').value.trim();
    const excerpt = document.getElementById('excerpt').value.trim();
    const content = document.getElementById('content').value.trim();
    const category = document.getElementById('category_id').value;
    const author = document.getElementById('author_id').value;
    
    if (!title || !excerpt || !content || !category || !author) {
        e.preventDefault();
        alert('يرجى ملء جميع الحقول المطلوبة');
        return false;
    }
});
</script>
@endsection 