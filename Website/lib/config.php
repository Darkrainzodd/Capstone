<?php
// set time zone to use date/time functions without warnings
date_default_timezone_set('America/New_York');

// local support directories
define('QUEUE_DIR', 'C:/wamp/www/Capstone/queue');
define('REPLY_DIR', 'C:/wamp/www/Capstone/replies');

// address and port for POP3 server
define('POP3_SERVER', 'mail.example.com');
define('POP3_PORT', 110);

// account information for list activity address
define('LIST_EMAIL', 'list@example.com');
define('LIST_USER', 'list');
define('LIST_PASSWORD', 'secret');

// account information for list management address
define('MANAGE_EMAIL', 'Darkrainzodd6@gmail.com');
define('MANAGE_USER', 'manage');
define('MANAGE_PASSWORD', 'pa55w0rd');
?>