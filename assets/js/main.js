/**
 * Alumni IUT Laval - Main JavaScript
 */

// Initialize all modules when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
  console.log('Alumni IUT Laval Theme loaded');
  
  // Initialize mobile navigation
  if (typeof initNavigation === 'function') {
    initNavigation();
  }
  
  // Initialize newsletter forms
  if (typeof initNewsletter === 'function') {
    initNewsletter();
  }
  
  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href !== '#') {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      }
    });
  });
});
