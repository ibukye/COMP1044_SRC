<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check with the database
    $connection = new mysqli("localhost", "root", "root", "users");

    if ($connection -> connect_error) {
        die("Connection failed: " . $connection -> connect_error);
    }

    // run query
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $connection -> query($sql);

    if ($result -> num_rows > 0) {
        // success
        echo "success";
    } else {
        // failed
        echo "failed";
    }

    // close the connection
    $connection -> close();
}
?>