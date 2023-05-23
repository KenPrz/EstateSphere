<?php 
    include("connection.php");
    include("functions.php");

    // since two tables are used
    $sql= 'select property_id, property_type, property_price, property_municipality, property_baranggay, property_zone_purok, property_flr_area, property_lot_area, property_img_addrs, num_of_beds, num_of_baths, num_of_carports, prop_others, prop_features, property_owner_fname, property_owner_lname, property_owner_email, property_name from property where property_id= "4"';
    $result = mysqli_query($con, $sql);
    $properties = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $sql2 = 'select date_visit, rev_withwho, review_text, rev_image from write_review';



    $result2 = mysqli_query($con, $sql2);
    mysqli_free_result($result);
     // since two tables are used
    $reviews = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    mysqli_free_result($result2);
    mysqli_close($con);
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View More Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="./css/home.css">
	<link rel="stylesheet" href="./css/navbar.css">
	<link rel="stylesheet" href="./css/viewmore.css">
</head>
<body class="bod">
   
        <nav>
        <div class="logo">
            <a href="index.php">
                <img src="./assets/img/logo.svg" alt="Logo">
                <a href="#">Estatesphere</a>
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="property-listing.php">Properties</a></li>
            <li><a href="#">Buyer/seller</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="aboutestate.php">About us</a></li>
        </ul>
        <div class="login">
            <a href="logout.php">
                <button type="button">Logout</button>
            </a>
        </div>
    </nav>
    <div class="h custom-div text-white ">
      <div class="kros text-center">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner test">
            <div class="carousel-item active">
              <img src="./assets/img/prop-img/img-5.jpg" class="d-block w-100 aspt" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./assets/img/prop-img/img-2.jpg" class="d-block w-100 aspt" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./assets/img/prop-img/img-3.jpg" class="d-block w-100 aspt" alt="...">
            </div>
          </div>
           <div class="float-end floating-div">
            <?php foreach ($properties as $property) { ?>
               <div class="row m-0  p-0">
                   <div class="col-md-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                   </div>
                   <div class="col-md-6  m-0  p-0 text-start">
                       <p class="fw-bold"><?php echo htmlspecialchars($property['property_municipality']); ?>, Albay</p>
                   </div>
               </div>
               <div class="row ms-1">
                <div class="col-md-9">
                    <div class="p text-start">
                        The Ideal Contemporary Town House for Rent In Old Albay
                    </div>
                </div>
               </div>
            </div>
            <div class="gmaps-float rounded-3 text-black">
               <div class="">
                   <img src="./assets/img/admnAvatar/maps.png" class="border rounded-3 gmaps-img shadow">
               </div>
               <div class="p mt-2">
                    <div class="row me-0 p-0">
                        <div class="col m-0 p-0 text-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-compass-fill" viewBox="0 0 16 16">
                              <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24zm-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z"/>
                            </svg>
                        </div>
                        <div class="col-md-8 text-start ms-2 p-0 fw-bold">
                            Google Maps
                        </div>
                    </div>
               </div>
            </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon fw-bold" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="row ms-3">
            <div class="col-md-4 ms-6 mt-4">
                <div class="row fw-bold">
                    <div class="col-md-3 m-0 p-0">
                        List Price:
                    </div>
                    <div class="col-md-4 ms-0 p-0 text-start text-primary">₱
                        <?php echo htmlspecialchars($property['property_price']); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ms-5 me-3 text-end p text-secondary">
                Property ID: <?php echo htmlspecialchars($property['property_id']); ?>
            </div>
            <div class="col-md-3 p text-start text-secondary">
                Property Type: <?php echo htmlspecialchars($property['property_type']); ?>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-4 text-start">
                    <div class="propinfo bg-light border rounded fs-14">
                        <div class="row ms-1 me-1 mt-2 text-secondary">
                            <div class="col">
                                Property Name
                            </div>
                            <div class="col text-end">
                               <?php echo htmlspecialchars($property['property_name']); ?>   
                            </div>
                        </div>
                        <div class="row ms-1 me-1 mt-2 text-secondary">
                            <div class="col">
                                Property Owner
                            </div>
                            <div class="col text-end">
                                <?php echo htmlspecialchars($property['property_owner_fname']); ?> <?php echo htmlspecialchars($property['property_owner_lname']); ?>
                            </div>
                        </div>
                        <div class="row ms-1 me-1 mt-2 text-secondary">
                            <div class="col">
                                Email
                            </div>
                            <div class="col text-end">
                                <?php echo htmlspecialchars($property['property_owner_email']); ?>   
                            </div>
                        </div>
                        <div class="row ms-1 me-1 mt-2 text-secondary">
                            <div class="col">
                                Address
                            </div>
                            <div class="col text-end">
                                <?php echo htmlspecialchars($property['property_baranggay']); ?>,<?php echo htmlspecialchars($property['property_municipality']); ?>, Albay   
                            </div>
                        </div>
                    </div>
                    <div class="question mt-5 bg-dark text-white text-center border rounded pb-4">
                        <div class="p">
                            <div class="interested mt-5 text-secondary">
                                INTERESTED IN THIS PROPERTY?
                            </div>
                            <div class="info text-center mt-4 text-secondary">
                                Our listing are high demand, <br>so don’t waituntil your chance is over. <br>Contact or book a tour now.
                            </div>
                        </div>
                    </div>   
                </div>  

                <div class="col-md-8 ms-0">
                    <div class="propinfo bg-light border rounded pb-4 pe-2">
                        <div class="m-3 fw-bold">
                            More Details
                            <p class="line mt-2 border border-secondary"></p>
                        </div>
                        <div class="row text-center ms-4">
                            <div class="col-md-2">
                              <div class="row p-0">
                                  <div class="col text-end ms-4">
                                      <i class="fas fa-bed fs-2"></i>
                                  </div>
                                  <div class="col text-start p-0 mt-1">
                                      <p class="fw-bold"><?php echo htmlspecialchars($property['num_of_beds']); ?></p>
                                  </div>
                              </div>
                              <div class="h7 fw-bold p-0 text-secondary">
                                  Bedroom   
                              </div>
                               
                            </div>
                            <div class="col-md-2 ms-0 p-0 ">
                                <div class="row p-0">
                                  <div class="col text-end ms-4">
                                      <i class="fas fa-restroom fs-2"></i>
                                  </div>
                                  <div class="col text-start p-0 mt-1">
                                      <p><?php echo htmlspecialchars($property['num_of_baths']); ?></p>
                                  </div>
                              </div>
                              <div class="h7 fw-bold p-0 text-secondary">
                                  Bathroom
                              </div>
                            </div>
                            <dov class="col-md-2 ">
                                <div class="row p-0">
                                  <div class="col text-end ms-4">
                                      <i class="fas fa-car fs-2"></i>
                                  </div>
                                  <div class="col text-start p-0 mt-1">
                                      <p><?php echo htmlspecialchars($property['num_of_carports']); ?></p>
                                  </div>
                              </div>
                              <div class="h7 fw-bold p-0 text-secondary">
                                  Carport
                              </div>
                            </dov>
                            <div class="col-md-3">
                                <div class="row p-0 text-start ms-2">
                                 <div class="col-md-4  text-end">
                                     <i class="fas fa-ruler-horizontal fs-2"></i>
                                  </div>
                                  <div class="col p-0 mt-1 ms-2">
                                      <p><?php echo htmlspecialchars($property['property_flr_area']); ?>m <sup>2</sup></p>
                                  </div>
                              </div>
                              <div class="h7 fw-bold p-0 text-secondary">
                                  Floor Area
                              </div>
                            </div> 
                            <div class="col-md-3 ">
                                <div class="row p-0 text-start">
                                  <div class="col-md-4  text-end">
                                      <i class="fas fa-ruler-combined fs-2"></i>
                                  </div>
                                  <div class="col p-0 mt-1">
                                      <p><?php echo htmlspecialchars($property['property_lot_area']); ?>m <sup>2</sup></p>
                                  </div>
                              </div>
                              <div class="h7 fw-bold p-0 text-secondary">
                                  Lot Area
                              </div>
                            </div>   
                        </div>
                    </div>   
                    <div class="prop-description bg-light mt-5 border rounded p-4 pb-2">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="info h6 fw-bold">
                                        Property Information
                                    </div>
                                   <div class="col text-secondary">
                                       Property Address:
                                   </div>
                                   <div class="col text-secondary">
                                       <div class="mun">
                                           <?php echo htmlspecialchars($property['property_municipality']); ?> 
                                       </div>
                                       <div class="barang text-secondary">
                                           <?php echo htmlspecialchars($property['property_baranggay']); ?> 
                                       </div>
                                       <div class="zone text-secondary">
                                            <?php echo htmlspecialchars($property['property_zone_purok']); ?> 
                                       </div>
                                   </div>
                               </div>
                            </div>
                            <div class="col">
                                <div class="propdes h6 fw-bold ">
                                Features
                               </div>
                               <div class="des text-secondary">
                                    <?php echo htmlspecialchars($property['prop_features']); ?> 
                               </div>
                            </div>
                        </div>
                        <div class="other mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="h6 fw-bold">Other Information</div>
                            <div class="inf text-secondary">
                                 <?php echo htmlspecialchars($property['prop_others']); ?> 
                            </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>


                <?php } ?>
                    <div class="review bg-light border rounded mt-4 p-4">
                        
                        <div class="review h6 fw-bold">
                            Reviews from other Visitors
                        </div>
                        <?php foreach ($reviews as $review) {  ?>
                        <div class="rev mt-2 border border-2 p-4 rounded ">
                            <div class="revuser">
                                <div class="row">
                                    
                                    <div class="col-md-1 p-1  text-center">
                                        <i class="fas fs-2 fa-user"></i>
                                    </div>
                                    <div class="col">
                                        <div class="name fw-bold mt-2">
                                            Claire Beauchamp
                                        </div>
                                        <div class="with">
                                            <p class="text-secondary">with <?php echo htmlspecialchars($review['rev_withwho']); ?> </p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="date h6 fs-15 text-secondary">
                                            wrote a feedback <?php echo htmlspecialchars($review['date_visit']); ?> 
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                         <div class="say mt-3 text-secondary">
                                            <?php echo htmlspecialchars($review['review_text']); ?> 
                                        </div>

                                    </div>
                                    <div class="col-md-3 border">
                                         <div class="say mt-3 text-secondary text-center m-o p-0">
                                            <img src="<?php echo htmlspecialchars($review['rev_image']); ?>" class="" width="50">
                                        </div>
                                        
                                    </div>
                                </div>
                               
                             
                            </div>

                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
           
        </div> 

        <div class="foot mt-3 text-center pb-4">
            <div class="row text-center">
                <div class="col m-2">
                    <button type="" class="btn btn-primary shadow">Contact Seller</button>
                     <button type="" class="btn btn-primary m-2 shadow">Book A Tour</button>
                </div>
                 
            </div>
        </div>  
    </div>
</body>
</html>