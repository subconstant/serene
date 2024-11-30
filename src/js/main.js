const themeUrl = themeData.themeUrl;
import Alpine from 'alpinejs';

/*
 * Add Alpine.js plugins & start Alpine
 *

import overlap from 'alpinejs-overlap';
Alpine.plugin(overlap)
*/

window.Alpine = Alpine;
Alpine.start();


/*
 * Enable Lenis smooth scroll
 *

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


/*
 * Swiper.js example
 *

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


/*
 * JS utility for animating on scroll
 *

const scrollWatch = new IntersectionObserver((elements) => {
  elements.forEach((element) => {
    if (element.isIntersecting) {
      element.target.classList.add('scroll-animation-fired');
    }
  });
});

 *!* Use this to select Gutenberg blocks
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


/*
 * Add localization with i18next
 * Uses [data-trans] attribute & JSON files in /lang
 * Alpine code for switching:
 *  - parent div: x-data="{ lang: 'en' }"
 *  - child div:  x-on:click="lang = (lang === 'en' ? 'ro' : 'en'); changeLanguage(lang)"
 *

import i18next from 'i18next';
import i18nextHttpBackend from 'i18next-http-backend';

i18next.use(i18nextHttpBackend).init({
  lng: 'en',
  fallbackLng: 'en',
  backend: {
    loadPath: themeUrl + '/lang/{{lng}}.json'
  }
});

function translate(key) {
  return i18next.t(key);
}

window.changeLanguage = function (lang) {
  i18next.changeLanguage(lang, () => {
    document.querySelectorAll('[data-trans]').forEach((el) => {
      const key = el.getAttribute('data-trans');
      el.innerText = i18next.t(key);
    });
  });
}

document.addEventListener('DOMContentLoaded', () => {
  changeLanguage(i18next.language);
});
*/