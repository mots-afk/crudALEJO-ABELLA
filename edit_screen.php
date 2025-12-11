<?php
include "database/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include "code_snippets/cdn_codes.php"; ?>
</head>
 <?php

    $id = isset($_GET['account_id']) ? (int)$_GET['account_id'] : 0;
    if ($id <= 0) {
        header('Location: index.php');
        exit();
    }

    $sql = "SELECT * FROM user_accounts WHERE account_id = $id";
    $retrieved = null;
    if (isset($connection) && $connection) {
        $retrieved = $connection->query($sql);
    }

    $data = [];
    if ($retrieved) {
        $data = $retrieved->fetch_assoc() ?: [];
    }

 ?>

<body>

     <div style="display: flex; justify-content: center; margin-top: 70px;">
            <div style="border: 1px solid black; padding: 40px; border-radius: 10px;">
                <h1>Edit User Accounts</h1>

            <form action="functions/edit_accounts.php" method="POST">
                <div class="modal-body">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['account_id'] ?? ''); ?>">

                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>" required>

                    <label style="margin-top: 20px;">Last Name</label>
                    <input type="text" name="lastname" class="form-control" value="<?php echo htmlspecialchars($data['last_name'] ?? ''); ?>" required>

                    <label style="margin-top: 20px;">First Name</label>
                    <input type="text" name="firstname" class="form-control" value="<?php echo htmlspecialchars($data['first_name'] ?? ''); ?>" required>

                    <label style="margin-top: 20px;">Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($data['address'] ?? ''); ?>" required>

                    <div style="margin-top: 20px">
                        <input type="submit" value="save" class="btn btn-primary form-control">
                    </div>

                </div>

                
            </form>
            </div>
     </div>

</body>
</html>