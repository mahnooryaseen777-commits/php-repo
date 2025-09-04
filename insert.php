<?php
$servername = "localhost";
$username = "root";   // change if needed
$password = "";       // change if needed
$dbname = "StudentDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Run only if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect form data safely
  $full_name = $_POST['full_name'];
  $email = $_POST['email'] ?? '';
  $course = $_POST['course'] ?? '';
  $gender = $_POST['gender'] ?? '';
  $dob       = $_POST['dob'];
  $phone = $_POST['phone'] ?? '';
  $address = $_POST['address'] ?? '';

  // Insert into table
  $sql = "INSERT INTO studentadmission (full_name, email, course, gender, dob, phone, address) 
          VALUES ('$full_name', '$email', '$course', '$gender', '$dob', '$phone', '$address')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>