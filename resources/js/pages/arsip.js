/**
 * Arsip Dokumen Page JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ Arsip page initialized');

    // Search functionality
    const searchInput = document.getElementById('search-dokumen');
    const dokumenGrid = document.getElementById('dokumen-grid');
    const filterBtns = document.querySelectorAll('.arsip-tab');
    const panels = dokumenGrid?.querySelectorAll('.arsip-tab-panel') || [];

    const applySearchFilter = () => {
        if (!dokumenGrid) return;
        const searchTerm = (searchInput?.value || '').toLowerCase();
        const activePanel = dokumenGrid.querySelector('.arsip-tab-panel.is-active');
        if (activePanel) {
            const cards = activePanel.querySelectorAll('[data-doc-card="true"]');
            cards.forEach(card => {
                const title =
                    card.querySelector('.arsip-card__title')?.textContent.toLowerCase() ||
                    card.querySelector('.panduan-card__title')?.textContent.toLowerCase() ||
                    '';
                const desc =
                    card.querySelector('.arsip-card__desc')?.textContent.toLowerCase() ||
                    card.querySelector('.panduan-card__desc')?.textContent.toLowerCase() ||
                    '';
                const show = title.includes(searchTerm) || desc.includes(searchTerm);
                card.style.display = show ? '' : 'none';
            });
        }

        const panduanCards = document.querySelectorAll('.arsip-panduan-section [data-doc-card="true"]');
        panduanCards.forEach(card => {
            const title = card.querySelector('.panduan-card__title')?.textContent.toLowerCase() || '';
            const desc = card.querySelector('.panduan-card__desc')?.textContent.toLowerCase() || '';
            const show = title.includes(searchTerm) || desc.includes(searchTerm);
            card.style.display = show ? '' : 'none';
        });
    };

    if (searchInput && dokumenGrid) {
        searchInput.addEventListener('input', applySearchFilter);
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => {
                b.classList.remove('active');
                b.setAttribute('aria-selected', 'false');
                b.setAttribute('tabindex', '-1');
            });

            this.classList.add('active');
            this.setAttribute('aria-selected', 'true');
            this.setAttribute('tabindex', '0');

            const filter = this.dataset.filter;
            panels.forEach(panel => {
                const isActive = panel.dataset.panel === filter;
                panel.classList.toggle('is-active', isActive);
                panel.setAttribute('aria-hidden', isActive ? 'false' : 'true');
            });

            applySearchFilter();
        });
    });
});
