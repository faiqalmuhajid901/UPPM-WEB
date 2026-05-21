/**
 * Content Section Manager
 * FIXED: Event binding untuk tombol edit & delete
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ Content Section JS loaded');
    SectionManager.init();
});

const SectionManager = {
    // Data from server
    section: window.sectionData?.section || '',
    categories: window.sectionData?.categories || [],
    csrfToken: window.sectionData?.csrfToken || '',
    adminContentBaseUrl: window.sectionData?.adminContentBaseUrl || '',
    storageBaseUrl: window.sectionData?.storageBaseUrl || '',
    
    // State
    deleteId: null,
    elements: {},

    init: function() {
        const csrfMeta = document.querySelector('meta[name="csrf-token"]');
        const metaToken = csrfMeta ? csrfMeta.content : '';
        const sectionData = window.sectionData || {};
        const domSectionData = this.getSectionDataFromDom();

        this.section = this.resolveSection(
            sectionData.section,
            domSectionData.section,
            this.section,
            this.getSectionFromCurrentPath()
        );

        const sectionCategories = Array.isArray(sectionData.categories) ? sectionData.categories : [];
        const domCategories = Array.isArray(domSectionData.categories) ? domSectionData.categories : [];
        this.categories = sectionCategories.length > 0
            ? sectionCategories
            : (domCategories.length > 0 ? domCategories : this.categories);

        this.csrfToken = sectionData.csrfToken || domSectionData.csrfToken || metaToken || this.csrfToken;
        this.adminContentBaseUrl = sectionData.adminContentBaseUrl || domSectionData.adminContentBaseUrl || this.adminContentBaseUrl;
        this.storageBaseUrl = sectionData.storageBaseUrl || domSectionData.storageBaseUrl || this.storageBaseUrl;

        this.cacheElements();
        this.bindEvents();
        this.bindTableEvents(); // Panggil terpisah untuk memastikan

        console.log('✅ SectionManager initialized for:', this.section);
        console.log('📁 Categories:', this.categories);
    },

    cacheElements: function() {
        this.elements = {
            // Modals
            modalForm: document.getElementById('modal-form'),
            modalDelete: document.getElementById('modal-delete'),
            modalTitle: document.getElementById('modal-title'),
            modalClose: document.getElementById('modal-close'),
            
            // Form
            form: document.getElementById('content-form'),
            contentId: document.getElementById('content-id'),
            formMethod: document.getElementById('form-method'),
            categorySelect: document.getElementById('category'),
            titleInput: document.getElementById('title'),
            excerptInput: document.getElementById('excerpt'),
            contentInput: document.getElementById('content'),
            orderInput: document.getElementById('order'),
            isPublished: document.getElementById('is_published'),
            subcategoryGroup: document.getElementById('subcategory-group'),
            subcategorySelect: document.getElementById('subcategory'),
            
            // Icon field
            iconInput: document.getElementById('icon'),
            iconGroup: document.getElementById('icon-group'),
            iconPreviewI: document.getElementById('icon-preview-i'),
            
            // Image upload
            imageInput: document.getElementById('image'),
            imagePreview: document.getElementById('image-preview'),
            imageGroup: document.getElementById('image-group'),
            
            // File upload
            fileInput: document.getElementById('file'),
            filePreview: document.getElementById('file-preview'),
            fileUploadContent: document.getElementById('file-upload-content'),
            fileGroup: document.getElementById('file-group'),
            
            // Buttons
            btnTambah: document.getElementById('btn-tambah'),
            btnTambahEmpty: document.getElementById('btn-tambah-empty'),
            btnCancel: document.getElementById('btn-cancel'),
            btnSubmit: document.getElementById('btn-submit'),
            btnDeleteCancel: document.getElementById('btn-delete-cancel'),
            btnDeleteConfirm: document.getElementById('btn-delete-confirm'),
            
            // Delete modal
            deleteTitle: document.getElementById('delete-title'),
            
            // Table & Search
            searchInput: document.getElementById('search-input'),
            contentCount: document.getElementById('content-count'),
            tbody: document.getElementById('content-tbody'),
            categoryTabs: document.querySelectorAll('.category-tab')
        };
    },

    bindEvents: function() {
        // Add content buttons
        this.bindClick(this.elements.btnTambah, () => this.openModal());
        this.bindClick(this.elements.btnTambahEmpty, () => this.openModal());

        // Modal controls
        this.bindClick(this.elements.modalClose, () => this.closeModal());
        this.bindClick(this.elements.btnCancel, () => this.closeModal());
        
        // Close modal when clicking outside
        if (this.elements.modalForm) {
            this.elements.modalForm.addEventListener('click', (e) => {
                if (e.target === this.elements.modalForm) {
                    this.closeModal();
                }
            });
        }

        // Delete modal controls
        this.bindClick(this.elements.btnDeleteCancel, () => this.closeDeleteModal());
        this.bindClick(this.elements.btnDeleteConfirm, () => this.confirmDelete());
        
        if (this.elements.modalDelete) {
            this.elements.modalDelete.addEventListener('click', (e) => {
                if (e.target === this.elements.modalDelete) {
                    this.closeDeleteModal();
                }
            });
        }

        // Form submit
        if (this.elements.form) {
            this.elements.form.addEventListener('submit', (e) => this.handleSubmit(e));
        }

        // Category change
        if (this.elements.categorySelect) {
            this.elements.categorySelect.addEventListener('change', (e) => {
                this.updateFormFieldsVisibility(e.target.value);
            });
        }

        // Icon preview
        if (this.elements.iconInput) {
            this.elements.iconInput.addEventListener('input', (e) => {
                this.updateIconPreview(e.target.value);
            });
        }

        // Image preview
        if (this.elements.imageInput) {
            this.elements.imageInput.addEventListener('change', (e) => this.previewImage(e));
        }

        // File preview
        if (this.elements.fileInput) {
            this.elements.fileInput.addEventListener('change', (e) => this.previewFile(e));
        }

        // Search
        if (this.elements.searchInput) {
            this.elements.searchInput.addEventListener('input', () => this.filterContent());
        }

        // Category tabs
        this.elements.categoryTabs.forEach(tab => {
            tab.addEventListener('click', () => this.handleTabClick(tab));
        });

        // Keyboard - ESC to close
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.closeModal();
                this.closeDeleteModal();
            }
        });

        // Delegated actions for dynamically rendered buttons
        document.addEventListener('click', (e) => {
            const openModalBtn = e.target.closest('[data-open-modal="true"]');
            if (openModalBtn) {
                e.preventDefault();
                this.openModal();
                return;
            }

            const removeImageBtn = e.target.closest('[data-remove-image="true"]');
            if (removeImageBtn) {
                e.preventDefault();
                this.removeImage();
                return;
            }

            const removeFileBtn = e.target.closest('[data-remove-file="true"]');
            if (removeFileBtn) {
                e.preventDefault();
                this.removeFile();
            }
        });
    },

    bindClick: function(element, callback) {
        if (element) {
            element.addEventListener('click', callback);
        }
    },

    setElementVisibility: function(element, isVisible, displayValue = 'block') {
        if (!element) return;
        element.classList.toggle('hidden', !isVisible);
        element.style.display = isVisible ? displayValue : 'none';
        if (isVisible) {
            element.removeAttribute('aria-hidden');
        } else {
            element.setAttribute('aria-hidden', 'true');
        }
    },

    parseJsonData: function(rawValue, fallback = []) {
        if (!rawValue) {
            return fallback;
        }

        try {
            return JSON.parse(rawValue);
        } catch (_) {
            // Try decoded HTML entities fallback.
            const textarea = document.createElement('textarea');
            textarea.innerHTML = rawValue;

            try {
                return JSON.parse(textarea.value);
            } catch (error) {
                console.error('Failed to parse JSON data:', error);
                return fallback;
            }
        }
    },

    resolveSection: function(...candidates) {
        for (const candidate of candidates) {
            const value = String(candidate || '').trim();
            if (value !== '' && !/^\d+$/.test(value)) {
                return value;
            }
        }

        return '';
    },

    getSectionDataFromDom: function() {
        const dataElement = document.getElementById('section-data');
        if (!dataElement) {
            return {};
        }

        const rawCategories = dataElement.dataset.categories || '[]';
        const categories = this.parseJsonData(rawCategories, []);

        return {
            section: dataElement.dataset.section || '',
            categories: Array.isArray(categories) ? categories : [],
            csrfToken: dataElement.dataset.csrfToken || '',
            adminContentBaseUrl: dataElement.dataset.adminContentBaseUrl || '',
            storageBaseUrl: dataElement.dataset.storageBaseUrl || '',
        };
    },

    getSectionFromCurrentPath: function() {
        const path = (window.location.pathname || '').replace(/\/+$/, '');
        const match = path.match(/\/admin\/content\/([^/?#]+)/i);

        if (!match || !match[1]) {
            return '';
        }

        const section = decodeURIComponent(match[1] || '').trim();
        if (!section || /^\d+$/.test(section)) {
            return '';
        }

        return section;
    },

    trimSlashes: function(value = '') {
        return String(value).replace(/^\/+|\/+$/g, '');
    },

    getAdminContentBaseUrl: function() {
        const configured = (this.adminContentBaseUrl || '').replace(/\/+$/, '');
        if (configured) {
            return configured;
        }

        const path = window.location.pathname || '';
        const marker = '/admin/content';
        const markerIndex = path.indexOf(marker);

        if (markerIndex !== -1) {
            return `${window.location.origin}${path.substring(0, markerIndex + marker.length)}`;
        }

        return `${window.location.origin}${marker}`;
    },

    getStorageBaseUrl: function() {
        const configured = (this.storageBaseUrl || '').replace(/\/+$/, '');
        if (configured) {
            return configured;
        }

        const adminBase = this.getAdminContentBaseUrl();
        return adminBase.replace(/\/admin\/content$/, '/storage');
    },

    buildAdminContentUrl: function(path = '') {
        const suffix = this.trimSlashes(path);
        const base = this.getAdminContentBaseUrl();
        return suffix ? `${base}/${suffix}` : base;
    },

    buildStorageUrl: function(path = '') {
        const suffix = this.trimSlashes(path);
        const base = this.getStorageBaseUrl();
        return suffix ? `${base}/${suffix}` : base;
    },

    // ==========================================
    // TABLE EVENTS - FIXED dengan Event Delegation
    // ==========================================
    
    bindTableEvents: function() {
        const self = this;
        
        // Gunakan Event Delegation pada tbody atau document
        // Ini lebih reliable karena akan bekerja untuk element yang sudah ada maupun yang baru
        
        const tbody = document.getElementById('content-tbody');
        const tableContainer = tbody || document.querySelector('.content-table') || document;
        
        console.log('🔗 Binding table events to:', tableContainer);
        
        // Event delegation untuk tombol Edit
        tableContainer.addEventListener('click', function(e) {
            // Cek apakah yang diklik adalah tombol edit atau child-nya (icon)
            const editBtn = e.target.closest('.btn-edit');
            if (editBtn) {
                e.preventDefault();
                e.stopPropagation();
                const id = editBtn.dataset.id || editBtn.getAttribute('data-id');
                console.log('📝 Edit button clicked, ID:', id);
                if (id) {
                    self.editContent(id);
                }
                return;
            }
            
            // Cek apakah yang diklik adalah tombol delete atau child-nya (icon)
            const deleteBtn = e.target.closest('.btn-delete');
            if (deleteBtn) {
                e.preventDefault();
                e.stopPropagation();
                const id = deleteBtn.dataset.id || deleteBtn.getAttribute('data-id');
                const title = deleteBtn.dataset.title || deleteBtn.getAttribute('data-title') || 'konten ini';
                console.log('🗑️ Delete button clicked, ID:', id, 'Title:', title);
                if (id) {
                    self.openDeleteModal(id, title);
                }
                return;
            }
        });
        
        console.log('✅ Table events bound successfully');
    },

    // ==========================================
    // CATEGORY CONFIG HELPER
    // ==========================================

    getCategoryConfig: function(categoryKey) {
        if (Array.isArray(this.categories)) {
            return this.categories.find(c => c.key === categoryKey) || {};
        }
        return this.categories[categoryKey] || {};
    },

    updateFormFieldsVisibility: function(categoryKey, selectedSubcategory = '') {
        const config = this.getCategoryConfig(categoryKey);
        console.log('Category config for', categoryKey, ':', config);

        if (this.elements.iconGroup) {
            this.setElementVisibility(this.elements.iconGroup, config.has_icon === true);
        }
        if (this.elements.imageGroup) {
            this.setElementVisibility(this.elements.imageGroup, config.has_image !== false);
        }
        if (this.elements.fileGroup) {
            this.setElementVisibility(this.elements.fileGroup, config.has_file !== false);
        }
        if (this.elements.subcategoryGroup && this.elements.subcategorySelect) {
            const subcategories = config.subcategories || null;
            const hasSubcategories = subcategories && Object.keys(subcategories).length > 0;
            if (hasSubcategories) {
                this.populateSubcategoryOptions(subcategories, selectedSubcategory);
                this.setElementVisibility(this.elements.subcategoryGroup, true);
                this.elements.subcategorySelect.required = true;
                this.elements.subcategorySelect.disabled = false;
            } else {
                this.setElementVisibility(this.elements.subcategoryGroup, false);
                this.elements.subcategorySelect.required = false;
                this.elements.subcategorySelect.disabled = true;
                this.elements.subcategorySelect.value = '';
                this.elements.subcategorySelect.innerHTML = '<option value=\"\">Pilih Subkategori</option>';
            }
        }
    },

    populateSubcategoryOptions: function(subcategories, selectedValue = '') {
        if (!this.elements.subcategorySelect) return;
        const select = this.elements.subcategorySelect;
        select.innerHTML = '<option value=\"\">Pilih Subkategori</option>';

        const entries = Array.isArray(subcategories)
            ? subcategories.map(item => ({
                key: item.key || item.value || item.id || item,
                label: item.label || item.name || item
            }))
            : Object.entries(subcategories).map(([key, label]) => ({ key, label }));

        entries.forEach(entry => {
            const option = document.createElement('option');
            option.value = entry.key;
            option.textContent = entry.label;
            if (entry.key === selectedValue) {
                option.selected = true;
            }
            select.appendChild(option);
        });
    },

    extractArsipKategoriFromContent: function(content = '') {
        const match = String(content).match(/arsip_kategori\s*:\s*([a-z_-]+)/i);
        return match?.[1] || '';
    },

    updateIconPreview: function(iconName) {
        if (this.elements.iconPreviewI && iconName) {
            this.elements.iconPreviewI.className = `fas fa-${iconName.trim()}`;
        } else if (this.elements.iconPreviewI) {
            this.elements.iconPreviewI.className = 'fas fa-star';
        }
    },

    // ==========================================
    // MODAL OPERATIONS
    // ==========================================

    openModal: function(data = null) {
        const modal = this.elements.modalForm;
        if (!modal) {
            console.error('❌ Modal form not found!');
            return;
        }

        this.resetForm();

        if (data) {
            this.populateForm(data);
            if (this.elements.modalTitle) {
                this.elements.modalTitle.textContent = 'Edit Konten';
            }
        } else {
            if (this.elements.modalTitle) {
                this.elements.modalTitle.textContent = 'Tambah Konten';
            }
            this.showAllFormFields();
        }

        modal.style.display = 'flex';
        modal.offsetHeight;
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        
        console.log('✅ Modal opened');
    },

    closeModal: function() {
        const modal = this.elements.modalForm;
        if (!modal) return;

        modal.classList.remove('show');
        
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }, 300);
        
        console.log('✅ Modal closed');
    },

    showAllFormFields: function() {
        if (this.elements.iconGroup) this.setElementVisibility(this.elements.iconGroup, false);
        if (this.elements.imageGroup) this.setElementVisibility(this.elements.imageGroup, true);
        if (this.elements.fileGroup) this.setElementVisibility(this.elements.fileGroup, true);
    },

    resetForm: function() {
        if (this.elements.form) this.elements.form.reset();
        if (this.elements.contentId) this.elements.contentId.value = '';
        if (this.elements.formMethod) this.elements.formMethod.value = 'POST';
        if (this.elements.imagePreview) this.elements.imagePreview.innerHTML = '';
        if (this.elements.filePreview) this.elements.filePreview.innerHTML = '';
        if (this.elements.isPublished) this.elements.isPublished.checked = true;
        if (this.elements.orderInput) this.elements.orderInput.value = 0;
        if (this.elements.iconInput) this.elements.iconInput.value = '';
        if (this.elements.iconPreviewI) this.elements.iconPreviewI.className = 'fas fa-star';
        if (this.elements.subcategorySelect) {
            this.elements.subcategorySelect.value = '';
            this.elements.subcategorySelect.required = false;
            this.elements.subcategorySelect.disabled = true;
        }
        if (this.elements.subcategoryGroup) {
            this.setElementVisibility(this.elements.subcategoryGroup, false);
        }
        
        if (this.elements.fileUploadContent) {
            this.elements.fileUploadContent.innerHTML = `
                <i class="fas fa-file-upload"></i>
                <p>Klik untuk upload dokumen</p>
                <span class="file-upload-hint">PDF, DOC, DOCX (Max: 10MB)</span>
            `;
        }
    },

    populateForm: function(data) {
        console.log('📋 Populating form with data:', data);
        
        if (this.elements.contentId) this.elements.contentId.value = data.id;
        if (this.elements.formMethod) this.elements.formMethod.value = 'PUT';
        if (this.elements.categorySelect) this.elements.categorySelect.value = data.category;
        if (this.elements.titleInput) this.elements.titleInput.value = data.title || '';
        if (this.elements.excerptInput) this.elements.excerptInput.value = data.excerpt || '';
        const rawContent = data.content || '';
        const cleanContent = String(rawContent).replace(/<!--\s*arsip_kategori\s*:\s*[a-z_-]+\s*-->/ig, '').trim();
        if (this.elements.contentInput) this.elements.contentInput.value = cleanContent;
        if (this.elements.orderInput) this.elements.orderInput.value = data.order || 0;
        if (this.elements.isPublished) this.elements.isPublished.checked = data.is_published == 1;

        if (this.elements.iconInput) {
            this.elements.iconInput.value = data.icon || '';
        }
        if (data.icon) {
            this.updateIconPreview(data.icon);
        }

        const metaKategori = data.meta?.kategori || this.extractArsipKategoriFromContent(rawContent);
        this.updateFormFieldsVisibility(data.category, metaKategori);
        if (this.elements.subcategorySelect && metaKategori) {
            this.elements.subcategorySelect.value = metaKategori;
        }

        if (data.image && this.elements.imagePreview) {
            const imageUrl = data.image_url || this.buildStorageUrl(data.image);
            this.elements.imagePreview.innerHTML = `
                <div class="file-preview-item existing">
                    <img src="${imageUrl}" alt="Preview" class="file-preview-thumb">
                    <div class="file-info">
                        <div class="file-name">${data.image.split('/').pop()}</div>
                        <span class="file-status">Tersimpan</span>
                    </div>
                    <small class="file-preview-help">Upload baru untuk mengganti</small>
                </div>
            `;
        }

        if (data.file && this.elements.filePreview) {
            const fileName = data.file.split('/').pop();
            const fileUrl = data.file_url || this.buildStorageUrl(data.file);
            this.elements.filePreview.innerHTML = `
                <div class="file-preview-item existing">
                    <i class="fas fa-file-pdf"></i>
                    <div class="file-info">
                        <div class="file-name">${fileName}</div>
                        <span class="file-status">Tersimpan</span>
                    </div>
                    <a href="${fileUrl}" target="_blank" class="btn-view-file" title="Lihat file">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            `;
        }
    },

    // ==========================================
    // DELETE MODAL OPERATIONS
    // ==========================================

    openDeleteModal: function(id, title) {
        this.deleteId = id;
        console.log('🗑️ Opening delete modal for ID:', id, 'Title:', title);
        
        if (this.elements.deleteTitle) {
            this.elements.deleteTitle.textContent = title || 'konten ini';
        }
        
        const modal = this.elements.modalDelete;
        if (modal) {
            modal.style.display = 'flex';
            modal.offsetHeight;
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
            console.log('✅ Delete modal opened');
        } else {
            console.error('❌ Delete modal element not found!');
        }
    },

    closeDeleteModal: function() {
        const modal = this.elements.modalDelete;
        if (!modal) return;

        modal.classList.remove('show');
        
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }, 300);
        
        this.deleteId = null;
        console.log('✅ Delete modal closed');
    },

    confirmDelete: async function() {
        if (!this.deleteId) {
            console.error('❌ No deleteId set');
            return;
        }

        const idToDelete = this.deleteId;
        console.log('🗑️ Confirming delete for ID:', idToDelete);

        if (this.elements.btnDeleteConfirm) {
            this.elements.btnDeleteConfirm.disabled = true;
            this.elements.btnDeleteConfirm.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghapus...';
        }

        try {
            const response = await fetch(this.buildAdminContentUrl(idToDelete), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            console.log('Response status:', response.status);

            if (!response.ok) {
                const errorText = await response.text();
                console.error('Error response:', errorText);
                throw new Error(`HTTP ${response.status}`);
            }

            const result = await response.json();
            console.log('Delete result:', result);

            if (result.success) {
                this.closeDeleteModal();
                this.removeRowFromDOM(idToDelete);
                this.showNotification('Konten berhasil dihapus!', 'success');
            } else {
                this.showNotification(result.message || 'Gagal menghapus konten', 'error');
            }

        } catch (error) {
            console.error('Delete error:', error);
            this.showNotification('Terjadi kesalahan: ' + error.message, 'error');
        } finally {
            if (this.elements.btnDeleteConfirm) {
                this.elements.btnDeleteConfirm.disabled = false;
                this.elements.btnDeleteConfirm.innerHTML = '<i class="fas fa-trash"></i> Hapus';
            }
        }
    },

    removeRowFromDOM: function(id) {
        console.log('🔍 Looking for row with ID:', id);
        
        const row = document.querySelector(`tr[data-id="${id}"]`);

        if (row) {
            row.style.transition = 'all 0.4s ease';
            row.style.opacity = '0';
            row.style.transform = 'translateX(-30px)';
            row.style.backgroundColor = '#fee2e2';

            setTimeout(() => {
                row.remove();
                console.log('✅ Row removed successfully');
                this.updateCount();
                this.checkEmptyState();
            }, 400);
        } else {
            console.warn('⚠️ Row not found, reloading page...');
            setTimeout(() => location.reload(), 500);
        }
    },

    checkEmptyState: function() {
        const tbody = this.elements.tbody || document.getElementById('content-tbody');
        if (!tbody) return;

        const remainingRows = tbody.querySelectorAll('tr[data-id]');

        if (remainingRows.length === 0) {
            tbody.innerHTML = `
                <tr class="empty-row">
                    <td colspan="5">
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-inbox"></i>
                            </div>
                            <h3 class="empty-title">Belum ada konten</h3>
                            <p class="empty-text">Klik tombol untuk menambah konten baru</p>
                            <button type="button" class="btn-tambah" data-open-modal="true">
                                <i class="fas fa-plus"></i> Tambah Konten
                            </button>
                        </div>
                    </td>
                </tr>
            `;
        }
    },

    // ==========================================
    // IMAGE & FILE PREVIEW
    // ==========================================

    previewImage: function(e) {
        const file = e.target.files[0];
        if (file && this.elements.imagePreview) {
            if (file.size > 2 * 1024 * 1024) {
                this.showNotification('Ukuran gambar maksimal 2MB', 'error');
                e.target.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = (event) => {
                this.elements.imagePreview.innerHTML = `
                    <div class="file-preview-item">
                        <img src="${event.target.result}" alt="Preview" class="file-preview-thumb">
                        <div class="file-info">
                            <div class="file-name">${file.name}</div>
                            <div class="file-size">${this.formatFileSize(file.size)}</div>
                        </div>
                        <button type="button" class="btn-remove-file" data-remove-image="true">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        }
    },

    removeImage: function() {
        if (this.elements.imageInput) this.elements.imageInput.value = '';
        if (this.elements.imagePreview) this.elements.imagePreview.innerHTML = '';
    },

    previewFile: function(e) {
        const file = e.target.files[0];
        if (file && this.elements.filePreview) {
            if (file.size > 10 * 1024 * 1024) {
                this.showNotification('Ukuran file maksimal 10MB', 'error');
                e.target.value = '';
                return;
            }

            const fileExt = file.name.split('.').pop().toUpperCase();
            const iconClass = fileExt === 'PDF' ? 'fa-file-pdf' : 'fa-file-word';
            const iconToneClass = fileExt === 'PDF' ? 'is-pdf' : 'is-word';

            this.elements.filePreview.innerHTML = `
                <div class="file-preview-item">
                    <i class="fas ${iconClass} file-preview-icon ${iconToneClass}"></i>
                    <div class="file-info">
                        <div class="file-name">${file.name}</div>
                        <div class="file-size">${this.formatFileSize(file.size)}</div>
                    </div>
                    <button type="button" class="btn-remove-file" data-remove-file="true">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
        }
    },

    removeFile: function() {
        if (this.elements.fileInput) this.elements.fileInput.value = '';
        if (this.elements.filePreview) this.elements.filePreview.innerHTML = '';
    },

    formatFileSize: function(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    },

    // ==========================================
    // FORM SUBMIT
    // ==========================================

    handleSubmit: async function(e) {
        e.preventDefault();

        const id = this.elements.contentId?.value;
        const method = this.elements.formMethod?.value;
        const category = this.elements.categorySelect?.value;

        if (!category) {
            this.showNotification('Pilih kategori terlebih dahulu', 'error');
            return;
        }
        if (this.elements.subcategoryGroup && this.elements.subcategoryGroup.style.display !== 'none') {
            const subcategoryValue = this.elements.subcategorySelect?.value || '';
            if (!subcategoryValue) {
                this.showNotification('Pilih subkategori arsip terlebih dahulu', 'error');
                return;
            }
        }

        // Validate excerpt length (max 5000 characters)
        const excerptValue = this.elements.excerptInput?.value || '';
        if (excerptValue.length > 5000) {
            this.showNotification('Ringkasan tidak boleh lebih dari 5000 karakter. Saat ini: ' + excerptValue.length + ' karakter', 'error');
            return;
        }

        // Pastikan section selalu tersedia sebelum submit.
        this.section = this.resolveSection(
            this.section,
            this.getSectionDataFromDom().section,
            this.getSectionFromCurrentPath()
        );

        if (!this.section) {
            this.showNotification('Section konten tidak terbaca. Muat ulang halaman lalu coba lagi.', 'error');
            return;
        }

        // Debug: Log all form data before submitting
        const formData = new FormData(this.elements.form);
        const formDataObj = {};
        for (let [key, value] of formData.entries()) {
            formDataObj[key] = value;
        }
        console.log('📤 FormData being submitted:', formDataObj);
        console.log('📤 Section:', this.section, 'Category:', category);
        console.log('📤 CSRF Token:', this.csrfToken);
        
        let url;
        if (id && method === 'PUT') {
            url = this.buildAdminContentUrl(id);
            formData.append('_method', 'PUT');
        } else {
            url = this.buildAdminContentUrl(`${this.section}/${category}`);
        }

        console.log('📤 Submitting to:', url, 'Method:', method);

        this.setLoading(true);

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            // Get response text first for debugging
            const responseText = await response.text();
            console.log('📥 Response status:', response.status);
            console.log('📥 Response text:', responseText);

            let result;
            try {
                result = JSON.parse(responseText);
            } catch (e) {
                console.error('❌ Failed to parse JSON response:', e);
                this.showNotification('Terjadi kesalahan pada server. Silakan cek log untuk detail.', 'error');
                return;
            }

            console.log('Submit result:', result);

            if (result.success) {
                this.closeModal();
                this.showNotification(result.message || 'Berhasil!', 'success');
                setTimeout(() => location.reload(), 500);
            } else {
                // Handle validation errors specifically
                if (result.errors) {
                    const errorMessages = Object.values(result.errors).flat().join(', ');
                    this.showNotification('Validasi gagal: ' + errorMessages, 'error');
                } else {
                    this.showNotification(result.message || 'Terjadi kesalahan', 'error');
                }
            }
        } catch (error) {
            console.error('Submit error:', error);
            this.showNotification('Terjadi kesalahan saat menyimpan: ' + error.message, 'error');
        } finally {
            this.setLoading(false);
        }
    },

    // ==========================================
    // EDIT CONTENT
    // ==========================================

    editContent: async function(id) {
        console.log('📝 Fetching edit data for ID:', id);
        
        try {
            const response = await fetch(this.buildAdminContentUrl(`${id}/edit`), {
                method: 'GET',
                headers: { 
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            console.log('Edit response status:', response.status);

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            const result = await response.json();
            console.log('Edit data received:', result);

            if (result.success) {
                this.openModal(result.data);
            } else {
                this.showNotification(result.message || 'Gagal memuat data', 'error');
            }
        } catch (error) {
            console.error('Edit error:', error);
            this.showNotification('Gagal memuat data: ' + error.message, 'error');
        }
    },

    // ==========================================
    // FILTER & TABS
    // ==========================================

    handleTabClick: function(tab) {
        this.elements.categoryTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        this.filterByCategory(tab.dataset.category);
    },

    filterByCategory: function(category) {
        const tbody = this.elements.tbody || document.getElementById('content-tbody');
        const rows = tbody?.querySelectorAll('tr[data-id]') || [];
        let count = 0;

        rows.forEach(row => {
            const show = category === 'all' || row.dataset.category === category;
            row.style.display = show ? '' : 'none';
            if (show) count++;
        });

        if (this.elements.contentCount) {
            this.elements.contentCount.textContent = `(${count} item)`;
        }
    },

    filterContent: function() {
        const search = this.elements.searchInput?.value.toLowerCase() || '';
        const tbody = this.elements.tbody || document.getElementById('content-tbody');
        const rows = tbody?.querySelectorAll('tr[data-id]') || [];
        let count = 0;

        rows.forEach(row => {
            const title = row.querySelector('.content-title-cell')?.textContent.toLowerCase() || '';
            const show = title.includes(search);
            row.style.display = show ? '' : 'none';
            if (show) count++;
        });

        if (this.elements.contentCount) {
            this.elements.contentCount.textContent = `(${count} item)`;
        }
    },

    updateCount: function() {
        const tbody = this.elements.tbody || document.getElementById('content-tbody');
        const visible = tbody?.querySelectorAll('tr[data-id]:not([style*="display: none"])') || [];
        if (this.elements.contentCount) {
            this.elements.contentCount.textContent = `(${visible.length} item)`;
        }
    },

    // ==========================================
    // UTILITIES
    // ==========================================

    setLoading: function(loading) {
        if (this.elements.btnSubmit) {
            this.elements.btnSubmit.disabled = loading;
            this.elements.btnSubmit.innerHTML = loading 
                ? '<i class="fas fa-spinner fa-spin"></i> Menyimpan...' 
                : '<i class="fas fa-save"></i> Simpan';
        }
    },

    showNotification: function(message, type = 'info') {
        const existing = document.querySelector('.toast-notification');
        if (existing) existing.remove();

        const toast = document.createElement('div');
        toast.className = `toast-notification toast-${type}`;
        
        const icons = {
            success: 'check-circle',
            error: 'exclamation-circle',
            warning: 'exclamation-triangle',
            info: 'info-circle'
        };
        
        toast.innerHTML = `
            <i class="fas fa-${icons[type] || icons.info}"></i>
            <span>${message}</span>
        `;

        document.body.appendChild(toast);

        requestAnimationFrame(() => {
            toast.classList.add('is-visible');
        });
        
        setTimeout(() => {
            toast.classList.remove('is-visible');
            toast.classList.add('is-leaving');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
};

// Make globally accessible
window.SectionManager = SectionManager;


