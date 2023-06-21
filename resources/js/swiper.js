// import Swiper JS
import Swiper from 'swiper';
// import Swiper styles
import 'swiper/swiper-bundle.css';

// core version + navigation, pagination, modules;
import SwiperCore, { Navigation, Pagination } from 'swiper/core';

// configure Swiper to use modules
SwiperCore.use([Navigation, Pagination]);

// init Swiper:
const swiper = new Swiper('.swiper-container', {
    // Optional: parameters,
    // direction: 'vertical',
    slidesPerView: 1,
    breakpoints: {
      // 768px以上の場合
      768: {
        slidesPerView: 4
      }
    },
    loop: true,
    preventClicks: true, 
    preventClicksPropagation: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
});

// スライド画像をクリックでリンク先へ飛ぶ
$('.swiper-container').on('click', 'a', function(event) {
  event.preventDefault();
  var isActiveSlide = $(this).closest('.swiper-slide').hasClass('swiper-slide-active');
  if (isActiveSlide) {
    var linkTarget = $(this).attr('target');
    var linkHref = $(this).attr('href');
    if (linkTarget !== undefined) {
      window.open(linkHref, linkTarget);
    } else {
      window.location.href = linkHref;
    }
  }
});
