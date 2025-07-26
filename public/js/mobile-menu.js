// Mobile Menu Controller - Alpine.js Compatible
document.addEventListener('DOMContentLoaded', function() {
    // Alpine.js handles the menu state, so we just need to ensure proper initialization
    
    // Set current date for Arabic locale
    const currentDateElement = document.getElementById('current-date');
    if (currentDateElement) {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        currentDateElement.textContent = now.toLocaleDateString('ar-SA', options);
    }
    
    // Ensure mobile menu works with Alpine.js
    const mobileMenuElements = document.querySelectorAll('[x-data]');
    mobileMenuElements.forEach(element => {
        if (element._x_dataStack) {
            // Alpine.js is already initialized
            console.log('Alpine.js is active on element:', element);
        }
    });
    
    // Add body class when menu is open (for Alpine.js)
    document.addEventListener('alpine:init', () => {
        Alpine.data('mobileMenu', () => ({
            open: false,
            searchOpen: false,
            searchQuery: '',
            
            toggleMenu() {
                this.open = !this.open;
                if (this.open) {
                    document.body.classList.add('menu-open');
                } else {
                    document.body.classList.remove('menu-open');
                }
            },
            
            toggleSearch() {
                this.searchOpen = !this.searchOpen;
            },
            
            closeMenu() {
                this.open = false;
                document.body.classList.remove('menu-open');
            }
        }));
    });
    
    // Fallback for non-Alpine.js browsers
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileNavMenu = document.querySelector('.mobile-nav-menu');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const mobileNavCloseBtn = document.querySelector('.mobile-nav-close-btn');
    
    if (mobileMenuBtn && !window.Alpine) {
        let isMenuOpen = false;
        
        function toggleMobileMenu() {
            isMenuOpen = !isMenuOpen;
            
            if (isMenuOpen) {
                mobileNavMenu.style.display = 'block';
                mobileNavMenu.style.right = '0';
                mobileMenuOverlay.style.display = 'block';
                mobileMenuOverlay.style.opacity = '1';
                document.body.style.overflow = 'hidden';
                mobileMenuBtn.classList.add('active');
            } else {
                mobileNavMenu.style.right = '-100%';
                mobileMenuOverlay.style.opacity = '0';
                document.body.style.overflow = '';
                mobileMenuBtn.classList.remove('active');
                
                setTimeout(() => {
                    mobileNavMenu.style.display = 'none';
                    mobileMenuOverlay.style.display = 'none';
                }, 300);
            }
        }
        
        mobileMenuBtn.addEventListener('click', toggleMobileMenu);
        
        if (mobileNavCloseBtn) {
            mobileNavCloseBtn.addEventListener('click', toggleMobileMenu);
        }
        
        if (mobileMenuOverlay) {
            mobileMenuOverlay.addEventListener('click', toggleMobileMenu);
        }
    }
    
    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const mobileMenu = document.querySelector('[x-data]');
            if (mobileMenu && mobileMenu._x_dataStack) {
                const data = mobileMenu._x_dataStack[0];
                if (data.open) {
                    data.open = false;
                    document.body.classList.remove('menu-open');
                }
                if (data.searchOpen) {
                    data.searchOpen = false;
                }
            }
        }
    });
    
    // Sticky Header functionality
    let isSticky = false;
    
    function handleScroll() {
        const header = document.querySelector('.theme-header');
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 100 && !isSticky) {
            header.classList.add('sticky-header');
            isSticky = true;
        } else if (scrollTop <= 100 && isSticky) {
            header.classList.remove('sticky-header');
            isSticky = false;
        }
    }
    
    window.addEventListener('scroll', handleScroll);
    
    // Initialize
    handleScroll();
});

// Copy to clipboard function
function copyToClipboard(text) {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification('تم نسخ الرابط بنجاح!', 'success');
        }).catch(() => {
            showNotification('فشل في نسخ الرابط', 'error');
        });
    } else {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = text;
        textArea.style.position = 'fixed';
        textArea.style.left = '-999999px';
        textArea.style.top = '-999999px';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        
        try {
            document.execCommand('copy');
            showNotification('تم نسخ الرابط بنجاح!', 'success');
        } catch (err) {
            showNotification('فشل في نسخ الرابط', 'error');
        }
        
        document.body.removeChild(textArea);
    }
}

// Show notification function
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `custom-toast ${type}`;
    notification.innerHTML = `
        <div class="icon">
            <i class="bi bi-${type === 'success' ? 'check-circle' : type === 'error' ? 'x-circle' : 'info-circle'}"></i>
        </div>
        <div class="message">${message}</div>
        <button class="close-btn" onclick="this.parentElement.remove()">
            <i class="bi bi-x"></i>
        </button>
    `;
    
    document.body.appendChild(notification);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 3000);
}

// Global function to adjust body padding for sticky header
window.adjustBodyPaddingForHeader = function(isSticky) {
    const header = document.querySelector('.theme-header');
    if (header && isSticky) {
        const headerHeight = header.offsetHeight;
        document.body.style.paddingTop = headerHeight + 'px';
    } else {
        document.body.style.paddingTop = '0';
    }
}; 