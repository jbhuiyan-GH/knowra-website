
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

<div id="nprogress"></div>

<script>
// ── PROGRESS BAR ──
const bar = document.getElementById('nprogress');
let barTimer, barVal = 0;
function barStart() {
  barVal = 0;
  bar.style.transform = 'scaleX(0)';
  bar.classList.add('running');
  barTimer = setInterval(() => {
    barVal = Math.min(barVal + (0.9 - barVal) * 0.12, 0.88);
    bar.style.transform = `scaleX(${barVal})`;
  }, 80);
}
function barDone() {
  clearInterval(barTimer);
  bar.style.transform = 'scaleX(1)';
  setTimeout(() => { bar.classList.remove('running'); bar.style.transform = 'scaleX(0)'; }, 400);
}

// ── NAV ──
const nav        = document.getElementById('nav');
const burger     = document.getElementById('nav-burger');
const mobileMenu = document.getElementById('mobile-menu');
const content    = document.getElementById('content');
const navLinks   = document.querySelector('.nav-links');

window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 20));

// Mobile burger toggle
burger?.addEventListener('click', () => {
  const open = mobileMenu.classList.toggle('open');
  burger.classList.toggle('open', open);
  burger.setAttribute('aria-expanded', open);
});

// Close mobile menu on outside click
document.addEventListener('click', e => {
  if (mobileMenu?.classList.contains('open') && !nav.contains(e.target) && !mobileMenu.contains(e.target)) {
    mobileMenu.classList.remove('open');
    burger?.classList.remove('open');
  }
});

// ── SLIDING PILL ──
const pill = document.createElement('div');
pill.className = 'nav-pill';
navLinks?.appendChild(pill);

function movePill(el) {
  if (!el || !navLinks) return;
  const nr = navLinks.getBoundingClientRect();
  const er = el.getBoundingClientRect();
  pill.style.cssText = `left:${er.left-nr.left}px;top:${er.top-nr.top}px;width:${er.width}px;height:${er.height}px;opacity:1`;
}
function hidePill() { pill.style.opacity = '0'; }

navLinks?.querySelectorAll('a').forEach(a => {
  a.addEventListener('mouseenter', () => movePill(a));
  a.addEventListener('focus',      () => movePill(a));
});
navLinks?.addEventListener('mouseleave', () => {
  const cur = navLinks.querySelector('a.cur');
  cur ? movePill(cur) : hidePill();
});

const initCur = navLinks?.querySelector('a.cur');
if (initCur) {
  pill.style.transition = 'none';
  movePill(initCur);
  requestAnimationFrame(() => { pill.style.transition = ''; });
} else hidePill();

// ── KEYBOARD NAV ──
navLinks?.addEventListener('keydown', e => {
  const links = [...navLinks.querySelectorAll('a')];
  const idx = links.indexOf(document.activeElement);
  if (e.key === 'ArrowRight' && idx < links.length - 1) { e.preventDefault(); links[idx+1].focus(); }
  if (e.key === 'ArrowLeft'  && idx > 0)                { e.preventDefault(); links[idx-1].focus(); }
});

// ── SCROLL REVEAL ──
function initReveal() {
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); }
    });
  }, { threshold: 0.08 });
  document.querySelectorAll('.reveal:not(.visible)').forEach(el => io.observe(el));
}
initReveal();

// ── PREFETCH CACHE ──
const cache = new Map();
function prefetch(path) {
  if (cache.has(path)) return;
  const p = fetch(path, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
    .then(r => r.json()).catch(() => null);
  cache.set(path, p);
}

function isInternal(href) {
  try {
    const u = new URL(href, location.origin);
    return u.origin === location.origin && !href.startsWith('mailto') && !href.startsWith('tel');
  } catch { return false; }
}

document.addEventListener('mouseover', e => {
  const a = e.target.closest('a[href]');
  if (a && isInternal(a.href)) {
    const u = new URL(a.href);
    if (u.pathname !== '#') prefetch(u.pathname);
  }
});

// ── ACTIVE NAV ──
let currentPath = '/';
const NAV_ORDER = ['/', '/capabilities', '/showroom', '/industries', '/resources', '/about', '/contact', '/honest-guide'];

function setActiveNav(path) {
  document.querySelectorAll('.nav-links a, .mobile-menu a').forEach(a => {
    a.classList.toggle('cur', a.getAttribute('href') === path);
  });
  const cur = navLinks?.querySelector('a.cur');
  cur ? movePill(cur) : hidePill();
}

// ── NAVIGATE ──
async function navigate(path, hash) {
  if (path === currentPath && hash) {
    scrollToHash(hash);
    return;
  }

  mobileMenu?.classList.remove('open');
  burger?.classList.remove('open');
  barStart();

  // Directional slide
  const fromIdx = NAV_ORDER.indexOf(currentPath);
  const toIdx   = NAV_ORDER.indexOf(path);
  const dir     = toIdx >= fromIdx ? 1 : -1;

  content.style.transition = 'opacity .18s ease, transform .18s ease';
  content.style.opacity    = '0';
  content.style.transform  = `translateX(${dir * -20}px)`;

  try {
    const promise = cache.has(path)
      ? cache.get(path)
      : fetch(path, { headers: { 'X-Requested-With': 'XMLHttpRequest' } }).then(r => r.json());
    cache.delete(path);

    const [data] = await Promise.all([promise, new Promise(r => setTimeout(r, 160))]);

    if (!data) { window.location.href = path; return; }

    content.innerHTML = data.html;
    document.title    = data.title;
    currentPath       = path;

    // Re-run inline scripts (count-up etc.)
    content.querySelectorAll('script').forEach(old => {
      const s = document.createElement('script');
      s.textContent = old.textContent;
      old.replaceWith(s);
    });

    setActiveNav(path);

    // Slide in from opposite side
    content.style.transition = 'none';
    content.style.transform  = `translateX(${dir * 20}px)`;
    content.style.opacity    = '0';

    requestAnimationFrame(() => requestAnimationFrame(() => {
      content.style.transition = 'opacity .26s ease, transform .26s ease';
      content.style.opacity    = '1';
      content.style.transform  = 'none';
    }));

    if (hash) {
      setTimeout(() => scrollToHash(hash), 300);
    } else {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    initReveal();
    barDone();

  } catch(err) {
    barDone();
    window.location.href = path;
  }
}

function scrollToHash(hash) {
  const el = document.getElementById(hash);
  if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// ── INTERCEPT CLICKS ──
document.addEventListener('click', e => {
  const a = e.target.closest('a[href]');
  if (!a) return;
  const raw = a.getAttribute('href');
  if (!raw || !isInternal(a.href)) return;

  const u = new URL(a.href, location.origin);
  const path = u.pathname;
  const hash = u.hash ? u.hash.slice(1) : null;

  e.preventDefault();

  // Same page hash scroll only
  if (path === currentPath && hash) {
    scrollToHash(hash);
    return;
  }

  // Hash on same page, no path change
  if (path === currentPath && !hash) return;

  navigate(path, hash);
});

// ── Refresh safety: Nginx still routes to index.php ──
// URL never changes — stays at knowra.skymapintel.com always
</script>
</body>
</html>
