<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);


	$sql= "select property_id, property_type, property_name, property_price, property_status, property_municipality, property_baranggay, property_zone_purok, property_flr_area, property_lot_area, property_img_addrs, num_of_beds, num_of_baths, num_of_carports, prop_others, prop_features, property_owner_fname, property_owner_lname, property_owner_email, property_name from property where property_seller= " .$user_data["user_id"];
    $result = mysqli_query($con, $sql);
    $properties = mysqli_fetch_all($result, MYSQLI_ASSOC);


    mysqli_free_result($result);
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
        <link rel="stylesheet" type="text/css" href="./css/property-sales.css">
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
                <li id="selected-dashboard"><a href="dashboard.php"><img src="./assets/img/icons/pie-chart.png"
                            alt="Dashboard"> Dashboard</a></li>
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
    <main>
        <!-- Main container -->
        <div class="main-container">
            <div class="row contacts">
                <h1 class="mb-2"> <strong>Contacts</strong></h1>
                <div class="row ms-3">
                    <ul>
                        <li> <strong> Email: </strong>
                            <?php echo $user_data['email']; ?>
                        </li>
                        <li> <strong> Phone: </strong>
                            <?php echo $user_data['contact_number']; ?>
                        </li>
                        <li> <strong> Address: </strong>
                            <?php echo $user_data['address']; ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Property</th>
                        <th scope="col">Type</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    // Assuming you have a database connection established

                    // Retrieve the user's ID
                    $user_id = $user_data['user_id'];

                    // Fetch the properties associated with the user from the database
                    $query = "SELECT * FROM property WHERE property_seller = $user_id";
                    $result = mysqli_query($con, $query);

                    // Loop through the results and populate the table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        $property_id = $row['property_id'];
                        $property_name = $row['property_name'];
                        $property_type = $row['property_type'];
                        $property_price = $row['property_price'];
                        $property_status = $row['property_status'];

                        echo '<tr>';
                        echo '<td>' . $property_name . '</td>';
                        echo '<td>' . $property_type . '</td>';
                        echo '<td>' . $property_price . '</td>';
                        echo '<td>' . $property_status . '</td>';
                        echo '<td><a href="edit.php?id=' . $property_id . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                      </svg></a></td>';
                        echo '<td><a href="delete.php?id=' . $property_id . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                      </svg></a></td>';
                        echo '</tr>';
                    }
                mysqli_close($con);
                ?>
                    </tbody>
                </table>
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

    $(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
			'<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
});
</script>