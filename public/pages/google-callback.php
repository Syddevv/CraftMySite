<?php
require_once 'google-config.php';

if (isset($_GET['code'])) {
    // 1. Exchange the auth code for an access token
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    // Check for errors
    if (isset($token['error'])) {
        die('Error fetching token: ' . $token['error']);
    }

    $client->setAccessToken($token['access_token']);

    // 2. Get User Profile Data from Google
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $email = $google_account_info->email;
    $name = $google_account_info->name;
    $google_id = $google_account_info->id;

    // 3. Check if user exists in database
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        // User exists -> Log them in
        $user = $result->fetch_assoc();

        // --- FIXED: Set user_id here ---
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['role'] = $user['role']; // Also good to set role

        header('Location: dashboard.php');
        exit();
    } else {
        // New user -> Insert into database
        $insert_query = "INSERT INTO users (name, email, google_id) VALUES ('$name', '$email', '$google_id')";
        if ($conn->query($insert_query) === true) {
            // --- FIXED: Get the new ID created by database ---
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $name;
            $_SESSION['role'] = 'user'; // Default role

            header('Location: dashboard.php');
            exit();
        } else {
            echo 'Error inserting user: ' . $conn->error;
        }
    }
} else {
    // If no code, redirect back to register page
    header('Location: register.php');
    exit();
}
?>
