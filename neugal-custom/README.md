Neugal Custom Theme
===================

This is the custom WordPress theme for **Neugal Public School**, built fresh
from the PopularFX base theme.

## Theme Features

- **Modern responsive design** — built with CSS Custom Properties, flexible grid, fluid typography
- **Sticky header** — scroll-responsive with transparent-to-solid transition
- **Top bar** — contact info strip above the main header (phone, email, quick links)
- **Mobile-first navigation** — hamburger menu with accessible dropdowns
- **Search overlay** — full-screen search modal with keyboard focus trap
- **Multi-column footer** — About, Quick Links, Academics, Contact columns
- **Page Hero / Banner** — consistent page title + breadcrumb on every interior page
- **Full-Width page template** — perfect for Pagelayer page-builder pages
- **Block editor support** — aligned wide, responsive embeds, branded colour palette
- **Accessibility-ready** — ARIA roles, skip link, keyboard navigation, focus management

## Folder Structure

```
neugal-custom/
├── style.css                   ← Theme metadata + all CSS (Custom Properties → Responsive)
├── functions.php               ← Setup, menus, widgets, enqueue, template tags
├── header.php                  ← Top bar + sticky header + search overlay (Pagelayer-friendly)
├── footer.php                  ← Multi-column footer + bottom bar (Pagelayer-friendly)
├── index.php                   ← Blog listing / fallback template
├── page.php                    ← Default page template
├── page-full-width.php         ← Full-width page (no sidebar) for Pagelayer
├── single.php                  ← Single post template
├── archive.php                 ← Archive / category / tag pages
├── search.php                  ← Search results page
├── 404.php                     ← 404 error page
├── sidebar.php                 ← Primary sidebar
├── comments.php                ← Comments thread + form
├── js/
│   └── main.js                 ← Theme JS: header scroll, mobile menu, search overlay
└── template-parts/
    ├── content.php             ← Post card partial (blog listing)
    ├── content-page.php        ← Page content partial
    ├── content-search.php      ← Search result card partial
    └── content-none.php        ← "Nothing found" partial
```

## How to Install

1. Copy the `neugal-custom` folder into your WordPress installation:
   `wp-content/themes/neugal-custom/`
2. Go to **Appearance → Themes** in your WordPress dashboard.
3. Activate **Neugal Custom Theme**.
4. Go to **Appearance → Menus** and assign your navigation menus to:
   - **Primary Menu** — used in the main header
   - **Footer Menu** — used in the Quick Links footer column
5. Go to **Appearance → Customize → Site Identity** to set your logo.
6. Use **Pagelayer** (or any page builder) on any page — header and footer are
   standalone files and will always be present for easy editing.

## Customisation Notes

- Colours, fonts and spacing are all set via **CSS Custom Properties** in `style.css`
  — just edit the `:root` block to rebrand.
- `header.php` and `footer.php` are intentionally simple and plugin-friendly.
- Phone number, email and address in `header.php`/`footer.php` should be updated
  to the school's real details.
- Social media links in `footer.php` should be updated with real URLs.
