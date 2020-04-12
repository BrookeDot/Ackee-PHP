<?php
define('ACKEE_INSTALL_URL', 'https://example.com');
define('ACKEE_DOMAIN_ID', '123456-abcde-12345-abcdefg-1234');
define('ACKEE_TRACKER', 'tracker.js');

require_once 'ackee.class.php';
?>

<!doctype html>
<html lang='en'>
<head>
<title>Ackee PHP Example</title>
</head>
<body>
<h1>Ackee PHP Example</h1>
<p><strong> If you view the page source you'll see the tracker below this text</strong></p>

<?php 
use Ackee\PHP\Core as ackee;
ackee::AckeeTracker();
?>
</body>
</html>
