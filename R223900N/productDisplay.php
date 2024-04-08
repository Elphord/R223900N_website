<?php
include 'connection.php';

$product_n=$_POST["search"];


$seachquery="SELECT * FROM  wordpress.products  WHERE Product_Name='$product_n'";
$result = $conn->query($seachquery);

if ($result->num_rows > 0) {
    // User exists, retrieve the name and display a welcome message
    echo "<table border=1>";
    echo "<tr><th>Prduct_Name</th><th>Price</th></tr>";

    // Output the data for each matched row
    while ($row = $result->fetch_assoc()) {
        // Access the column values
        $column1Value = $row['Product_Name'];
        $column2Value = $row['Price'];
        // ...access other columns as needed

        // Output the row in the HTML table
        echo "<tr>";
        echo "<td>$column1Value</td>";
        echo "<td>$column2Value</td>";
        // ...output other columns as needed
        echo "</tr>";
    }

    // End the HTML table
    echo "</table>";



}else{
    echo "no such products";
}

?>