<?php 

//$conn = new mysqli('localhost','root','root','estatesphere');
	include("connection.php");
	include("functions.php");
	// $user_data = check_login($con);

	$sql = 'select admnName, admnRole, admnRole, admnimg from admin_tbl';

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

		<div class="admin_caro">
				<div class="row">
					<?php foreach ($persons as $person) {?>
					<div class="col-md-2 border border-1 border-black  shadow rounded p-3 text-center admn">
						<img src="<?php echo htmlspecialchars($person['admnimg']); ?>" class="mt-3" width="80" height="75" >
						<div class="fw-bold"><p class="fs-20"><?php echo htmlspecialchars($person['admnName']); ?></p></div>
						<div class=""><p class="fs-20"><?php echo htmlspecialchars($person['admnRole']); ?></p></div>
					</div>
					<?php } ?>
				</div>
		</div>
	</div>
    

</body>
</html>