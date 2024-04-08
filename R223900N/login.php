<?php
include 'connection.php';

$email = $_POST["email"];
$name = $_POST["name"];


// Query to check if the user exists in the database
$sql = "SELECT * FROM wordpress.clients WHERE email = '$email' AND name = '$name'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, retrieve the name and display a welcome message
    $row = $result->fetch_assoc();
    $name = $row["name"];
    echo "Welcome, $name!";

    // Display the links
    echo "<h2>Links:</h2>";
    echo "<ul>";
    echo "</li>";
    echo "<li><a href='products.html'>Products</a></li>";
    echo "<li><a href='home.html>logout</a></li>";
    echo "<li><a href='location.html'>Location</a></li>";
    echo "</ul>";

} else {
    // User does not exist or incorrect credentials
    echo "Invalid email or password";
}


// Close the connection
$conn->close();
?>