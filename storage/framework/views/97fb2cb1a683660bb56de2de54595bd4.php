

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
            <div style="position: relative;">
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-input"
                    placeholder="********"
                    style="padding-right: 2.5rem;"
                    required
                >
                <button
                    type="button"
                    id="togglePassword"
                    aria-label="Tampilkan password"
                    aria-pressed="false"
                    style="position: absolute; top: 50%; right: 0.75rem; transform: translateY(-50%); border: none; background: transparent; padding: 0; cursor: pointer; color: #6b7280; line-height: 0;"
                >
                    <svg data-eye-open xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <svg data-eye-off xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display: none;">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('togglePassword');

            if (!passwordInput || !toggleButton) {
                return;
            }

            const eyeOpen = toggleButton.querySelector('[data-eye-open]');
            const eyeOff = toggleButton.querySelector('[data-eye-off]');

            toggleButton.addEventListener('click', function () {
                const isHidden = passwordInput.type === 'password';
                const nextVisible = isHidden;

                passwordInput.type = isHidden ? 'text' : 'password';
                toggleButton.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Tampilkan password');
                toggleButton.setAttribute('aria-pressed', nextVisible ? 'true' : 'false');

                if (eyeOpen && eyeOff) {
                    eyeOpen.style.display = isHidden ? 'none' : 'block';
                    eyeOff.style.display = isHidden ? 'block' : 'none';
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\auth\login.blade.php ENDPATH**/ ?>