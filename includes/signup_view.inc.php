<?php

declare(strict_types=1);



function signup_inputs() {
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<input type="text" name="username" value="'.htmlspecialchars($_SESSION["signup_data"]["username"]).'" placeholder="Username">';
    } else {
        echo '<input type="text" name="username" placeholder="Username">';
    }

    echo ' <input type="password" name="pwd" placeholder="Password">';

    if (isset($_SESSION["signup_data"]["email"]) &&
        !isset($_SESSION["errors_signup"]["email_used"]) &&
        !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo ' <input type="text" name="email" value="'.htmlspecialchars($_SESSION["signup_data"]["email"]).'" placeholder="E-mail">';
    } else {
        echo ' <input type="text" name="email" placeholder="E-mail">';
    }
}

function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];
        echo '<br>';
        foreach ($errors as $error) {
            echo '<p class="form-error">'.htmlspecialchars($error).'</p>';
        }
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>';
        echo '<p class="form-success">Signup successful!</p>';
    }
}

/*
signup_inputs()

Displays input fields for username, password, and email.
If a user previously entered data correctly, it preserves the values except for the password.
Uses htmlspecialchars() to prevent XSS attacks.
check_signup_errors()

Checks if signup errors exist in $_SESSION and displays error messages.
If signup is successful, it displays a success message.
Ensures errors are cleared after displaying.
*/ 