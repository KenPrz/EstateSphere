<?php
include("connection.php");
function check_login($con){
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION["user_id"];
        $query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";

        $result = mysqli_query($con,$query);

        if($result && mysqli_num_rows($result)>0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: login.php");
    die;
}
function getNumPropertiesForSale($con, $userId) {
    $query = "SELECT property_seller, COUNT(*) AS num_properties_for_sale FROM property WHERE property_sale_type = 'Sale' AND property_seller = $userId GROUP BY property_seller;";
    $result = $con->query($query);
    if ($result && $result->num_rows > 0) {
        // Fetch the data
        $row = $result->fetch_assoc();
        // Access the values
        $property_seller = $row['property_seller'];
        $num_properties_for_sale = $row['num_properties_for_sale'];
        // Return the values
        return $num_properties_for_sale;
    } else {
        // Handle query error
        return 0; // or any other appropriate default value
    }
}
function getNumPropertiesForRent($con, $userId) {
    $query = "SELECT property_seller, COUNT(*) AS num_properties_for_rent FROM property WHERE property_sale_type = 'Rent' AND property_seller = $userId GROUP BY property_seller;";
    $result = $con->query($query);
    if ($result && $result->num_rows > 0) {
        // Fetch the data
        $row = $result->fetch_assoc();
        // Access the values
        $property_seller = $row['property_seller'];
        $num_properties_for_rent = $row['num_properties_for_rent'];
        // Return the values
        return $num_properties_for_rent;
    } else {
        // Handle query error
        return 0; // or any other appropriate default value
    }
}
function getNumOfSold($con, $userId) {
    $query = "SELECT COUNT(*) AS num_sold_properties FROM property WHERE property_status = 'Sold' AND property_seller = $userId";
    $result = $con->query($query);
    if ($result) {
        // Fetch the data
        $row = $result->fetch_assoc();
        // Access the values
        $property_seller = $row['num_sold_properties'];
        $num_sold_properties = $row['num_sold_properties'];
        // Return the values
        return $num_sold_properties;
    } else {
        // Handle query error
        echo "Query failed: ";
        return 0; // or any other appropriate default value
    }
}
function recentUsers($con, $userId) {
    $query = "SELECT * FROM users ORDER BY user_id DESC LIMIT 10";
    $result = $con->query($query);
    
    if ($result && $result->num_rows > 0) {
        $recentUsers = array();
        
        while ($row = $result->fetch_assoc()) {
            $property_seller = $row['user_id'];
            $recentUsers[] = $row['firstname']." ".$row['lastname'];
        }
        
        // Return the array of recent users
        return $recentUsers;
    } else {
        // Handle query error
        echo "Query failed: " . $con->error;
        return array(); // or any other appropriate default value
    }
}
function handleDeleteAccount() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Delete account logic here

        // Check if the delete button was clicked
        if (isset($_POST['deleteAccount'])) {
            // Perform account deletion process

            // Add your code to delete the account from the database or perform any other necessary actions

            // Display success message or redirect to a different page
            echo "Account deleted successfully!";
            exit; // Exit to prevent further execution of the script
        }
    }
}