  <div class="ahero">
    <span class="eyebrow">About KNOWRA</span>
    <h1>Why we exist</h1>
    <p class="lead">AI is going to reshape how Bangladeshi businesses work. That is not in question. The only question is whether they move into it well or badly.</p>
    <p class="lead">Most firms here do not have the in-house expertise to tell the difference, and the market around them is loud. Someone will guide this transition for them.</p>
    <div class="mv">
      <div class="row"><div class="k">Our mission</div><div class="v">We help Bangladesh's businesses adopt AI they can trust, to gain its advantages without risking what they have built.</div></div>
      <div class="row"><div class="k">Our vision</div><div class="v">To be the most trusted AI services company for medium and large businesses in Bangladesh.</div></div>
    </div>
  </div>

  <div class="sec reveal">
    <div class="eyebrow">What we believe</div>
    <h2>Our principles, in plain words.</h2>
    <?php
    $principles = [
      ['title'=>'Responsibility comes first, because it works.','body'=>'Careful adoption avoids the costly mistakes, the data leak, the wrong decision, the lost client, that quietly undo the gains.'],
      ['title'=>'We are honest about what AI can and cannot do.','body'=>'We state the limits as plainly as the gains. A business cannot make a good decision on half the picture.'],
      ['title'=>'A person stays accountable.','body'=>'AI assists. People decide and answer for the result, to their board, their customers, and their regulator.'],
      ['title'=>'We build for the long term.','body'=>'We want to serve a business for a decade, not close a deal this quarter. That changes how we behave today.'],
    ];
    ?>
    <div class="items">
      <?php foreach ($principles as $i => $p): $delay = $i > 0 ? " reveal-delay-{$i}" : ''; ?>
        <div class="item reveal<?= $delay ?>"><h3><?= $p['title'] ?></h3><p><?= $p['body'] ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="statement reveal">
    <p class="serif">We protect what our clients value. Their data, their reputation, and their people's future are <span class="g">not ours to gamble.</span></p>
  </div>

  <div class="sec reveal">
    <div class="eyebrow">Who we are</div>
    <h2>Nineteen years of B2B services, now turned to AI.</h2>
    <p class="lead-s">We are a B2B services team that spent nineteen years building and running services for large organizations, mostly in telecom. We learned how to deliver work that keeps clients coming back, and how to stay accountable when the result matters. We are now doing the same with AI, for businesses in Bangladesh. We work from Dhaka, with a base in Irvine, California.</p>
  </div>

  <hr class="rule">

  <div class="sec reveal">
    <div class="eyebrow">The people</div>
    <h2>Who you will work with.</h2>
    <?php
    $team = [
      ['name'=>'Nowshad','role'=>'Leadership and Customer Experience','bio'=>'Nineteen years building and running B2B services for telecom operators. He leads the work and is the person accountable for every result that leaves the firm.'],
      ['name'=>'Shoeb','role'=>'Chief AI Officer','bio'=>'The person you talk to first. He listens for the real problem before anyone mentions AI.'],
      ['name'=>'Jahir','role'=>'Chief AI Builder','bio'=>'Based in Dhaka. He designs and builds each workflow, and makes it reliable enough to trust.'],
    ];
    ?>
    <div class="people">
      <?php foreach ($team as $i => $m): $delay = $i > 0 ? " reveal-delay-{$i}" : ''; ?>
        <div class="pcard reveal<?= $delay ?>">
          <div class="pname"><?= $m['name'] ?></div>
          <div class="prole"><?= $m['role'] ?></div>
          <div class="pbio"><?= $m['bio'] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="pnote">Photos go here once you choose them. Human, not corporate.</div>
  </div>

  <div class="cta reveal">
    <h2>Useful before we ask for anything.</h2>
    <p>Read the honest guide, or tell us a problem you are working on. No selling.</p>
    <a class="btn light" href="/honest-guide">Read the honest guide</a>
  </div>
