
  <div class="foot">
    <div class="top"><a class="wm" href="/">KNOWRA</a></div>
    <div class="cols">
      <div class="col">
        <b>Explore</b>
        <a href="/capabilities">Capabilities</a>
        <a href="/showroom">Showroom</a>
        <a href="/industries">Industries</a>
      </div>
      <div class="col">
        <b>Resources</b>
        <a href="/honest-guide">The honest guide</a>
        <a href="#">Writing</a>
        <a href="#">Case studies</a>
      </div>
      <div class="col">
        <b>Company</b>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
      </div>
    </div>
    <div class="legal">&copy; <?= date('Y') ?> KNOWRA &middot; Dhaka &amp; Irvine &middot; <?= SITE_TAGLINE ?></div>
  </div>

</div><!-- /.page -->

<div class="fab" id="knowra-fab">
  <a class="fab-link" href="/contact"><span class="dot"></span>Talk to a person</a>
  <button class="fab-x" aria-label="Dismiss" onclick="document.getElementById('knowra-fab').style.display='none'">&times;</button>
</div>

<script>
// Nav scroll shadow
const nav = document.getElementById('nav');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 20));

// Mobile burger
const burger = document.getElementById('nav-burger');
const mobileMenu = document.getElementById('mobile-menu');
burger?.addEventListener('click', () => {
  mobileMenu.classList.toggle('open');
  burger.classList.toggle('open');
});

// Scroll reveal — run on any content load
function initReveal() {
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); } });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal:not(.visible)').forEach(el => io.observe(el));
}
initReveal();

// ── SPA NAVIGATION ──
const content = document.getElementById('content');

function setActiveNav(path) {
  document.querySelectorAll('.nav-links a, .mobile-menu a').forEach(a => {
    a.classList.toggle('cur', a.getAttribute('href') === path);
  });
}

async function navigate(path, push = true) {
  // Close mobile menu
  mobileMenu?.classList.remove('open');
  burger?.classList.remove('open');

  // Fade out
  content.style.opacity = '0';
  content.style.transform = 'translateY(10px)';

  try {
    const res = await fetch(path, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
    const data = await res.json();

    // Honest guide — full page load (has own layout)
    if (data.view === 'honest_guide') { window.location.href = path; return; }

    content.innerHTML = data.html;
    document.title = data.title;
    if (push) history.pushState({ path }, data.title, path);
    setActiveNav(path);
    window.scrollTo({ top: 0, behavior: 'smooth' });

    // Fade in
    requestAnimationFrame(() => {
      content.style.transition = 'opacity .3s ease, transform .3s ease';
      content.style.opacity = '1';
      content.style.transform = 'none';
    });

    // Re-run reveal + any inline scripts
    initReveal();
    content.querySelectorAll('script').forEach(old => {
      const s = document.createElement('script');
      s.textContent = old.textContent;
      old.replaceWith(s);
    });
  } catch {
    window.location.href = path;
  }
}

// Intercept all internal link clicks
document.addEventListener('click', e => {
  const a = e.target.closest('a[href]');
  if (!a) return;
  const href = a.getAttribute('href');
  if (!href || href.startsWith('http') || href.startsWith('mailto') || href.startsWith('#') || href.startsWith('tel')) return;
  e.preventDefault();
  if (href !== window.location.pathname) navigate(href);
});

// Browser back/forward
window.addEventListener('popstate', e => {
  if (e.state?.path) navigate(e.state.path, false);
});

// Set initial state
history.replaceState({ path: window.location.pathname }, document.title, window.location.pathname);

// Init content transition style
content.style.transition = 'opacity .3s ease, transform .3s ease';
</script>
</body>
</html>
