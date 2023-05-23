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
<body style="background-color:#f2f2f2;">
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
            <li><a href="#"><strong>Buy</strong></a></li>
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
    <div class="property-header d-flex align-items-center">
        <div class="row ms-4">
            <div class="col-auto">
                <!-- Searchbar -->
                <div class="searchbar-container">
                    <div class="row">
                        <div class="col-auto px-3 pt-3 pb-0 bg-white text-dark rounded-top">
                            <select name="option" class="btn btn-default dropdown-toggle border">
                                <option value="">Select an option</option>
                                <option value="Rent">Rent</option>
                                <option value="Sale">Sale</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="searchbar-main p-3 mb-2 bg-white text-dark border-bottom"
                            style="border-radius: 0 .5rem .5rem .5rem;">
                            <div class="dropdown-container">
                                <select class="btn btn-default dropdown-toggle border" name="property_type">
                                    <option class="dropdown-item" value="Any property type">Property Type</option>
                                    <option class="dropdown-item" value="Apartment">Apartment</option>
                                    <option class="dropdown-item" value="House">House</option>
                                    <option class="dropdown-item" value="Condo">Condo</option>
                                    <option class="dropdown-item" value="Condo">Lot</option>
                                </select>
                                <select name="location" class="btn btn-default dropdown-toggle border">
                                    <option value="Any property type">Location</option>
                                    <option value="Bacacay">Bacacay</option>
                                    <option value="Camalig">Camalig</option>
                                    <option value="Daraga">Daraga</option>
                                    <option value="Guinobatan">Guinobatan</option>
                                    <option value="Jovellar">Jovellar</option>
                                    <option value="Legazpi">Legazpi</option>
                                    <option value="Libon">Libon</option>
                                    <option value="Ligao">Ligao</option>
                                    <option value="Malilipot">Malilipot</option>
                                    <option value="Malinao">Malinao</option>
                                    <option value="Manito">Manito</option>
                                    <option value="Oas">Oas</option>
                                    <option value="Pio Duran">Pio Duran</option>
                                    <option value="Polangui">Polangui</option>
                                    <option value="Santo Domingo">Santo Domingo</option>
                                    <option value="Tabaco">Tabaco</option>
                                    <option value="Tiwi">Tiwi</option>
                                </select>
                                <select name="price_range" class="btn btn-default dropdown-toggle border">
                                    <option value="Any price">Price range</option>
                                    <option value="$100,000">100,000</option>
                                    <option value="$200,000">200,000</option>
                                    <option value="$300,000">300,000</option>
                                </select>
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Searchbar -->
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <!-- Carousel -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
        <div #swiperRef="" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                $query = "SELECT property_municipality, COUNT(*) AS count FROM property GROUP BY property_municipality;";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $municipality = $row['property_municipality'];
                    $count = $row['count'];
                    ?>
                    <div class="swiper-slide" style="width:357px; height:144px;">
                        <div class="row">
                            <div class="row">
                                <h3>
                                    <?php echo $municipality; ?>
                                </h3>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <img src="./assets/img/house-solid.svg" style="height: 30px; width: 30px;" alt="">
                                </div>
                                <div class="col">
                                    <p class="mb-0 mt-1">
                                        <?php echo $count; ?> properties for sale
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <a href="#" style="text-decoration: none; font-size: 14px;" class="text-primary mt-2">view
                                    listed properties</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                mysqli_free_result($result);
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
        <!-- Carousel -->
        <div class="row my-3">
            <div class="col-6">
                <h4 class="float-left my-3 ml-0" style="font-weight: 900;">Properties for Sale</h4>
            </div>
            <!-- Card Rows -->
            <!-- Place this code wherever you want to display the carousel -->
            <div class="row d-flex justify-content-center p-4 rounded" style="background-color: white;">
                <!-- CARD -->
                <?php
                // Assuming you have established a database connection and stored it in the variable $con
                // Fetch the first 5 rows from the "properties" table
                $query = "SELECT * FROM property LIMIT 15";
                $result = mysqli_query($con, $query);

                // Check if the query was successful
                if ($result && mysqli_num_rows($result) > 0) {
                    $count = 0;
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
                        <div class="card mx-2" style="width: 14rem; background-color: #F9F9F9; color: black;">
                            <img src="<?php echo $img; ?>" class="card-img mt-2" alt="image"
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <div class="card-body px-0">
                                <h6 class="card-subtitle mb-1" style="font-size:10px">
                                    <img src="./assets/img/icons/location.png" alt=""
                                        style="width: 13px; height: 13px; margin-right:5px; object-fit: cover;">
                                    <?php echo $location; ?>
                                </h6>
                                <h5 class="card-title mb-" style="font-size: 18px; font-family: Montserrat, sans-serif;">
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
                                                <img src="./assets/img/icons/star.png" style="height: 15px; width: 15px;">
                                                <?php
                                            }
                                            ?>
                                        </h4>
                                        <div class="row justify-content-center my-2">
                                            <div class="col-4">
                                                <div class="d-flex align-items-center justify-content-center">
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
                                                <div class="d-flex align-items-center justify-content-center">
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
                                                <div class="d-flex align-items-center justify-content-center">
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
                                    <a href="property_details.php?id=<?php echo $row['property_id']; ?>" class="btn btn-primary btn-sm btn-block w-100">View More</a>
                                </div>
                            </div>
                        </div>
                        <?php

                        $count++;
                        // Check if 5 cards have been displayed
                        if ($count % 5 == 0) {
                            ?>
                        </div>
                        <div class="row d-flex justify-content-center p-4" style="background-color: white;">
                            <?php
                        }
                    }
                } else {
                    // Handle the case when the query fails or no rows are found
                    echo "No data found.";
                }
                ?>
                <!-- CARD -->
            </div>
            <!-- Card Rows -->
        </div>
    </div>
</body>
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
        spaceBetween: 40,
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