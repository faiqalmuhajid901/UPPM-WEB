/**
 * Profil Kampus Page JavaScript
 * Handles modal animations and interactions for Visi & Misi
 */

document.addEventListener('DOMContentLoaded', function() {
    initModals();
    initVmTabs();
});

/**
 * Initialize all modals on the page
 */
function initModals() {
    // ESC key to close all modals
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAllModals();
        }
    });
}

/**
 * Initialize Visi & Misi tabs
 */
function initVmTabs() {
    const tabs = Array.from(document.querySelectorAll('[data-vm-tab]'));
    const panels = Array.from(document.querySelectorAll('[data-vm-panel]'));

    if (!tabs.length || !panels.length) {
        return;
    }

    const activeTab = tabs.find((tab) => tab.classList.contains('is-active')) || tabs[0];
    const activeKey = activeTab.getAttribute('data-vm-tab');

    tabs.forEach((tab) => {
        const isActive = tab === activeTab;
        tab.classList.toggle('is-active', isActive);
        tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
    });

    panels.forEach((panel) => {
        const isActive = panel.getAttribute('data-vm-panel') === activeKey;
        panel.classList.toggle('is-active', isActive);
        panel.setAttribute('aria-hidden', isActive ? 'false' : 'true');
        if (isActive) {
            panel.removeAttribute('hidden');
        } else {
            panel.setAttribute('hidden', '');
        }
    });

    tabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            if (tab.classList.contains('is-active')) {
                return;
            }
            switchVmTab(tab, tabs, panels);
        });
    });
}

function switchVmTab(nextTab, tabs, panels) {
    const nextKey = nextTab.getAttribute('data-vm-tab');
    const currentTab = tabs.find((tab) => tab.classList.contains('is-active'));
    const currentKey = currentTab ? currentTab.getAttribute('data-vm-tab') : null;

    const currentPanel = currentKey
        ? panels.find((panel) => panel.getAttribute('data-vm-panel') === currentKey)
        : null;
    const nextPanel = panels.find((panel) => panel.getAttribute('data-vm-panel') === nextKey);

    if (currentTab) {
        currentTab.classList.remove('is-active');
        currentTab.setAttribute('aria-selected', 'false');
    }
    nextTab.classList.add('is-active');
    nextTab.setAttribute('aria-selected', 'true');

    if (currentPanel) {
        currentPanel.classList.remove('is-active');
        currentPanel.classList.add('is-leaving');
        currentPanel.setAttribute('aria-hidden', 'true');
        window.setTimeout(() => {
            currentPanel.setAttribute('hidden', '');
            currentPanel.classList.remove('is-leaving');
        }, 220);
    }

    if (nextPanel) {
        nextPanel.removeAttribute('hidden');
        nextPanel.setAttribute('aria-hidden', 'false');
        window.requestAnimationFrame(() => {
            nextPanel.classList.add('is-active');
        });
    }
}

/**
 * Open modal with smooth animation
 */
window.openModal = function(modalId) {
    const modal = document.getElementById(modalId);
    
    if (!modal) {
        console.error('Modal not found:', modalId);
        return;
    }
    
    const backdrop = document.getElementById(modalId + '-backdrop');
    const container = document.getElementById(modalId + '-container');
    
    // Show modal
    modal.style.display = 'block';
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
    
    // Animate in (small delay to allow display:block to apply)
    setTimeout(() => {
        if (backdrop) {
            backdrop.style.opacity = '1';
        }
        if (container) {
            container.style.opacity = '1';
            container.style.transform = 'translate(-50%, -50%) scale(1)';
        }
    }, 10);
};

/**
 * Close modal with smooth animation
 */
window.closeModal = function(modalId) {
    const modal = document.getElementById(modalId);
    
    if (!modal) {
        console.error('Modal not found:', modalId);
        return;
    }
    
    const backdrop = document.getElementById(modalId + '-backdrop');
    const container = document.getElementById(modalId + '-container');
    
    // Animate out
    if (backdrop) {
        backdrop.style.opacity = '0';
    }
    if (container) {
        container.style.opacity = '0';
        container.style.transform = 'translate(-50%, -50%) scale(0.95)';
    }
    
    // Hide modal after animation
    setTimeout(() => {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }, 300);
};

/**
 * Close modal when clicking on backdrop
 */
window.closeModalOnBackdrop = function(event, modalId) {
    // Only close if clicking directly on the modal container (backdrop area)
    if (event.target === event.currentTarget) {
        closeModal(modalId);
    }
};

/**
 * Close all open modals
 */
function closeAllModals() {
    const modals = document.querySelectorAll('[id^="modal-"]');
    
    modals.forEach(modal => {
        if (modal.style.display === 'block') {
            closeModal(modal.id);
        }
    });
}
