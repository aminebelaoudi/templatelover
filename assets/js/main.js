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

  // ----------------------------------------------------------------
  // Toast Notification System
  // ----------------------------------------------------------------
  function showToast(title, message, duration) {
    duration = duration || 4000;

    // Remove existing toast
    var existing = document.querySelector('.tl-toast');
    if (existing) {
      existing.remove();
    }

    var toast = document.createElement('div');
    toast.className = 'tl-toast';
    toast.innerHTML =
      '<span class="tl-toast__icon">' +
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>' +
      '</span>' +
      '<span class="tl-toast__content">' +
        '<span class="tl-toast__title">' + title + '</span>' +
        '<span class="tl-toast__message">' + message + '</span>' +
      '</span>' +
      '<button class="tl-toast__close" aria-label="Close">' +
        '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>' +
      '</button>';

    document.body.appendChild(toast);

    requestAnimationFrame(function () {
      toast.classList.add('is-visible');
    });

    toast.querySelector('.tl-toast__close').addEventListener('click', function () {
      hideToast(toast);
    });

    setTimeout(function () {
      hideToast(toast);
    }, duration);
  }

  function hideToast(toast) {
    toast.classList.remove('is-visible');
    setTimeout(function () {
      if (toast.parentNode) {
        toast.remove();
      }
    }, 400);
  }

  // ----------------------------------------------------------------
  // WooCommerce AJAX Add to Cart — Hook into WC events
  // ----------------------------------------------------------------
  var addToCartBtn = document.querySelector('.tl-sp__add-to-cart');
  var cartForm = document.querySelector('.tl-sp__cart-form');

  if (addToCartBtn && typeof jQuery !== 'undefined') {
    // When WC starts the AJAX request
    jQuery(document.body).on('adding_to_cart', function (ev, $button) {
      if ($button && $button.hasClass('single_add_to_cart_button')) {
        $button.addClass('is-loading');
        $button.prop('disabled', true);
      }
    });

    // When WC finishes the AJAX request
    jQuery(document.body).on('added_to_cart', function (ev, fragments, cart_hash, $button) {
      if ($button && $button.hasClass('single_add_to_cart_button')) {
        $button.removeClass('is-loading');
        $button.addClass('is-done');

        // Show toast
        var productName = document.querySelector('.tl-sp__title');
        var name = productName ? productName.textContent : 'Product';
        showToast(
          'Added to cart!',
          name + ' has been added to your cart.',
          4000
        );

        // Reset button after delay
        setTimeout(function () {
          $button.removeClass('is-done');
          $button.prop('disabled', false);
        }, 2000);
      }
    });
  }

  // ----------------------------------------------------------------
  // Fallback AJAX Add to Cart (if WC JS doesn't intercept)
  // ----------------------------------------------------------------
  if (cartForm && addToCartBtn && typeof jQuery === 'undefined') {
    cartForm.addEventListener('submit', function (e) {
      e.preventDefault();

      if (addToCartBtn.classList.contains('is-loading') || addToCartBtn.classList.contains('is-done')) {
        return;
      }

      var productId = addToCartBtn.getAttribute('data-product_id');
      var quantityEl = cartForm.querySelector('.qty, input[type="number"]');
      var quantity = quantityEl ? quantityEl.value : 1;

      addToCartBtn.classList.add('is-loading');
      addToCartBtn.disabled = true;

      var ajaxUrl = (window.wc_add_to_cart_params)
        ? wc_add_to_cart_params.ajax_url
        : (window.templateloverData && window.templateloverData.ajaxUrl)
          ? window.templateloverData.ajaxUrl
          : '/wp-admin/admin-ajax.php';

      var body = 'action=woocommerce_ajax_add_to_cart' +
                 '&product_id=' + encodeURIComponent(productId) +
                 '&quantity=' + encodeURIComponent(quantity);

      if (window.wc_add_to_cart_params) {
        body += '&add-to-cart=' + encodeURIComponent(productId);
      }

      fetch(ajaxUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: body,
      })
      .then(function (r) { return r.json(); })
      .then(function (data) {
        addToCartBtn.classList.remove('is-loading');

        if (data && data.error) {
          addToCartBtn.disabled = false;
          showToast('Error', data.message || 'Could not add to cart.', 5000);
          return;
        }

        addToCartBtn.classList.add('is-done');

        // Update fragments
        if (data && data.fragments) {
          Object.keys(data.fragments).forEach(function (sel) {
            var el = document.querySelector(sel);
            if (el) el.outerHTML = data.fragments[sel];
          });
        }

        // Update cart count
        var count = data && data.cart_count !== undefined ? data.cart_count : null;
        if (count !== null) {
          document.querySelectorAll('.templatelover-cart-count').forEach(function (el) {
            el.textContent = count;
            el.setAttribute('data-count', count);
          });
        }

        var productName = document.querySelector('.tl-sp__title');
        var name = productName ? productName.textContent : 'Product';
        showToast('Added to cart!', name + ' has been added to your cart.', 4000);

        setTimeout(function () {
          addToCartBtn.classList.remove('is-done');
          addToCartBtn.disabled = false;
        }, 2000);
      })
      .catch(function () {
        addToCartBtn.classList.remove('is-loading');
        addToCartBtn.disabled = false;
        cartForm.submit();
      });
    });
  }
})();
