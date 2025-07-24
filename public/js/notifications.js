// نظام الإشعارات المخصص
window.CustomNotification = {
    show: function(message, type = 'success', duration = 3000) {
        // إنشاء عنصر التوست
        const toast = document.createElement('div');
        toast.className = `custom-toast ${type === 'error' ? 'error' : type === 'warning' ? 'warning' : ''}`;
        
        // اختيار الأيقونة حسب النوع
        let icon = '✓';
        if (type === 'error') icon = '✗';
        else if (type === 'warning') icon = '⚠';
        else if (type === 'info') icon = 'ℹ';
        
        toast.innerHTML = `
            <div class="icon">${icon}</div>
            <div class="message">${message}</div>
            <button class="close-btn" onclick="this.parentElement.remove()">×</button>
        `;
        
        // إضافة التوست للصفحة
        document.body.appendChild(toast);
        
        // إزالة التوست بعد المدة المحددة
        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s ease-out';
            setTimeout(() => {
                if (toast.parentNode) {
                    document.body.removeChild(toast);
                }
            }, 300);
        }, duration);
    },
    
    success: function(message, duration) {
        this.show(message, 'success', duration);
    },
    
    error: function(message, duration) {
        this.show(message, 'error', duration);
    },
    
    warning: function(message, duration) {
        this.show(message, 'warning', duration);
    },
    
    info: function(message, duration) {
        this.show(message, 'info', duration);
    }
};

// الاستماع لأحداث Livewire
document.addEventListener('DOMContentLoaded', function() {
    // للتوافق مع Livewire
    window.addEventListener('showToast', function(event) {
        const data = Array.isArray(event.detail) ? event.detail[0] : event.detail;
        const type = data.type || 'success';
        const message = data.message || data.title || 'تمت العملية بنجاح';
        
        CustomNotification.show(message, type);
    });
    
    // للتوافق مع أحداث أخرى
    window.addEventListener('notify', function(event) {
        const { message, type } = event.detail;
        CustomNotification.show(message, type);
    });
}); 