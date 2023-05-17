<?php
	session_start(); 
	//$conn = new mysqli('localhost','root','root','estatesphere');
	include("connection.php");
	include("functions.php");
	// $user_data = check_login($con);

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	//property owner information
    $propownlname = $_POST['propownlname'];
    $propownfname = $_POST['propownfname'];
    $propowncont = $_POST['propowncont'];
    $propownemail = $_POST['propownemail'];

    //property listing information
    $propStat = $_POST['propStat'];
    $propType = $_POST['propType'];
    $propPrice = $_POST['propPrice'];
    $locmun = $_POST['locmun'];
    $locbar = $_POST['locbar'];
    $loczon = $_POST['loczon'];
    $locwagmaps = $_POST['locwagmaps'];
    $proplot = $_POST['proplot'];
    $propflor = $_POST['propflor'];
    $propbed = $_POST['propbed'];
    $proptoi = $_POST['proptoi'];
    $propcar = $_POST['propcar'];
    $propother = $_POST['propother'];
    $propfet = $_POST['propfet'];

    //img section, dont alter
    $img = $_FILES['propimg']['name'];
   

    $fileTmpName = $_FILES['propimg']['tmp_name'];
    $allowedType = array('jpg', 'png', 'jpeg', 'gif', 'ico');
    $fileExtension = explode('.', $img);
          
    //set all the letters to lower case
    $fileRealExtension = strtolower(end($fileExtension));

    if(preg_match("!image!", $_FILES['propimg']['type'])){
      if (in_array($fileRealExtension, $allowedType)) {
             		$_SESSION['propimg'] = $img;
        $fileExtension = explode('.', $img);
		//set all the letters to lower case
		


        $NewNameFile = uniqid('', true). ".". $fileRealExtension;
       
		$fileLocation = 'assets/img/properties/'. $NewNameFile;
		// move the file to the new location from temp location 
		move_uploaded_file($fileTmpName, $fileLocation);
        $sql = "insert into propertylisting_tbl(propOwnerLname, propOwnerFname, propOwnerCont, propOwnerEmail, propStatus, propType, propSellPrice, propMun, propBar, propZonPur, propMap, propLotArea, propFlrArea, noBed, propNoBat, propCarport, propOth, propFeatr, propIMGaddrs)values('$propownlname', '$propownfname', '$propowncont', '$propownemail', '$propStat', '$propType', '$propPrice', '$locmun', '$locbar', '$loczon', '$locwagmaps', '$proplot', '$propflor', '$propbed', '$proptoi', '$propcar', '$propother', '$propfet', '$fileLocation')";
        if (mysqli_query($con, $sql)) {
          $_SESSION['message'] = 'Article added';
          	
        }
        else{
          $_SESSION['message'] = 'cannot add article';
        }
      }
      else{
        $_SESSION['message'] = 'file not upload';
      }
    }
    else{
    	
      $_SESSION['message'] = 'Allowed format(JPG, JPEG, PNG, GIF,';
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
            <li><a href="#">Contact</a></li>
            <li><a href="#">About us</a></li>
        </ul>
        <div class="login">
            <a href="logout.php">
                <button type="button">Logout</button>
            </a>
        </div>
    </nav>
	</div>
    <div class="container marg mb-4">
    	<div class="button">
    		<button type="button" class="btn btn-secondary">Return to Dashboard</button>
    	</div>
	    	<div class="row mt-2">
	    		<div class="col col-lg-5">
	    			<h2 class="fw-bold est">EstateSphere</h2>
	    			<p class="fw-bold">Bringing Buyers and Seller Together <br>in the Virtual World</p>
	    		</div>
	    		<div class="col"><div class="shaded-div">
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
	    <form method="POST" action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF'])); ?>" enctype="multipart/form-data" class="mt-5">
	    	<div class="mt-3 frm shadow p-4"><br>
		    	<div class="h6 ms-5 mt-2 fw-bold">Property Information</div>

		    	<div class="row ms-5">
				  <div class="col-md-3">
				  	<label for="name"></label>
				    <input type="text" class="form-control border" placeholder="Property Status" aria-label="Last name" name="propStat">
				  </div>
				  <div class="col-md-3	">
				  	<label for="name"></label>
				    <input type="text" class="form-control border" placeholder="Property Type" aria-label="Last name" name="propType">
				  </div>
				  <div class="col-md-5	">
				  	<label for="name">Selling Price</label>
				    <input type="text" class="form-control border" placeholder="$0000" aria-label="Last name" name="propPrice">
				  </div>
				</div>

				<div class="row ms-5 mt-5">
				  <div class="col-md-3">
				  	<label for="name">Municipality</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="locmun">
				  </div>
				  <div class="col-md-3">
				  	<label for="name">Barangay</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="locbar">
				  </div>
				  <div class="col-md-2">
				  	<label for="name">Zone/Purok</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="loczon">
				  </div>
				  <div class="col-md-3">
				  	<label for="name">Waze/GMaps link</label>
				    <input type="text" class="form-control border" placeholder="$0000" aria-label="Last name" name="locwagmaps">
				  </div>
				</div>

				<div class="row ms-5 mt-5">
				  <div class="col-md-3">
				  	<label for="name">Lot Area</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="proplot">
				  </div>
				  <div class="col-md-2">
				  	<label for="name">Floor Area</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="propflor">
				  </div>
				  <div class="col-md-2">
				  	<label for="name">Bedroom(s)</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="propbed">
				  </div>
				  <div class="col-md-2">
				  	<label for="name">Toilet/Bath(s)</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="proptoi">
				  </div>
				  <div class="col-md-2">
				  	<label for="name">Car Port(s)</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="propcar">
				  </div>
				</div>

				<div class="row ms-5 mt-5">
				  <div class="col-md-5">
				  	<label for="name">Others</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="propother">
				  </div>
				</div>

				<div class="row ms-5 mt-5">
				  <div class="col-md-6	">
				  	<label for="name">Features	</label>
				    <textarea type="text" class="form-control resize-none" rows="4" placeholder="" aria-label="Last name" name="propfet"></textarea>
				  </div>
				  <div class="col-md-5">
				  	<label for="formFile" class="form-label">Upload Pictures</label>
	  				<input class="form-control border" type="file" id="formFile" aria-label="Last name" name="propimg">
				  </div>
				</div>

				<div class="h6 ms-5 mt-5 fw-bold">Property Owner's Information</div>
				<div class="row ms-5 mt-5">
				  <div class="col-md-5">
				  	<label for="name">First Name</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="propownfname">
				  </div>
				  <div class="col-md-6">
				  	<label for="name">Last Name</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="propownlname">
				  </div>
				</div>
				<div class="row ms-5 mt-5">
				  <div class="col-md-5">
				  	<label for="name">Contact Number</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="propowncont">
				  </div>
				  <div class="col-md-6">
				  	<label for="name">Email Address</label>
				    <input type="text" class="form-control border" placeholder="" aria-label="Last name" name="propownemail">
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