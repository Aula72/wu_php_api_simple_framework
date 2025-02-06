<?php 

// $path = "/tmp/stem_sess";
if(!isset($_SESSION['token'])){
    if(!file_exists(SESS_PATH)){
        mkdir(SESS_PATH);
    }
    session_save_path(SESS_PATH);
    session_start([
        'cookie_httponly' => true,  // Prevent JavaScript access to cookies
        'cookie_secure' => true,     // Use HTTPS-only cookies
        'cookie_samesite' => 'Strict' // Prevent CSRF attacks
    ]);
    session_regenerate_id(true);
    // echo ini_get("session.save_path");


    $_SESSION = [];

    // If you want to destroy the session completely
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
}