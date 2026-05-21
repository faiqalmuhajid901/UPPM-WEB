/**
 * Kelola Konten Page JavaScript
 * Disesuaikan dengan route: /admin/content/{section}/{category}
 */

document.addEventListener('DOMContentLoaded', function() {
    KontenManager.init();
});

const KontenManager = {
    // Section mapping (section -> categories)
    sectionMap: {
        profil: ['Slider', 'Tentang', 'Visi Misi', 'Sejarah', 'Struktur'],
        penelitian: ['Panduan', 'Jurnal', 'HAKI', 'Hasil'],
        pengabdian: ['Panduan', 'Dokumentasi', 'Laporan'],
        kkn: ['Panduan', 'Dokumentasi', 'Lokasi'],
        publikasi: ['Jurnal', 'Prosiding', 'Nasional', 'Internasional']
    },

    elements: {},
    deleteId: null,
    currentSection: null,
    currentCategory: null,

    init: function() {
        this.cacheElements();
        this.bindEvents();
        this.updateEmptyState();
    },

    cacheElements: function() {
        this.elements = {
            modal: document.getElementById('modal-konten'),
            modalDelete: document.getElementById('modal-delete'),
            modalTitle: document.getElementById('modal-title'),
            form: document.getElementById('form-konten'),
            btnTambah: document.getElementById('btn-tambah-konten'),
            btnClose: document.getElementById('modal-close'),
            btnCancel: document.getElementById('btn-cancel'),
            btnDeleteClose: document.getElementById('modal-delete-close'),
            btnDeleteCancel: document.getElementById('btn-delete-cancel'),
            btnDeleteConfirm: document.getElementById('btn-delete-confirm'),
            tbody: document.getElementById('konten-tbody'),
            table: document.getElementById('konten-table'),
            emptyState: document.getElementById('empty-state'),
            totalKonten: document.getElementById('total-konten'),
            searchInput: document.getElementById('search-konten'),
            filterKategori: document.getElementById('filter-kategori'),
            sectionSelect: document.getElementById('section'),
            categorySelect: document.getElementById('category'),
            imageInput: document.getElementById('image'),
            imagePreview: document.getElementById('image-preview'),
            deleteTitle: document.getElementById('delete-title'),
            kategoriCards: document.querySelectorAll('.kategori-card'),
            tags: document.querySelectorAll('.tag')
        };
    },

    bindEvents: function() {
        // Modal events
        if (this.elements.btnTambah) {
            this.elements.btnTambah.addEventListener('click', () => this.openModal());
        }
        if (this.elements.btnClose) {
            this.elements.btnClose.addEventListener('click', () => this.closeModal());
        }
        if (this.elements.btnCancel) {
            this.elements.btnCancel.addEventListener('click', () => this.closeModal());
        }
        if (this.elements.modal) {
            this.elements.modal.addEventListener('click', (e) => {
                if (e.target === this.elements.modal) this.closeModal();
            });
        }

        // Delete modal events
        if (this.elements.btnDeleteClose) {
            this.elements.btnDeleteClose.addEventListener('click', () => this.closeDeleteModal());
        }
        if (this.elements.btnDeleteCancel) {
            this.elements.btnDeleteCancel.addEventListener('click', () => this.closeDeleteModal());
        }
        if (this.elements.btnDeleteConfirm) {
            this.elements.btnDeleteConfirm.addEventListener('click', () => this.confirmDelete());
        }
        if (this.elements.modalDelete) {
            this.elements.modalDelete.addEventListener('click', (e) => {
                if (e.target === this.elements.modalDelete) this.closeDeleteModal();
            });
        }

        // Form events
        if (this.elements.form) {
            this.elements.form.addEventListener('submit', (e) => this.handleSubmit(e));
        }
        if (this.elements.sectionSelect) {
            this.elements.sectionSelect.addEventListener('change', (e) => this.updateCategoryOptions(e.target.value));
        }
        if (this.elements.imageInput) {
            this.elements.imageInput.addEventListener('change', (e) => this.previewImage(e));
        }

        // Search and filter
        if (this.elements.searchInput) {
            this.elements.searchInput.addEventListener('input', () => this.filterTable());
        }
        if (this.elements.filterKategori) {
            this.elements.filterKategori.addEventListener('change', () => this.filterTable());
        }

        // Kategori card clicks
        this.elements.kategoriCards.forEach(card => {
            card.addEventListener('click', () => this.handleKategoriClick(card));
        });

        // Tag clicks
        this.elements.tags.forEach(tag => {
            tag.addEventListener('click', (e) => {
                e.stopPropagation();
                this.handleTagClick(tag);
            });
        });

        // Table action buttons
        this.bindTableEvents();

        // Keyboard events
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                if (this.elements.modal && this.elements.modal.classList.contains('show')) {
                    this.closeModal();
                }
                if (this.elements.modalDelete && this.elements.modalDelete.classList.contains('show')) {
                    this.closeDeleteModal();
                }
            }
        });
    },

    bindTableEvents: function() {
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', () => this.editKonten(btn.dataset.id));
        });

        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', () => this.openDeleteModal(btn.dataset.id));
        });
    },

    openModal: function(data = null) {
        if (!this.elements.modal) return;
        
        this.elements.modal.classList.add('show');
        document.body.style.overflow = 'hidden';

        if (data) {
            this.elements.modalTitle.textContent = 'Edit Konten';
            document.getElementById('form-method').value = 'PUT';
            this.populateForm(data);
        } else {
            this.elements.modalTitle.textContent = 'Tambah Konten Baru';
            document.getElementById('form-method').value = 'POST';
            this.elements.form.reset();
            document.getElementById('konten-id').value = '';
            this.elements.imagePreview.innerHTML = '';
            if (this.elements.categorySelect) {
                this.elements.categorySelect.innerHTML = '<option value="">Pilih Category</option>';
            }
        }
    },

    closeModal: function() {
        if (!this.elements.modal) return;
        
        this.elements.modal.classList.remove('show');
        document.body.style.overflow = '';
        this.elements.form.reset();
        this.elements.imagePreview.innerHTML = '';
    },

    openDeleteModal: function(id) {
        this.deleteId = id;
        const row = document.querySelector(`tr[data-id="${id}"]`);
        const title = row ? row.querySelector('.konten-title').textContent : '';
        
        if (this.elements.deleteTitle) {
            this.elements.deleteTitle.textContent = title;
        }
        
        if (this.elements.modalDelete) {
            this.elements.modalDelete.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    },

    closeDeleteModal: function() {
        this.deleteId = null;
        if (this.elements.modalDelete) {
            this.elements.modalDelete.classList.remove('show');
            document.body.style.overflow = '';
        }
    },

    updateCategoryOptions: function(section) {
        const categories = this.sectionMap[section] || [];
        let options = '<option value="">Pilih Category</option>';
        
        categories.forEach(cat => {
            const value = cat.toLowerCase().replace(/ /g, '-');
            options += `<option value="${value}">${cat}</option>`;
        });

        if (this.elements.categorySelect) {
            this.elements.categorySelect.innerHTML = options;
        }
    },

    previewImage: function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                this.elements.imagePreview.innerHTML = `<img src="${event.target.result}" alt="Preview">`;
            };
            reader.readAsDataURL(file);
        }
    },

    handleSubmit: async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this.elements.form);
        const id = document.getElementById('konten-id').value;
        const method = document.getElementById('form-method').value;
        const section = document.getElementById('section').value;
        const category = document.getElementById('category').value;
        
        // Determine URL based on action
        let url;
        if (id && method === 'PUT') {
            // Update existing content
            url = `/admin/content/${id}`;
            formData.append('_method', 'PUT');
        } else {
            // Create new content - route: /admin/content/{section}/{category}
            url = `/admin/content/${section}/${category}`;
        }

        const submitBtn = document.getElementById('btn-submit');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Menyimpan...';

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (result.success) {
                this.closeModal();
                this.showNotification('Konten berhasil disimpan!', 'success');
                setTimeout(() => location.reload(), 500);
            } else {
                this.showNotification(result.message || 'Terjadi kesalahan', 'error');
            }
        } catch (error) {
            console.error('Error:', error);
            this.showNotification('Terjadi kesalahan saat menyimpan', 'error');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Simpan';
        }
    },

    editKonten: async function(id) {
        try {
            // Route: /admin/content/{id}/edit
            const response = await fetch(`/admin/content/${id}/edit`, {
                headers: { 'Accept': 'application/json' }
            });
            const result = await response.json();
            
            if (result.success) {
                this.openModal(result.data);
            }
        } catch (error) {
            console.error('Error:', error);
            this.showNotification('Gagal memuat data konten', 'error');
        }
    },

    confirmDelete: async function() {
        if (!this.deleteId) return;

        const confirmBtn = this.elements.btnDeleteConfirm;
        confirmBtn.disabled = true;
        confirmBtn.textContent = 'Menghapus...';

        try {
            // Route: DELETE /admin/content/{id}
            const response = await fetch(`/admin/content/${this.deleteId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();
            
            if (result.success) {
                this.closeDeleteModal();
                this.showNotification('Konten berhasil dihapus', 'success');
                
                // Remove row from table
                const row = document.querySelector(`tr[data-id="${this.deleteId}"]`);
                if (row) {
                    row.remove();
                    this.updateTotalCount();
                    this.updateEmptyState();
                    this.updateCategoryCounts();
                }
            } else {
                this.showNotification(result.message || 'Gagal menghapus', 'error');
            }
        } catch (error) {
            console.error('Error:', error);
            this.showNotification('Terjadi kesalahan', 'error');
        } finally {
            confirmBtn.disabled = false;
            confirmBtn.textContent = 'Hapus';
        }
    },

    filterTable: function() {
        const search = this.elements.searchInput ? this.elements.searchInput.value.toLowerCase() : '';
        const section = this.elements.filterKategori ? this.elements.filterKategori.value : '';
        const rows = this.elements.tbody ? this.elements.tbody.querySelectorAll('tr') : [];
        let visibleCount = 0;

        rows.forEach(row => {
            const titleEl = row.querySelector('.konten-title');
            const title = titleEl ? titleEl.textContent.toLowerCase() : '';
            const rowSection = row.dataset.section;
            
            const matchSearch = title.includes(search);
            const matchSection = !section || rowSection === section;

            if (matchSearch && matchSection) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        if (this.elements.totalKonten) {
            this.elements.totalKonten.textContent = visibleCount;
        }
    },

    handleKategoriClick: function(card) {
        this.elements.kategoriCards.forEach(c => c.classList.remove('active'));
        card.classList.add('active');

        const section = card.dataset.kategori;
        if (this.elements.filterKategori) {
            this.elements.filterKategori.value = section;
        }
        this.filterTable();
    },

    handleTagClick: function(tag) {
        this.elements.tags.forEach(t => t.classList.remove('active'));
        tag.classList.add('active');
        
        const category = tag.dataset.section;
        const rows = this.elements.tbody ? this.elements.tbody.querySelectorAll('tr') : [];

        rows.forEach(row => {
            const rowCategory = row.dataset.category;
            row.style.display = rowCategory === category ? '' : 'none';
        });
    },

    updateTotalCount: function() {
        if (!this.elements.tbody || !this.elements.totalKonten) return;
        const visibleRows = this.elements.tbody.querySelectorAll('tr:not([style*="display: none"])');
        this.elements.totalKonten.textContent = visibleRows.length;
    },

    updateCategoryCounts: function() {
        // Update count pada kategori cards
        const rows = this.elements.tbody ? this.elements.tbody.querySelectorAll('tr') : [];
        const counts = {};

        rows.forEach(row => {
            const section = row.dataset.section;
            if (section) {
                counts[section] = (counts[section] || 0) + 1;
            }
        });

        // Update display
        Object.keys(counts).forEach(section => {
            const countEl = document.querySelector(`[data-count="${section}"]`);
            if (countEl) {
                countEl.textContent = counts[section];
            }
        });
    },

    updateEmptyState: function() {
        const hasRows = this.elements.tbody && this.elements.tbody.children.length > 0;
        
        if (this.elements.emptyState) {
            this.elements.emptyState.classList.toggle('show', !hasRows);
        }
        
        if (this.elements.table) {
            const thead = this.elements.table.querySelector('thead');
            if (thead) {
                thead.style.display = hasRows ? '' : 'none';
            }
        }
    },

    populateForm: function(data) {
        document.getElementById('konten-id').value = data.id;
        document.getElementById('title').value = data.title;
        document.getElementById('content').value = data.content;
        document.getElementById('section').value = data.section;
        
        // Update category options first, then set value
        this.updateCategoryOptions(data.section);
        
        setTimeout(() => {
            document.getElementById('category').value = data.category;
        }, 50);

        if (data.image) {
            this.elements.imagePreview.innerHTML = `<img src="/storage/${data.image}" alt="Preview">`;
        }
    },

    showNotification: function(message, type = 'info') {
        // Check if there's a custom notification function
        if (typeof showAlert === 'function') {
            showAlert(message, type);
        } else {
            alert(message);
        }
    }
};
