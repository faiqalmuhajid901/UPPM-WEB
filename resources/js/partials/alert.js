/**
 * FILE: resources/js/partials/alert.js
 * Alert & Toast Notification System
 * - Auto Dismiss
 * - Manual Close
 * - Multiple Types (success, error, warning, info)
 * - Stack Multiple Alerts
 */

export function initAlert() {
    initExistingAlerts();
    createAlertContainer();
}

/**
 * Initialize alerts that exist in DOM on page load
 */
function initExistingAlerts() {
    const alerts = document.querySelectorAll('[data-alert]');
    
    alerts.forEach(alert => {
        setupAlert(alert);
    });
}

/**
 * Setup individual alert
 */
function setupAlert(alert) {
    const duration = parseInt(alert.dataset.duration) || 5000;
    const autoDismiss = alert.dataset.autoDismiss !== 'false';
    
    // Auto dismiss
    if (autoDismiss && duration > 0) {
        // Progress bar animation
        const progressBar = alert.querySelector('.alert-progress');
        if (progressBar) {
            progressBar.style.transition = `width ${duration}ms linear`;
            requestAnimationFrame(() => {
                progressBar.style.width = '0%';
            });
        }

        setTimeout(() => {
            dismissAlert(alert);
        }, duration);
    }

    // Close button
    const closeBtn = alert.querySelector('[data-alert-close]');
    if (closeBtn) {
        closeBtn.addEventListener('click', (e) => {
            e.preventDefault();
            dismissAlert(alert);
        });
    }

    // Click to dismiss (optional)
    if (alert.dataset.clickDismiss === 'true') {
        alert.addEventListener('click', () => {
            dismissAlert(alert);
        });
    }
}

/**
 * Dismiss alert with animation
 */
function dismissAlert(alert) {
    if (!alert || alert.classList.contains('alert-dismissing')) return;
    
    alert.classList.add('alert-dismissing');
    alert.classList.add('opacity-0', 'translate-x-4', '-translate-y-2', 'scale-95');
    
    setTimeout(() => {
        alert.remove();
    }, 300);
}

/**
 * Create alert container if not exists
 */
function createAlertContainer() {
    if (document.getElementById('alert-container')) return;
    
    const container = document.createElement('div');
    container.id = 'alert-container';
    container.className = 'fixed top-20 right-4 z-50 flex flex-col gap-3 max-w-sm w-full pointer-events-none';
    container.setAttribute('aria-live', 'polite');
    container.setAttribute('aria-label', 'Notifications');
    document.body.appendChild(container);
    
    return container;
}

/**
 * Get alert container
 */
function getAlertContainer() {
    return document.getElementById('alert-container') || createAlertContainer();
}

/**
 * Show new alert programmatically
 * @param {string} message - Alert message
 * @param {string} type - Alert type: 'success' | 'error' | 'warning' | 'info'
 * @param {object} options - Additional options
 */
export function showAlert(message, type = 'info', options = {}) {
    const {
        title = null,
        duration = 5000,
        autoDismiss = true,
        showProgress = true,
        showIcon = true,
        position = 'top-right'
    } = options;

    const container = getAlertContainer();
    const alertId = `alert-${Date.now()}`;
    
    // Icon SVGs based on type
    const icons = {
        success: `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>`,
        error: `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>`,
        warning: `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>`,
        info: `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>`
    };

    // Color classes based on type
    const colors = {
        success: {
            bg: 'bg-green-50',
            border: 'border-green-200',
            icon: 'text-green-500',
            title: 'text-green-800',
            text: 'text-green-700',
            progress: 'bg-green-500'
        },
        error: {
            bg: 'bg-red-50',
            border: 'border-red-200',
            icon: 'text-red-500',
            title: 'text-red-800',
            text: 'text-red-700',
            progress: 'bg-red-500'
        },
        warning: {
            bg: 'bg-yellow-50',
            border: 'border-yellow-200',
            icon: 'text-yellow-500',
            title: 'text-yellow-800',
            text: 'text-yellow-700',
            progress: 'bg-yellow-500'
        },
        info: {
            bg: 'bg-blue-50',
            border: 'border-blue-200',
            icon: 'text-blue-500',
            title: 'text-blue-800',
            text: 'text-blue-700',
            progress: 'bg-blue-500'
        }
    };

    const color = colors[type] || colors.info;
    const icon = icons[type] || icons.info;

    // Create alert element
    const alertEl = document.createElement('div');
    alertEl.id = alertId;
    alertEl.className = `
        pointer-events-auto
        ${color.bg} ${color.border}
        border rounded-lg shadow-lg
        transform transition-all duration-300 ease-out
        opacity-0 translate-x-4 scale-95
        overflow-hidden
    `.replace(/\s+/g, ' ').trim();
    
    alertEl.dataset.alert = '';
    alertEl.dataset.duration = duration;
    alertEl.dataset.autoDismiss = autoDismiss;
    alertEl.setAttribute('role', 'alert');

    alertEl.innerHTML = `
        <div class="p-4">
            <div class="flex items-start gap-3">
                ${showIcon ? `<div class="flex-shrink-0 ${color.icon}">${icon}</div>` : ''}
                <div class="flex-1 min-w-0">
                    ${title ? `<p class="text-sm font-semibold ${color.title}">${title}</p>` : ''}
                    <p class="text-sm ${color.text} ${title ? 'mt-1' : ''}">${message}</p>
                </div>
                <button type="button" data-alert-close 
                    class="flex-shrink-0 p-1 rounded-md ${color.text} hover:${color.bg} focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-${type === 'error' ? 'red' : type === 'success' ? 'green' : type === 'warning' ? 'yellow' : 'blue'}-500 transition-colors"
                    aria-label="Tutup notifikasi">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
        ${showProgress && autoDismiss ? `
            <div class="h-1 w-full bg-gray-200/50">
                <div class="alert-progress h-full ${color.progress} w-full"></div>
            </div>
        ` : ''}
    `;

    // Add to container
    container.appendChild(alertEl);

    // Trigger entrance animation
    requestAnimationFrame(() => {
        alertEl.classList.remove('opacity-0', 'translate-x-4', 'scale-95');
        alertEl.classList.add('opacity-100', 'translate-x-0', 'scale-100');
    });

    // Setup dismiss behavior
    setupAlert(alertEl);

    return alertEl;
}

/**
 * Shortcut functions
 */
export function showSuccess(message, options = {}) {
    return showAlert(message, 'success', { title: 'Berhasil!', ...options });
}

export function showError(message, options = {}) {
    return showAlert(message, 'error', { title: 'Error!', ...options });
}

export function showWarning(message, options = {}) {
    return showAlert(message, 'warning', { title: 'Perhatian!', ...options });
}

export function showInfo(message, options = {}) {
    return showAlert(message, 'info', { title: 'Info', ...options });
}

/**
 * Dismiss all alerts
 */
export function dismissAllAlerts() {
    const container = document.getElementById('alert-container');
    if (!container) return;
    
    const alerts = container.querySelectorAll('[data-alert]');
    alerts.forEach(alert => dismissAlert(alert));
}
