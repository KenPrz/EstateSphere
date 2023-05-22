<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
var_dump($user_data)
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $user_data['firstname'], ' ', $user_data['lastname'] ?>
    </title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>

<body>
    <sidebar class="sidebar">
        <div class="row mt-5">
            <img src="./assets/img/admnAvatar/avatarF1.jpg" alt="">
        </div>
        <div class="row mt-2 user-greeting">
            <h6>Welcome Back</h6>
            <h5><strong><?php echo ucfirst($user_data['firstname']).' '.ucfirst($user_data['lastname']) ?></strong></h5>
        </div>
        <div class="row">
            <ul class="sidebar-nav">
                <li><a href="dashboard.php"><img src="./assets/img/icons/pie-chart.png" alt="Dashboard"> Dashboard</a></li>
                <li><a href="profile.php"><img src="./assets/img/icons/user.png" alt="Profile">‎ Profile</a></li>
                <li><a href="listings.php"><img src="./assets/img/icons/buildings.png" alt="Logout"> Properties</a></li>
                <li><a href="settings.php"><img src="./assets/img/icons/settings.png" alt="Settings"> Settings</a></li>
                
            </ul>
        </div>
    </sidebar>
    <nav>
            <div class="logo">
                <a href="index.php">
                    <img src="./assets/img/logo.svg" alt="Logo">
                    <a href="#">Estatesphere</a>
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="property-listing.php"><strong>Sell</strong></a></li>
                <li><a href="listings.php"><strong>Buy</strong></a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="aboutestate.php">About us</a></li>
            </ul>
            <div class="login">
                <select onchange="location = this.value;">
                    <option value="" disabled selected>Account</option>
                    <option value="dashboard.php">Profile</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout.php">Logout</option>
                </select>
            </div>
        </nav>
    <main>
        <div class="main-container">
            <!-- Dashboard Main -->
                <div class="row">
                    <h1><strong>Welcome To Dashboard</strong> </h1>
                </div>
                <div class="row">
                    <!-- Cards Here -->
                    
                    <!-- Cards Here -->
                </div>
            <!-- Dashboard Main -->
        </div>
    </main>
</body>

</html>

</html>