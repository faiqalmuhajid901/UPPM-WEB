<?php $__env->startSection('title', 'Login Admin'); ?>
<?php $__env->startSection('heading', 'Login Admin'); ?>
<?php $__env->startSection('subheading', 'Masuk ke dashboard UPPM'); ?>

<?php $__env->startSection('content'); ?>
    
    
    <?php if(session('status')): ?>
        <div class="alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        
        
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-input" 
                value="<?php echo e(old('email')); ?>"
                placeholder="admin@uppm.ac.id"
                required 
                autofocus
            >
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error-message"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <div class="password-field-wrapper">
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-input form-input--with-toggle"
                    placeholder="********"
                    required
                >
                <button
                    type="button"
                    id="togglePassword"
                    aria-label="Tampilkan password"
                    aria-pressed="false"
                    class="password-toggle-btn"
                >
                    <svg data-eye-open class="password-toggle-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <svg data-eye-off class="password-toggle-icon is-hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m3 3 18 18"></path>
                        <path d="M10.477 10.49a3 3 0 0 0 4.033 4.033"></path>
                        <path d="M9.88 5.09A10.94 10.94 0 0 1 12 4.95c4.18 0 7.76 2.5 9.34 6.12a1 1 0 0 1 0 .86 10.96 10.96 0 0 1-4.08 4.72"></path>
                        <path d="M6.61 6.61A10.96 10.96 0 0 0 2.66 11.07a1 1 0 0 0 0 .86A10.96 10.96 0 0 0 12 18.05c1.6 0 3.11-.35 4.46-.98"></path>
                    </svg>
                </button>
            </div>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error-message"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        
        <div class="form-checkbox-wrapper">
            <input type="checkbox" name="remember" id="remember" value="1" class="form-checkbox" <?php echo e(old('remember') ? 'checked' : ''); ?>>
            <label for="remember" class="form-checkbox-label">Ingat saya</label>
        </div>
        
        
        <button type="submit" class="btn-primary">
            Masuk
        </button>
    </form>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\uppm-web\resources\views/auth/login.blade.php ENDPATH**/ ?>