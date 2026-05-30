/**
 * TemplateLover — Main JavaScript
 *
 * Handles mobile menu toggle, search overlay, and keyboard navigation.
 *
 * @package TemplateLover
 * @since   1.0.0
 */

(function () {
  'use strict';

  const html = document.documentElement;

  // Remove no-js class.
  html.classList.remove('no-js');
  html.classList.add('js');

  // ----------------------------------------------------------------
  // Mobile Menu Toggle
  // ----------------------------------------------------------------
  const menuToggle = document.querySelector('.templatelover-site-header__menu-toggle');
  const primaryNav = document.querySelector('.templatelover-site-header__nav');

  if (menuToggle && primaryNav) {
    menuToggle.addEventListener('click', function () {
      const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.setAttribute('aria-expanded', String(!isExpanded));
      primaryNav.classList.toggle('is-open');
    });
  }

  // ----------------------------------------------------------------
  // Search Overlay
  // ----------------------------------------------------------------
  const searchToggle = document.querySelector('.templatelover-site-header__search-toggle');
  const searchOverlay = document.getElementById('templatelover-search-overlay');
  const searchClose = document.querySelector('.templatelover-search-overlay__close');

  function openSearch() {
    if (!searchOverlay) return;
    searchOverlay.hidden = false;
    // Small delay to allow display:block to apply before opacity transition.
    requestAnimationFrame(() => {
      searchOverlay.classList.add('is-active');
    });
    if (searchToggle) {
      searchToggle.setAttribute('aria-expanded', 'true');
    }
    const input = searchOverlay.querySelector('.search-field');
    if (input) {
      setTimeout(() => input.focus(), 100);
    }
    document.addEventListener('keydown', handleSearchEsc);
  }

  function closeSearch() {
    if (!searchOverlay) return;
    searchOverlay.classList.remove('is-active');
    if (searchToggle) {
      searchToggle.setAttribute('aria-expanded', 'false');
    }
    setTimeout(() => {
      searchOverlay.hidden = true;
    }, 300);
    document.removeEventListener('keydown', handleSearchEsc);
  }

  function handleSearchEsc(e) {
    if (e.key === 'Escape') {
      closeSearch();
    }
  }

  if (searchToggle) {
    searchToggle.addEventListener('click', openSearch);
  }
  if (searchClose) {
    searchClose.addEventListener('click', closeSearch);
  }

  // ----------------------------------------------------------------
  // Sticky Header Shadow on Scroll
  // ----------------------------------------------------------------
  const header = document.querySelector('.templatelover-site-header');
  let lastScroll = 0;

  function onScroll() {
    const currentScroll = window.scrollY;
    if (!header) return;

    if (currentScroll > 10) {
      header.style.boxShadow = '0 1px 3px rgba(0,0,0,0.05)';
    } else {
      header.style.boxShadow = 'none';
    }

    lastScroll = currentScroll;
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // ----------------------------------------------------------------
  // Single Product — Gallery Thumbnails
  // ----------------------------------------------------------------
  const thumbs = document.querySelectorAll('.tl-sp__thumb');
  const slides = document.querySelectorAll('.tl-sp__gallery-slide');

  if (thumbs.length > 0 && slides.length > 0) {
    thumbs.forEach(function (thumb) {
      thumb.addEventListener('click', function () {
        const index = this.getAttribute('data-index');

        thumbs.forEach(function (t) { t.classList.remove('tl-sp__thumb--active'); });
        this.classList.add('tl-sp__thumb--active');

        slides.forEach(function (s) { s.classList.remove('tl-sp__gallery-slide--active'); });
        const target = document.querySelector('.tl-sp__gallery-slide[data-index="' + index + '"]');
        if (target) {
          target.classList.add('tl-sp__gallery-slide--active');
        }
      });
    });
  }

  // ----------------------------------------------------------------
  // Single Product — Tabs
  // ----------------------------------------------------------------
  const tabBtns = document.querySelectorAll('.tl-sp__tab-btn');
  const tabPanels = document.querySelectorAll('.tl-sp__tab-panel');

  if (tabBtns.length > 0) {
    tabBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const targetId = this.getAttribute('aria-controls');

        tabBtns.forEach(function (b) {
          b.classList.remove('tl-sp__tab-btn--active');
          b.setAttribute('aria-selected', 'false');
        });
        this.classList.add('tl-sp__tab-btn--active');
        this.setAttribute('aria-selected', 'true');

        tabPanels.forEach(function (p) {
          p.classList.remove('tl-sp__tab-panel--active');
        });
        const target = document.getElementById(targetId);
        if (target) {
          target.classList.add('tl-sp__tab-panel--active');
        }
      });
    });
  }

  // ----------------------------------------------------------------
  // Single Product — Quantity +/- Buttons
  // ----------------------------------------------------------------
  const qtyMinus = document.querySelector('.tl-sp__qty-btn--minus');
  const qtyPlus = document.querySelector('.tl-sp__qty-btn--plus');
  const qtyInput = document.getElementById('tl-sp-qty');

  if (qtyMinus && qtyPlus && qtyInput) {
    const min = parseInt(qtyInput.getAttribute('min'), 10) || 1;
    const max = parseInt(qtyInput.getAttribute('max'), 10) || 9999;

    qtyMinus.addEventListener('click', function () {
      const current = parseInt(qtyInput.value, 10) || min;
      if (current > min) {
        qtyInput.value = current - 1;
      }
    });

    qtyPlus.addEventListener('click', function () {
      const current = parseInt(qtyInput.value, 10) || min;
      if (current < max) {
        qtyInput.value = current + 1;
      }
    });
  }
})();
