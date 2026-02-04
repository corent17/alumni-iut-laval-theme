/**
 * Navigation Module
 * Handles mobile menu toggle
 */

function initNavigation() {
  const mobileToggle = document.querySelector('.header__mobile-toggle');
  const mobileMenu = document.querySelector('.mobile-menu');
  
  if (mobileToggle && mobileMenu) {
    mobileToggle.addEventListener('click', function() {
      mobileMenu.classList.toggle('mobile-menu--active');
      
      // Update ARIA attribute for accessibility
      const isExpanded = mobileMenu.classList.contains('mobile-menu--active');
      mobileToggle.setAttribute('aria-expanded', isExpanded);
    });
    
    // Close mobile menu when clicking on a link
    const mobileLinks = mobileMenu.querySelectorAll('.mobile-menu__link');
    mobileLinks.forEach(link => {
      link.addEventListener('click', function() {
        mobileMenu.classList.remove('mobile-menu--active');
        mobileToggle.setAttribute('aria-expanded', 'false');
      });
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
      if (!mobileToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
        mobileMenu.classList.remove('mobile-menu--active');
        mobileToggle.setAttribute('aria-expanded', 'false');
      }
    });
  }
  
  // Handle active nav link based on current page
  const currentPath = window.location.pathname;
  const navLinks = document.querySelectorAll('.header__nav-link');
  
  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (currentPath.includes(href) || (currentPath === '/' && href === 'index.html')) {
      link.classList.add('header__nav-link--active');
    }
  });
}
