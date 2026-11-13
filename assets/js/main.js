const button = document.querySelector('.menu-button');
const overlay = document.querySelector('.menu-overlay');

function setMenu(open) {
  overlay.hidden = !open;
  button.setAttribute('aria-expanded', String(open));
  button.querySelector('.menu-button__label').textContent = open ? 'Close' : 'Menu';
  document.body.classList.toggle('menu-open', open);
}

if (button && overlay) {
  button.addEventListener('click', () => setMenu(overlay.hidden));

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && !overlay.hidden) setMenu(false);
  });

  overlay.addEventListener('click', (event) => {
    if (event.target.closest('a')) setMenu(false);
  });
}
