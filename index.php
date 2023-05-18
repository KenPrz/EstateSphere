<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Website</title>
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>

<body>
    <nav>
        <div class="logo">
            <a href="#">
                <img src="./assets/img/logo.svg" alt="Logo">
                <a href="#">Estatesphere</a>
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="property-listing.php">Properties</a></li>
            <li><a href="#">Buyer/seller</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About us</a></li>
        </ul>
        <div class="login">
            <a href="logout.php">
                <button type="button">Logout</button>
            </a>
        </div>
    </nav>
    <div class="header d-flex align-items-center">
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
    <main>
        <div class="row">
            <div class="title-header">
                <h6 class="m-5">Buy Properties Listed in <b>Albay</b></h6>
            </div>
        </div>
        <div class="container">
            <!-- Carousel -->
            <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
            <div #swiperRef="" class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="width:357px; height:144px;">
                        <div class="row">
                            <div class="row">
                                <h3>Bacacay</h3>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <img src="./assets/img/house-solid.svg" style="height: 30px; width: 30px;" alt="">
                                </div>
                                <div class="col">
                                    <p class="mb-0 mt-1">20 properties for sale</p>
                                </div>
                            </div>
                            <div class="row">
                                <a href="#" style="text-decoration: none; font-size: 14px;"
                                    class="text-primary mt-2">view listed properties</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width:357px; height:144px;">
                        <div class="row">
                            <div class="row">
                                <h3>Camalig</h3>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <img src="./assets/img/house-solid.svg" style="height: 30px; width: 30px;" alt="">
                                </div>
                                <div class="col">
                                    <p class="mb-0 mt-1">20 properties for sale</p>
                                </div>
                            </div>
                            <div class="row">
                                <a href="#" style="text-decoration: none; font-size: 14px;"
                                    class="text-primary mt-2">view listed properties</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width:357px; height:144px;">
                        <div class="row">
                            <div class="row">
                                <h3>Guinobatan</h3>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <img src="./assets/img/house-solid.svg" style="height: 30px; width: 30px;" alt="">
                                </div>
                                <div class="col">
                                    <p class="mb-0 mt-1">20 properties for sale</p>
                                </div>
                            </div>
                            <div class="row">
                                <a href="#" style="text-decoration: none; font-size: 14px;"
                                    class="text-primary mt-2">view listed properties</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width:357px; height:144px;">Slide 4</div>
                    <div class="swiper-slide" style="width:357px; height:144px;">Slide 5</div>
                    <div class="swiper-slide" style="width:357px; height:144px;">Slide 6</div>
                    <div class="swiper-slide" style="width:357px; height:144px;">Slide 7</div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
            <!-- Carousel -->
            <div class="row my-3">
                <div class="col-6">
                    <h4 class="float-left" style="font-weight: 900;">Featured Properties For Sale</h4>
                </div>
                <div class="col-6">
                    <a href="#" style="text-decoration: none;" class="float-end .text-primary pe-5">See more ></a>
                </div>
                <!-- Card Rows -->
                <div class="row d-flex justify-content-center p-4" style="background-color: white;">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        ?>
                        <!-- CARD -->
                        <div class="card mx-2" style="width: 14rem; background-color: #F9F9F9; color: black;">
                            <img src="./assets/img/prop-img/img-<?= $i ?>.jpg" class="card-img mt-2" alt="image"
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <div class="card-body px-0">
                                <h5 class="card-title mb-3">Property Name</h5>
                                <h6 class="card-subtitle mb-1">Location</h6>
                                <h6 class="card-subtitle">Price</h6>
                                <div class="card-text">
                                    <h4 class="border-bottom">★ ★ ★ ★</h4>
                                    <div class="row">
                                        <div class="col-4">
                                            <h5>BED</h5>
                                        </div>
                                        <div class="col-4">
                                            <h5>BED</h5>
                                        </div>
                                        <div class="col-4">
                                            <h5>BED</h5>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm btn-block w-100">view more</button>
                                </div>
                            </div>
                        </div>
                        <!-- CARD -->
                        <?php
                    }
                    ?>
                </div>
                <!-- Card Rows -->
                <div class="row my-3">
                    <div class="col-6">
                        <h4 class="float-left" style="font-weight: 900;">Featured Properties For Rent</h4>
                    </div>
                    <div class="col-6">
                        <a href="#" style="text-decoration: none;" class="float-end .text-primary pe-5">See more ></a>
                    </div>
                    <!-- Card Rows -->
                    <div class="row d-flex justify-content-center p-4" style="background-color: white;">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            ?>
                            <!-- CARD -->
                            <div class="card mx-2" style="width: 14rem; background-color: #F9F9F9; color: black;">
                                <img src="./assets/img/prop-img/img-<?= $i ?>.jpg" class="card-img mt-2" alt="image"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                                <div class="card-body px-0">
                                    <h5 class="card-title mb-3">Property Name</h5>
                                    <h6 class="card-subtitle mb-1">Location</h6>
                                    <h6 class="card-subtitle">Price</h6>
                                    <div class="card-text">
                                        <h4 class="border-bottom">★ ★ ★ ★</h4>
                                        <div class="row">
                                            <div class="col-4">
                                                <h5>BED</h5>
                                            </div>
                                            <div class="col-4">
                                                <h5>BED</h5>
                                            </div>
                                            <div class="col-4">
                                                <h5>BED</h5>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm btn-block w-100">view
                                            more</button>
                                    </div>
                                </div>
                            </div>
                            <!-- CARD -->
                            <?php
                        }
                        ?>
                    </div>
                    <!-- Card Rows -->
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
        spaceBetween: 40,
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