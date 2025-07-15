# موقع الأخبار 24 - News Site

موقع إخباري عربي احترافي مبني بـ Laravel يشبه موقع h21.news

## المميزات

- ✅ تصميم عصري وجذاب متجاوب مع جميع الأجهزة
- ✅ شريط أخبار عاجلة متحرك
- ✅ أقسام متعددة للأخبار (محليات، سياسة، اقتصاد، رياضة، تكنولوجيا، ثقافة، منوعات)
- ✅ عرض الأخبار المميزة والأكثر قراءة
- ✅ قسم خاص للفيديوهات
- ✅ شريط جانبي للأخبار الشائعة
- ✅ تكامل مع وسائل التواصل الاجتماعي
- ✅ نظام إدارة محتوى كامل

## متطلبات التشغيل

- PHP >= 8.1
- Composer
- MySQL أو SQLite
- Node.js & NPM

## خطوات التثبيت

1. **استنساخ المشروع وتثبيت المتطلبات:**
```bash
# تثبيت متطلبات PHP
composer install

# تثبيت متطلبات JavaScript
npm install
```

2. **إعداد ملف البيئة:**
```bash
cp .env.example .env
php artisan key:generate
```

3. **إعداد قاعدة البيانات:**

قم بتحديث ملف `.env` بمعلومات قاعدة البيانات:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=news_site
DB_USERNAME=root
DB_PASSWORD=
```

أو استخدم SQLite للتطوير السريع:
```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

4. **تشغيل الهجرات وملء البيانات:**
```bash
php artisan migrate:fresh --seed
```

5. **بناء الأصول:**
```bash
npm run build
# أو للتطوير
npm run dev
```

6. **تشغيل الخادم:**
```bash
php artisan serve
```

الموقع سيكون متاحاً على: http://localhost:8000

## البيانات التجريبية

بعد تشغيل الـ seeders، سيتم إنشاء:
- مستخدم افتراضي: admin@news24.com / password123
- 7 تصنيفات رئيسية
- 12 خبر تجريبي في مختلف الأقسام
- أخبار عاجلة ومميزة

## هيكل المشروع

```
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── HomeController.php    # تحكم الصفحة الرئيسية
│   │       └── NewsController.php    # تحكم الأخبار
│   └── Models/
│       ├── Article.php              # نموذج المقالات
│       ├── Category.php             # نموذج التصنيفات
│       └── User.php                 # نموذج المستخدمين
├── resources/
│   ├── views/
│   │   ├── homepage.blade.php       # الصفحة الرئيسية الجديدة
│   │   └── layouts/
│   │       └── app.blade.php       # التخطيط الرئيسي
│   └── css/
│       └── app.css                 # التنسيقات المخصصة
├── public/
│   └── images/
│       └── logo.svg               # شعار الموقع
└── database/
    └── seeders/
        └── NewsSeeder.php         # بيانات تجريبية
```

## التخصيص

### تغيير الشعار
استبدل ملف `/public/images/logo.svg` بشعارك الخاص

### تغيير الألوان
قم بتعديل الألوان في `/resources/css/app.css`

### إضافة تصنيفات جديدة
قم بتحديث ملف `/database/seeders/NewsSeeder.php`

## الصفحات المتاحة

- `/` - الصفحة الرئيسية
- `/news` - صفحة الأخبار
- `/news/{slug}` - صفحة تفاصيل الخبر
- `/category/{slug}` - أخبار حسب التصنيف
- `/login` - تسجيل الدخول للإدارة
- `/admin/dashboard` - لوحة التحكم (بعد تسجيل الدخول)

## التطوير

للعمل في وضع التطوير:
```bash
npm run dev
```

لمراقبة التغييرات:
```bash
npm run watch
```

## الدعم

للمساعدة أو الإبلاغ عن مشاكل، يرجى فتح issue في المستودع.