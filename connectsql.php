<?php
// connect to the database
$connection = new mysqli("localhost", "root", "root", "users");
  

// check connection
if ($connection -> connect_error) {
    die("Connection failed: " . $connection -> connect_error);
}

// get data
$sql = "SELECT * FROM user";
$result = $connection -> query($sql);

if (!$result) {
    die("Query failed: " . $connection->error);
}


// diaplay the result
if ($result -> num_rows > 0) {
    while ($row = $result -> fetch_assoc()) {
        echo "User_ID: " . $row["id"] . " - Name: " . $row["username"] . "<br>";
    } 
}
else {
    echo "0 results";
}


// close the connection
$connection -> close();

?>