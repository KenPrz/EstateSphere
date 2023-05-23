<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
if (isset($_GET['id'])) {
    // Retrieve the property ID from the query parameter
    $property_id = $_GET['id'];

    // Fetch the property details from the database based on the property ID
    $query = "SELECT * FROM property WHERE property_id = $property_id";
    $result = mysqli_query($con, $query);

    // Check if the query was successful and if the property exists
    if ($result && mysqli_num_rows($result) > 0) {
        // Retrieve the property data
        $row = mysqli_fetch_assoc($result);
        $property_name = $row['property_name'];
        $location = $row['property_municipality'];
        $price = $row['property_price'];
        $img = $row['property_img_addrs'];
        $num_of_beds = $row['num_of_beds'];
        $num_of__baths = $row['num_of_baths'];
        $num_of_carports = $row['num_of_carports'];

        // Display the property details
        ?>
        <div>
            <h2><?php echo $property_name; ?></h2>
            <img src="<?php echo $img; ?>" alt="Property Image" style="width: 100%; height: auto;">
            <p>Location: <?php echo $location; ?></p>
            <p>Price: ₱<?php echo number_format($price, 0, ',', ','); ?></p>
            <p>Number of Beds: <?php echo $num_of_beds; ?></p>
            <p>Number of Baths: <?php echo $num_of__baths; ?></p>
            <p>Number of Carports: <?php echo $num_of_carports; ?></p>
        </div>
        <?php
    } else {
        // Handle the case when the property doesn't exist
        echo "Property not found.";
    }
} else {
    // Handle the case when the property ID is not provided
    echo "Property ID not provided.";
}
?>