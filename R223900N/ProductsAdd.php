<?php
include 'connection.php';


 $product_name= $_POST["product_name"];
$price=$_POST["price"];

    // Insert data into the database
    
$sql = "INSERT INTO wordpress.products (Product_Name, price) VALUES ('$product_name','$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }


// Close the connection
$conn->close();
?>