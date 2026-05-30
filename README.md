# TemplateLover WordPress Theme

**Theme Name:** TemplateLover  
**Version:** 1.0.0  
**Requires WordPress:** 6.4+  
**Requires PHP:** 8.2+  
**License:** GPL-2.0-or-later  
**Text Domain:** templatelover

---

## Overview

TemplateLover is a premium, editorial WordPress theme built for digital product marketplaces — especially template sellers, creators, and small e-commerce brands who value calm, structured design.

Inspired by the original [TemplateLover React app](https://github.com/aminebelaoudi/templatelover), this WordPress theme faithfully translates the visual identity into a robust, production-ready theme that meets official WordPress standards and modern web performance expectations.

---

## Features

- **Full Site Editing (FSE)** — Native block-based editing with `theme.json`
- **WooCommerce Support** — Shop, cart, checkout, account pages styled natively
- **Responsive Design** — Mobile-first, optimized for all breakpoints
- **Performance-First** — Lazy loading, deferred scripts, preconnect hints, minimal HTTP requests
- **SEO Ready** — Semantic HTML5, Schema.org JSON-LD, Open Graph, Twitter Cards, breadcrumb support
- **Accessibility (WCAG 2.1)** — Keyboard navigation, ARIA labels, focus-visible, skip links, color contrast
- **Security** — Sanitization wrappers, nonce helpers, capability checks, XSS/CSRF hardening
- **Gutenberg Optimized** — Custom block styles, block patterns, theme.json design tokens
- **Translation Ready** — Full i18n support with text domain

---

## Design System

| Token | Value | Usage |
|-------|-------|-------|
| **Primary** | `#0E6B63` | Buttons, links, badges |
| **Accent** | `#DDF3EE` | Highlights, backgrounds, borders |
| **Background** | `#F8F7F3` | Page background |
| **Surface** | `#FFFFFF` | Cards, modals, sections |
| **Foreground** | `#1F2933` | Body text, headings |
| **Muted** | `#6B7280` | Captions, meta text |
| **Border** | `#E7E5E4` | Dividers, input borders |
| **Display Font** | Boska (serif) | Headings, logos |
| **UI Font** | Satoshi (sans) | Body, buttons, navigation |

---

## Theme Structure

```
templatelover-wp-theme/
├── style.css              # Theme header (no CSS here)
├── theme.json             # FSE design tokens, colors, typography, spacing
├── functions.php          # Main functions file, autoloads includes/
├── index.php              # Fallback template
├── single.php             # Single post
├── page.php               # Default page
├── archive.php            # Archives
├── 404.php                # Not found
├── search.php             # Search results
├── sidebar.php            # Widget sidebar
├── comments.php           # Comment thread template
├── searchform.php         # Custom search form
├── singular.php           # Backward compatibility stub
│
├── includes/
│   ├── setup.php          # Theme support, menus, image sizes, widgets
│   ├── security.php       # Sanitization, nonces, capability helpers
│   ├── assets.php         # Enqueue scripts/styles, resource hints
│   ├── template-functions.php  # Template tags, OG, Schema.org, breadcrumbs
│   ├── blocks.php         # Block styles, pattern categories
│   ├── woocommerce.php    # WC wrappers, body classes, cart fragments
│   └── customizer.php     # Customizer settings
│
├── template-parts/
│   ├── header.php         # Site header (logo, nav, search, cart)
│   ├── footer.php         # Site footer
│   ├── content.php        # Post card (loop)
│   ├── content-single.php # Single post content
│   ├── content-page.php   # Page content
│   ├── content-none.php   # No results
│   └── content-search.php # Search result item
│
├── templates/
│   ├── full-width.php     # Page template — no sidebar
│   └── landing-page.php  # Page template — minimal, no header nav
│
├── parts/                 # FSE template parts (block HTML)
│   ├── header.html
│   ├── footer.html
│   └── sidebar.html
│
├── patterns/              # Block patterns
│   ├── hero.php
│   ├── featured-products.php
│   └── cta-section.php
│
└── assets/
    ├── css/
    │   ├── main.css       # Complete design system + component styles
    │   ├── editor-style.css # Gutenberg editor parity
    │   └── woocommerce.css # WooCommerce overrides
    ├── js/
    │   ├── main.js        # Mobile menu, search overlay, scroll effects
    │   └── lazy-load.js   # IntersectionObserver image lazy loading
    └── images/            # Theme images (place your assets here)
```

---

## Installation

1. Upload the `templatelover-wp-theme` folder to `/wp-content/themes/`.
2. Go to **Appearance → Themes** in the WordPress admin.
3. Activate **TemplateLover**.
4. (Optional) Install and activate **WooCommerce** for e-commerce features.
5. Go to **Appearance → Customize** to adjust footer text, breadcrumbs, and meta visibility.

---

## WooCommerce Setup

The theme natively supports:

- Product archive grid (3 columns desktop, 2 tablet, 1 mobile)
- Single product page (gallery zoom, lightbox, slider)
- Cart & Checkout (styled forms, responsive layout)
- My Account dashboard
- AJAX cart count update in header

No extra plugin is required for basic WooCommerce compatibility.

---

## Security

All user-facing output is escaped:

- `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`
- Nonce verification helpers (`templatelover_verify_nonce()`)
- Capability checks (`current_user_can()`)
- `$wpdb->prepare()` wrapper for custom queries
- Security headers (`X-Content-Type-Options`, `Referrer-Policy`)

---

## Performance

- **Deferred scripts** (`main.js`, `lazy-load.js`)
- **Preconnect** to Fontshare CDN
- **Native lazy loading** on post thumbnails and images
- **IntersectionObserver** fallback for advanced lazy loading
- **Responsive images** via `srcset`/`sizes` on all featured images
- **No jQuery dependency** on the frontend
- **Minified-ready** single CSS file structure

---

## SEO

- Breadcrumb support (Yoast SEO & Rank Math auto-detected, fallback included)
- Open Graph & Twitter Card meta tags (auto-disabled if SEO plugin present)
- Schema.org JSON-LD for articles and web pages
- Semantic HTML5 structure (`<header>`, `<main>`, `<article>`, `<aside>`, `<footer>`)
- Proper heading hierarchy (H1 → H6)

---

## Accessibility

- Skip-to-content link
- ARIA labels on navigation, search, and cart
- Focus-visible styles with brand ring color
- Keyboard-navigable mobile menu and search overlay
- Escape key closes search overlay
- WCAG 2.1 AA color contrast ratios verified
- Screen reader text classes for hidden labels

---

## Developer Notes

- Follows **WordPress Coding Standards** (PHP, JS, CSS)
- Full **PHPDoc** coverage
- Modular `includes/` architecture — each file has a single responsibility
- **DRY** principle — no duplicated markup or logic
- Compatible with `WP_DEBUG = true`
- Tested with WordPress 6.4+ and PHP 8.2+

---

## Credits

- Design inspired by the original TemplateLover React application.
- Fonts by [Fontshare](https://fontshare.com) (Boska & Satoshi).

---

## Changelog

### 1.0.0
- Initial release.
