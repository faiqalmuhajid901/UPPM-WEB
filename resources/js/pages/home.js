/**
 * Home Page JavaScript
 * Handles accordion animations and interactions
 */

document.addEventListener('DOMContentLoaded', function() {
    initAccordions();
    initImageFallbackHandlers();
});

/**
 * Initialize all accordions on the page
 */
function initAccordions() {
    const accordionItems = document.querySelectorAll('[data-accordion]');
    
    accordionItems.forEach(item => {
        const button = item.querySelector('.accordion-button');
        const content = item.querySelector('.accordion-content');
        const icon = item.querySelector('.accordion-icon');
        
        if (button && content) {
            button.addEventListener('click', function() {
                toggleAccordion(item, content, icon);
            });
        }
    });
}

/**
 * Toggle accordion open/close with smooth animation
 */
function toggleAccordion(item, content, icon) {
    const isActive = item.classList.contains('active');
    
    // Close all other accordions in the same container
    const container = item.closest('.space-y-4');
    if (container) {
        const allItems = container.querySelectorAll('[data-accordion]');
        allItems.forEach(otherItem => {
            if (otherItem !== item) {
                const otherContent = otherItem.querySelector('.accordion-content');
                const otherIcon = otherItem.querySelector('.accordion-icon');
                
                otherItem.classList.remove('active');
                if (otherContent) {
                    otherContent.classList.remove('active');
                    otherContent.style.maxHeight = '0';
                    otherContent.style.opacity = '0';
                }
                if (otherIcon) {
                    otherIcon.style.transform = 'rotate(0deg)';
                }
            }
        });
    }
    
    // Toggle current accordion
    if (isActive) {
        // Close
        item.classList.remove('active');
        content.classList.remove('active');
        content.style.maxHeight = '0';
        content.style.opacity = '0';
        if (icon) {
            icon.style.transform = 'rotate(0deg)';
        }
    } else {
        // Open
        item.classList.add('active');
        content.classList.add('active');
        content.style.maxHeight = content.scrollHeight + 'px';
        content.style.opacity = '1';
        if (icon) {
            icon.style.transform = 'rotate(180deg)';
        }
    }
}

/**
 * Handle image fallback on hero slider
 */
function initImageFallbackHandlers() {
    const fallbackImages = document.querySelectorAll('.js-image-fallback');
    if (!fallbackImages.length) return;

    fallbackImages.forEach((image) => {
        const applyFallback = () => {
            image.classList.add('hidden');

            const parent = image.parentElement;
            if (!parent) return;

            const fallbackClasses = (image.dataset.fallbackParentClasses || '')
                .split(' ')
                .map((className) => className.trim())
                .filter(Boolean);

            if (fallbackClasses.length) {
                parent.classList.add(...fallbackClasses);
            }
        };

        image.addEventListener('error', applyFallback, { once: true });
        if (image.complete && image.naturalWidth === 0) {
            applyFallback();
        }
    });
}

// Export for global access if needed
window.toggleAccordion = toggleAccordion;
