<?php
$connection = new mysqli("localhost", "root", "root", "user");
if ($connection -> connect_error) {
    die("Connection failed: " . $connection -> connect_error);
}

echo 'MySQL client version: ' . $connection->client_version . "<br>";
echo 'MySQL server version: ' . $connection->server_version;
$connection -> close();
?>
