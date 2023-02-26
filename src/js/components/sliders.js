import Swiper, { Navigation, Pagination } from 'swiper';
import '../../../node_modules/swiper/swiper-bundle.min.css';
Swiper.use([Navigation, Pagination]);

export default function () {
    return {
        init() {
            // faqs
            new Swiper(this.$refs.faqs, {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                grabCursor: true,
                dynamicBullets: true,
                navigation: {
                    nextEl: ".next-faq",
                    prevEl: ".prev-faq",
                },
                pagination: {
                    el: ".faq-pagination",
                  },
            });
        },
    }
}
