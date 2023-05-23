<?php
session_start();
include "connection.php";
include 'functions.php';
$user_data = check_login($con);
// Assuming you have a database connection established

// Check if the property ID is provided in the URL
if (isset($_GET['id'])) {
    $property_id = $_GET['id'];
    echo "Property ID: $property_id";
    // Delete the property from the database
    $query = "DELETE FROM property WHERE property_id = $property_id";
    $result = mysqli_query($con, $query);
    if ($result) {
        // Deletion successful
        echo "Property deleted successfully.";
    } else {
        // Deletion failed
        echo "Error deleting property: " . mysqli_error($con);
    }
}
// Close the database connection
mysqli_close($con);
?>
