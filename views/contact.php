<?php
$success = false;
$errors  = [];
$values  = ['name'=>'','company'=>'','sector'=>'','email'=>'','message'=>''];
$sectors = ['Apparel and textiles','Financial services and audit','Telecom','Logistics and shipping','Other'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $values['name']    = trim($_POST['name'] ?? '');
    $values['company'] = trim($_POST['company'] ?? '');
    $values['sector']  = trim($_POST['sector'] ?? '');
    $values['email']   = trim($_POST['email'] ?? '');
    $values['message'] = trim($_POST['message'] ?? '');

    if (!$values['name'])    $errors[] = 'Your name is required.';
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid work email is required.';
    if (!$values['message']) $errors[] = 'Please tell us what you are trying to solve.';

    if (!$errors) {
        $to      = SITE_EMAIL;
        $subject = 'KNOWRA enquiry from ' . $values['name'] . ' (' . $values['company'] . ')';
        $body    = "Name: {$values['name']}\nCompany: {$values['company']}\nSector: {$values['sector']}\nEmail: {$values['email']}\n\n{$values['message']}";
        $headers = "From: noreply@knowra.skymapintel.com\r\nReply-To: {$values['email']}";
        mail($to, $subject, $body, $headers);
        $success = true;
    }
}
?>
  <div class="ahero">
    <span class="eyebrow">Contact</span>
    <h1>Talk to a person.</h1>
    <p class="lead">Tell us a problem you are trying to solve. We will reply within two working days with an honest view of whether AI can help, and how. No hard sell.</p>
  </div>

  <div class="sec reveal">
    <p class="direct">Prefer to write directly? Email <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a>. We reply within two working days.</p>

    <?php if ($success): ?>
      <div class="form-success">
        <div class="fs-icon">✓</div>
        <h3>Message sent.</h3>
        <p>We will reply within two working days. If AI is not the right answer, we will tell you.</p>
      </div>
    <?php else: ?>

      <?php if ($errors): ?>
        <div class="form-errors">
          <?php foreach ($errors as $e): ?>
            <p><?= htmlspecialchars($e) ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <form class="form" method="POST" action="/contact">
        <div class="form-row">
          <div class="field">
            <label>Your name</label>
            <input type="text" name="name" placeholder="Full name" value="<?= htmlspecialchars($values['name']) ?>">
          </div>
          <div class="field">
            <label>Company</label>
            <input type="text" name="company" placeholder="Company name" value="<?= htmlspecialchars($values['company']) ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="field">
            <label>Sector</label>
            <select name="sector">
              <?php foreach ($sectors as $s): ?>
                <option<?= $values['sector'] === $s ? ' selected' : '' ?>><?= $s ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="field">
            <label>Work email</label>
            <input type="email" name="email" placeholder="you@company.com" value="<?= htmlspecialchars($values['email']) ?>">
          </div>
        </div>
        <div class="field">
          <label>What are you trying to solve?</label>
          <textarea name="message" placeholder="A sentence or two about the problem. The more concrete, the better the answer we can give you."><?= htmlspecialchars($values['message']) ?></textarea>
        </div>
        <button class="send" type="submit">Send</button>
        <p class="formnote">We read every message ourselves. Your details are not sold or shared.</p>
      </form>
    <?php endif; ?>

    <div class="offices">
      <div class="office"><div class="k">Main Office</div><div class="v">Banani, Dhaka<br>Bangladesh</div></div>
      <div class="office"><div class="k">Project Office</div><div class="v">Irvine, California<br>USA</div></div>
    </div>
    <div class="reassure"><p>If AI is not the right answer for you, we will say so.</p></div>
  </div>
