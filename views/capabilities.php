  <div class="ahero">
    <span class="eyebrow">Capabilities</span>
    <h1>What we can do for you.</h1>
    <p class="lead">We build human-centered workflows with AI inside them, to solve real business problems. Not software you have to run, but outcomes we deliver and stand behind.</p>
    <p class="brandline">Judgment stays with people and the speed comes from AI.</p>
  </div>

  <div class="sec">
    <?php
    $caps = [
      ['num'=>'01','title'=>'Documents and quotes','body'=>'We read complex inputs like tech packs, contracts, and reports, and turn them into accurate outputs like quotes, drafts, and summaries. A person signs every one before it leaves.','link'=>'/showroom#ex1','link_label'=>'Sourcing a suit order, from California to Dhaka'],
      ['num'=>'02','title'=>'Decision and risk intelligence','body'=>'We turn long documents and raw data into short, plain-language briefs that tell a leader what to watch and what to do, in days instead of months.','link'=>'/showroom#ex2','link_label'=>'A two-page forensic read of a quarterly report'],
      ['num'=>'03','title'=>'Bilingual communication','body'=>'We draft, translate, and polish across Bangla and English, so your buyers, clients, regulators, and teams always receive a clear, professional message.','link'=>'/showroom#ex3','link_label'=>'An audit-ready pack in clean English from mixed-language records'],
      ['num'=>'04','title'=>'Knowledge and process','body'=>'We turn what your best people know into clear procedures, guides, and training, so the whole team works to one standard, not just the expert.','link'=>'/showroom#ex4','link_label'=>"An expert's know-how turned into a procedure every branch can follow"],
    ];
    foreach ($caps as $i => $c): $delay = $i > 0 ? " reveal-delay-{$i}" : ''; ?>
    <div class="cap-item reveal<?= $delay ?>">
      <div class="ci"><?= $c['num'] ?></div>
      <h3><?= $c['title'] ?></h3>
      <p><?= $c['body'] ?></p>
      <a class="slink" href="<?= $c['link'] ?>"><span class="sl-k">In the showroom</span><?= $c['link_label'] ?> &rarr;</a>
    </div>
    <?php endforeach; ?>
  </div>

  <hr class="rule">

  <div class="note-band reveal">
    <div class="eyebrow">How we work</div>
    <h2>The same rules sit under every capability.</h2>
    <p>We verify every fact, we keep your data out of public tools, and a person signs off before anything reaches you. Before we build, we help you decide where AI fits and, just as honestly, where it does not.</p>
  </div>

  <div class="cta reveal">
    <h2>Have a problem worth solving?</h2>
    <p>Tell us about it. We will give you an honest view of whether AI can help, and how, before you spend anything.</p>
    <a class="btn light" href="/contact">Talk to a person</a>
  </div>
