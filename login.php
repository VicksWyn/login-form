<?php
// Configure connection details (replace with your own)
$servername = "localhost";
$username = "root"; // removed "@localhost" from username
$password = "your_password";
$dbname = "trial3";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname); // corrected variables

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data (replace 'username' and 'password' with your form field names)
$name = $_POST['username'];
$email = $_POST['password'];

// Prepare SQL statement (prevent SQL injection)
$sql = "INSERT INTO Regist1(username,password) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters (improves security)
mysqli_stmt_bind_param($stmt, "ss", $username, $password); // corrected variables

// Execute statement
if (mysqli_stmt_execute($stmt)) {
  echo "New record inserted successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
