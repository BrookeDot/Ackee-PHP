<?php
define('ACKEE_INSTALL_URL', 'https://example.com');
define('ACKEE_DOMAIN_ID', '123456-abcde-12345-abcdefg-1234');
define('ACKEE_TRACKER', 'tracker.js');
define('ACKEE_DISABLE_DNT', false);
define('ACKEE_OPT_OUT_COOKIE', 'ackee_opt_out_cookie');
define('ACKEE_DETAILED', 'ackee_detailed_cookie');

require_once 'ackee.class.php';
?>

<!doctype html>
<html lang='en'>
<head>
<title>Ackee PHP Example</title>
</head>
<body>
<h1>Ackee PHP Example</h1>
<p><strong> If you view the page source you'll see the output of tracker below this text if enabled.</strong></p>

<?php 
use Ackee\PHP\Core as ackee;
(new ackee())->AckeeTracker();
?>
</body>
</html>
