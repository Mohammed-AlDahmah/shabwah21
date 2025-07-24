/* =================================================================
   Universal Header Layout Fix
   Version: 3.0
   Purpose: A lightweight, Alpine.js-driven utility to prevent content from jumping behind the sticky header.
================================================================= */

// We define this function in the global window scope so Alpine.js can call it directly.
window.adjustBodyPaddingForHeader = function(isSticky) {
    const header = document.querySelector('.theme-header');
    const body = document.body;

    if (!header) {
        console.error('Universal Header Fix: .theme-header element not found.');
        return;
    }

    // When the header becomes sticky, calculate its height and apply it as padding.
    // When it's not sticky, remove the padding.
    if (isSticky) {
        // We use requestAnimationFrame to ensure the browser has finished rendering
        // any class changes before we measure the header's height. This prevents
        // getting a stale or incorrect height value.
        requestAnimationFrame(() => {
            const headerHeight = header.offsetHeight;
            body.style.paddingTop = `${headerHeight}px`;
        });
    } else {
        body.style.paddingTop = '0px';
    }
};

// Initial check on page load, in case the page is loaded scrolled down.
document.addEventListener('DOMContentLoaded', () => {
    // We check the initial state on page load by seeing if the scroll position
    // already makes the header sticky.
    const isInitiallySticky = window.pageYOffset > 100;
    window.adjustBodyPaddingForHeader(isInitiallySticky);
}); 