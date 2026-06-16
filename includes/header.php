<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($page_title) ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;1,6..72,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/knowra.css?v=2">
</head>
<body>
<div class="page">

  <nav class="nav" id="nav">
    <a class="wm" href="/">KNOWRA</a>
    <div class="nav-links">
      <?php foreach ($nav_items as $path => $label): ?>
        <a href="<?= $path ?>"<?= $current_path === $path ? ' class="cur"' : '' ?>><?= $label ?></a>
      <?php endforeach; ?>
    </div>
    <button class="nav-burger" id="nav-burger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </nav>

  <div class="mobile-menu" id="mobile-menu">
    <?php foreach ($nav_items as $path => $label): ?>
      <a href="<?= $path ?>"<?= $current_path === $path ? ' class="cur"' : '' ?>><?= $label ?></a>
    <?php endforeach; ?>
  </div>
