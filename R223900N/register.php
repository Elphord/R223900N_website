
<?php
include 'connection.php';

// Check if the form is submitted
$email = $_POST["email"];
$name = $_POST["name"];
$id= $_POST["ID"];

    // Insert data into the database
    
$sql = "INSERT INTO wordpress.clients (id, name , email) VALUES ('$id','$name','$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }


// Close the connection
$conn->close();




?>
