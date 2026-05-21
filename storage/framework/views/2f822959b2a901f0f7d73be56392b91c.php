

<?php $__env->startSection('admin_content'); ?>
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Kelola Pengguna</h1>

    
    
    <?php if(auth()->user()->role === 'super_admin'): ?>
        <a href="<?php echo e(route('admin.users.create')); ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow-sm flex items-center text-sm font-medium transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Admin
        </a>
    <?php endif; ?>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6 bg-gray-50 border-b border-gray-200">
        <p class="text-gray-600 text-sm">Daftar seluruh pengguna yang terdaftar di sistem UPPM.</p>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <?php echo e($user->name); ?>

                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <?php echo e($user->email); ?>

                </td>
                
                <!-- BAGIAN ROLE YANG DIPERBAIKI -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <form method="POST" action="<?php echo e(route('admin.users.role', $user->id)); ?>" class="inline-block">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                        <!-- Dropdown Pilihan Role -->
                        <!-- Logika Baru: Jika user sendiri, matikan dropdown (disabled) agar label tetap terlihat -->
                        <select name="role" 
                                data-auto-submit="true" 
                                class="form-select block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md shadow-sm <?php echo e(auth()->id() === $user->id ? 'bg-gray-100 cursor-not-allowed text-gray-500' : ''); ?>"
                                <?php echo e(auth()->id() === $user->id ? 'disabled' : ''); ?>

                        >
                            <!-- Pilihan Admin Pegawai -->
                            <option value="admin" <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>>
                                Admin Pegawai
                            </option>

                            <!-- Pilihan Super Admin (SELALU DITAMPILKAN) -->
                            <option value="super_admin" <?php echo e($user->role === 'super_admin' ? 'selected' : ''); ?>>
                                Super Admin
                            </option>
                        </select>
                    </form>
                </td>
                <!-- SELESAI BAGIAN PERUBAHAN -->

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <!-- Form Hapus -->
                   <form method="POST" action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" class="inline-block" data-confirm-message="YAKIN INGIN MENGHAPUS USER INI? Data tidak bisa kembali!">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        
                        <button type="submit" class="p-2 rounded-full hover:bg-red-100 text-red-500 transition duration-150" 
                                title="Hapus User">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada user terdaftar.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\admin\users\index.blade.php ENDPATH**/ ?>