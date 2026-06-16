  <div class="ahero">
    <span class="eyebrow">Resources</span>
    <h1>What we know, shared openly.</h1>
    <p class="lead">We write to be useful, not to impress. Start with the free guide. It is the clearest picture we can give of where AI helps a Bangladeshi business, and where it does not.</p>
  </div>

  <div class="sec reveal">
    <div class="guide-card">
      <span class="gtag">Free guide</span>
      <h2>The Honest Guide to AI for Bangladeshi Business</h2>
      <p class="sub">What it can do, what it cannot, and how to begin without risking what you have built. Written for middle and senior managers.</p>
      <ul>
        <li>Where AI genuinely helps in your sector, shown with real before-and-after examples</li>
        <li>What it cannot be trusted with, and the reasons why</li>
        <li>How Bangladesh's 2025 data protection rules change what you can put into a public tool</li>
        <li>One safe step you can take this month</li>
      </ul>
      <p class="src">Grounded in the PwC Bangladesh CEO Survey 2026 and Bangladesh's 2025 data protection and governance ordinances.</p>
      <form class="email-cap" method="POST" action="/resources">
        <input type="email" name="guide_email" placeholder="you@company.com" required>
        <button type="submit">Send me the guide</button>
      </form>
      <p class="capnote">One email with the guide, then an occasional note. Unsubscribe anytime. We never sell your address.</p>
    </div>
  </div>

  <hr class="rule">

  <div class="sec reveal">
    <div class="eyebrow">Writing</div>
    <h2 class="sm">The Honest AI series</h2>
    <p style="font-family:'Newsreader',Georgia,serif;font-size:16px;line-height:1.5;color:var(--muted);margin-bottom:8px">Short pieces on using AI well, and on the limits most vendors will not mention.</p>
    <?php
    $articles = [
      ['title'=>'Why we tell clients what AI cannot do','body'=>'The fastest way to lose a client\'s trust is to oversell. Here is why we lead with the limits.'],
      ['title'=>'The data you should never paste into a public AI tool','body'=>'A plain-language look at what the Personal Data Protection Ordinance 2025 means for your daily work.'],
      ['title'=>'The AI did not make the decision. A person did.','body'=>'Why accountability has to stay with a named human, and how we build that into every workflow.'],
      ['title'=>'What the PwC 2026 survey tells Bangladeshi managers about AI','body'=>'The numbers behind the lost revenue and rising costs, and what they mean for a mid-size firm.'],
    ];
    foreach ($articles as $a): ?>
      <a class="art" href="#">
        <h3><?= $a['title'] ?></h3>
        <p><?= $a['body'] ?></p>
        <span class="read">Read &rarr;</span>
      </a>
    <?php endforeach; ?>
  </div>

  <hr class="rule">

  <div class="sec reveal">
    <div class="eyebrow">Case studies</div>
    <p style="font-family:'Newsreader',Georgia,serif;font-size:16.5px;line-height:1.55;margin-bottom:14px">We will publish case studies as our clients agree to share their results, with real names and real numbers. We will not invent them. Until then, the Showroom shows the shape of the work we do, and the honest limits around it.</p>
    <a class="slink" href="/showroom"><span class="sl-k">See the work</span>Visit the Showroom &rarr;</a>
  </div>

  <div class="cta reveal">
    <h2>Have a problem the guide does not cover?</h2>
    <p>Tell us what you are trying to solve. We will give you an honest view of whether AI can help, before you spend anything.</p>
    <a class="btn light" href="/contact">Talk to a person</a>
  </div>
