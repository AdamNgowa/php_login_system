<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure'=>true,
    'httponly' => true
]);


session_start();

if(isset($_SESSION["user_id"])){
    if(!isset($_SESSION['last_regeneration'])) {
        regenerate_session_id_loggedin();
    } else {
        $interval =60*30;
        if(time()-$_SESSION['last_regeneration'] >= $interval) {
        regenerate_session_id_loggedin();
        }
    }
}else{
    if(!isset($_SESSION['last_regeneration'])) {
        regenerate_session_id();
    } else {
        $interval =60*30;
        if(time()-$_SESSION['last_regeneration'] >= $interval) {
        regenerate_session_id();
        }
    }
}



function regenerate_session_id_loggedin() {
    session_regenerate_id(true);

    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);
    $_SESSION['last_regeneration'] = time();
}

function regenerate_session_id() {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}

/*
Enhances session security by configuring strict session settings:

Only allows cookies for session storage (use_only_cookies = 1).
Enforces strict mode to prevent session fixation attacks (use_strict_mode = 1).
Sets secure session cookie parameters, including httponly (prevents JavaScript access) and secure (requires HTTPS).
Limits session lifetime to 30 minutes (lifetime = 1800).
Starts the session using session_start().

Handles session regeneration:

If the user is logged in (user_id exists), checks session age.
Regenerates session ID every 30 minutes (60 * 30 = 1800 seconds) for security.
Calls regenerate_session_id_loggedin() for logged-in users, preserving user ID.
Calls regenerate_session_id() for guests to renew session securely.
Functions for session regeneration:

regenerate_session_id_loggedin():
Generates a new session ID while preserving the user’s ID.
Appends user ID to session ID for tracking.
Updates session timestamp.
regenerate_session_id():
Creates a fresh session ID for guests.
Updates session timestamp.
*/