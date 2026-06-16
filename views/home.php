  <div class="hero-dark">
    <span class="eyebrow">Responsible AI for Bangladesh</span>
    <h1>AI is powerful. It also has limits.<br>We help you <u>use it well</u>.</h1>
    <p class="lead">We help Bangladesh's businesses adopt AI they can trust, to gain its advantages without risking what they have built.</p>
    <p class="lead-note">You get the real gains of AI, while your data, your reputation, and your people stay protected.</p>
    <div class="btns">
      <a class="btn solid pulse" href="/honest-guide">Read the honest guide</a>
      <a class="btn ghost" href="/contact">Talk to us</a>
    </div>
  </div>

  <div class="sec why reveal">
    <div class="eyebrow">Why we exist</div>
    <p style="margin-top:16px">AI is going to reshape how Bangladeshi businesses work. The only question is whether they move into it well, or badly. Most firms do not have a trustworthy guide for that, and the stakes are real. Their data, their clients' trust, and their people's jobs are all on the line.</p>
    <p>We exist to be that guide. We help businesses adopt AI honestly, protect what they have built, and prove that responsible adoption is also the most successful kind.</p>
    <div class="figs">
      <div class="fig"><div class="n count-up" data-target="20">0</div><div class="l">of Bangladeshi CEOs say AI has already raised their revenue.</div></div>
      <div class="fig"><div class="n count-up" data-target="25">0</div><div class="l">report lower costs from using it.</div></div>
    </div>
    <div class="figsrc">Source: PwC 29th CEO Survey, Bangladesh Edition, 2026.</div>
  </div>

  <hr class="rule">

  <div class="sec reveal">
    <div class="eyebrow">A workflow we build</div>
    <h2 class="sm">Sourcing a suit order, from California to Dhaka.</h2>
    <p class="lead-s">One example of the work we take on. The kind that is slow and costly for people to do alone, where AI helps most, and where it has to be kept honest.</p>
    <div class="pipe" style="margin-top:26px">
      <div class="pnode"><div class="pk">Input</div><div class="pv">Tech pack from the buyer</div></div>
      <div class="pconn">↓</div>
      <div class="pnode"><div class="pk">AI</div><div class="pv">Reads it and drafts the costing</div><span class="ptag">Uses only your rate tables, never a guess</span></div>
      <div class="pconn">↓</div>
      <div class="pnode"><div class="pk">Check</div><div class="pv">A person reviews and signs</div></div>
      <div class="pconn">↓</div>
      <div class="pnode out"><div class="pk">Output</div><div class="pv">Accurate FOB quote, same day</div></div>
    </div>
    <div class="beat reveal"><div class="beat-h"><span class="beat-n">01</span><span class="beat-t">The problem</span></div><p class="beat-x">A buyer in California sends a tech pack and needs an FOB quote. Today that runs through a merchandiser, a sourcing team, and a manager over about a week. The buyer often moves on to a factory that answered first.</p></div>
    <div class="beat reveal"><div class="beat-h"><span class="beat-n">02</span><span class="beat-t">What the workflow does</span></div><p class="beat-x">Our AI reads the tech pack, pulls out the full bill of materials, and assembles the costing from the factory's own rate tables. It drafts the quote and the buyer email, in clear English, the same day.</p></div>
    <div class="beat honest reveal"><div class="beat-h"><span class="beat-n">03</span><span class="beat-t">Where AI must not be trusted</span></div><p class="beat-x">Ask AI for a fabric price and it will invent a confident, wrong number. So the workflow never lets it guess. It works only from the factory's real rates, and a merchandiser signs the quote before it goes out.</p></div>
    <div class="beat reveal"><div class="beat-h"><span class="beat-n">04</span><span class="beat-t">The outcome</span></div><p class="beat-x">An accurate quote in hours instead of a week. The buyer gets a fast, clean answer. The factory wins orders it used to lose.</p></div>
    <p class="pull reveal">The speed is the AI's. The accuracy is your data's. The decision is always a person's.</p>
  </div>

  <hr class="rule">

  <div class="sec reveal">
    <div class="eyebrow">What we do</div>
    <h2 class="sm">We sell outcomes, not software.</h2>
    <div class="items">
      <div class="item reveal"><h3>The honest guide</h3><p>A free, plain-language guide to using AI well in your sector.</p></div>
      <div class="item reveal reveal-delay-1"><h3>Done-for-you tools</h3><p>We build and run the AI tool, you get the result. No tech team needed.</p></div>
      <div class="item reveal reveal-delay-2"><h3>Advisory and training</h3><p>We help your managers adopt AI safely, with clear rules and real training.</p></div>
    </div>
  </div>

  <hr class="rule">

  <div class="sec reveal">
    <div class="eyebrow">How we work</div>
    <h2 class="sm">Our commitments, in plain words.</h2>
    <div class="princ">
      <div class="p">We verify every fact. A person signs off, always.</div>
      <div class="p">We keep your data out of public tools.</div>
      <div class="p">We tell you when AI is the wrong tool, even when it costs us the sale.</div>
      <div class="p">We protect what you value. Your data, reputation, and people are not ours to gamble.</div>
    </div>
  </div>

  <hr class="rule">

  <div class="sec reveal">
    <div class="eyebrow">Who we help</div>
    <h2 class="sm">From the factory floor to the boardroom.</h2>
    <div class="chips">
      <span class="chip">Accounting and audit</span>
      <span class="chip">Apparel manufacturing</span>
      <span class="chip">Telecom</span>
      <span class="chip">Marketing</span>
      <span class="chip">Logistics</span>
      <span class="chip">Distribution</span>
    </div>
  </div>

  <div class="statement reveal">
    <p class="serif">The difference is not the tool. <span class="g">It is how you use it.</span></p>
  </div>

  <div class="cta reveal">
    <h2>Get a clear, honest look at AI.</h2>
    <p>Read the honest guide, or book a short call. No selling.</p>
    <a class="btn light" href="/honest-guide">Read the honest guide</a>
  </div>

<script>
const cio = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (!e.isIntersecting) return;
    const el = e.target, target = +el.dataset.target;
    const suffix = target === 20 ? ' in 5' : ' in 4';
    let v = 0, step = target / 40;
    const tick = () => { v = Math.min(v + step, target); el.textContent = Math.round(v) + suffix; if (v < target) requestAnimationFrame(tick); };
    tick(); cio.unobserve(el);
  });
}, { threshold: 0.5 });
document.querySelectorAll('.count-up').forEach(el => cio.observe(el));
</script>
