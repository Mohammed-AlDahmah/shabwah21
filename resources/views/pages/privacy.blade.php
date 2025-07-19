@extends('layouts.app')

@section('title', 'سياسة الخصوصية - شبوة 21')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/privacy-terms.css') }}">
@endsection

@section('content')
<div class="privacy-terms-container">
    <div class="content-wrapper">
        <!-- Elegant Header -->
        <div class="elegant-header">
            <div class="header-content">
                <div class="header-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h1 class="header-title">سياسة الخصوصية</h1>
                <p class="header-subtitle">
                    نحن في موقع شبوة 21 نلتزم بحماية خصوصيتك وبياناتك الشخصية. هذه السياسة توضح كيفية جمع واستخدام وحماية معلوماتك.
                </p>
                <div class="header-meta">
                    <div class="meta-badge">
                        <i class="bi bi-calendar-check"></i>
                        <span>آخر تحديث: {{ date('Y-m-d') }}</span>
                    </div>
                    <div class="meta-badge">
                        <i class="bi bi-eye"></i>
                        <span>تم قراءة هذه السياسة {{ rand(1000, 5000) }} مرة</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Cards -->
        <div class="content-cards">
            <!-- Introduction Card -->
            <div class="content-card blue">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: white;">
                        <i class="bi bi-info-circle"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #3b82f6;">1</span>
                            مقدمة
                        </h2>
                        <p class="card-text">
                            نحن في موقع شبوة 21 نلتزم بحماية خصوصيتك وبياناتك الشخصية. هذه السياسة توضح كيفية جمع واستخدام وحماية معلوماتك عند استخدام موقعنا.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Information Collection Card -->
            <div class="content-card green">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white;">
                        <i class="bi bi-database"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #10b981;">2</span>
                            المعلومات التي نجمعها
                        </h2>
                        <p class="card-text">
                            نجمع أنواع مختلفة من المعلومات:
                        </p>
                        <div class="info-grid">
                            <div class="info-item" style="color: #3b82f6;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #dbeafe; color: #3b82f6;">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <h3 class="info-item-title">المعلومات الشخصية</h3>
                                </div>
                                <p class="info-item-text">الاسم، البريد الإلكتروني، رقم الهاتف</p>
                            </div>
                            <div class="info-item" style="color: #10b981;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #d1fae5; color: #10b981;">
                                        <i class="bi bi-globe"></i>
                                    </div>
                                    <h3 class="info-item-title">معلومات التصفح</h3>
                                </div>
                                <p class="info-item-text">عنوان IP، نوع المتصفح، نظام التشغيل</p>
                            </div>
                            <div class="info-item" style="color: #8b5cf6;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #ede9fe; color: #8b5cf6;">
                                        <i class="bi bi-cookie"></i>
                                    </div>
                                    <h3 class="info-item-title">ملفات تعريف الارتباط</h3>
                                </div>
                                <p class="info-item-text">لتحسين تجربة المستخدم</p>
                            </div>
                            <div class="info-item" style="color: #f59e0b;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #fef3c7; color: #f59e0b;">
                                        <i class="bi bi-graph-up"></i>
                                    </div>
                                    <h3 class="info-item-title">معلومات الاستخدام</h3>
                                </div>
                                <p class="info-item-text">الصفحات التي تزورها، الوقت المستغرق</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Usage Card -->
            <div class="content-card purple">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); color: white;">
                        <i class="bi bi-gear"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #8b5cf6;">3</span>
                            كيفية استخدام المعلومات
                        </h2>
                        <p class="card-text">
                            نستخدم معلوماتك للأغراض التالية:
                        </p>
                        <div class="list-items">
                            <div class="list-item" style="color: #8b5cf6;">
                                <div class="list-item-icon" style="background: #ede9fe;">
                                    <i class="bi bi-check"></i>
                                </div>
                                <span class="list-item-text">تقديم خدماتنا وتحسينها</span>
                            </div>
                            <div class="list-item" style="color: #8b5cf6;">
                                <div class="list-item-icon" style="background: #ede9fe;">
                                    <i class="bi bi-check"></i>
                                </div>
                                <span class="list-item-text">إرسال النشرات الإخبارية والتحديثات</span>
                            </div>
                            <div class="list-item" style="color: #8b5cf6;">
                                <div class="list-item-icon" style="background: #ede9fe;">
                                    <i class="bi bi-check"></i>
                                </div>
                                <span class="list-item-text">الرد على استفساراتك وطلباتك</span>
                            </div>
                            <div class="list-item" style="color: #8b5cf6;">
                                <div class="list-item-icon" style="background: #ede9fe;">
                                    <i class="bi bi-check"></i>
                                </div>
                                <span class="list-item-text">تحليل استخدام الموقع وتحسين الأداء</span>
                            </div>
                            <div class="list-item" style="color: #8b5cf6;">
                                <div class="list-item-icon" style="background: #ede9fe;">
                                    <i class="bi bi-check"></i>
                                </div>
                                <span class="list-item-text">حماية الموقع من الاحتيال والاستخدام الضار</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Sharing Card -->
            <div class="content-card red">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white;">
                        <i class="bi bi-share"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #ef4444;">4</span>
                            مشاركة المعلومات
                        </h2>
                        <p class="card-text">
                            لا نبيع أو نؤجر أو نشارك معلوماتك الشخصية مع أطراف ثالثة إلا في الحالات التالية:
                        </p>
                        <div class="info-grid">
                            <div class="info-item" style="color: #ef4444;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #fee2e2; color: #ef4444;">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <h3 class="info-item-title">بموافقتك الصريحة</h3>
                                </div>
                            </div>
                            <div class="info-item" style="color: #ef4444;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #fee2e2; color: #ef4444;">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <h3 class="info-item-title">لتقديم الخدمات المطلوبة</h3>
                                </div>
                            </div>
                            <div class="info-item" style="color: #ef4444;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #fee2e2; color: #ef4444;">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <h3 class="info-item-title">للامتثال للقوانين والأنظمة</h3>
                                </div>
                            </div>
                            <div class="info-item" style="color: #ef4444;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #fee2e2; color: #ef4444;">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <h3 class="info-item-title">لحماية حقوقنا وممتلكاتنا</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Protection Card -->
            <div class="content-card indigo">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); color: white;">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #6366f1;">5</span>
                            حماية المعلومات
                        </h2>
                        <p class="card-text">
                            نتخذ إجراءات أمنية مناسبة لحماية معلوماتك الشخصية من:
                        </p>
                        <div class="info-grid">
                            <div class="list-item" style="color: #6366f1;">
                                <div class="list-item-icon" style="background: #e0e7ff;">
                                    <i class="bi bi-shield-x"></i>
                                </div>
                                <span class="list-item-text">الوصول غير المصرح به</span>
                            </div>
                            <div class="list-item" style="color: #6366f1;">
                                <div class="list-item-icon" style="background: #e0e7ff;">
                                    <i class="bi bi-shield-x"></i>
                                </div>
                                <span class="list-item-text">التغيير أو الحذف غير المصرح به</span>
                            </div>
                            <div class="list-item" style="color: #6366f1;">
                                <div class="list-item-icon" style="background: #e0e7ff;">
                                    <i class="bi bi-shield-x"></i>
                                </div>
                                <span class="list-item-text">الكشف غير المصرح به</span>
                            </div>
                            <div class="list-item" style="color: #6366f1;">
                                <div class="list-item-icon" style="background: #e0e7ff;">
                                    <i class="bi bi-shield-x"></i>
                                </div>
                                <span class="list-item-text">الاستخدام غير المصرح به</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cookies Card -->
            <div class="content-card orange">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white;">
                        <i class="bi bi-cookie"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #f59e0b;">6</span>
                            ملفات تعريف الارتباط
                        </h2>
                        <p class="card-text">
                            نستخدم ملفات تعريف الارتباط لتحسين تجربة المستخدم وتقديم محتوى مخصص. يمكنك التحكم في إعدادات ملفات تعريف الارتباط من خلال متصفحك.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Your Rights Card -->
            <div class="content-card teal">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%); color: white;">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #14b8a6;">7</span>
                            حقوقك
                        </h2>
                        <p class="card-text">
                            لديك الحق في:
                        </p>
                        <div class="list-items">
                            <div class="list-item" style="color: #14b8a6;">
                                <div class="list-item-icon" style="background: #ccfbf1;">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                                <span class="list-item-text">الوصول إلى معلوماتك الشخصية</span>
                            </div>
                            <div class="list-item" style="color: #14b8a6;">
                                <div class="list-item-icon" style="background: #ccfbf1;">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                                <span class="list-item-text">تصحيح أو تحديث معلوماتك</span>
                            </div>
                            <div class="list-item" style="color: #14b8a6;">
                                <div class="list-item-icon" style="background: #ccfbf1;">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                                <span class="list-item-text">حذف معلوماتك الشخصية</span>
                            </div>
                            <div class="list-item" style="color: #14b8a6;">
                                <div class="list-item-icon" style="background: #ccfbf1;">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                                <span class="list-item-text">الاعتراض على معالجة معلوماتك</span>
                            </div>
                            <div class="list-item" style="color: #14b8a6;">
                                <div class="list-item-icon" style="background: #ccfbf1;">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                                <span class="list-item-text">سحب موافقتك في أي وقت</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Policy Changes Card -->
            <div class="content-card pink">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #ec4899 0%, #db2777 100%); color: white;">
                        <i class="bi bi-arrow-clockwise"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #ec4899;">8</span>
                            التغييرات على السياسة
                        </h2>
                        <p class="card-text">
                            قد نقوم بتحديث هذه السياسة من وقت لآخر. سنقوم بإخطارك بأي تغييرات جوهرية من خلال الموقع أو البريد الإلكتروني.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Card -->
            <div class="contact-section">
                <div class="card-header">
                    <div class="card-icon" style="background: rgba(255, 255, 255, 0.15); color: white; border: 1px solid rgba(255, 255, 255, 0.2);">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title" style="color: white;">
                            <span class="card-number" style="background: rgba(255, 255, 255, 0.15); color: white;">9</span>
                            الاتصال بنا
                        </h2>
                        <p class="card-text" style="color: rgba(255, 255, 255, 0.9);">
                            إذا كان لديك أي أسئلة حول سياسة الخصوصية هذه، يرجى الاتصال بنا:
                        </p>
                        <div class="contact-grid">
                            <div class="contact-item">
                                <div class="contact-item-header">
                                    <i class="bi bi-envelope contact-item-icon"></i>
                                    <span class="contact-item-title">البريد الإلكتروني</span>
                                </div>
                                <p class="contact-item-text">privacy@shabwah21.com</p>
                            </div>
                            <div class="contact-item">
                                <div class="contact-item-header">
                                    <i class="bi bi-telephone contact-item-icon"></i>
                                    <span class="contact-item-title">الهاتف</span>
                                </div>
                                <p class="contact-item-text">+967 123 456 789</p>
                            </div>
                            <div class="contact-item">
                                <div class="contact-item-header">
                                    <i class="bi bi-geo-alt contact-item-icon"></i>
                                    <span class="contact-item-title">العنوان</span>
                                </div>
                                <p class="contact-item-text">محافظة شبوة، اليمن</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <div class="button-group">
                <a href="{{ route('home') }}" class="action-button blue">
                    <i class="bi bi-house"></i>
                    العودة للرئيسية
                </a>
                <a href="{{ route('terms') }}" class="action-button gray">
                    <i class="bi bi-file-text"></i>
                    شروط الاستخدام
                </a>
                <a href="{{ route('contact') }}" class="action-button indigo">
                    <i class="bi bi-envelope"></i>
                    اتصل بنا
                </a>
            </div>
        </div>
    </div>
</div>

<script>
// Scroll reveal animation
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.content-card, .contact-section').forEach(el => {
        el.classList.add('scroll-reveal');
        observer.observe(el);
    });
});
</script>
@endsection 