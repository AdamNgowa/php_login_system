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
//First test
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


