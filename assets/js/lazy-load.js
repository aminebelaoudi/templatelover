/**
 * TemplateLover — Lazy Loading Enhancement
 *
 * Adds IntersectionObserver-based lazy loading for images
 * that do not already have native loading="lazy".
 *
 * @package TemplateLover
 * @since   1.0.0
 */

(function () {
  'use strict';

  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver(
      function (entries, observer) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            const img = entry.target;
            if (img.dataset.src) {
              img.src = img.dataset.src;
              img.removeAttribute('data-src');
            }
            if (img.dataset.srcset) {
              img.srcset = img.dataset.srcset;
              img.removeAttribute('data-srcset');
            }
            img.classList.remove('templatelover-lazy');
            observer.unobserve(img);
          }
        });
      },
      {
        rootMargin: '200px 0px',
        threshold: 0,
      }
    );

    document.querySelectorAll('img.templatelover-lazy').forEach(function (img) {
      imageObserver.observe(img);
    });
  }
})();
