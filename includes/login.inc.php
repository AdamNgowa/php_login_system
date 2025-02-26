<?php

declare(strict_types=1);

session_start(); // Ensure session is started

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        require_once("dbh.inc.php");
        require_once("login_model.inc.php");
        require_once("login_contr.inc.php");
        require_once('config_session.inc.php');

        $errors = [];

        // Get and sanitize inputs
        $username = trim($_POST["username"] ?? '');
        $pwd = $_POST["pwd"] ?? '';

        // Check for empty input fields
        if (empty($username) || empty($pwd)) {
            $errors['empty_input'] = 'Please fill all fields!';
        } else {
            // Retrieve user from database
            $result = get_user($pdo, $username);

            // Check if user exists
            if (!$result) {
                $errors['login_incorrect'] = 'Incorrect login info!';
            } else {
                // Verify password securely
                if (!password_verify($pwd, $result['pwd'])) {
                    $errors['login_incorrect'] = 'Incorrect login info!';
                }
            }
        }

        // Store errors in session and redirect if errors exist
        if (!empty($errors)) {
            $_SESSION['errors_login'] = $errors;
            header('Location: ../index.php');
            die();
        }

        // Secure session regeneration
        session_regenerate_id(true);
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION['last_regeneration'] = time();

       

        

        header('Location: ../index.php?login=success');
        die();
    } catch (PDOException $e) {
        error_log('Database error: ' . $e->getMessage());
        die('An error occurred, please try again later.');
    }
} else {
    header('Location: ../index.php');
    die();
}

/*
Starts session to manage user login data.
Checks if form is submitted via POST request.
Includes necessary files for database connection, models, and session handling.
Gets and sanitizes inputs (username and password).
Validates input fields:
If empty, adds an error message.
Retrieves user from the database using get_user().
Checks if username exists:
If not found, adds an error message.
Verifies password using password_verify().
Stores errors in session and redirects if login fails.
If successful:
Regenerates session ID for security.
Stores user data (user_id, username) in $_SESSION.
Redirects to index.php with a login success message.
Handles database errors securely with error_log().
Redirects to homepage if accessed incorrectly.
*/