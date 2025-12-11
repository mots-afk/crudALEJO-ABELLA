<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "youtube_database_4";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connection = new mysqli(
    $server,
    $user,
    $password,
    $database
);

if ($connection->connect_error) {
    die('Database connection failed: ' . $connection->connect_error);
}

?>