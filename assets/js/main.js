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
})();
