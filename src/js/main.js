import Alpine from 'alpinejs';
import overlap from 'alpinejs-overlap';
Alpine.plugin(overlap)
window.Alpine = Alpine;
Alpine.start();

/* Lenis smooth scroll
const lenis = new Lenis({
  duration: 0.6,
  easing: (t) => (t === 1 ? 1 : 1 - Math.pow(2, -10 * t)),
  smooth: true,
  smoothTouch: false,
  touchMultiplier: 2,
});
window.lenis = lenis;
function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}
requestAnimationFrame(raf);
*/

/* Swiper
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import ResizeObserver from 'resize-observer-polyfill';
window.ResizeObserver = ResizeObserver;
const swiper = new Swiper('.swiper', {
  direction: 'horizontal',
  loop: false,
  slidesPerView: "auto",
  spaceBetween: 60,
  slidesOffsetAfter: 80,
  slidesOffsetBefore: 80,
  freeMode: true,
  pagination: {
    el: '.swiper-pagination',
  }
});
*/

/* Animate on scroll utility
const scrollWatch = new IntersectionObserver((elements) => {
  elements.forEach((element) => {
    if (element.isIntersecting) {
      element.target.classList.add('scroll-animation-fired');
    }
  });
});

// Select Gutenberg blocks
const gbScrollElements = document.querySelectorAll('.gb-content > [class*="wp-block-"]:not(.wp-block-video)');
gbScrollElements.forEach(function(element) {
    element.classList.add('scroll-animation-target');
    scrollWatch.observe(element);
});

const scrollElements = document.querySelectorAll('.scroll-animation-target');
scrollElements.forEach(function(element) {
  scrollWatch.observe(element);
});

*/


//jQuery( document ).ready( function( $ ) {
//});
