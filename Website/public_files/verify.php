<?php
// NEEDS AN UPDATE!









// Include the shared code
include '../lib/common.php';
include '../lib/db.php';
include '../lib/functions.php';
include '../lib/User.php';

// Make sure a user id and activation token were received.
if (!isset($_GET['uid']) || !isset($_GET['token'])) {
    $GLOBALS['TEMPLATE']['content'] = '<p><strong>Incomplete information ' .
        'was received.</strong></p> <p>Please try again.</p>';
    include '../templates/template-page.phptemplate_page.php';
    exit();
}

// Validate the userID.
if (!$user = User::getById($_GET['uid'])) {
    $GLOBALS['TEMPLATE']['content'] = '<p><strong>There is no such account.</strong>' .
        '</p> <p>Please try again.</p>';
} else {
	// Make sure the account is not active.
    if ($user->isActive) {
        $GLOBALS['TEMPLATE']['content'] = '<p><strong>That account ' .
            'has already been verified.</strong></p>';
    } else {
        if ($user->clearPending($_GET['token'])) {
            $GLOBALS['TEMPLATE']['content'] = '<p><strong>Thank you ' . 
                'for verifying your account.</strong></p> <p>You may ' .
                'now <a href="signin.php">login</a>.</p>';
        } else {
            $GLOBALS['TEMPLATE']['content'] = '<p><strong>You provided ' . 
                'invalid data.</strong></p> <p>Please try again.</p>';
        }
    }
}

// Display the page.
include '../templates/template-page.php';
?>
