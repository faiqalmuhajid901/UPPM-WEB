<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo $__env->yieldContent('title', 'Login'); ?> - Admin UPPM</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body>
    <div class="auth-page">
        
        
        <a href="<?php echo e(route('home')); ?>" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"/>
            </svg>
            Kembali
        </a>
        
        
        <div class="auth-card">
            
            
            <div class="auth-logo">
                <span class="auth-logo-text">U</span>
            </div>
            
            
            <h1 class="auth-title"><?php echo $__env->yieldContent('heading', 'Selamat Datang'); ?></h1>
            <p class="auth-subtitle"><?php echo $__env->yieldContent('subheading', 'Masuk ke Admin Panel UPPM'); ?></p>
            
            
            <?php echo $__env->yieldContent('content'); ?>
            
            
            <div class="auth-footer">
                <p>
                    © <?php echo e(date('Y')); ?> UPPM Poltek ATK
                </p>
            </div>
            
        </div>
    </div>
</body>
</html>
<?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\layouts\auth.blade.php ENDPATH**/ ?>