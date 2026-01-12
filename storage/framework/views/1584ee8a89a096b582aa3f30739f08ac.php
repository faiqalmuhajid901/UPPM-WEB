

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full bg-white">
    <div class="w-full bg-gray-50 border-b">
        <div class="max-w-[1920px] mx-auto px-4 py-4 md:py-6">
            
            <div class="swiper hero-swiper relative w-full rounded-2xl overflow-hidden shadow-2xl border border-gray-100 group w-full aspect-[16/9] md:aspect-[21/9]">
                <div class="swiper-wrapper">
                    
                    <div class="swiper-slide bg-white">
                        <?php if($heroContent): ?>
                            
                            <img src="<?php echo e(asset('storage/' . $heroContent->image)); ?>" alt="<?php echo e($heroContent->title); ?>" class="w-full h-auto object-cover block">
                        <?php else: ?>
                            
                            <img src="<?php echo e(asset('images/bg 1.webp')); ?>" alt="Banner Default" class="w-full h-auto object-cover block">
                        <?php endif; ?>
                    </div>
                    
                    
                    <div class="swiper-slide bg-white">
                        <img src="<?php echo e(asset('images/bg 2.webp')); ?>" alt="Banner UPPM 2" class="w-full h-auto object-cover block">
                    </div>

                    
                    <div class="swiper-slide bg-white">
                        <img src="<?php echo e(asset('images/bg 3.webp')); ?>" alt="Banner UPPM 3" class="w-full h-auto object-cover block">
                    </div>
                </div>

                <div class="swiper-button-next !text-[#4fd1c5] opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-75 md:scale-100"></div>
                <div class="swiper-button-prev !text-[#4fd1c5] opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-75 md:scale-100"></div>

                <div class="swiper-pagination"></div>
            </div>
            
            
            <?php if($welcomeContent): ?>
            <div class="mt-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800"><?php echo e($welcomeContent->title); ?></h2>
                <p class="mt-2 text-gray-600"><?php echo e($welcomeContent->description); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\uppm-web\resources\views/frontend/home.blade.php ENDPATH**/ ?>