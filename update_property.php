<?php
// Assuming you have established a database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve the form data
  $property_id = $_POST['property_id'];
  $property_name = $_POST['property_name'];
  $property_price = $_POST['property_price'];

  // Update the property