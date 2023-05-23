<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

  
// Assuming you have established a database connection

// Check if the property ID is provided in the URL
if (isset($_GET['id'])) {
  $property_id = $_GET['id'];

  // Fetch the property details from the database
  $query = "SELECT * FROM property WHERE property_id = '$property_id'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // Display the property details in a form for editing 
  ?>
  <form action="update_property.php" method="POST">
    <input type="hidden" name="property_id" value="<?php echo htmlspecialchars($row['property_id']); ?>">
    <label for="property_name">Property Name:</label>
    <input type="text" name="property_name" value="<?php echo $row['property_name']; ?>"><br>
    <label for="property_price">Property Price:</label>
    <input type="text" name="property_price" value="<?php echo $row['property_price']; ?>"><br>
    <input type="submit" value="Update">
  </form>
  <?php
}

// Close the database connection
mysqli_close($con);
?>