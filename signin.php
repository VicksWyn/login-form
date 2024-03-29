<?php
$servername = "localhost";
$username = "kaloki";
$password = "kaloki";
$dbname = "victor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password != $confirm_password) {
    echo "Passwords do not match";
  } else {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO signin (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
      echo "New record inserted successfully";
    } else {
      echo "Error: " . $stmt->error;
    }
  }
}

$conn->close();
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  Confirm Password: <input type="password" name="confirm_password"><br>
  <input type="submit">
</form>