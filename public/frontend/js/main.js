// Mobile menu toggle
document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.querySelector('.menu-toggle');
  const links = document.querySelector('.nav-links');
  if (toggle && links) {
    toggle.addEventListener('click', () => links.classList.toggle('open'));
  }

  // Animated counters
  document.querySelectorAll('.stat-num').forEach(el => {
    const target = parseInt(el.dataset.count || el.textContent);
    if (isNaN(target)) return;
    let cur = 0;
    const step = Math.max(1, Math.ceil(target / 60));
    const tick = () => {
      cur += step;
      if (cur >= target) { el.textContent = target.toLocaleString() + '+'; return; }
      el.textContent = cur.toLocaleString();
      requestAnimationFrame(tick);
    };
    tick();
  });
});
