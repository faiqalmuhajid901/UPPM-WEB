

<div id="modal-form" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="modal-title">Tambah Konten</h3>
            <button type="button" class="modal-close" id="modal-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form id="content-form" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="content-id" name="id">
            <input type="hidden" id="form-method" value="POST">
            
            <div class="modal-body">
                
                <div class="form-group">
                    <label class="form-label">
                        Kategori <span class="form-required">*</span>
                    </label>
                    <select id="category" name="category" class="form-input form-select" required>
                        <option value="">Pilih Kategori</option>
                        <?php $__currentLoopData = ($sectionConfig['categories'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $catName = is_array($cat) ? ($cat['name'] ?? $key) : $cat;
                            ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($catName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                
                <div class="form-group hidden" id="subcategory-group">
                    <label class="form-label">
                        Subkategori Arsip <span class="form-required">*</span>
                    </label>
                    <select id="subcategory" name="meta_kategori" class="form-input form-select">
                        <option value="">Pilih Subkategori</option>
                    </select>
                    <small class="form-hint">Wajib dipilih untuk kategori Arsip Dokumen.</small>
                </div>
                
                
                <div class="form-group hidden" id="icon-group">
                    <label class="form-label">
                        <i class="fas fa-icons"></i> Icon (FontAwesome)
                    </label>
                    <div class="icon-input-group">
                        <input type="text" id="icon" name="icon" class="form-input" 
                               placeholder="Contoh: flask, microscope, book">
                        <div class="icon-preview">
                            <i id="icon-preview-i" class="fas fa-star"></i>
                        </div>
                    </div>
                    <small class="form-hint">Masukkan nama icon tanpa "fa-". Lihat: fontawesome.com/icons</small>
                </div>
                
                
                <div class="form-group">
                    <label class="form-label">
                        Judul <span class="form-required">*</span>
                    </label>
                    <input type="text" id="title" name="title" class="form-input" 
                           placeholder="Masukkan judul konten" required>
                </div>
                
                
                <div class="form-group">
                    <label class="form-label">Ringkasan</label>
                    <textarea id="excerpt" name="excerpt" class="form-input form-textarea" 
                              placeholder="Deskripsi singkat (opsional, max 5000 karakter)" 
                              maxlength="5000" rows="3"></textarea>
                </div>
                
                
                <div class="form-group">
                    <label class="form-label">Konten</label>
                    <textarea id="content" name="content" class="form-input form-textarea" 
                              placeholder="Konten lengkap (opsional)" rows="5"></textarea>
                </div>
                
                
                <div class="form-group" id="image-group">
                    <label class="form-label">Gambar</label>
                    <label class="file-upload" id="image-upload-label">
                        <input type="file" id="image" name="image" accept="image/*">
                        <div class="file-upload-content">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Klik untuk upload gambar</p>
                            <span class="file-upload-hint">PNG, JPG, WEBP (Max: 2MB)</span>
                        </div>
                    </label>
                    <div id="image-preview" class="file-preview"></div>
                </div>
                
                
                <div class="form-group" id="file-group">
                    <label class="form-label">
                        <i class="fas fa-file-pdf file-label-icon"></i> File Dokumen
                    </label>
                    <label class="file-upload" id="file-upload-label">
                        <input type="file" id="file" name="file" accept=".pdf,.doc,.docx">
                        <div class="file-upload-content" id="file-upload-content">
                            <i class="fas fa-file-upload"></i>
                            <p>Klik untuk upload dokumen</p>
                            <span class="file-upload-hint">PDF, DOC, DOCX (Max: 10MB)</span>
                        </div>
                    </label>
                    <div id="file-preview" class="file-preview"></div>
                </div>
                
                
                <div class="form-group">
                    <label class="form-label">Urutan</label>
                    <input type="number" id="order" name="order" class="form-input" 
                           value="0" min="0" placeholder="0">
                    <small class="form-hint">Angka lebih kecil tampil lebih dulu</small>
                </div>
                
                
                <div class="form-group">
                    <label class="form-checkbox-label">
                        <input type="checkbox" id="is_published" name="is_published" value="1" checked>
                        <span>Publikasikan</span>
                    </label>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-cancel" id="btn-cancel">Batal</button>
                <button type="submit" class="btn-submit" id="btn-submit">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>



<?php /**PATH C:\xampp8212\htdocs\uppm-web\resources\views/admin/konten/partials/modal-form.blade.php ENDPATH**/ ?>