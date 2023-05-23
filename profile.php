<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo ucfirst($user_data['firstname'] . ' ' . $user_data['lastname']); ?>
    </title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body style="background-color:#f2f2f2">
    <sidebar class="sidebar shadow-sm" style="background-color:white">
        <div class="row mt-5">
            <img src="./assets/img/admnAvatar/avatarF1.jpg" alt="">
        </div>
        <div class="row mt-2 user-greeting">
            <h6>Welcome Back</h6>
            <h5><strong>
                    <?php echo ucfirst($user_data['firstname']) . ' ' . ucfirst($user_data['lastname']) ?>
                </strong></h5>
        </div>
        <div class="row">
            <ul class="sidebar-nav">
                <li id="selected-dashboard"><a href="dashboard.php"><img src="./assets/img/icons/pie-chart.png"
                            alt="Dashboard"> Dashboard</a></li>
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
        <!-- Main container -->
        <div class="main-container">
            <div class="row contacts">
                <h1 class="mb-2"> <strong>Contacts</strong></h1>
                <div class="row ms-3">
                    <ul>
                        <li> <strong> Email: </strong>
                            <?php echo $user_data['email']; ?>
                        </li>
                        <li> <strong> Phone: </strong>
                            <?php echo $user_data['contact_number']; ?>
                        </li>
                        <li> <strong> Address: </strong>
                            <?php echo $user_data['address']; ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row customers">
                <div class="col-6">
                    <h1 class="mb-2 mt-4"> <strong>Customers</strong></h1>
                    <div class="row ms-2">
                    <table class="table border rounded">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Status</th>
            <th scope="col">Property</th>
            <th scope="col"></th> <!-- Add an empty header for the button column -->
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">John Doe</th>
            <td>johndoe@example.com</td>
            <td>House</td>
            <td>For Sale</td>
            <td>Property A</td>
            <td><button onclick="showPopup('John Doe', 'johndoe@example.com', 'House', 'For Sale', 'Property A')">View Details</button></td>
        </tr>
        <tr>
            <th scope="row">Jane Smith</th>
            <td>janesmith@example.com</td>
            <td>Apartment</td>
            <td>Sold</td>
            <td>Property B</td>
            <td><button onclick="showPopup('Jane Smith', 'janesmith@example.com', 'Apartment', 'Sold', 'Property B')">View Details</button></td>
        </tr>
        <!-- Add more rows for additional customers -->
    </tbody>
</table>

</table>

<script>
    function showPopup(name, email, propertyType, propertyStatus, propertyName) {
        // Replace this with your own logic to show the popup box
        alert("User Details:\nName: " + name + "\nEmail: " + email + "\nProperty Type: " + propertyType + "\nProperty Status: " + propertyStatus + "\nProperty Name: " + propertyName);
    }
</script>

                    </div>
                </div>
            </div>
        </div>
        <!-- END Main container -->
    </main>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        centeredSlides: true,
        spaceBetween: 25,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>