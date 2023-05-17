//<?php
//session_start();
//include("connection.php");
//include("functions.php");
//
//$user_data = check_login($con);
//?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/navbar.css">
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
    <div class="header">
        <div class="row">
            <div class="col-8">
                <form method="POST" action="" class="searchbar-container">
                    <div class="searchbar-container">
                        <div class="tab-selection">
                            <select name="option" class="dropdown">
                                <option value="">Select an option</option>
                                <option value="Rent">Rent</option>
                                <option value="Sale">Sale</option>
                            </select>
                        </div>
                        <div class="searchbar">
                            <input type="text" name="district" placeholder="search by district">
                            <div class="dropdown-container">
                                <select name="property_type" class="dropdown">
                                    <option value="Any property type">Property Type</option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="House">House</option>
                                    <option value="Condo">Condo</option>
                                    <option value="Condo">Lot</option>
                                </select>
                                <select name="location" class="dropdown">
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
                                <select name="price_range" class="dropdown">
                                    <option value="Any price">Price range</option>
                                    <option value="$100,000">100,000</option>
                                    <option value="$200,000">200,000</option>
                                    <option value="$300,000">300,000</option>
                                </select>
                                <button type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <main class="m3">
        <div class="row mx-5 my-2">
            <div class="row">
                <div class="title-header">
                    <h3>Buy Properties Listed in <b>Albay</b></h3>
                </div>
            </div>
            <div class="row">
                <!-- CAROUSEL HERE -->
            </div>
            <div class="row">
                <div class="col-6">
                    <h4 class="float-left">Featured Properties For Sale</h4>
                </div>
                <div class="col-6">
                    <a href="#" class="float-sm-left">See more ></a>
                </div>
                <!-- CARD -->
                <div class="card" style="width: 14rem; background-color: #F9F9F9; color: black;">
                    <img src="./assets/img/background-index.jpg" class="card-img mt-2" alt="image">
                    <div class="card-body px-0">
                        <h5 class="card-title mb-3">Property Name</h5>
                        <h6 class="card-subtitle">Location</h6>
                        <h6 class="card-subtitle">Price</h6>
                        <div class="card-text">
                            <h4 class="border-bottom">★★★★</h4>
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
                            <button type="button" class="btn btn-primary btn-sm btn-block w-100">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h4 class="float-left">Featured Properties For Rent</h4>
                </div>
                <div class="col-6">
                    <div class="float-right">
                        <a href="#">See more ></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>