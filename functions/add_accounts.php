<?php 
include "../database/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $last_name = $_POST['lastname'];
    $first_name = $_POST['firstname'];
    $address = $_POST['address'];

    $sql = "INSERT INTO user_accounts (email, last_name, first_name, address) 
            VALUES ('$email', '$last_name', '$first_name', '$address')";

    if ($connection->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $connection->error;
    }
}

$connection->close();
?>