<?php
// Configure connection details (replace with your own)
$servername = "localhost";
$username = "kaloki"; // removed "@localhost" from username
$password = "kaloki";
$dbname = "victor";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname); // corrected variables

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data (replace 'username' and 'password' with your form field names)
$name = $_POST['username'];
$email = $_POST['password'];


$sql = "SELECT * FROM login WHERE username = ? AND password = ?";
// Prepare SQL statement (prevent SQL injection)
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
