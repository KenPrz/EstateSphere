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
        <?php echo $user_data['firstname'], ' ', $user_data['lastname'] ?>
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
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
                <li id="selected-dashboard" ><a href="dashboard.php"><img src="./assets/img/icons/pie-chart.png" alt="Dashboard"> Dashboard</a></li>
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
            <div class="row mb-3">
                <h2><strong>Welcome To Dashboard</strong> </h2>
            </div>
            <div class="row">
                <!-- Dashboard Main -->
                <div class="row">
                    <div class="col-10">
                        <!-- Cards Here -->

                        <div class="row">
                            <!-- Card -->
                            <div class="col-4">
                                <div class="card shadow-sm" style="width: 23rem; height:20vh">
                                    <div class="card-body ms-2">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5><strong>Properties for Sale</strong></h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h2><strong>
                                                    <?php echo $num_properties = getNumPropertiesForSale($con, $user_data['user_id']); ?>
                                                </strong>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card -->
                            <!-- Card -->
                            <div class="col-4">
                                <div class="card shadow-sm" style="width: 23rem; height:20vh">
                                    <div class="card-body ms-2">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5><strong>Properties for Sale</strong></h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h2><strong>
                                                    <?php echo $num_properties = getNumPropertiesForRent($con, $user_data['user_id']); ?>
                                                </strong>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card -->
                            <!-- Card -->
                            <div class="col-4">
                                <div class="card shadow-sm" style="width: 23rem; height:20vh">
                                    <div class="card-body ms-2">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5><strong>Total Customers</strong></h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h2><strong>
                                                    <?php echo $num_properties = getNumOfSold($con, $user_data['user_id']); ?>
                                                </strong>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- Cards Here -->
                    </div>
                </div>
                <div class="row mt-3">
                    <!-- Lower Dashboard -->
                    <div class="col-7 border rounded" style="background-color: white;">
                        <div class="container mt-2 mb-4">
                            <div class="row mt-4">
                                <!-- Listing Here -->
                                <div class="col-9">
                                    <h4><strong>Properties for Sale/Rent</strong></h4>
                                </div>
                                <div class="col-3 d-flex justify-content-end mb-2">
                                    <a href="property-listing.php">
                                        <button type="button" class="btn btn-secondary btn-sm">Add +</button>
                                    </a>
                                </div>
                                <!-- Listing Here -->
                            </div>
                            <hr>
                            <div #swiperRef="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <!-- CARD -->
                                    <?php
                                    // Assuming you have established a database connection and stored it in the variable $con
                                    
                                    // Fetch the first 5 rows from the "properties" table
                                    $query = "SELECT * FROM property WHERE property_seller = '$user_data[user_id]' AND property_status = 'For Sale'";
                                    $result = mysqli_query($con, $query);

                                    // Check if the query was successful
                                    if ($result) {
                                        // Iterate over the fetched rows and populate the cards
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $property_name = $row['property_name'];
                                            $location = $row['property_municipality'];
                                            $price = $row['property_price'];
                                            $img = $row['property_img_addrs'];
                                            $num_of_beds = $row['num_of_beds'];
                                            $num_of__baths = $row['num_of_baths'];
                                            $num_of_carports = $row['num_of_carports'];

                                            // Generate the HTML card with the fetched data
                                            ?>
                                            <div class="swiper-slide">
                                                <div class="card mx-2"
                                                    style="width: 14rem; height:25rem; background-color: #F9F9F9; color: black; padding:10px;">
                                                    <img src="<?php echo $img; ?>" class="card-img mt-2" alt="image"
                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                    <div class="card-body px-0">
                                                        <h6 class="card-subtitle mb-1" style="font-size:10px">
                                                            <img src="./assets/img/icons/location.png" alt=""
                                                                style="width: 13px; height: 13px; margin-right:5px; object-fit: cover;">
                                                            <?php echo $location; ?>
                                                        </h6>
                                                        <h5 class="card-title mb-"
                                                            style="font-size: 18px; font-family: Montserrat, sans-serif;">
                                                            <span class="highlight-text">
                                                                <?php echo $property_name; ?>
                                                            </span>
                                                        </h5>
                                                        <h6 class="card-subtitle"
                                                            style="color: #18A0FB; font-size: 18px; font-family: Montserrat, sans-serif;">
                                                            ₱<b>
                                                                <?php echo number_format($price, 0, ',', ','); ?>
                                                            </b>
                                                        </h6>
                                                        <div class="card-text">
                                                            <div class="row justify-content-center">
                                                                <h4 class="border-bottom">
                                                                    <?php
                                                                    $stars = rand(2, 5); // Generate a random number between 2 and 5
                                                                    for ($i = 1; $i <= $stars; $i++) {
                                                                        ?>
                                                                        <img src="./assets/img/icons/star.png"
                                                                            style="height: 15px; width: 15px;">
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </h4>
                                                                <div class="row justify-content-center my-2">
                                                                    <div class="col-4">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-center">
                                                                            <span class="me-1">
                                                                                <?php echo $num_of_beds; ?>
                                                                            </span>
                                                                            <img src="./assets/img/icons/bed.png" alt=""
                                                                                style="width: 25px; height: 25px;">
                                                                        </div>
                                                                        <div class="row">
                                                                            <p style="font-size:8px">Bedrooms</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-center">
                                                                            <span class="me-1">
                                                                                <?php echo $num_of__baths; ?>
                                                                            </span>
                                                                            <img src="./assets/img/icons/bathtub.png" alt=""
                                                                                style="width: 25px; height: 25px;">
                                                                        </div>
                                                                        <div class="row">
                                                                            <p style="font-size:8px">Bathroom</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-center">
                                                                            <span class="me-1">
                                                                                <?php echo $num_of_carports; ?>
                                                                            </span>
                                                                            <img src="./assets/img/icons/garage.png" alt=""
                                                                                style="width: 25px; height: 25px;">
                                                                        </div>
                                                                        <div class="row">
                                                                            <p style="font-size:8px">Carports</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="property_details.php?id=<?php echo $row['property_id']; ?>"
                                                                class="btn btn-primary btn-sm btn-block w-100">View More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        // Handle the case when the query fails
                                        echo "Failed to fetch data from the database.";
                                    }
                                    ?>
                                    <!-- CARD -->
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <!-- Lower Dashboard -->
                    </div>
                    <div class="col-4 border rounded" style="background-color: white; margin-left: 2rem; overflow: auto; max-height: 60vh;">
                        <div class="row mt-4 sticky-top" style="position: sticky; top: cover; background-color: white; z-index: 1;">
                            <h4><strong>Recent Customers</strong></h4>
                        </div>
                        <hr>
                        <?php
                        // Fetch the recent customers
                        for ($i = 0; $i < 10; $i++) {
                            $recentUsers = recentUsers($con, $user_data['user_id']);
                            if (is_array($recentUsers)) {
                                foreach ($recentUsers as $user) {
                                    ?>
                                <div class="container">
                                    <div class="row my-4">
                                        <div class="col-2">
                                            <img src="./assets/img/admnAvatar/avatarF1.jpg" alt="" style="height: 50px; width: 50px;">
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <?php echo ucfirst($user); ?>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                    <?php
                                }
                            } else {
                                // Handle the case when recentUsers() does not return an array
                                // Display an appropriate error message or handle it as per your requirement
                            }
                        }
                        ?>
                    </div>


                    </div>
                    <!-- Dashboard Main -->
                </div>

            </div>
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