<?php
// google-login.php
require_once 'google-config.php';

// Generate the Google login URL
$login_url = $client->createAuthUrl();

// Redirect user to Google
header('Location: ' . filter_var($login_url, FILTER_SANITIZE_URL));
exit();
?>
