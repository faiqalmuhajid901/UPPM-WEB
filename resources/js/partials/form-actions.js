function initAutoSubmitFields() {
    document.querySelectorAll('select[data-auto-submit="true"]').forEach((select) => {
        select.addEventListener('change', () => {
            select.form?.submit();
        });
    });
}

function initConfirmActions() {
    document.querySelectorAll('form[data-confirm-message]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            const message = form.dataset.confirmMessage;
            if (message && !window.confirm(message)) {
                event.preventDefault();
            }
        });
    });

    document.querySelectorAll('[data-confirm-message]:not(form)').forEach((element) => {
        element.addEventListener('click', (event) => {
            const message = element.dataset.confirmMessage;
            if (message && !window.confirm(message)) {
                event.preventDefault();
                event.stopPropagation();
            }
        });
    });
}

export function initFormActions() {
    initAutoSubmitFields();
    initConfirmActions();
}
