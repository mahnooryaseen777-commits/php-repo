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

$sql = "SELECT * FROM studentadmission";
$result = $conn->query($sql);

echo "<h2>Registered Students</h2>";
if ($result->num_rows > 0) {
  echo "<table border='1' cellpadding='10'>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Gender</th>
            <th>dob</th>
            <th>Phone</th>
            <th>Address</th>
          </tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['full_name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['course']."</td>
            <td>".$row['gender']."</td>
            <td>".$row['dob']."</td>
            <td>".$row['phone']."</td>
            <td>".$row['address']."</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "No records found.";
}

$conn->close();
?>