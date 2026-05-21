export function initDynamicBackgroundImages() {
    document.querySelectorAll('[data-bg-image]').forEach((element) => {
        const imageUrl = element.dataset.bgImage;
        if (!imageUrl) return;

        element.style.backgroundImage = `url("${imageUrl}")`;
    });
}
