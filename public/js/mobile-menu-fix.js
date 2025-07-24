/* Mobile Menu Fix - Final Solution */

document.addEventListener('DOMContentLoaded', function() {
    // Wait for Alpine.js to initialize
    setTimeout(() => {
        const mobileMenuButton = document.querySelector('.mobile-menu-btn');
        const mobileMenu = document.querySelector('.mobile-nav-menu');
        const mobileOverlay = document.querySelector('.mobile-menu-overlay');
        const body = document.body;
        
        if (!mobileMenuButton || !mobileMenu || !mobileOverlay) {
            console.error('Mobile menu elements not found');
            return;
        }
        
        // Function to open menu
        function openMenu() {
            // Add classes
            body.classList.add('menu-open');
            mobileMenu.style.display = 'block';
            mobileOverlay.style.display = 'block';
            
            // Force browser to recalculate styles
            void mobileMenu.offsetHeight;
            
            // Add animation classes
            setTimeout(() => {
                mobileMenu.classList.add('menu-active');
                mobileOverlay.classList.add('overlay-active');
            }, 10);
        }
        
        // Function to close menu
        function closeMenu() {
            // Remove animation classes
            mobileMenu.classList.remove('menu-active');
            mobileOverlay.classList.remove('overlay-active');
            
            // Wait for animation to complete
            setTimeout(() => {
                body.classList.remove('menu-open');
                mobileMenu.style.display = 'none';
                mobileOverlay.style.display = 'none';
            }, 300);
        }
        
        // Toggle menu function
        function toggleMenu() {
            const isOpen = body.classList.contains('menu-open');
            if (isOpen) {
                closeMenu();
            } else {
                openMenu();
            }
        }
        
        // Add click event to menu button
        mobileMenuButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMenu();
        });
        
        // Close menu when clicking overlay
        mobileOverlay.addEventListener('click', function(e) {
            e.preventDefault();
            closeMenu();
        });
        
        // Close menu when clicking close button
        const closeButton = document.querySelector('.mobile-nav-close-btn');
        if (closeButton) {
            closeButton.addEventListener('click', function(e) {
                e.preventDefault();
                closeMenu();
            });
        }
        
        // Close menu when clicking menu links
        const menuLinks = document.querySelectorAll('.mobile-nav-link');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                setTimeout(closeMenu, 100);
            });
        });
        
        // Handle escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && body.classList.contains('menu-open')) {
                closeMenu();
            }
        });
    }, 100);
}); 