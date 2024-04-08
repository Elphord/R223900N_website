<?php
  // Database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "e_commerce";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Client registration
  if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username already exists
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "Username already exists";
    } else {
      // Insert new user into database
      $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

      if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }

  // Client authentication
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are correct
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "Login successful";
    } else {
      echo "Invalid username or password";
    }
  }

  // Display products
  $sql = "SELECT * FROM products";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Product</th><th>Price</th></tr>";

    while ($row