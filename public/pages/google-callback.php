<?php
// google-callback.php
require_once 'google-config.php';

if (isset($_GET['code'])) {
    // Get Token
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get User Profile
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $email = $google_account_info->email;
    $name = $google_account_info->name;
    $google_id = $google_account_info->id;

    // Check if user exists in database
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        // User exists - Log them in
        $_SESSION['user_email'] = $email;
        header('Location: dashboard.php');
    } else {
        // New user - Insert into database
        $insert_query = "INSERT INTO users (name, email, google_id) VALUES ('$name', '$email', '$google_id')";
        if ($conn->query($insert_query) === true) {
            $_SESSION['user_email'] = $email;
            header('Location: Home.php');
        } else {
            echo 'Error: ' . $conn->error;
        }
    }
} else {
    header('Location: Register.php');
    exit();
}
?>
