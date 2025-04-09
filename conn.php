<?php


// Create connection
$conn = mysqli_connect("localhost","root","","chugtaiautos") or die("connection Failed:");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
