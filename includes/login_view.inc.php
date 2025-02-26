<?php

declare(strict_types=1);

function output_username (){
    if (isset($_SESSION["user_id"])) {
        echo 'You are logged in as ' . $_SESSION["user_username"];
    } else {
        echo 'You are not logged in';
    }
}

function check_login_errors() {
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];
        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . htmlspecialchars($error) . '</p>';
        }
        unset($_SESSION["errors_login"]); // Clear errors after displaying
    } 

    if (isset($_SESSION['login_success'])) {
        echo "<br>";
        echo '<p class="form-success">' . htmlspecialchars($_SESSION['login_success']) . '</p>';
        unset($_SESSION['login_success']); // Clear success message after displaying
    }
}
/*
output_username() function:

Checks if a user is logged in ($_SESSION["user_id"]).
Displays "You are logged in as [username]" if logged in.
Displays "You are not logged in" if no user session exists.
check_login_errors() function:

Checks if there are login errors stored in $_SESSION["errors_login"].
If errors exist, loops through them and displays each as a formatted error message.
Clears error messages from the session after displaying them.
If login is successful, displays a success message stored in $_SESSION["login_success"].
Clears the success message after displaying it to avoid repetition.*/ 