/* Header Fix JavaScript - Final Solution */

document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.theme-header');
    const body = document.body;
    
    if (!header) return;
    
    // Calculate and store header height
    function updateHeaderHeight() {
        const headerHeight = header.offsetHeight;
        document.documentElement.style.setProperty('--header-height', `${headerHeight}px`);
    }
    
    // Handle sticky header
    let lastScrollTop = 0;
    let isSticky = false;
    
    function handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 100 && !isSticky) {
            // Make header sticky
            isSticky = true;
            header.classList.add('sticky-header');
            body.classList.add('has-sticky-header');
            updateHeaderHeight();
        } else if (scrollTop <= 100 && isSticky) {
            // Remove sticky
            isSticky = false;
            header.classList.remove('sticky-header');
            body.classList.remove('has-sticky-header');
        }
        
        lastScrollTop = scrollTop;
    }
    
    // Initial setup
    updateHeaderHeight();
    handleScroll();
    
    // Event listeners
    window.addEventListener('scroll', handleScroll, { passive: true });
    window.addEventListener('resize', updateHeaderHeight);
    
    // Fix for mobile menu
    const mobileMenuButton = document.querySelector('[x-on\\:click="open = !open"]');
    const mobileMenu = document.querySelector('.mobile-nav-menu');
    const mobileOverlay = document.querySelector('.mobile-menu-overlay');
    
    if (mobileMenuButton && window.innerWidth <= 768) {
        // Override Alpine.js click handler for mobile menu
        mobileMenuButton.addEventListener('click', function(e) {
            e.stopPropagation();
            const isOpen = body.classList.contains('menu-open');
            
            if (!isOpen) {
                // Open menu
                body.classList.add('menu-open');
                if (mobileMenu) {
                    mobileMenu.style.display = 'block';
                    setTimeout(() => {
                        mobileMenu.style.right = '0';
                    }, 10);
                }
                if (mobileOverlay) {
                    mobileOverlay.style.display = 'block';
                }
            } else {
                // Close menu
                body.classList.remove('menu-open');
                if (mobileMenu) {
                    mobileMenu.style.right = '-320px';
                    setTimeout(() => {
                        mobileMenu.style.display = 'none';
                    }, 300);
                }
                if (mobileOverlay) {
                    mobileOverlay.style.display = 'none';
                }
            }
        });
        
        // Close menu when clicking overlay
        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', function() {
                body.classList.remove('menu-open');
                if (mobileMenu) {
                    mobileMenu.style.right = '-320px';
                    setTimeout(() => {
                        mobileMenu.style.display = 'none';
                    }, 300);
                }
                mobileOverlay.style.display = 'none';
            });
        }
    }
});

// Override the Alpine.js function
window.adjustBodyPaddingForHeader = function(isSticky) {
    const header = document.querySelector('.theme-header');
    const body = document.body;
    
    if (!header) return;
    
    if (isSticky) {
        requestAnimationFrame(() => {
            const headerHeight = header.offsetHeight;
            document.documentElement.style.setProperty('--header-height', `${headerHeight}px`);
            body.classList.add('has-sticky-header');
        });
    } else {
        body.classList.remove('has-sticky-header');
    }
}; 