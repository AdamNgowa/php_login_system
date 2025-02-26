<?php
session_start();
session_unset();
session_destroy();

header('Location: ../index.php');
die();

/*
Starts the session with session_start().
Clears all session variables using session_unset().
Destroys the session with session_destroy(), logging the user out.
Redirects to the homepage (index.php) to complete the logout process.
*/