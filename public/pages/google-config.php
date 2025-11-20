<?php
// google-config.php
require_once '../../vendor/autoload.php';

session_start();

// Init Google Client
$client = new Google_Client();
$client->setClientId(
    '270405070882-tbjocsntkh0tuif6kklrrn6o462k4rql.apps.googleusercontent.com',
);
$client->setClientSecret('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');
$client->setRedirectUri(
    'http://localhost/CraftMySite/public/pages/google-callback.php',
); // Must match Google Console
$client->addScope('email');
$client->addScope('profile');

// Database Connection (Example)
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'craftmysite_db';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
