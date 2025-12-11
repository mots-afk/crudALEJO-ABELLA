<?php 
    include "database/connection.php";

    $sql = "SELECT * FROM user_accounts";
    $retrieved = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube Accounts Management</title>
  
<?php include "code_snippets/cdn_codes.php"; ?>




</head>
<body>

<div class="container" style="margin-top: 70px">
    
    <h1 class="mb-4">Youtube Accounts Management System</h1>

    <div  style="display: flex; justify-content: flex-end; margin-top: 40px;"> 
        <button data-bs-toggle="modal" data-bs-target="#accountModal" class="btn btn-primary">Add Account</button>
    </div>

    <table class="table" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>Email</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
                
        <tbody>
            <?php while($data = $retrieved->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($data['email']) ?></td>
                    <td><?= htmlspecialchars($data['last_name']) ?></td>
                    <td><?= htmlspecialchars($data['first_name']) ?></td>
                    <td><?= htmlspecialchars($data['address']) ?></td>
                    <td>
                        <a href="edit_screen.php?account_id=<?php echo urlencode($data['account_id']); ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button class="btn btn-danger" onclick="deletePop(<?php echo htmlspecialchars($data['account_id']); ?>)"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="accountModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4>Add Account</h4>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="functions/add_accounts.php" method="POST">
                <div class="modal-body">

                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>

                    <label style="margin-top: 20px;">Last Name</label>
                    <input type="text" name="lastname" class="form-control" required>

                    <label style="margin-top: 20px;">First Name</label>
                    <input type="text" name="firstname" class="form-control" required>

                    <label style="margin-top: 20px;">Address</label>
                    <input type="text" name="address" class="form-control" required>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

<script>
    function deletePop(id){
        swal.fire({

            title: 'Are you sure?',
            text: "The linked channels will be deleted too",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "functions/delete_accounts.php?id=" + id;
            }
        });

    }




</script>

</html>