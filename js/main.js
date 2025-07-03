/*
 * SOUBOR: main.js
 * PROJEKT: Osoleno
 *
 * Tento soubor obsahuje veškerý klientský JavaScript pro web.
 */

document.addEventListener('DOMContentLoaded', () => {
  /**
   * Logika pro mobilní navigaci (Hamburger Menu)
   */
  const primaryNav = document.querySelector('#primary-navigation');
  const navToggle = document.querySelector('.mobile-nav-toggle');

  if (navToggle && primaryNav) {
    navToggle.addEventListener('click', () => {
      const isVisible = primaryNav.getAttribute('data-visible') === 'true';

      if (isVisible) {
        // Skrýt menu
        primaryNav.setAttribute('data-visible', false);
        navToggle.setAttribute('aria-expanded', false);
        document.body.style.overflow = 'auto'; // Povolit opětovné scrollování
      } else {
        // Zobrazit menu
        primaryNav.setAttribute('data-visible', true);
        navToggle.setAttribute('aria-expanded', true);
        document.body.style.overflow = 'hidden'; // Zakázat scrollování stránky pod menu
      }
    });
  }
});
