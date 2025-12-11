<?php 
include "../database/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $id = $_POST['id'];
    $email = $_POST['email'];
    $last_name = $_POST['lastname'];
    $first_name = $_POST['firstname'];
    $address = $_POST['address'];

    $sql = "UPDATE user_accounts 
            SET email = '$email',
             last_name = '$last_name',
              first_name = '$first_name',
               address = '$address' 
            WHERE account_id = $id";

    if ($connection->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $connection->error;
    }
}

$connection->close();
?>