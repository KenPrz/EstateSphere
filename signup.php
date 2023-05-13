<?php
session_start();
include "connection.php";
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $usertype = mysqli_real_escape_string($con, $_POST['usertype']);
    if (!empty($email) && !empty($firstname) && !empty($lastname) && !empty($password) && !empty($usertype)){
        $query = "INSERT INTO users (email, firstname, lastname, password, usertype) 
        VALUES ('$email', '$firstname', '$lastname', '$password', '$usertype')";
        mysqli_query($con, $query);
        header("Location: login.php");
        die;
    }
    else{
        echo "Please fill up the form!!";
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
                Bringing Buyers and Sellers Together <br>
                in the Virtual World
            </div>
        </div>
        <div class="login-form">
            <h1>Sign up</h1>
            <form method="post" action="">
                <div class="form-row">
                    <input type="text" id="firstname" name="firstname" placeholder="Firstname">
                    <input type="text" id="lastname" name="lastname" placeholder="Lastname">
                </div>
                <div class="form-row">
                    <input type="text" id="email" name="email" placeholder="Email address">
                </div>
                <div class="form-row">
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-row">
                    <select name="usertype" id="">
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                    </select>
                </div>
                <hr>
                <div class="form-row">
                    <button type="submit" id="signup-button">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</body>