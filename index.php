<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);
// var_dump($user_data);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Website</title>
    </head>
    <body>
        <a href="logout.php">Logout</a>
        <h1>THis is the index page</h1>

        <br>
        Hello, <?php echo $user_data['firstname'], " ", $user_data['lastname'];?>
    </body>
</html>