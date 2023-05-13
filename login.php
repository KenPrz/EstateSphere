<?php
session_start();
include "connection.php";
include 'functions.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($password)) {
        //read from database
        $query = "SELECT * FROM users WHERE email = '$email' limit 1";
        $result = mysqli_query($con, $query);
        if($result){
            if($result && mysqli_num_rows($result)>0){
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password']===$password){
                    $_SESSION['user_id']=$user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
                else{
                    echo "Wrong PASS!!!";
                }
            }   
        }
        
    } else {
        echo "Wrong username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <div class="welcome-text">
            <div class="header">
                EstateSphere
            </div>
            <div class="sub-header">
                Bringing Buyers annd Sellers Together <br>
                in the Virtual World
            </div>
        </div>
        <div class="login-form">
            <h1>Login</h1>
            <form method="post" action="">
                <input type="text" id="username" name="email" placeholder="email">

                <input type="password" id="password" name="password" placeholder="Password">

                <button type="submit" id="login-button">Log in</button>
                <div class="forgot-pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <a href="signup.php">
                    <button type="button" id="create-account-button">Create an account</button>
                </a>
            </form>
        </div>
    </div>
</body>