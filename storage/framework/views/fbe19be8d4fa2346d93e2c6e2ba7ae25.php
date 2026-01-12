<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'UPPM Politeknik ATK Yogyakarta'); ?></title>
    
    <!-- Load CSS/JS -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* Kostumisasi agar titik pagination berwarna toska sesuai tema */
    .swiper-pagination-bullet-active {
        background: #4fd1c5 !important;
        width: 20px !important;
        border-radius: 4px !important;
    }
    .swiper-button-next, .swiper-button-prev {
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(4px);
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen font-sans antialiased">

    <!-- 1. Memanggil Header dari Partials -->
    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- 2. Area Konten Utama -->
    <!-- class flex-grow agar footer selalu di bawah walau konten sedikit -->
    <!-- class pt-20 (padding top 80px) agar konten tidak tertutup navbar fixed -->
    <main class="flex-grow pt-20 px-4 sm:px-6 lg:px-8 pb-10">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- 3. Memanggil Footer dari Partials -->
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>



</body>
</html><?php /**PATH E:\laragon\uppm-web\resources\views/layouts/frontend.blade.php ENDPATH**/ ?>