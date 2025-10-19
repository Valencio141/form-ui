<?php
// Show all errors (for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";       // MySQL username
$password = "";           // MySQL password (empty if none)
$dbname = "formdb";       // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Get POST data safely
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$age = intval($_POST['age']);  // ensure integer value

// Insert into database
$sql = "INSERT INTO users (name, email, age) VALUES ('$name', '$email', $age)";

if ($conn->query($sql) === TRUE) {
    echo "<h3>✅ Data inserted successfully!</h3>";
    echo "<a href='form.html'>Go back to form</a>";
} else {
    echo "<h3>❌ Error: " . $conn->error . "</h3>";
}

// Close connection
$conn->close();
?>
