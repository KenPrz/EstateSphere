<?php
include("connection.php");
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$ratingAccuracy = $_POST['ratingAccuracy'];
	$ratingLocation = $_POST['ratingLocation'];
	$ratingCommunication = $_POST['ratingCommunication'];
	$ratingCheckIn = $_POST['ratingCheckIn'];
	$ratingCleanliness = $_POST['ratingCleanliness'];
	$ratingValue = $_POST['ratingValue'];
	$dateVisit = $_POST['dateVisit'];
	$withwho = $_POST['withwho'];
	$review_text = $_POST['review_text'];
	$rev_image = $_FILES['rev_image']['name'];

	$fileTmpName = $_FILES['rev_image']['tmp_name'];
	$allowedType = array('jpg', 'png', 'jpeg', 'gif', 'ico');
	$fileExtension = explode('.', $rev_image);

	//set all the letters to lower case
	$fileRealExtension = strtolower(end($fileExtension));

	if (preg_match("!image!", $_FILES['rev_image']['type'])) {
		if (in_array($fileRealExtension, $allowedType)) {
			$_SESSION['rev_image'] = $rev_image;
			$fileExtension = explode('.', $rev_image);
			//set all the letters to lower case

				$fileLocation = 'assets/img/review-pics/' . $NewNameFile;
				// move the file to the new location from temp location 
				move_uploaded_file($fileTmpName, $fileLocation);
				$sql2 = "insert into write_review(rev_accuracy, rev_location, rev_communication, rev_checkin, rev_cleanliness, rev_value, date_visit, rev_withwho, review_text, rev_image)values('$ratingAccuracy', '$ratingLocation', '$ratingCommunication', '$ratingCheckIn', '$ratingCleanliness', '$ratingValue' , '$dateVisit', '$withwho' , '$review_text' , '$fileLocation')";
				if (mysqli_query($con, $sql2)) {
					$_SESSION['message'] = 'Successfully Added';

			$fileLocation = 'assets/img/review-pics/' . $NewNameFile;
			// move the file to the new location from temp location 
			move_uploaded_file($fileTmpName, $fileLocation);
			$sql2 = "insert into write_review(rev_accuracy, rev_location, rev_communication, rev_checkin, rev_cleanliness, rev_value, date_visit, rev_withwho, review_text, rev_image)values('$ratingAccuracy', '$ratingLocation', '$ratingCommunication', '$ratingCheckIn', '$ratingCleanliness', '$ratingValue' , '$dateVisit', '$withwho' , '$review_text' , '$rev_image')";
			if (mysqli_query($con, $sql2)) {
				$_SESSION['message'] = 'Successfully Added';
			} else {
				$_SESSION['message'] = 'cannot add property';
			}
		} else {
			$_SESSION['message'] = 'cannot add property';
		}
	} else {

		$_SESSION['message'] = 'Allowed format(JPG, JPEG, PNG, GIF,';
	}
}
		$sql = 'select property_municipality, property_type, property_img_addrs from property where property_id = 4';

$result = mysqli_query($con, $sql);
$properties = mysqli_fetch_all($result, MYSQLI_ASSOC);
// mysqli_free_result($result);
// mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Write A Review</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/home.css">
	<link rel="stylesheet" href="./css/navbar.css">
	<link rel="stylesheet" href="./css/propertyListing.css">
	<link rel="stylesheet" href="./css/write-review.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="./js/h.js"></script>
</head>
<body>
	<div class="nav">
		<nav>

			<div class="logo">
				<a href="#">
					<img src="./assets/img/logo.svg" alt="Logo">
					<a href="#">Estatesphere</a>
				</a>
			</div>

		</nav>
	</div>
	<div class="review bg-light">
		<div class="container p-2 ">
			<div class="h6 fw-bold pt-4">
				Tell us, how was <br>your experience?
			</div>
			<div class="row">
				<?php foreach ($properties as $property) { ?>
					<div class="col-md-4">
						<div class="crd border border-2 p-2">
							<div class=" mt-4 "><img src="<?php echo htmlspecialchars($property['property_img_addrs']); ?>" class="propimg"></div>
							<div class="des d h6 mt-2"><?php echo htmlspecialchars($property['property_type']); ?></div>
							<div class="des d h6 mt-2 fw-bold"><?php echo htmlspecialchars($property['property_municipality']); ?>, Albay</div>
						</div>
					</div>
				<?php } ?>
				<div class="col-md-7 ms-5 ">
					<div class="h5 fw-bold">How would you rate your experience?</div>
					<form method="post" action="<?php echo (htmlspecialchars($_SERVER['PHP_SELF'])); ?>" enctype="multipart/form-data">
						<div class="row ms-2">
							<div class="col-md-6 mt-3">
								<div class="h6">
									<div class="rating">
										Accuracy
										<input type="checkbox" id="star1" name="rating[]" value="1" class="ms-3">
										<label for="star5"></label>
										<input type="checkbox" id="star2" name="rating[]" value="2">
										<label for="star4"></label>
										<input type="checkbox" id="star3" name="rating[]" value="3">
										<label for="star3"></label>
										<input type="checkbox" id="star4" name="rating[]" value="4">
										<label for="star2"></label>
										<input type="checkbox" id="star5" name="rating[]" value="5">
										<label for="star1"></label>
									</div>
									<input type="hidden" id="ratingAccuracy" name="ratingAccuracy">
								</div>
							</div>
							<div class="col-md-6 mt-3">
								<div class="h6">

									<div class="rating2">
										Location
										<input type="checkbox" id="star1" name="rating2[]" value="1" class="ms-3">
										<label for="star5"></label>
										<input type="checkbox" id="star2" name="rating2[]" value="2">
										<label for="star4"></label>
										<input type="checkbox" id="star3" name="rating2[]" value="3">
										<label for="star3"></label>
										<input type="checkbox" id="star4" name="rating2[]" value="4">
										<label for="star2"></label>
										<input type="checkbox" id="star5" name="rating2[]" value="5">
										<label for="star1"></label>
									</div>
									<input type="hidden" id="ratingLocation" name="ratingLocation">
								</div>
							</div>
							<div class="col-md-6 mt-3">
								<div class="h6">

									<div class="rating3">
										Communication
										<input type="checkbox" id="star1" name="rating[]" value="1" class="ms-3">
										<label for="star5"></label>
										<input type="checkbox" id="star2" name="rating[]" value="2">
										<label for="star4"></label>
										<input type="checkbox" id="star3" name="rating[]" value="3">
										<label for="star3"></label>
										<input type="checkbox" id="star4" name="rating[]" value="4">
										<label for="star2"></label>
										<input type="checkbox" id="star5" name="rating[]" value="5">
										<label for="star1"></label>
									</div>
									<input type="hidden" id="ratingCommunication" name="ratingCommunication">
								</div>
							</div>
							<div class="col-md-6 mt-3">
								<div class="h6">

									<div class="rating4">
										Check In
										<input type="checkbox" id="star1" name="rating[]" value="1" class="ms-3">
										<label for="star5"></label>
										<input type="checkbox" id="star2" name="rating[]" value="2">
										<label for="star4"></label>
										<input type="checkbox" id="star3" name="rating[]" value="3">
										<label for="star3"></label>
										<input type="checkbox" id="star4" name="rating[]" value="4">
										<label for="star2"></label>
										<input type="checkbox" id="star5" name="rating[]" value="5">
										<label for="star1"></label>
									</div>
									<input type="hidden" id="ratingCheckIn" name="ratingCheckIn">
								</div>
							</div>
							<div class="col-md-6 mt-3">
								<div class="h6">

									<div class="rating5">
										Cleanliness
										<input type="checkbox" id="star1" name="rating[]" value="1" class="ms-3">
										<label for="star5"></label>
										<input type="checkbox" id="star2" name="rating[]" value="2">
										<label for="star4"></label>
										<input type="checkbox" id="star3" name="rating[]" value="3">
										<label for="star3"></label>
										<input type="checkbox" id="star4" name="rating[]" value="4">
										<label for="star2"></label>
										<input type="checkbox" id="star5" name="rating[]" value="5">
										<label for="star1"></label>
									</div>
									<input type="hidden" id="ratingCleanliness" name="ratingCleanliness">
								</div>
							</div>
							<div class="col-md-6 mt-3">
								<div class="h6">

									<div class="rating6">
										Value
										<input type="checkbox" id="star1" name="rating[]" value="1" class="ms-3">
										<label for="star5"></label>
										<input type="checkbox" id="star2" name="rating[]" value="2">
										<label for="star4"></label>
										<input type="checkbox" id="star3" name="rating[]" value="3">
										<label for="star3"></label>
										<input type="checkbox" id="star4" name="rating[]" value="4">
										<label for="star2"></label>
										<input type="checkbox" id="star5" name="rating[]" value="5">
										<label for="star1"></label>
									</div>
									<input type="hidden" id="ratingValue" name="ratingValue">
								</div>
							</div>
						</div>


						<div>
							<div class="h6 fw-bold mt-4">When did you go?</div>
							<div>
								<div class="row">
									<div class="col-md-5">
										<input type="date" id="datepicker" class="form-control" name="dateVisit">
									</div>
								</div>
							</div>
						</div>
						<div>
							<div class="h6 fw-bold mt-4">Who did you go with?</div>
							<div class="text-center">
								<div class="row">

									<div class="col-md-3">
										<input type="checkbox" name="withwho" id="coupleCheckbox" style="display: none" value="Couple">
										<label for="coupleCheckbox" class="p border rounded-pill p-2" onclick="toggleSelected(this)">Couple</label>
									</div>
									<div class="col-md-3">
										<input type="checkbox" name="withwho" id="familyCheckbox" style="display: none" value="Family">
										<label for="familyCheckbox" class="p border rounded-pill p-2" onclick="toggleSelected(this)">Family</label>
									</div>
									<div class="col-md-3">
										<input type="checkbox" name="withwho" id="friendsCheckbox" style="display: none" value="Friends">
										<label for="friendsCheckbox" class="p border rounded-pill p-2" onclick="toggleSelected(this)">Friends</label>
									</div>
									<div class="col-md-3">
										<input type="checkbox" name="withwho" id="businessCheckbox" style="display: none" value="Business">
										<label for="businessCheckbox" class="p border rounded-pill p-2" onclick="toggleSelected(this)">Business</label>
									</div>

									<!-- <input type="hidden" id="withwho" name="withwho"> -->
								</div>
							</div>
						</div>
						<div>
							<div class="h6 fw-bold mt-4">Write your review</div>
							<textarea type="text" class="form-control resize-none" rows="5" placeholder="I'am very satisfied on the house its so..." aria-label="Last name" name="review_text"><?php echo htmlspecialchars($_POST['review_text'] ?? '', ENT_QUOTES); ?></textarea>
						</div>
						<div class="mt-5">
							<div class="h6 fw-bold mt-4">Add some photos</div>
							<label for="formFile" class="form-label fs-15">Optional</label>
							<input class="form-control border" type="file" id="formFile" aria-label="Last name" name="rev_image">
						</div>
						<div class="but mt-5  text-center">
							<button type="submit" class="btn btn-primary form-control">submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>