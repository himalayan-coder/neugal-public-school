/**
 * Neugal Custom Theme — main.js
 *
 * Handles: sticky header scroll class, mobile menu toggle,
 * dropdown keyboard navigation, search overlay, accessibility.
 *
 * @package NeugalCustom
 */

( function () {
	'use strict';

	/* -------------------------------------------------------
	 * Utility helpers
	 ------------------------------------------------------- */
	function qs( selector, ctx ) {
		return ( ctx || document ).querySelector( selector );
	}
	function qsa( selector, ctx ) {
		return Array.from( ( ctx || document ).querySelectorAll( selector ) );
	}
	function toggleAttr( el, attr, force ) {
		var val = force !== undefined ? force : el.getAttribute( attr ) !== 'true';
		el.setAttribute( attr, String( val ) );
		return val;
	}

	/* -------------------------------------------------------
	 * Sticky header — add `.scrolled` class after 40 px
	 ------------------------------------------------------- */
	var header = qs( '.site-header' );
	if ( header ) {
		var onScroll = function () {
			header.classList.toggle( 'scrolled', window.scrollY > 40 );
		};
		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll(); // run once on load
	}

	/* -------------------------------------------------------
	 * Mobile menu toggle
	 ------------------------------------------------------- */
	var menuToggle = qs( '.menu-toggle' );
	var mainNav    = qs( '.main-navigation' );

	if ( menuToggle && mainNav ) {
		menuToggle.addEventListener( 'click', function () {
			var isOpen = toggleAttr( menuToggle, 'aria-expanded' );
			menuToggle.classList.toggle( 'is-active', isOpen );
			mainNav.classList.toggle( 'is-open', isOpen );
			document.body.classList.toggle( 'nav-is-open', isOpen );
		} );

		// Close menu on Escape
		document.addEventListener( 'keydown', function ( e ) {
			if ( e.key === 'Escape' && mainNav.classList.contains( 'is-open' ) ) {
				menuToggle.setAttribute( 'aria-expanded', 'false' );
				menuToggle.classList.remove( 'is-active' );
				mainNav.classList.remove( 'is-open' );
				document.body.classList.remove( 'nav-is-open' );
				menuToggle.focus();
			}
		} );
	}

	/* -------------------------------------------------------
	 * Mobile dropdown sub-menu toggles
	 ------------------------------------------------------- */
	qsa( '.main-navigation .menu-item-has-children > a' ).forEach( function ( link ) {
		// Add toggle button after each parent link on mobile.
		var btn = document.createElement( 'button' );
		btn.className   = 'submenu-toggle';
		btn.setAttribute( 'aria-expanded', 'false' );
		btn.setAttribute( 'aria-label', 'Toggle submenu' );
		btn.innerHTML   = '<span aria-hidden="true">+</span>';
		link.parentNode.insertBefore( btn, link.nextSibling );

		btn.addEventListener( 'click', function ( e ) {
			e.preventDefault();
			var parent = btn.closest( '.menu-item-has-children' );
			var isOpen = parent.classList.toggle( 'is-open' );
			btn.setAttribute( 'aria-expanded', String( isOpen ) );
			btn.querySelector( 'span' ).textContent = isOpen ? '\u2212' : '+';
		} );
	} );

	/* -------------------------------------------------------
	 * Search overlay
	 ------------------------------------------------------- */
	var searchToggle  = qs( '.header-search-toggle' );
	var searchOverlay = qs( '#search-overlay' );
	var searchClose   = qs( '.search-overlay__close' );
	var searchInput   = qs( '.search-overlay__input' );

	function openSearch() {
		searchOverlay.removeAttribute( 'hidden' );
		searchOverlay.classList.add( 'is-open' );
		searchToggle.setAttribute( 'aria-expanded', 'true' );
		// Focus the input after transition
		setTimeout( function () {
			if ( searchInput ) searchInput.focus();
		}, 150 );
		document.body.style.overflow = 'hidden';
	}

	function closeSearch() {
		searchOverlay.classList.remove( 'is-open' );
		searchToggle.setAttribute( 'aria-expanded', 'false' );
		document.body.style.overflow = '';
		// Re-hide after transition
		setTimeout( function () {
			searchOverlay.setAttribute( 'hidden', '' );
		}, 300 );
		searchToggle.focus();
	}

	if ( searchToggle && searchOverlay ) {
		searchToggle.addEventListener( 'click', openSearch );

		if ( searchClose ) {
			searchClose.addEventListener( 'click', closeSearch );
		}

		searchOverlay.addEventListener( 'click', function ( e ) {
			if ( e.target === searchOverlay ) closeSearch();
		} );

		document.addEventListener( 'keydown', function ( e ) {
			if ( e.key === 'Escape' && searchOverlay.classList.contains( 'is-open' ) ) {
				closeSearch();
			}
		} );
	}

	/* -------------------------------------------------------
	 * Smooth scroll for in-page anchor links
	 ------------------------------------------------------- */
	qsa( 'a[href^="#"]' ).forEach( function ( anchor ) {
		anchor.addEventListener( 'click', function ( e ) {
			var target = qs( anchor.getAttribute( 'href' ) );
			if ( target ) {
				e.preventDefault();
				target.scrollIntoView( { behavior: 'smooth', block: 'start' } );
				// Move focus for accessibility
				target.setAttribute( 'tabindex', '-1' );
				target.focus( { preventScroll: true } );
			}
		} );
	} );

} )();
