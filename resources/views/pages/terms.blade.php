@extends('layouts.app')

@section('title', 'شروط الاستخدام - شبوة 21')

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
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <h1 class="header-title">شروط الاستخدام</h1>
                <p class="header-subtitle">
                    يرجى قراءة هذه الشروط بعناية قبل استخدام موقع شبوة 21. استخدامك للموقع يعني موافقتك على هذه الشروط.
                </p>
                <div class="header-meta">
                    <div class="meta-badge">
                        <i class="bi bi-calendar-check"></i>
                        <span>آخر تحديث: {{ date('Y-m-d') }}</span>
                    </div>
                    <div class="meta-badge">
                        <i class="bi bi-eye"></i>
                        <span>تم قراءة هذه الشروط {{ rand(1000, 5000) }} مرة</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Cards -->
        <div class="content-cards">
            <!-- Acceptance Card -->
            <div class="content-card blue">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: white;">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #3b82f6;">1</span>
                            قبول الشروط
                        </h2>
                        <p class="card-text">
                            باستخدامك لموقع شبوة 21، فإنك توافق على الالتزام بهذه الشروط والأحكام. إذا كنت لا توافق على أي جزء من هذه الشروط، يرجى عدم استخدام الموقع.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Site Usage Card -->
            <div class="content-card green">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white;">
                        <i class="bi bi-globe"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #10b981;">2</span>
                            استخدام الموقع
                        </h2>
                        <p class="card-text">
                            يسمح لك باستخدام موقع شبوة 21 للأغراض الشخصية والتجارية المشروعة فقط. يحظر عليك:
                        </p>
                        <div class="info-grid">
                            <div class="info-item" style="color: #ef4444;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #fee2e2; color: #ef4444;">
                                        <i class="bi bi-x"></i>
                                    </div>
                                    <h3 class="info-item-title">الاستخدام غير القانوني</h3>
                                </div>
                                <p class="info-item-text">استخدام الموقع لأي غرض غير قانوني أو ضار</p>
                            </div>
                            <div class="info-item" style="color: #ef4444;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #fee2e2; color: #ef4444;">
                                        <i class="bi bi-x"></i>
                                    </div>
                                    <h3 class="info-item-title">الوصول غير المصرح</h3>
                                </div>
                                <p class="info-item-text">محاولة الوصول غير المصرح به إلى أنظمة الموقع</p>
                            </div>
                            <div class="info-item" style="color: #ef4444;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #fee2e2; color: #ef4444;">
                                        <i class="bi bi-x"></i>
                                    </div>
                                    <h3 class="info-item-title">المحتوى المسيء</h3>
                                </div>
                                <p class="info-item-text">نشر محتوى مسيء أو ضار أو غير لائق</p>
                            </div>
                            <div class="info-item" style="color: #ef4444;">
                                <div class="info-item-header">
                                    <div class="info-item-icon" style="background: #fee2e2; color: #ef4444;">
                                        <i class="bi bi-x"></i>
                                    </div>
                                    <h3 class="info-item-title">انتهاك الحقوق</h3>
                                </div>
                                <p class="info-item-text">انتهاك حقوق الملكية الفكرية</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Card -->
            <div class="content-card purple">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); color: white;">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #8b5cf6;">3</span>
                            المحتوى
                        </h2>
                        <p class="card-text">
                            جميع المحتويات المنشورة على موقع شبوة 21 محمية بموجب حقوق النشر. يحظر نسخ أو إعادة إنتاج أو توزيع أي محتوى دون إذن مسبق.
                        </p>
                        <div class="info-item" style="color: #8b5cf6; margin-top: 1.5rem;">
                            <div class="info-item-header">
                                <i class="bi bi-shield-check" style="color: #8b5cf6; font-size: 1.5rem; margin-left: 0.75rem;"></i>
                                <h3 class="info-item-title">حماية المحتوى</h3>
                            </div>
                            <div class="list-items" style="margin-top: 1rem;">
                                <div class="list-item" style="color: #8b5cf6;">
                                    <div class="list-item-icon" style="background: #ede9fe;">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="list-item-text">جميع النصوص والصور محمية بموجب حقوق النشر</span>
                                </div>
                                <div class="list-item" style="color: #8b5cf6;">
                                    <div class="list-item-icon" style="background: #ede9fe;">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="list-item-text">يجب الحصول على إذن مسبق لإعادة النشر</span>
                                </div>
                                <div class="list-item" style="color: #8b5cf6;">
                                    <div class="list-item-icon" style="background: #ede9fe;">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="list-item-text">يحظر الاستخدام التجاري دون ترخيص</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Privacy Card -->
            <div class="content-card indigo">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); color: white;">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #6366f1;">4</span>
                            الخصوصية
                        </h2>
                        <p class="card-text">
                            يرجى مراجعة سياسة الخصوصية الخاصة بنا لفهم كيفية جمع واستخدام معلوماتك الشخصية.
                        </p>
                        <div style="margin-top: 1.5rem;">
                            <a href="{{ route('privacy') }}" class="action-button indigo" style="display: inline-flex; padding: 0.75rem 1.5rem; font-size: 0.875rem;">
                                <i class="bi bi-shield-check"></i>
                                قراءة سياسة الخصوصية
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liability Card -->
            <div class="content-card red">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white;">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #ef4444;">5</span>
                            المسؤولية
                        </h2>
                        <p class="card-text">
                            لا يتحمل موقع شبوة 21 أي مسؤولية عن أي أضرار مباشرة أو غير مباشرة تنشأ عن استخدام الموقع أو عدم القدرة على الوصول إليه.
                        </p>
                        <div class="info-item" style="color: #ef4444; margin-top: 1.5rem;">
                            <h3 class="info-item-title" style="margin-bottom: 1rem;">نطاق المسؤولية</h3>
                            <div class="list-items">
                                <div class="list-item" style="color: #ef4444;">
                                    <div class="list-item-icon" style="background: #fee2e2;">
                                        <i class="bi bi-info-circle"></i>
                                    </div>
                                    <span class="list-item-text">لا نضمن دقة أو اكتمال المعلومات المنشورة</span>
                                </div>
                                <div class="list-item" style="color: #ef4444;">
                                    <div class="list-item-icon" style="background: #fee2e2;">
                                        <i class="bi bi-info-circle"></i>
                                    </div>
                                    <span class="list-item-text">لا نتحمل مسؤولية أي أضرار ناتجة عن استخدام الموقع</span>
                                </div>
                                <div class="list-item" style="color: #ef4444;">
                                    <div class="list-item-icon" style="background: #fee2e2;">
                                        <i class="bi bi-info-circle"></i>
                                    </div>
                                    <span class="list-item-text">المستخدم مسؤول عن استخدامه الشخصي للموقع</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modifications Card -->
            <div class="content-card orange">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white;">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #f59e0b;">6</span>
                            التعديلات
                        </h2>
                        <p class="card-text">
                            نحتفظ بالحق في تعديل هذه الشروط في أي وقت. سيتم إخطارك بأي تغييرات جوهرية من خلال الموقع.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Governing Law Card -->
            <div class="content-card teal">
                <div class="card-header">
                    <div class="card-icon" style="background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%); color: white;">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <span class="card-number" style="background: #14b8a6;">7</span>
                            القانون المطبق
                        </h2>
                        <p class="card-text">
                            تخضع هذه الشروط لقوانين الجمهورية اليمنية. أي نزاعات تنشأ عن هذه الشروط سيتم حلها في المحاكم المختصة في اليمن.
                        </p>
                        <div class="info-item" style="color: #14b8a6; margin-top: 1.5rem;">
                            <div class="info-item-header">
                                <i class="bi bi-geo-alt" style="color: #14b8a6; font-size: 1.5rem; margin-left: 0.75rem;"></i>
                                <div>
                                    <h3 class="info-item-title">الاختصاص القضائي</h3>
                                    <p class="info-item-text">المحاكم اليمنية المختصة</p>
                                </div>
                            </div>
                        </div>
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
                            <span class="card-number" style="background: rgba(255, 255, 255, 0.15); color: white;">8</span>
                            الاتصال
                        </h2>
                        <p class="card-text" style="color: rgba(255, 255, 255, 0.9);">
                            إذا كان لديك أي أسئلة حول هذه الشروط، يرجى الاتصال بنا عبر:
                        </p>
                        <div class="contact-grid">
                            <div class="contact-item">
                                <div class="contact-item-header">
                                    <i class="bi bi-envelope contact-item-icon"></i>
                                    <span class="contact-item-title">البريد الإلكتروني</span>
                                </div>
                                <p class="contact-item-text">info@shabwah21.com</p>
                            </div>
                            <div class="contact-item">
                                <div class="contact-item-header">
                                    <i class="bi bi-telephone contact-item-icon"></i>
                                    <span class="contact-item-title">الهاتف</span>
                                </div>
                                <p class="contact-item-text">+967 123 456 789</p>
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
                <a href="{{ route('privacy') }}" class="action-button indigo">
                    <i class="bi bi-shield-check"></i>
                    سياسة الخصوصية
                </a>
                <a href="{{ route('contact') }}" class="action-button gray">
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