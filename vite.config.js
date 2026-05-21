import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                'resources/css/modules/admin/content-index.css',
                'resources/css/modules/admin/content-section.css',
                'resources/css/modules/section-modal.css',
                'resources/css/penelitian.css',
                'resources/css/pengabdian.css',
                'resources/css/pages/arsip.css',
                'resources/css/pages/berita.css',
                'resources/css/pages/berita-detail.css',
                'resources/css/pages/profil-kampus.css',
                'resources/js/admin/content-section.js',
                'resources/js/admin/section-config.js',
                'resources/js/pages/arsip.js',
                'resources/js/pages/pengabdian.js',
            ],
            refresh: true,
        }),
    ],
    css: {
        postcss: './postcss.config.js',
    },
});
