
<?php $__env->startSection('title', __('ui.penelitian_page_title')); ?>

<?php $__env->startSection('content'); ?>




<?php
    $contents = $contents ?? collect();
    $header = $header ?? $contents->firstWhere('category', 'header');
    
    // Show all penelitian contents except header
    $allItems = $contents->reject(function($item) {
        return $item->category === 'header';
    });
    
    // Keywords for classification
    $panduanKeywords = ['panduan', 'pedoman', 'guide', 'manual'];
    $jurnalKeywords = ['jurnal', 'journal', 'paper', 'publikasi'];

    $isPanduan = function($item) use ($panduanKeywords) {
        $category = strtolower($item->category ?? '');
        $title = strtolower($item->title ?? '');
        foreach ($panduanKeywords as $keyword) {
            if (str_contains($category, $keyword) || str_contains($title, $keyword)) {
                return true;
            }
        }
        return false;
    };

    $isJurnal = function($item) use ($jurnalKeywords) {
        $category = strtolower($item->category ?? '');
        $title = strtolower($item->title ?? '');
        foreach ($jurnalKeywords as $keyword) {
            if (str_contains($category, $keyword) || str_contains($title, $keyword)) {
                return true;
            }
        }
        return false;
    };

    // Counts for hero stats
    $totalItems = $allItems->count();
    
    $panduanCount = $allItems->filter(function($item) use ($isPanduan) {
        return $isPanduan($item);
    })->count();
    
    $jurnalCount = $allItems->filter(function($item) use ($isJurnal) {
        return $isJurnal($item);
    })->count();

    // Sorting for list items
    $sort = request()->get('sort', 'new');
    $sort = $sort === 'old' ? 'old' : 'new';

    $sortedItems = $sort === 'old'
        ? $allItems->sortBy('created_at')->values()
        : $allItems->sortByDesc('created_at')->values();
    $featuredPanduan = $sortedItems->first(function($item) use ($isPanduan) {
        return $isPanduan($item);
    });

    $listItems = $sortedItems->reject(function($item) use ($featuredPanduan) {
        return $featuredPanduan && $item->id === $featuredPanduan->id;
    })->values();

    // Pagination for list columns
    $perPage = 6;
    $currentPage = request()->get('page', 1);
    $totalListItems = $listItems->count();
    $totalPages = ceil($totalListItems / $perPage);
    $currentPage = min(max(1, $currentPage), $totalPages ?: 1);

    $offset = ($currentPage - 1) * $perPage;
    $paginatedItems = $listItems->slice($offset, $perPage)->values();

    $splitIndex = (int) ceil($paginatedItems->count() / 2);
    $leftItems = $paginatedItems->slice(0, $splitIndex)->values();
    $rightItems = $paginatedItems->slice($splitIndex)->values();
?>




<section class="pengabdian-hero penelitian-hero <?php if($header && $header->image_url): ?> has-dynamic-bg <?php endif; ?>" <?php if($header && $header->image_url): ?> data-bg-image="<?php echo e($header->image_url); ?>" <?php endif; ?>>
    <?php if($header && $header->image_url): ?>
        <div class="hero-overlay hero-overlay--dark"></div>
    <?php else: ?>
        <div class="hero-overlay"></div>
        <div class="hero-pattern"></div>
    <?php endif; ?>

    <div class="hero-content">
        
        <div class="hero-badge">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
            </svg>
            <span><?php echo e(__('ui.pusat_riset')); ?></span>
        </div>

        
        <h1 class="hero-title animate-fade-in-up">
            <?php echo e($header->title ?? __('ui.penelitian_page_title')); ?>

        </h1>

        
        <p class="hero-subtitle animate-fade-in-up animation-delay-100">
            <?php echo e($header->excerpt ?? __('ui.penelitian_default_desc')); ?>

        </p>

        
        <div class="grid grid-cols-3 gap-4 max-w-2xl mx-auto animate-fade-in-up animation-delay-200">
            <div class="stat-card">
                <div class="stat-number"><?php echo e($totalItems); ?></div>
                <div class="stat-label"><?php echo e(__('ui.total_publikasi')); ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo e($panduanCount); ?></div>
                <div class="stat-label"><?php echo e(__('ui.panduan_label')); ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo e($jurnalCount); ?></div>
                <div class="stat-label"><?php echo e(__('ui.jurnal_label')); ?></div>
            </div>
        </div>
    </div>

    <div class="hero-scroll-indicator">
        <span><?php echo e(__('ui.scroll')); ?></span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>




<section class="bg-slate-50 py-16" id="penelitian-content">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="penelitian-layout">
            <div class="penelitian-toolbar">
                <button class="filter-pill" type="button" aria-label="Filter" aria-expanded="false" aria-controls="penelitian-filter-menu">
                    <?php echo e(__('ui.filter')); ?>

                </button>
                <div class="filter-menu" id="penelitian-filter-menu" role="menu">
                    <button class="filter-menu__item <?php echo e($sort === 'new' ? 'is-active' : ''); ?>" type="button" data-sort="new" role="menuitem">
                        <?php echo e(__('ui.newest')); ?>

                    </button>
                    <button class="filter-menu__item <?php echo e($sort === 'old' ? 'is-active' : ''); ?>" type="button" data-sort="old" role="menuitem">
                        <?php echo e(__('ui.oldest')); ?>

                    </button>
                </div>
            </div>

            <?php if($listItems->count() > 0 || $featuredPanduan): ?>
                <div class="penelitian-board">
                    <div class="penelitian-column penelitian-column--left">
                        <div class="column-cards">
                            <?php $__currentLoopData = $leftItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $type = $isPanduan($item) ? 'panduan' : ($isJurnal($item) ? 'jurnal' : 'penelitian');
                                    $badge = $isPanduan($item) ? __('ui.panduan_label') : ($isJurnal($item) ? __('ui.jurnal_label') : __('ui.penelitian_label'));
                                ?>
                                <article class="research-mini-card <?php echo e($type); ?>" data-category="<?php echo e($type); ?>" data-id="<?php echo e($item->id); ?>">
                                    <div class="research-mini-card__title"><?php echo e($item->title); ?></div>
                                    <div class="research-mini-card__meta">
                                        <span><?php echo e($item->created_at->format('d M Y')); ?></span>
                                        <span class="research-mini-card__badge"><?php echo e($badge); ?></span>
                                    </div>
                                    <?php if($item->file_url): ?>
                                        <a href="<?php echo e($item->file_url); ?>" target="_blank" class="research-mini-card__link">
                                            <?php echo e(__('ui.download')); ?>

                                        </a>
                                    <?php endif; ?>
                                </article>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($leftItems->count() === 0): ?>
                                <div class="column-empty"><?php echo e(__('ui.empty_penelitian')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="penelitian-featured" id="panduan">
                        <div class="research-featured-card">
                            <div class="research-featured-label"><?php echo e(__('ui.panduan_label')); ?></div>
                            <h3 class="research-featured-title">
                                <?php echo e($featuredPanduan?->title ?? __('ui.panduan_label')); ?>

                            </h3>
                            <p class="research-featured-desc">
                                <?php if($featuredPanduan?->excerpt): ?>
                                    <?php echo e(Str::limit(strip_tags($featuredPanduan->excerpt), 140)); ?>

                                <?php elseif($featuredPanduan?->content): ?>
                                    <?php echo e(Str::limit(strip_tags($featuredPanduan->content), 140)); ?>

                                <?php else: ?>
                                    <?php echo e(__('ui.panduan_default_desc')); ?>

                                <?php endif; ?>
                            </p>
                            <?php if($featuredPanduan?->file_url): ?>
                                <a href="<?php echo e($featuredPanduan->file_url); ?>" target="_blank" class="research-featured-link">
                                    <?php echo e(__('ui.unduh_panduan')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="penelitian-column penelitian-column--right" id="jurnal">
                        <div class="column-cards">
                            <?php $__currentLoopData = $rightItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $type = $isPanduan($item) ? 'panduan' : ($isJurnal($item) ? 'jurnal' : 'penelitian');
                                    $badge = $isPanduan($item) ? __('ui.panduan_label') : ($isJurnal($item) ? __('ui.jurnal_label') : __('ui.penelitian_label'));
                                ?>
                                <article class="research-mini-card <?php echo e($type); ?>" data-category="<?php echo e($type); ?>" data-id="<?php echo e($item->id); ?>">
                                    <div class="research-mini-card__title"><?php echo e($item->title); ?></div>
                                    <div class="research-mini-card__meta">
                                        <span><?php echo e($item->created_at->format('d M Y')); ?></span>
                                        <span class="research-mini-card__badge"><?php echo e($badge); ?></span>
                                    </div>
                                    <?php if($item->file_url): ?>
                                        <a href="<?php echo e($item->file_url); ?>" target="_blank" class="research-mini-card__link">
                                            <?php echo e(__('ui.download')); ?>

                                        </a>
                                    <?php endif; ?>
                                </article>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($rightItems->count() === 0): ?>
                                <div class="column-empty"><?php echo e(__('ui.empty_penelitian_other')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                
                
                
                <?php if($totalPages > 1): ?>
                    <div class="pagination-container">
                        <div class="pagination">
                            
                            <?php if($currentPage > 1): ?>
                                <a href="?page=<?php echo e($currentPage - 1); ?>&sort=<?php echo e($sort); ?>" class="pagination-btn prev">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    <span><?php echo e(__('ui.previous')); ?></span>
                                </a>
                            <?php else: ?>
                                <span class="pagination-btn prev disabled">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    <span><?php echo e(__('ui.previous')); ?></span>
                                </span>
                            <?php endif; ?>

                            
                            <div class="pagination-numbers">
                                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                                    <?php if($i == $currentPage): ?>
                                        <span class="pagination-number active"><?php echo e($i); ?></span>
                                    <?php else: ?>
                                        <a href="?page=<?php echo e($i); ?>&sort=<?php echo e($sort); ?>" class="pagination-number"><?php echo e($i); ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>

                            
                            <?php if($currentPage < $totalPages): ?>
                                <a href="?page=<?php echo e($currentPage + 1); ?>&sort=<?php echo e($sort); ?>" class="pagination-btn next">
                                    <span><?php echo e(__('ui.next')); ?></span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            <?php else: ?>
                                <span class="pagination-btn next disabled">
                                    <span><?php echo e(__('ui.next')); ?></span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="pagination-info">
                            <?php echo e(__('ui.showing_items', ['count' => $paginatedItems->count(), 'total' => $totalListItems])); ?>

                            <?php echo e(__('ui.page_info', ['current' => $currentPage, 'total' => $totalPages])); ?>

                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                
                <div class="empty-state">
                    <div class="empty-icon">
                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="empty-title"><?php echo e(__('ui.empty_data_penelitian')); ?></h3>
                    <p class="empty-description">
                        <?php echo e(__('ui.empty_data_penelitian_desc')); ?>

                    </p>
                    <a href="<?php echo e(route('home')); ?>" class="empty-btn">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span><?php echo e(__('ui.back_home')); ?></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp8212\htdocs\uppm-web\resources\views/frontend/penelitian.blade.php ENDPATH**/ ?>