<?php
session_start();

// 1. Unset all session values
$_SESSION = [];

// 2. Delete the session cookie (if it exists) to fully log out
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly'],
    );
}

// 3. Destroy the session
session_destroy();

// 4. Redirect to the Login page
header('Location: login.php');
exit();
?>
