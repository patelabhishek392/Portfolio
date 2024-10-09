<?php
$host = "srv1128.hstgr.io";
$database = "u931412084_portfolio";
$user = "u931412084_portfolio";
$password = "portfolio@Admin1";

// Create a connection to the MySQL database
$mysqli = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// If the connection is successful, you can perform database operations using $mysqli
// For example:
// $query = "SELECT * FROM your_table";
// $result = $mysqli->query($query);
// ...

// Don't forget to close the database connection when you're done

?>
