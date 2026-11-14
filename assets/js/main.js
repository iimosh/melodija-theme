const button = document.querySelector('.menu-button');
const overlay = document.querySelector('.menu-overlay');

function setMenu(open, returnFocus = true) {
  overlay.hidden = !open;
  button.setAttribute('aria-expanded', String(open));
  button.querySelector('.menu-button__label').textContent = open ? 'Close' : 'Menu';
  document.body.classList.toggle('menu-open', open);

  document.querySelectorAll('main, .site-footer').forEach((el) => { el.inert = open; });

  if (open) {
    overlay.querySelector('a')?.focus();
  } else if (returnFocus) {
    button.focus();
  }
}

if (button && overlay) {
  button.addEventListener('click', () => setMenu(overlay.hidden));

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && !overlay.hidden) setMenu(false);
  });

  overlay.addEventListener('click', (event) => {
    if (event.target.closest('a')) setMenu(false, false);
  });
}

document.documentElement.classList.add('js'); // CSS only hides .reveal elements when JS is running

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('is-visible');
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.15 });

document.querySelectorAll('.reveal').forEach((el) => observer.observe(el));
