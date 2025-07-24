// Lazy Loading Enhancement for Images
document.addEventListener('DOMContentLoaded', function() {
    // Check if browser supports Intersection Observer
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    
                    // Add loading class
                    img.classList.add('loading');
                    
                    // Load the image
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    
                    // When image is loaded
                    img.addEventListener('load', () => {
                        img.classList.remove('loading');
                        img.classList.add('loaded');
                    });
                    
                    // Stop observing this image
                    observer.unobserve(img);
                }
            });
        }, {
            rootMargin: '50px 0px',
            threshold: 0.01
        });

        // Start observing all images with loading="lazy"
        const lazyImages = document.querySelectorAll('img[loading="lazy"]');
        lazyImages.forEach(img => {
            // Add loading attribute for native lazy loading
            img.setAttribute('loading', 'lazy');
            
            // Observe for custom loading effects
            imageObserver.observe(img);
        });

        // Also observe dynamically added images
        const mutationObserver = new MutationObserver(mutations => {
            mutations.forEach(mutation => {
                mutation.addedNodes.forEach(node => {
                    if (node.nodeType === 1) { // Element node
                        // Check if it's an image
                        if (node.tagName === 'IMG' && node.getAttribute('loading') === 'lazy') {
                            imageObserver.observe(node);
                        }
                        
                        // Check for images inside the added element
                        const images = node.querySelectorAll('img[loading="lazy"]');
                        images.forEach(img => imageObserver.observe(img));
                    }
                });
            });
        });

        // Start observing the document for changes
        mutationObserver.observe(document.body, {
            childList: true,
            subtree: true
        });
    }
});

// Smooth scroll behavior with performance optimization
document.addEventListener('DOMContentLoaded', function() {
    // Throttle function to limit scroll events
    function throttle(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Handle smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Optimize scroll performance
    let ticking = false;
    function updateScrollPosition() {
        // Add any scroll-based animations or updates here
        ticking = false;
    }

    function requestTick() {
        if (!ticking) {
            window.requestAnimationFrame(updateScrollPosition);
            ticking = true;
        }
    }

    // Throttled scroll event
    window.addEventListener('scroll', throttle(requestTick, 100));
});

// Preload critical images
function preloadImage(url) {
    const link = document.createElement('link');
    link.rel = 'preload';
    link.as = 'image';
    link.href = url;
    document.head.appendChild(link);
}

// Preload logo and other critical images
document.addEventListener('DOMContentLoaded', function() {
    // Add URLs of critical images here
    const criticalImages = [
        '/images/logo.png',
        '/images/logo.svg'
    ];
    
    criticalImages.forEach(url => preloadImage(url));
});

// Scroll to Top Button and Progress Indicator
document.addEventListener('DOMContentLoaded', function() {
    const scrollToTopBtn = document.querySelector('.scroll-to-top');
    const scrollIndicator = document.querySelector('.scroll-indicator');
    
    // Show/hide scroll to top button
    function toggleScrollToTop() {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.add('visible');
        } else {
            scrollToTopBtn.classList.remove('visible');
        }
    }
    
    // Update scroll progress indicator
    function updateScrollProgress() {
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight - windowHeight;
        const scrolled = window.pageYOffset;
        const progress = (scrolled / documentHeight) * 100;
        
        if (scrollIndicator) {
            scrollIndicator.style.transform = `scaleX(${progress / 100})`;
        }
    }
    
    // Throttled scroll event handler
    let ticking = false;
    function handleScroll() {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                toggleScrollToTop();
                updateScrollProgress();
                ticking = false;
            });
            ticking = true;
        }
    }
    
    // Add scroll event listener
    window.addEventListener('scroll', handleScroll);
    
    // Initial check
    toggleScrollToTop();
    updateScrollProgress();
}); 