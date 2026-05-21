{{-- resources/views/admin/konten/partials/modal-delete.blade.php --}}
{{-- PENTING: Modal harus tersembunyi secara default --}}
<div id="modal-delete" class="modal-overlay delete-modal">
    <div class="modal-content">
        <div class="modal-body">
            <div class="delete-icon">
                <i class="fas fa-trash-alt"></i>
            </div>
            <h3 class="delete-title">Hapus Konten?</h3>
            <p class="delete-text">
                Konten "<span id="delete-title">ini</span>" akan dihapus permanen dan tidak dapat dikembalikan.
            </p>
            <div class="delete-buttons">
                <button type="button" class="btn-cancel" id="btn-delete-cancel">Batal</button>
                <button type="button" class="btn-submit btn-delete-confirm" id="btn-delete-confirm">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </div>
        </div>
    </div>
</div>
