// ===== SWIPER IMPORTS =====
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';

// Import Swiper CSS
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';

// ===== INIT SWIPER =====
export function initSwipers() {
    console.log('Swiper module loaded...');

    // ===== HERO SWIPER =====
    const heroElement = document.querySelector('.hero-swiper');
    if (heroElement) {
        console.log('Hero Swiper found!');
        
        new Swiper('.hero-swiper', {
            modules: [Navigation, Pagination, Autoplay, EffectFade],
            effect: 'fade',
            fadeEffect: { crossFade: true },
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.hero-swiper .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.hero-swiper .swiper-button-next',
                prevEl: '.hero-swiper .swiper-button-prev',
            },
        });
        
        console.log('Hero Swiper initialized!');
    }

    // ===== CARD SWIPER (Struktur Organisasi, dll) =====
    const cardSwipers = document.querySelectorAll('.card-swiper');
    if (cardSwipers.length > 0) {
        cardSwipers.forEach((element, index) => {
            new Swiper(element, {
                modules: [Navigation, Pagination, Autoplay],
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: element.querySelector('.swiper-pagination'),
                    clickable: true,
                },
                navigation: {
                    nextEl: element.querySelector('.swiper-button-next'),
                    prevEl: element.querySelector('.swiper-button-prev'),
                },
                // ✅ PERBAIKAN: Ubah breakpoints jadi 4-5 slides
                breakpoints: {
                    480: { 
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                    768: { 
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    1024: { 
                        slidesPerView: 4,
                        spaceBetween: 24,
                    },
                    1280: { 
                        slidesPerView: 5,
                        spaceBetween: 24,
                    },
                },
            });
            
            console.log(`Card Swiper ${index + 1} initialized!`);
        });
    }
}

// Auto-init saat DOM ready
document.addEventListener('DOMContentLoaded', () => {
    initSwipers();
});
