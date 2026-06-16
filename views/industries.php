  <div class="ahero">
    <span class="eyebrow">Industries</span>
    <h1>Where we work.</h1>
    <p class="lead">We focus on a few sectors where business in Bangladesh actually happens, and where we know the work. The approach is the same in each: start with a real friction, prove the value, and stay honest about what AI cannot do.</p>
    <p class="brandline">Judgment stays with people and the speed comes from AI.</p>
  </div>

  <div class="sec">
  <?php
  $industries = [
    ['title'=>'Apparel and textiles','body'=>'Your day runs on two languages and demanding overseas buyers, and speed often wins the order. AI bridges Bangla and English both ways, turns a tech pack into a same-day costing, and assembles clean compliance packs for audits.','badge'=>'Buyer-facing numbers come only from your real rates, and a person signs before anything is sent.','link'=>'/showroom#ex1','link_label'=>'Sourcing a suit order, from California to Dhaka'],
    ['title'=>'Financial services and audit','body'=>'You hold sensitive data and answer to regulators, so caution comes first. You also sit on filings and data nobody has time to read. AI turns long reports into short, plain-language briefs that flag risk, and drafts memos, letters, and standard explanations.','badge'=>"Client data stays out of public tools. Every figure is traced to the source, and a person reviews before it reaches a board or a regulator.",'link'=>'/showroom#ex2','link_label'=>'A two-page forensic read of a quarterly report'],
    ['title'=>'Telecom','body'=>'Your company may already run AI at scale. The gap is what a manager can do at the desk today. AI summarizes long reports, drafts clear communication, and turns process knowledge into procedures the whole team can follow.','badge'=>"Subscriber data stays out of public tools, and a person owns every decision that touches a customer.",'link'=>'/showroom#ex4','link_label'=>"One expert's know-how, turned into a procedure"],
    ['title'=>'Logistics and shipping','body'=>'The work is heavy on documents and constant customer updates. AI drafts and checks shipping paperwork, writes clear tracking and delay notices, and turns operational know-how into procedures every branch can follow.','badge'=>'A person verifies documents and figures before they reach a customer or a port.','link'=>'/showroom#ex4','link_label'=>"One expert's know-how, turned into a procedure"],
  ];
  foreach ($industries as $ind): ?>
    <div class="ind reveal">
      <h2><?= $ind['title'] ?></h2>
      <p><?= $ind['body'] ?></p>
      <div><span class="xhonest"><?= $ind['badge'] ?></span></div>
      <div style="margin-top:14px"><a class="slink" href="<?= $ind['link'] ?>"><span class="sl-k">In the showroom</span><?= $ind['link_label'] ?> &rarr;</a></div>
    </div>
  <?php endforeach; ?>
  </div>

  <hr class="rule">
  <div class="note-band reveal">
    <p>Not on this list? Tell us your sector and the friction you want gone. If we are not the right fit, we will say so.</p>
  </div>
  <div class="cta reveal">
    <h2>See your sector here?</h2>
    <p>Tell us the friction you want gone. We will give you an honest view of whether AI can help, and how, before you spend anything.</p>
    <a class="btn light" href="/contact">Talk to a person</a>
  </div>
