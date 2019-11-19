<?php 
// Create the Database Connection

// Create an array for each required connection
// For example, db_host = key, localhost = value
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

// Convert the arrays into a constant with a ForEach
foreach($db as  $key => $value) {
    // it will be like - constant so the variables cannot be reassigned
    // define("DB_HOST", 'localhost');
    // uppercase the key names
    define(strtoupper($key), $value);
}

// localhost, username, password, database name
// $connection = mysqli_connect('localhost', 'root', '', 'cms');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check the connection to the database
// head to http://localhost/PHP_cms/includes/db.php to verify!
if ($connection) {
    echo "We are connected to the Database";
} else {
    echo "Connection is broken";
}


?>