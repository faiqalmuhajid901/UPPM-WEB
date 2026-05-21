/**
 * Login page interactions.
 */

document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');

    if (!passwordInput || !toggleButton) {
        return;
    }

    const eyeOpen = toggleButton.querySelector('[data-eye-open]');
    const eyeOff = toggleButton.querySelector('[data-eye-off]');

    toggleButton.addEventListener('click', () => {
        const isHidden = passwordInput.type === 'password';

        passwordInput.type = isHidden ? 'text' : 'password';
        toggleButton.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Tampilkan password');
        toggleButton.setAttribute('aria-pressed', isHidden ? 'true' : 'false');

        if (eyeOpen && eyeOff) {
            eyeOpen.classList.toggle('is-hidden', isHidden);
            eyeOff.classList.toggle('is-hidden', !isHidden);
        }
    });
});

export function initLoginPage() {
    // Kept for compatibility with existing import pattern.
}
