<?php 

//$conn = new mysqli('localhost','root','root','estatesphere');
	include("connection.php");
	include("functions.php");
	// $user_data = check_login($con);
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$inqname = $_POST['inqname'];
		$inqno = $_POST['inqno'];
		$inqemail = $_POST['inqemail'];
		$inqcon = $_POST['inqcon'];

		$sql2 = "insert into inquiries_tbl(inquiry_sender, contact_number, email, consern)values('$inqname', '$inqno', '$inqemail', '$inqcon')";
		if (mysqli_query($con, $sql2)) {
				$_SESSION['message'] = 'Successfully Added';

		} else {
				$_SESSION['message'] = 'cannot add property';
		}
	}

	$sql = 'select dev_name, dev_role, dev_avatar from developers';

	

	

	$result = mysqli_query($con, $sql);

	$persons = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);
	mysqli_close($con);



?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/aboutesteate.css">
</head>
<body class="bod">
	<div class="nav">
		<nav>
	        <div class="logo">
	            <a href="#">
	                <img src="./assets/img/logo.svg" alt="Logo">
	                <a href="#">Estatesphere</a>
	            </a>
	        </div>
	        <ul class="nav-links">
	            <li><a href="#">Home</a></li>
	            <li><a href="#">Properties</a></li>
	            <li><a href="#">Buyer/seller</a></li>
	            
	            <li><a href="#">About us</a></li>
	        </ul>
	        <div class="login">
	            <a href="logout.php">
	                <button type="button">Logout</button>	
	            </a>
	        </div>
	    </nav>
	</div>
	<div class="h">
		<div class="vmgo marg container text-center">
    	<div class="row">
    		<div class="col-md-3 k shadow"><h5 class="fw-bold line p-2">Vission</h5><p class="fs-15">Our vision is to become the premier source of property-related services in Albay by building long-term relationships with the clients, based on trust, respect, and transparency. We are passionate about helping individuals to  find properties that perfectly match their needs and preferences.</p></div>
    		<div class="col-md-3 k shadow"><h5 class="fw-bold line p-2">Mission</h5><p>Our mission is to simplify and rationalize the process of buying and selling real estate through our advanced web app, delivering an exceptional user experience. We are committed to introducing innovative features and tools that provide unprecedented convenience, accuracy, and transparency, and to leading the industry in sustainability, accessibility, and user-friendliness.</p></div>
    		<div class="col-md-3 k shadow"><h5 class="fw-bold line p-2">Purpose</h5><p>Our purpose is to revolutionize the real estate industry in Albay by providing a comprehensive and user-friendly platform that simplifies the buying and selling process, prioritizing transparency, convenience, and accuracy, and delivering exceptional customer experiences.</p></div>
    	</div>
    </div>
	</div>
	<div class="container mt-5">

		<div class="about text-center">
			<div class="h4 fw-bold">Our agents are here to help</div>
			<div class="fs-15">Engage with our professional real estate agents in <br>Albay to sell, buy or renr your home.</div>
		</div>

		<div class="admin_car">
				<div class="row">
					<?php foreach ($persons as $person) {?>
					<div class="col-md-2 border border-2 border-light  shadow rounded p-3 text-center admn">
						<img src="<?php echo htmlspecialchars($person['dev_avatar']); ?>" class="mt-3 avt" >
						<div class="fw-bold"><p class="fs-20 mt-2"><?php echo htmlspecialchars($person['dev_name']); ?></p></div>
						<div class=""><p class="fs-20"><?php echo htmlspecialchars($person['dev_role']); ?></p></div>
					</div>
					<?php } ?>
				</div>

		</div>
		
		
	</div>
	<div class="f pb-5">
		<div class=" frm">
			<form class="bg-light shadow p-3 border rounded form-control" method="POST" action="<?php echo (htmlspecialchars($_SERVER['PHP_SELF'])); ?>"
			enctype="multipart/form-data">
				<div class="h5 text-center fw-bold">Conctact Us</div>
				<div class="p">Fill out this form and one of our agents will be in touch with you soon.</div>
				<div class="row mt-3">
					<div class="col-md-6">
						<label for="name"></label>
						<input type="text" class="form-control border" placeholder="Name" aria-label="Last name"
							name="inqname">
					</div>
					<div class="col-md-6">
						<label for="name"></label>
						<input type="text" class="form-control border" placeholder="Phone Number" name="inqno">
					</div>

				</div>
				<div class="row mt-3">
					<div class="col">
						<label for="name"></label>
						<input type="text" class="form-control border" placeholder="Email address" aria-label="Last name"
							name="inqemail">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col">
						<label for="name"></label>
						<textarea type="text" class="form-control resize-none" rows="4" placeholder="Tell us your concern..."
							aria-label="Last name" name="inqcon"></textarea>
					</div>
				</div>
				<div class="button mt-3 text-center">
					<button class="btn btn-secondary" type="submit">Send Message</button>
				</div>
			</form>
    	</div>
	</div>
	<div class="fotbar mt-5">
		<div class="row text-center fw-bold">
			<div class="col">
				<a href="#" class="text-decoration-none text-black">Home</a>
			</div>
			<div class="col">
				<a href="#" class="text-decoration-none text-black">Properties</a>
			</div>
			<div class="col">
				<a href="#" class="text-decoration-none text-black">Buyers</a>
			</div>
			<div class="col">
				<div class="logo m-0">
	            <a href="#">
	                <img src="./assets/img/logo.svg" alt="Logo" class="fnav border rounded">
	                <a href="#">Estatesphere</a>
	            </a>
	       		 </div>
			</div>
			<div class="col">
				<a href="#" class="text-decoration-none text-black">Sellers</a>
			</div>
			<div class="col">
				<a href="#" class="text-decoration-none text-black">Contact</a>
			</div>
			<div class="col">
				<a href="#" class="text-decoration-none text-black">Abouts Us</a>
			</div>
		</div>
	</div>
	<div class="line m-5 linya"></div>
	<footer class="mt-1">
	  <div class="text-center py-2">
	    <p>&copy; EstateSphere 2023. We love our users!</p>
	  </div>
	</footer>

	
</body>
</html>