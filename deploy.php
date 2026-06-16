<?php
if ($_GET['key'] !== 'knowra2024deploy') { http_response_code(403); exit('Forbidden'); }
$out = shell_exec('cd /var/www/knowra.skymapintel.com && git fetch origin && git reset --hard origin/master 2>&1');
echo '<pre>' . htmlspecialchars($out) . '</pre>';
