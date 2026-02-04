/**
 * Newsletter Module
 * Handles newsletter form submissions
 */

function initNewsletter() {
  const newsletterForms = document.querySelectorAll('.newsletter-form');
  
  newsletterForms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const emailInput = form.querySelector('.newsletter-form__input');
      const email = emailInput.value.trim();
      
      // Basic email validation
      if (!isValidEmail(email)) {
        showMessage(form, 'Veuillez entrer une adresse email valide.', 'error');
        return;
      }
      
      // Simulate form submission
      // In production, this would send data to a server
      submitNewsletter(email)
        .then(() => {
          showMessage(form, 'Merci ! Vous êtes maintenant inscrit à notre newsletter.', 'success');
          emailInput.value = '';
        })
        .catch(() => {
          showMessage(form, 'Une erreur est survenue. Veuillez réessayer.', 'error');
        });
    });
  });
}

function isValidEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}

function showMessage(form, message, type) {
  // Remove existing message
  const existingMessage = form.querySelector('.form__message');
  if (existingMessage) {
    existingMessage.remove();
  }
  
  // Create and append new message
  const messageEl = document.createElement('div');
  messageEl.className = `form__message form__${type}`;
  messageEl.textContent = message;
  form.appendChild(messageEl);
  
  // Remove message after 5 seconds
  setTimeout(() => {
    messageEl.remove();
  }, 5000);
}

function submitNewsletter(email) {
  // Simulate API call
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      // Simulate 95% success rate
      if (Math.random() > 0.05) {
        console.log('Newsletter subscription:', email);
        resolve();
      } else {
        reject(new Error('Network error'));
      }
    }, 1000);
  });
}
