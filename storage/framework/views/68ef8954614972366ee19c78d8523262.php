<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Unit Penelitian dan Pengabdian Masyarakat - Politeknik ATK Yogyakarta'); ?>">
    <meta name="keywords" content="UPPM, Penelitian, Pengabdian Masyarakat, Politeknik ATK, Yogyakarta">
    <meta name="author" content="UPPM Politeknik ATK">
    
    
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', 'UPPM Politeknik ATK Yogyakarta'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', 'Unit Penelitian dan Pengabdian Masyarakat'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:image" content="<?php echo e(asset('images/UNIV_ATK.webp')); ?>">
    
    
    <title><?php echo $__env->yieldContent('title', 'UPPM Politeknik ATK Yogyakarta'); ?></title>
    
    
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/navbar_ ATK.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('images/navbar_ ATK.png')); ?>">
    
    
    
    
    
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    
    
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    
    
    <link rel="stylesheet" href="<?php echo e(asset('css/profil.css')); ?>">
    
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen font-sans antialiased">

    
    <div id="page-loader" class="page-loader">
        <div class="flex flex-col items-center">
            <svg class="animate-spin h-12 w-12 text-teal-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <p class="text-gray-600 font-medium">Memuat Halaman...</p>
        </div>
    </div>

    
    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <main id="main-content" class="flex-grow">
        
        
        <?php echo $__env->make('partials.alerts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <button id="back-to-top" 
            class="hidden fixed bottom-8 right-8 bg-teal-600 hover:bg-teal-700 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 z-50 group"
            aria-label="Kembali ke atas"
            title="Kembali ke atas">
        <svg class="w-6 h-6 transform group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
    
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    
    
    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>
<?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\admin\layouts\admin.blade.php ENDPATH**/ ?>