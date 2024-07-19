<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');    // DB username
define('DB_PASSWORD', '');    // DB password
define('DB_DATABASE', 'artist');  // DB name

// Create a connection
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database (optional, since it's already selected during connection)
$database = mysqli_select_db($conn, DB_DATABASE);
if (!$database) {
    die("Unable to select database: " . mysqli_error($conn));
}

?>
