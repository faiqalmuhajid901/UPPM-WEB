<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="robots" content="noindex, nofollow">
    
    <title><?php echo $__env->yieldContent('title', 'Login'); ?> | Admin UPPM</title>
    
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body class="auth-body" 
      data-success="<?php echo e(session('success')); ?>" 
      data-error="<?php echo e(session('error')); ?>" 
      data-warning="<?php echo e(session('warning')); ?>" 
      data-info="<?php echo e(session('info')); ?>"
      data-status="<?php echo e(session('status')); ?>"
      data-errors='<?php echo json_encode($errors->all(), 15, 512) ?>'>
    
    <div class="auth-background"></div>
    
    <a href="<?php echo e(route('home')); ?>" class="back-to-home">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali ke Website</span>
    </a>
    
    <div class="auth-container">
        <div class="auth-card">
            
            <div class="auth-header">
                <a href="<?php echo e(route('home')); ?>" class="auth-logo">
                    <img src="<?php echo e(asset('images/navbar_ATK.png')); ?>" alt="UPPM Logo" class="logo-img">
                </a>
                <h1 class="auth-title"><?php echo $__env->yieldContent('heading', 'Selamat Datang'); ?></h1>
                <p class="auth-subtitle"><?php echo $__env->yieldContent('subheading', 'Masuk ke Admin Panel UPPM'); ?></p>
            </div>
            
            <div id="alert-container" class="alert-container-local"></div>
            
            <div class="auth-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            
            <div class="auth-footer">
                <div class="auth-footer-text">
                    <p>&copy; <?php echo e(date('Y')); ?> UPPM Poltek ATK. All rights reserved.</p>
                </div>
            </div>
            
        </div>
    </div>
    
        
    <?php echo $__env->yieldPushContent('scripts'); ?>
    
</body>
</html>
<?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\layouts\guest.blade.php ENDPATH**/ ?>