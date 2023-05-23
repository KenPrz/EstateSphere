<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

// Define variables with empty values
$firstname = $lastname = $email = $contactNumber = $address = $password = $confirmPassword = '';
// Define error variables with empty values
$firstnameErr = $lastnameErr = $emailErr = $contactNumberErr = $addressErr = $passwordErr = $confirmPasswordErr = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form was submitted, process the data here
    
    // Retrieve and sanitize form data
    $firstname = sanitizeInput($_POST['firstname']);
    $lastname = sanitizeInput($_POST['lastname']);
    $email = sanitizeInput($_POST['email']);
    $contactNumber = sanitizeInput($_POST['contactNumber']);
    $address = sanitizeInput($_POST['address']);
    $password = sanitizeInput($_POST['password']);
    $confirmPassword = sanitizeInput($_POST['confirmPassword']);
    
    // Validate the form fields
    $isValid = true;
    
    if (empty($firstname)) {
        $firstnameErr = 'Firstname is required';
        $isValid = false;
    }
    
    if (empty($lastname)) {
        $lastnameErr = 'Lastname is required';
        $isValid = false;
    }
    
    if (empty($email)) {
        $emailErr = 'Email is required';
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = 'Invalid email format';
        $isValid = false;
    }
    
    if (empty($contactNumber)) {
        $contactNumberErr = 'Contact Number is required';
        $isValid = false;
    }
    
    if (empty($address)) {
        $addressErr = 'Address is required';
        $isValid = false;
    }
    
    if (empty($password)) {
        $passwordErr = 'Password is required';
        $isValid = false;
    }
    
    if (empty($confirmPassword)) {
        $confirmPasswordErr = 'Confirm Password is required';
        $isValid = false;
    } elseif ($password !== $confirmPassword) {
        $confirmPasswordErr = 'Passwords do not match';
        $isValid = false;
    }
    
    if ($isValid) {
        // Prepare and bind the UPDATE statement
        $stmt = $con->prepare("UPDATE users SET firstname = ?, lastname = ?, email = ?, contact_number = ?, address = ?, password = ? WHERE user_id = ?");
        $stmt->bind_param("ssssssi", $firstname, $lastname, $email, $contactNumber, $address, $password, $user_data['user_id']);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "User data updated successfully!";
            header("Location: dashboard.php");
        } else {
            echo "Error updating user data: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}
// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
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
                <li id="selected-dashboard"><a href="dashboard.php"><img src="./assets/img/icons/pie-chart.png" alt="Dashboard"> Dashboard</a></li>
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
            <div class="row" style="margin-left: 1%;">
                <h1><strong>Account Settings</strong></h1>
            </div>
            <div class="row">
                <div class="card shadow-sm" style="height: 55vh; width: 70%; margin-left: 2%;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="row" style="text-align: center; margin-top: 10%;">
                                    <h2><strong>My Profile</strong></h2>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <img src="./assets/img/admnAvatar/avatarF1.jpg" alt="" style="height:200;width:200px;">
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-primary">Upload New</button>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-secondary">Delete Avatar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row mt-5">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="firstname">Firstname</label>
                                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="<?php echo $firstname; ?>">
                                                <span class="error"><?php echo $firstnameErr; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="lastname">Lastname</label>
                                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="<?php echo $lastname; ?>">
                                                <span class="error"><?php echo $lastnameErr; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                                                <span class="error"><?php echo $emailErr; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="contactNumber">Contact Number</label>
                                                <input type="number" class="form-control" id="contactNumber" name="contactNumber" placeholder="Contact Number" value="<?php echo $contactNumber; ?>">
                                                <span class="error"><?php echo $contactNumberErr; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $address; ?>">
                                                <span class="error"><?php echo $addressErr; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                <span class="error"><?php echo $passwordErr; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="confirmPassword">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                                                <span class="error"><?php echo $confirmPasswordErr; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row-reverse">
                                        <div class="p-2"><button type="submit" class="btn btn-primary">Save Changes</button></div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
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