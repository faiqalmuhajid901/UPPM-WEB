/**
 * ============================================
 * PENELITIAN PAGE - JavaScript Module
 * ============================================
 */

/**
 * Initialize Sort Menu
 */
function initFilterMenu() {
    const filterToggle = document.querySelector('.filter-pill');
    const filterMenu = document.getElementById('penelitian-filter-menu');
    const filterItems = filterMenu ? filterMenu.querySelectorAll('.filter-menu__item') : [];

    if (!filterToggle || !filterMenu || filterItems.length === 0) return;

    const closeMenu = () => {
        filterMenu.classList.remove('is-open');
        filterToggle.setAttribute('aria-expanded', 'false');
    };

    const openMenu = () => {
        filterMenu.classList.add('is-open');
        filterToggle.setAttribute('aria-expanded', 'true');
    };

    const applySort = (sortValue) => {
        const url = new URL(window.location.href);
        url.searchParams.set('sort', sortValue);
        url.searchParams.delete('page');
        window.location.href = url.toString();
    };

    filterToggle.addEventListener('click', (event) => {
        event.stopPropagation();
        if (filterMenu.classList.contains('is-open')) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    filterItems.forEach(item => {
        item.addEventListener('click', () => {
            const sortValue = item.dataset.sort || 'new';
            applySort(sortValue);
            closeMenu();
        });
    });

    document.addEventListener('click', (event) => {
        if (!filterMenu.contains(event.target) && event.target !== filterToggle) {
            closeMenu();
        }
    });

    console.log('Penelitian sort menu initialized');
}

/**
 * Initialize Card Animations
 */
function initCardAnimations() {
    const cards = document.querySelectorAll('.research-card, .research-mini-card');
    
    if (cards.length === 0) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '50px'
    });

    cards.forEach(card => {
        const animationDelay = Number(card.dataset.animationDelay || 0);
        if (animationDelay > 0) {
            card.style.animationDelay = `${animationDelay}ms`;
        }
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(card);
    });

    console.log('Penelitian card animations initialized');
}

/**
 * Initialize Statistics Counter Animation
 */
function initStatCounters() {
    const statNumbers = document.querySelectorAll('.stat-number');
    
    if (statNumbers.length === 0) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalValue = parseInt(target.textContent);
                
                if (isNaN(finalValue)) return;
                
                animateCounter(target, 0, finalValue, 1000);
                observer.unobserve(target);
            }
        });
    }, { threshold: 0.5 });

    statNumbers.forEach(stat => observer.observe(stat));

    console.log('Penelitian stat counters initialized');
}

/**
 * Animate Counter
 */
function animateCounter(element, start, end, duration) {
    const startTime = performance.now();
    
    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function (ease-out)
        const easeOut = 1 - Math.pow(1 - progress, 3);
        const current = Math.floor(start + (end - start) * easeOut);
        
        element.textContent = current;
        
        if (progress < 1) {
            requestAnimationFrame(update);
        } else {
            element.textContent = end;
        }
    }
    
    requestAnimationFrame(update);
}

/**
 * Initialize Download Tracking (Optional)
 */
function initDownloadTracking() {
    const downloadLinks = document.querySelectorAll('.action-btn.download, .card-link, .research-mini-card__link, .research-featured-link');
    
    downloadLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const card = this.closest('.research-card');
            const title = card?.querySelector('.card-title')?.textContent || 'Unknown';
            const category = card?.dataset.category || 'unknown';
            
            // Log download (bisa diganti dengan analytics)
            console.log(`Download: ${title} (${category})`);
            
            // Jika ingin tracking dengan analytics, uncomment:
            // if (typeof gtag !== 'undefined') {
            //     gtag('event', 'download', {
            //         'event_category': 'penelitian',
            //         'event_label': title,
            //         'value': category
            //     });
            // }
        });
    });
}

/**
 * Main Initialization
 */
function initPenelitian() {
    // Check if we're on penelitian page
    const penelitianContent = document.getElementById('penelitian-content');
    if (!penelitianContent) return;

    initFilterMenu();
    initCardAnimations();
    initStatCounters();
    initDownloadTracking();

    console.log('✅ Penelitian module loaded');
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', initPenelitian);

// Export for use in other modules if needed
export { initPenelitian, initFilterMenu, initCardAnimations };
