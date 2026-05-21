<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" class="scroll-smooth">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Unit Penelitian dan Pengabdian Masyarakat - Politeknik ATK Yogyakarta'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', 'UPPM, Politeknik ATK, Penelitian, Pengabdian Masyarakat, Yogyakarta'); ?>">
    <meta name="author" content="UPPM Poltek ATK">
    <meta name="robots" content="index, follow">
    
    
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:title" content="<?php echo $__env->yieldContent('og_title', 'UPPM Poltek ATK - Unit Penelitian dan Pengabdian Masyarakat'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('og_description', 'Unit Penelitian dan Pengabdian Masyarakat - Politeknik ATK Yogyakarta'); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('images/logo-uppm.png')); ?>">
    
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo e(url()->current()); ?>">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title', 'UPPM Poltek ATK'); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('meta_description', 'Unit Penelitian dan Pengabdian Masyarakat'); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('og_image', asset('images/logo-uppm.png')); ?>">
    
    
    <title><?php echo $__env->yieldContent('title', 'Beranda'); ?> | UPPM Poltek ATK - Unit Penelitian dan Pengabdian Masyarakat</title>
    
    
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    
    
    
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
          crossorigin="anonymous" 
          referrerpolicy="no-referrer" />
    
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    
    
    <a href="#main-content" class="skip-link">
        <?php echo e(__('ui.skip_content')); ?>

    </a>
    
    
    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    
    <div id="alert-container" class="alert-container" role="alert" aria-live="polite">
        
    </div>
    
    
    <main id="main-content" class="main-content" role="main" aria-label="Main content">
        
        
        <?php if (! empty(trim($__env->yieldContent('breadcrumb')))): ?>
            <nav class="breadcrumb-nav" aria-label="Breadcrumb">
                <div class="container">
                    <ol class="breadcrumb">
                        <?php echo $__env->yieldContent('breadcrumb'); ?>
                    </ol>
                </div>
            </nav>
        <?php endif; ?>
        
        
        <?php echo $__env->yieldContent('content'); ?>
        
    </main>
    
    
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    
    <button id="back-to-top" class="back-to-top" aria-label="Back to top" title="Back to top">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    
    <div id="loading-overlay" class="loading-overlay hidden" role="status" aria-live="assertive" aria-label="Loading">
        <div class="loading-overlay-content">
            <div class="loading loading-lg loading-primary"></div>
            <div class="loading-text">
                <span><?php echo e(__('ui.loading')); ?></span>
                <p><?php echo e(__('ui.please_wait')); ?></p>
            </div>
        </div>
    </div>
    
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
    
    
</body>
</html>
<?php /**PATH E:\laragon\uppm-web\resources\views/layouts/app.blade.php ENDPATH**/ ?>