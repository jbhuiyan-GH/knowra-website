
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

<!-- Top progress bar -->
<div id="nprogress"></div>

<script>
// ── PROGRESS BAR ──
const bar = document.getElementById('nprogress');
let barTimer, barVal = 0;
function barStart() {
  barVal = 0; bar.style.transform = 'scaleX(0)'; bar.classList.add('running');
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

// ── NAV SETUP ──
const nav = document.getElementById('nav');
const burger = document.getElementById('nav-burger');
const mobileMenu = document.getElementById('mobile-menu');
const content = document.getElementById('content');

// Scroll shadow
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 20));

// Mobile burger
burger?.addEventListener('click', () => {
  mobileMenu.classList.toggle('open');
  burger.classList.toggle('open');
});

// ── SLIDING NAV PILL ──
const navLinks = document.querySelector('.nav-links');
const pill = document.createElement('div');
pill.className = 'nav-pill';
navLinks?.appendChild(pill);

function movePill(el) {
  if (!el || !navLinks) return;
  const nr = navLinks.getBoundingClientRect();
  const er = el.getBoundingClientRect();
  pill.style.left   = (er.left - nr.left) + 'px';
  pill.style.top    = (er.top  - nr.top)  + 'px';
  pill.style.width  = er.width  + 'px';
  pill.style.height = er.height + 'px';
  pill.style.opacity = '1';
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
navLinks?.addEventListener('focusout', e => {
  if (!navLinks.contains(e.relatedTarget)) {
    const cur = navLinks.querySelector('a.cur');
    cur ? movePill(cur) : hidePill();
  }
});

// Init pill on current
const initCur = navLinks?.querySelector('a.cur');
if (initCur) { pill.style.transition = 'none'; movePill(initCur); requestAnimationFrame(() => pill.style.transition = ''); }
else hidePill();

// ── KEYBOARD NAV ──
navLinks?.addEventListener('keydown', e => {
  const links = [...navLinks.querySelectorAll('a')];
  const idx = links.indexOf(document.activeElement);
  if (e.key === 'ArrowRight' && idx < links.length - 1) { e.preventDefault(); links[idx + 1].focus(); }
  if (e.key === 'ArrowLeft'  && idx > 0)                { e.preventDefault(); links[idx - 1].focus(); }
});

// ── SCROLL REVEAL ──
function initReveal() {
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); } });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal:not(.visible)').forEach(el => io.observe(el));
}
initReveal();

// ── PREFETCH CACHE ──
const cache = new Map();
function prefetch(path) {
  const base = path.split('#')[0];
  if (cache.has(base)) return;
  cache.set(base, fetch(base, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
    .then(r => r.json()).catch(() => null));
}

// Prefetch on hover/focus
document.addEventListener('mouseover', e => {
  const a = e.target.closest('a[href]');
  if (a && isInternal(a.href)) prefetch(new URL(a.href).pathname);
});
document.addEventListener('focusin', e => {
  const a = e.target.closest('a[href]');
  if (a && isInternal(a.href)) prefetch(new URL(a.href).pathname);
});

function isInternal(href) {
  try {
    const u = new URL(href, location.origin);
    return u.origin === location.origin &&
      !href.startsWith('mailto') && !href.startsWith('tel') &&
      !href.startsWith('#') && u.pathname !== '#';
  } catch { return false; }
}

// ── NAV ACTIVE STATE ──
function setActiveNav(pathname) {
  document.querySelectorAll('.nav-links a, .mobile-menu a').forEach(a => {
    const match = a.getAttribute('href') === pathname;
    a.classList.toggle('cur', match);
  });
  movePill(navLinks?.querySelector('a.cur') || null);
  if (!navLinks?.querySelector('a.cur')) hidePill();
}

// ── CONTENT SWAP ──
const NAV_ORDER = ['/', '/capabilities', '/showroom', '/industries', '/resources', '/about', '/contact', '/honest-guide'];

async function navigate(path, push = true) {
  const [pathname, hash] = path.split('#');

  // Same page — just scroll to hash
  if (pathname === location.pathname && hash) {
    const target = document.getElementById(hash);
    if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    return;
  }

  mobileMenu?.classList.remove('open');
  burger?.classList.remove('open');
  barStart();

  // Direction for slide
  const fromIdx = NAV_ORDER.indexOf(location.pathname);
  const toIdx   = NAV_ORDER.indexOf(pathname);
  const dir     = toIdx >= fromIdx ? 1 : -1;

  // Animate out
  content.style.transition = 'opacity .2s ease, transform .2s ease';
  content.style.opacity    = '0';
  content.style.transform  = `translateX(${dir * -24}px)`;

  try {
    const base = pathname;
    const promise = cache.has(base)
      ? cache.get(base)
      : fetch(base, { headers: { 'X-Requested-With': 'XMLHttpRequest' } }).then(r => r.json());
    cache.set(base, promise);

    const data = await promise;
    cache.delete(base); // allow fresh fetch next time

    if (!data || data.view === 'honest_guide') { window.location.href = path; return; }

    await new Promise(r => setTimeout(r, 180)); // let fade-out finish

    content.innerHTML = data.html;
    document.title    = data.title;
    if (push) history.pushState({ path }, data.title, path);
    setActiveNav(pathname);

    // Re-run inline scripts
    content.querySelectorAll('script').forEach(old => {
      const s = document.createElement('script');
      s.textContent = old.textContent;
      old.replaceWith(s);
    });

    // Animate in from opposite direction
    content.style.transition = 'none';
    content.style.transform  = `translateX(${dir * 24}px)`;
    content.style.opacity    = '0';

    requestAnimationFrame(() => requestAnimationFrame(() => {
      content.style.transition = 'opacity .28s ease, transform .28s ease';
      content.style.opacity    = '1';
      content.style.transform  = 'none';
    }));

    // Scroll
    if (hash) {
      setTimeout(() => {
        const el = document.getElementById(hash);
        if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }, 320);
    } else {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    initReveal();
    barDone();

  } catch {
    barDone();
    window.location.href = path;
  }
}

// ── INTERCEPT CLICKS ──
document.addEventListener('click', e => {
  const a = e.target.closest('a[href]');
  if (!a) return;
  const href = a.getAttribute('href');
  if (!href || !isInternal(a.href)) return;
  const u = new URL(a.href);
  const path = u.pathname + (u.hash || '');
  e.preventDefault();
  // Same page hash-only
  if (u.pathname === location.pathname && u.hash) {
    const el = document.getElementById(u.hash.slice(1));
    if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    history.pushState({}, '', path);
    return;
  }
  if (u.pathname !== location.pathname) navigate(path);
});

// ── BACK / FORWARD ──
window.addEventListener('popstate', e => {
  if (e.state?.path) navigate(e.state.path, false);
  else navigate(location.pathname, false);
});

// Initial state
history.replaceState({ path: location.pathname }, document.title, location.pathname);
</script>
</body>
</html>
