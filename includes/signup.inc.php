<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

$username = $_POST["username"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];

try {
    require_once('dbh.inc.php');
    require_once('signup_model.inc.php');
    require_once('signup_cotr.inc.php');

    $errors =[];

    if(is_input_empty($username,$pwd,$email)){
        $errors['empty_input'] = 'Please fill all fields!';
    }
    if(is_email_invalid($email)){
        $errors['invalid_email'] = 'Invalid emial used!';
    }
    if(is_username_taken($pdo,$username)){
        $errors['usernanme_taken'] = 'Username already taken!';
    }
    if (is_email_registered($pdo,$email)){
        $errors['email_used'] = 'Email already registered!';
    }

    require_once('config_session.inc.php');

    if($errors) {
        $_SESSION['errors_signup'] = $errors;

        $signupData = [
            "username" => $username,
            "email" => $email
        ];
        $_SESSION['signup_data'] = $signupData;
    

        header('Location: ../index.php');
        die();
    }

    create_user($pdo,$pwd,$username,$email); 

    header('Location: ../index.php?signup=success');

    $pdo=null;
    $pdo =null;
    die();
    
} catch (PDOexception $e) {
    die('Query failed: ' . $e->getMessage());    
}
/*else {
    header('Location: ../index.php');
    die();
}*/
}
/*
Checks if the form was submitted via POST.
Retrieves user inputs (username, password, email).
Includes required files for database connection and validation functions.
Initializes an array to store validation errors.
Validates inputs:
Checks for empty fields.
Validates email format.
Checks if the username is already taken.
Checks if the email is already registered.
If errors exist, stores them in the session and redirects back to the signup page.
If no errors, calls create_user() to insert the user into the database.
Redirects to the homepage with a signup success message.
Handles database errors with try-catch for security.
*/