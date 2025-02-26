<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>  
</head>
<body>
    <?php 
    output_username();
    ?>

    <?php
     if (!isset($_SESSION["user_id"])) { ?>
      <h3>Login</h3>
<form class="form_signup" action="includes/login.inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
   
    <button>Login</button>
</form>
      <?php } ?>


<?php
check_login_errors();
?>
<h3>SignUp</h3>
<form class="form_signup" action="includes/signup.inc.php" method="post">
    <?php
    signup_inputs()
    ?>

    <button>SignUp</button>
</form>

<?php
check_signup_errors();
?>

<h3>Logout</h3>
<form class="form_signup" action="includes/logout.inc.php" method="post">  
    <button>Logout</button>
</form>
</body>
</html>

/*
Key Functionalities:
Session Handling:

Includes config_session.inc.php to start and manage user sessions.
Stores user data (like user_id and username) upon login.
Displaying User Status:

Calls output_username() to show the logged-in user's name (if any).
Login System:

Shows the login form only if the user is not logged in.
Sends login data (username, password) to login.inc.php.
Displays errors (wrong password, missing fields) using check_login_errors().
Shows a success message if login is successful.
Signup System:

Dynamically generates signup form fields with signup_inputs().
Sends signup data to signup.inc.php for processing.
Displays errors (e.g., username taken, invalid email) using check_signup_errors().
Logout System:

Provides a logout button that sends a request to logout.inc.php.
Logs out the user by destroying their session.
Error & Success Messages:

Shows error messages (in red) when login or signup fails.
Displays success messages (in green) when login or signup is successful.

*/ 