/**
 * FILE: resources/js/partials/pages.js
 * JavaScript untuk halaman frontend:
 * - Program, Proposal, Pelatihan
 */

export function initPages() {
    initScrollAnimations();
    initCardHoverEffects();
    initSmoothScrollLinks();
}

/**
 * Initialize scroll-triggered animations
 */
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll(
        '.content-intro, .program-card, .pelatihan-card, .layanan-card, ' +
        '.partner-card, .kerjasama-card, .guide-step, .prosedur-step, ' +
        '.proposal-placeholder'
    );

    if (animatedElements.length === 0) return;

    // Add initial state
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    });

    // Create intersection observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Stagger animation
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 50);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    animatedElements.forEach(el => observer.observe(el));
}

/**
 * Initialize card hover effects
 */
function initCardHoverEffects() {
    const cards = document.querySelectorAll(
        '.program-card, .pelatihan-card, .layanan-card, .kerjasama-card'
    );

    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

/**
 * Initialize smooth scroll for anchor links
 */
function initSmoothScrollLinks() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');

    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/**
 * Auto-init when DOM is ready
 */
document.addEventListener('DOMContentLoaded', () => {
    // Check if we're on a page that needs this
    const pageSelectors = [
        '.program-page',
        '.proposal-page',
        '.pelatihan-page',
        '.pelayanan-page',
        '.kemitraan-page'
    ];

    const isTargetPage = pageSelectors.some(selector => 
        document.querySelector(selector)
    );

    if (isTargetPage) {
        initPages();
    }
});

export default { initPages };
