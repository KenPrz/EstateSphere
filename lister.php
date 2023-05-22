<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>For Sale</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>
<body>
    
</body>