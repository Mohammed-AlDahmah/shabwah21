// لوحة التحكم الاحترافية - حضرموت21
// ملف JavaScript للوحة التحكم

document.addEventListener('DOMContentLoaded', function() {
    
    // تفعيل تأثيرات التحميل
    initFadeInEffects();
    
    // تفعيل الشريط الجانبي
    initSidebar();
    
    // تفعيل التنبيهات
    initAlerts();
    
    // تفعيل الجداول
    initTables();
    
    // تفعيل النماذج
    initForms();
    
    // تفعيل الأزرار
    initButtons();
});

// تأثيرات الظهور التدريجي
function initFadeInEffects() {
    const fadeElements = document.querySelectorAll('.admin-fade-in');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
            }
        });
    });
    
    fadeElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
}

// تفعيل الشريط الجانبي
function initSidebar() {
    const sidebar = document.querySelector('.admin-sidebar');
    const main = document.querySelector('.admin-main');
    const toggleBtn = document.querySelector('.sidebar-toggle');
    
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            main.classList.toggle('expanded');
        });
    }
    
    // إغلاق الشريط الجانبي في الشاشات الصغيرة
    function handleResize() {
        if (window.innerWidth <= 768) {
            sidebar.classList.add('mobile-closed');
        } else {
            sidebar.classList.remove('mobile-closed');
        }
    }
    
    window.addEventListener('resize', handleResize);
    handleResize();
}

// تفعيل التنبيهات
function initAlerts() {
    const alerts = document.querySelectorAll('.admin-alert');
    
    alerts.forEach(alert => {
        // إضافة زر إغلاق
        const closeBtn = document.createElement('button');
        closeBtn.innerHTML = '&times;';
        closeBtn.className = 'alert-close';
        closeBtn.style.cssText = `
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: inherit;
        `;
        
        alert.style.position = 'relative';
        alert.appendChild(closeBtn);
        
        closeBtn.addEventListener('click', () => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 300);
        });
        
        // إغلاق تلقائي بعد 5 ثوان
        setTimeout(() => {
            if (alert.parentNode) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }
        }, 5000);
    });
}

// تفعيل الجداول
function initTables() {
    const tables = document.querySelectorAll('.admin-table');
    
    tables.forEach(table => {
        const rows = table.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = 'rgba(192, 139, 45, 0.05)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });
    });
}

// تفعيل النماذج
function initForms() {
    const inputs = document.querySelectorAll('.admin-form-input');
    
    inputs.forEach(input => {
        // تأثير التركيز
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
        
        // التحقق من الصحة
        input.addEventListener('input', function() {
            if (this.checkValidity()) {
                this.classList.remove('invalid');
                this.classList.add('valid');
            } else {
                this.classList.remove('valid');
                this.classList.add('invalid');
            }
        });
    });
}

// تفعيل الأزرار
function initButtons() {
    const buttons = document.querySelectorAll('.admin-btn');
    
    buttons.forEach(button => {
        // تأثير النقر
        button.addEventListener('click', function(e) {
            // إنشاء تأثير النقر
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            `;
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
        
        // تأثير التحميل
        if (button.classList.contains('loading')) {
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="bi bi-arrow-clockwise spin"></i> جاري التحميل...';
            button.disabled = true;
            
            // إعادة النص الأصلي بعد انتهاء التحميل
            setTimeout(() => {
                button.innerHTML = originalText;
                button.disabled = false;
                button.classList.remove('loading');
            }, 2000);
        }
    });
}

// تفعيل البحث المباشر
function initLiveSearch() {
    const searchInputs = document.querySelectorAll('input[wire\\:model\\.live="search"]');
    
    searchInputs.forEach(input => {
        let timeout;
        
        input.addEventListener('input', function() {
            clearTimeout(timeout);
            
            // إظهار مؤشر التحميل
            const loadingIndicator = document.createElement('div');
            loadingIndicator.className = 'search-loading';
            loadingIndicator.innerHTML = '<i class="bi bi-arrow-clockwise spin"></i>';
            loadingIndicator.style.cssText = `
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                color: var(--color-primary);
            `;
            
            this.parentElement.style.position = 'relative';
            this.parentElement.appendChild(loadingIndicator);
            
            timeout = setTimeout(() => {
                loadingIndicator.remove();
            }, 500);
        });
    });
}

// تفعيل التبويبات
function initTabs() {
    const tabButtons = document.querySelectorAll('[data-bs-toggle="tab"]');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const target = this.getAttribute('data-bs-target');
            const tabContent = document.querySelector(target);
            
            // إخفاء جميع التبويبات
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('show', 'active');
            });
            
            // إزالة الفئة النشطة من جميع الأزرار
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            // إظهار التبويب المحدد
            tabContent.classList.add('show', 'active');
            this.classList.add('active');
        });
    });
}

// تفعيل Modal
function initModals() {
    const modals = document.querySelectorAll('.modal');
    
    modals.forEach(modal => {
        const closeBtn = modal.querySelector('.btn-close');
        const backdrop = modal.querySelector('.modal-backdrop');
        
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                closeModal(modal);
            });
        }
        
        if (backdrop) {
            backdrop.addEventListener('click', () => {
                closeModal(modal);
            });
        }
        
        // إغلاق بـ ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.style.display === 'block') {
                closeModal(modal);
            }
        });
    });
}

function closeModal(modal) {
    modal.style.opacity = '0';
    const backdrop = modal.nextElementSibling;
    if (backdrop) {
        backdrop.style.opacity = '0';
    }
    
    setTimeout(() => {
        modal.style.display = 'none';
        if (backdrop) {
            backdrop.style.display = 'none';
        }
    }, 300);
}

// تفعيل جميع الميزات
document.addEventListener('DOMContentLoaded', function() {
    initLiveSearch();
    initTabs();
    initModals();
});

// إضافة أنماط CSS ديناميكية
const adminStyles = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    .spin {
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .admin-form-group.focused .admin-form-label {
        color: var(--color-primary);
        transform: translateY(-20px) scale(0.8);
    }
    
    .admin-form-input.valid {
        border-color: #28a745;
    }
    
    .admin-form-input.invalid {
        border-color: #dc3545;
    }
    
    .search-loading {
        animation: spin 1s linear infinite;
    }
`;

const styleSheet = document.createElement('style');
styleSheet.textContent = adminStyles;
document.head.appendChild(styleSheet);