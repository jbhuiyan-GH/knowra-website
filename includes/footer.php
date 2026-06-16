
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

// Scroll reveal
const io = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); } });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => io.observe(el));
</script>
</body>
</html>
