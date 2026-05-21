import './bootstrap';
import Alpine from 'alpinejs';

// Import Swiper
import "./swiper";
import "./pages/penelitian"
import "./pages/pengabdian"
import "./pages/home"
import "./pages/profil-kampus"
import "./pages/proposal"
import "./pages/login"
import { initFooter } from './partials/footer';
import { initAlerts, initSidebar } from './partials/sidebar';
import {initHeader} from "./partials/header";
import {initPages} from "./partials/pages";
import { initDynamicBackgroundImages } from './partials/dynamic-backgrounds';
import { initFormActions } from './partials/form-actions';

window.Alpine = Alpine;
Alpine.start();

// ===== GLOBAL INITIALIZATION =====
document.addEventListener('DOMContentLoaded', () => {
    // ===== HEADER & MOBILE MENU =====
    initHeader();
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    initFooter();
    initDynamicBackgroundImages();
    initFormActions();

    // ===== SIDEBAR (Admin) =====
    if (document.getElementById('admin-sidebar')) {
        initSidebar();
        initAlerts();
    }

    initPages();
});


