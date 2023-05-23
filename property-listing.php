<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Check if the necessary form fields are set
	if (
		isset($user_data["user_id"]) &&
		isset($_POST['property_owner_lname']) &&
		isset($_POST['property_owner_fname']) &&
		isset($_POST['property_owner_contact']) &&
		isset($_POST['property_owner_email']) &&
		isset($_POST['property_name']) &&
		isset($_POST['property_type']) &&
		isset($_POST['property_price']) &&
		isset($_POST['property_municipality']) &&
		isset($_POST['property_baranggay']) &&
		isset($_POST['property_zone_purok']) &&
		isset($_POST['property_map']) &&
		isset($_POST['property_lot_area']) &&
		isset($_POST['property_flr_area']) &&
		isset($_POST['num_of_beds']) &&
		isset($_POST['num_of_baths']) &&
		isset($_POST['num_of_carports']) &&
		isset($_POST['propOthers']) &&
		isset($_POST['propFeatures']) &&
		isset($_POST['property_sale_type']) &&
		isset($_FILES['property_imgaddrs']['name']) &&
		isset($_FILES['property_imgaddrs']['tmp_name'])
	) {
		// Property owner information
		$property_seller = $user_data["user_id"];
		$property_owner_lname = $_POST['property_owner_lname'];
		$property_owner_fname = $_POST['property_owner_fname'];
		$property_owner_contact = $_POST['property_owner_contact'];
		$property_owner_email = $_POST['property_owner_email'];

		// Property listing information
		$prop_status = "for sale";
		$property_name = $_POST['property_name'];
		$property_type = $_POST['property_type'];
		$property_price = $_POST['property_price'];
		$property_municipality = $_POST['property_municipality'];
		$property_baranggay = $_POST['property_baranggay'];
		$property_zone_purok = $_POST['property_zone_purok'];
		$property_map = $_POST['property_map'];
		$property_lot_area = $_POST['property_lot_area'];
		$property_flr_area = $_POST['property_flr_area'];
		$num_of_beds = $_POST['num_of_beds'];
		$num_of_baths = $_POST['num_of_baths'];
		$num_of_carports = $_POST['num_of_carports'];
		$propOthers = $_POST['propOthers'];
		$propFeatures = $_POST['propFeatures'];
		$property_sale_type = $_POST['property_sale_type'];

		// Image section, don't alter
		$img = $_FILES['property_imgaddrs']['name'];
		$fileTmpName = $_FILES['property_imgaddrs']['tmp_name'];
		$allowedType = array('jpg', 'png', 'jpeg', 'gif', 'ico');
		$fileExtension = explode('.', $img);
		$fileRealExtension = strtolower(end($fileExtension));

		if (preg_match("!image!", $_FILES['property_imgaddrs']['type'])) {
			if (in_array($fileRealExtension, $allowedType)) {
				// Generate a unique file name for the uploaded image
				$NewNameFile = uniqid('', true) . "." . $fileRealExtension;
				$fileLocation = 'assets/img/properties/' . $NewNameFile;

				// Move the uploaded image to the desired location
				if (move_uploaded_file($fileTmpName, $fileLocation)) {
					// Include your database connection code here (e.g., $con variable)

					// Prepare and execute the database query
					$sql = "INSERT INTO property (
						property_seller,
						property_owner_lname,
						property_owner_fname,
						property_owner_cont,
						property_owner_email,
						property_status,
						property_name,
						property_type,
						property_price,
						property_municipality,
						property_baranggay,
						property_zone_purok,
						property_map,
						property_lot_area,
						property_flr_area,
						num_of_beds,
						num_of_baths,
						num_of_carports,
						prop_others,
						prop_features,
						property_img_addrs,
						property_sale_type
					) VALUES (
						'{$user_data["user_id"]}',
						'$property_owner_lname',
						'$property_owner_fname',
						'$property_owner_contact',
						'$property_owner_email',
						'$prop_status',
						'$property_name',
						'$property_type',
						'$property_price',
						'$property_municipality',
						'$property_baranggay',
						'$property_zone_purok',
						'$property_map',
						'$property_lot_area',
						'$property_flr_area',
						'$num_of_beds',
						'$num_of_baths',
						'$num_of_carports',
						'$propOthers',
						'$propFeatures',
						'$fileLocation',
						'$property_sale_type'
					)";
					
					if (mysqli_query($con, $sql)) {
						$_SESSION['message'] = 'Successfully Added';
					} else {
						$_SESSION['message'] = 'Cannot add property: ' . mysqli_error($con);
					}
				} else {
					$_SESSION['message'] = 'Failed to move uploaded file';
				}
			} else {
				$_SESSION['message'] = 'Invalid file format. Allowed formats are: JPG, JPEG, PNG, GIF';
			}
		} else {
			$_SESSION['message'] = 'Invalid file type. Only image uploads are allowed';
		}
	} else {
		$_SESSION['message'] = 'Missing required form fields';
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post Property</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/home.css">
	<link rel="stylesheet" href="./css/navbar.css">
	<link rel="stylesheet" href="./css/propertyListing.css">
</head>

<body class="bg-light">
<nav>
        <div class="logo">
            <a href="index.php">
                <img src="./assets/img/logo.svg" alt="Logo">
                <a href="index">Estatesphere</a>
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="property-listing.php"><strong>Sell</strong></a></li>
            <li><a href="listings.php"><strong>Buy</strong></a></li>
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
	</div>
	
	<div class="container marg mb-4">
		<div class="button">
			<a href="dashboard.php"><button type="button" class="btn btn-secondary">Return to Dashboard</button></a>
		</div>
		<div class="row mt-2">
			<div class="col col-lg-5">
				<h2 class="fw-bold est">EstateSphere</h2>
				<p class="fw-bold">Bringing Buyers and Seller Together <br>in the Virtual World</p>
				<?php echo $_SESSION['message']?>
			</div>
			<div class="col">
				<div class="shaded-div">
					<div class="textcont fw-bold mt-1">CONDITIONS APPLY:</div>
					<div class="contnt">
						<ul>
							<li>
								Only property owners will be entertained. Brokers will not be allowed to list.
							</li>
							<li>
								Owner has the right to cancel the listing at any time.
							</li>
							<li>
								EstateSphere may request for documentation to establish proof of ownership.
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data"
			class="mt-5">
			<div class="mt-3 frm shadow p-4"><br>
				<div class="h6 ms-5 mt-2 fw-bold">Property Information</div>

				<div class="row ms-5">
					<div class="col-md-3">
						<label for="name">Property Name</label>
						<input type="text" class="form-control border" placeholder="Name" name="property_name">
					</div>
					<div class="col-md-3">
						<select class="form-select mt-4" aria-label="Default select example" name="property_type">
							<option selected>Property Type</option>
							<option value="Apartment/Condominium">Apartment/Condominium</option>
							<option value="Single-Family House">Single-Family House</option>
							<option value="Commercial Property">Commercial Property</option>
							<option value="Luxury Properties">Luxury Properties</option>
						</select>
					</div>
					<div class="col-md-3">
						<label for="name">Selling Price</label>
						<input type="text" class="form-control border" placeholder="Price" name="property_price">
					</div>
					<div class="col-md-2">
						<label for="name">Transaction type</label>
						<select class="form-select" aria-label="Default select example" name="property_sale_type">
							<option selected>For Sale/Rent</option>
							<option value="Apartment/Condominium">Sale</option>
							<option value="Single-Family House">Rent</option>
						</select>
					</div>
				</div>

				<div class="row ms-5 mt-5">
					<div class="col-md-3">
						<label for="name">Municipality</label>
						<select name="property_municipality" class="form-select" aria-label="Default select example">
							<option value="Any property type">Select Municipality</option>
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
					</div>
					<div class="col-md-3">
						<label for="name">Barangay</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="property_baranggay">
					</div>
					<div class="col-md-2">
						<label for="name">Zone/Purok</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="property_zone_purok">
					</div>
					<div class="col-md-3">
						<label for="name">Waze/GMaps link</label>
						<input type="text" class="form-control border" placeholder="$0000" aria-label="Last name"
							name="property_map">
					</div>
				</div>

				<div class="row ms-5 mt-5">
					<div class="col-md-3">
						<label for="name">Lot Area</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="property_lot_area">
					</div>
					<div class="col-md-2">
						<label for="name">Floor Area</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="property_flr_area">
					</div>
					<div class="col-md-2">
						<label for="name">Bedroom(s)</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="num_of_beds">
					</div>
					<div class="col-md-2">
						<label for="name">Toilet/Bath(s)</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="num_of_baths">
					</div>
					<div class="col-md-2">
						<label for="name">Car Port(s)</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="num_of_carports">
					</div>
				</div>

				<div class="row ms-5 mt-5">
					<div class="col-md-5">
						<label for="name">Others</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="propOthers">
					</div>
				</div>

				<div class="row ms-5 mt-5">
					<div class="col-md-6">
						<label for="name">Features</label>
						<textarea type="text" class="form-control resize-none" rows="4" placeholder=""
							aria-label="Last name" name="propFeatures"></textarea>
					</div>
					<div class="col-md-5">
						<label for="formFile" class="form-label">Upload Pictures</label>
						<input class="form-control border" type="file" id="formFile" aria-label="Last name"
							name="property_imgaddrs">
					</div>
				</div>

				<div class="h6 ms-5 mt-5 fw-bold">Property Owner's Information</div>
				<div class="row ms-5 mt-5">
					<div class="col-md-5">
						<label for="name">First Name</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="property_owner_fname">
					</div>
					<div class="col-md-6">
						<label for="name">Last Name</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="property_owner_lname">
					</div>
				</div>
				<div class="row ms-5 mt-5">
					<div class="col-md-5">
						<label for="name">Contact Number</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="property_owner_contact">
					</div>
					<div class="col-md-6">
						<label for="name">Email Address</label>
						<input type="text" class="form-control border" placeholder="" aria-label="Last name"
							name="property_owner_email">
					</div>
				</div>

				<div class="row mt-3">
					<div class="col"></div> <!-- Empty column to push the div to the right -->
					<div class="col-auto">
						<button type="submit" class="btn btn-secondary" name="submit">Submit</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>

</html>