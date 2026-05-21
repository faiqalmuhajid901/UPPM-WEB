/**
 * FILE: resources/js/pages/proposal.js
 * JavaScript untuk halaman proposal penelitian.
 */

document.addEventListener('DOMContentLoaded', () => {
    const link = document.querySelector('a.google-form-link');

    // Only bind on the proposal page.
    if (!link) {
        return;
    }

    link.addEventListener('click', (event) => {
        event.preventDefault();
        const targetUrl = link.getAttribute('href') || 'https://forms.gle/fdPhDW4nMZz1Lkei8';
        window.open(targetUrl, '_blank', 'noopener,noreferrer');
    });
});

export function initProposal() {
    // Kept for compatibility with any existing imports.
}
