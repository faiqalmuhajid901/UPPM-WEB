/**
 * FILE: resources/js/modules/header.js
 * Header & Mobile Menu Functionality
 */

export function initHeader() {
    initMobileMenu();
    initScrollEffect();
    // Removed: initProposalLinks() - now handled directly in HTML
}

/**
 * Mobile Menu Toggle
 */
function initMobileMenu() {
    const toggleBtn = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-menu-open');
    const iconClose = document.getElementById('icon-menu-close');

    if (!toggleBtn || !mobileMenu) return;

    toggleBtn.addEventListener('click', () => {
        const isOpen = mobileMenu.classList.contains('is-open');

        if (isOpen) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!toggleBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
            closeMobileMenu();
        }
    });

    // Close menu on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileMenu.classList.contains('is-open')) {
            closeMobileMenu();
            toggleBtn.focus();
        }
    });

    // Close menu on link click (for anchor links)
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            closeMobileMenu();
        });
    });

    function openMobileMenu() {
        mobileMenu.classList.add('is-open');
        iconOpen?.classList.add('hidden');
        iconClose?.classList.remove('hidden');
        toggleBtn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden'; // Prevent scroll
    }

    function closeMobileMenu() {
        mobileMenu.classList.remove('is-open');
        iconOpen?.classList.remove('hidden');
        iconClose?.classList.add('hidden');
        toggleBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = ''; // Restore scroll
    }
}

/**
 * Header Scroll Effect
 */
function initScrollEffect() {
    const header = document.getElementById('main-header');
    if (!header) return;

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;

        if (currentScroll > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }, { passive: true });
}

/**
 * NOTE: Proposal Links Handler removed
 * Links to Google Form are now handled directly in HTML with target="_blank"
 * This prevents JavaScript from intercepting and showing "Coming Soon" alerts
 */
