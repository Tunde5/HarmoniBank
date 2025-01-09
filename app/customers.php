<!-- customers.php -->
<?php
include 'db_connection.php'; // Include your database connection file

$query = "SELECT ID, firstName, lastName FROM users";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  
    <?php include 'header.php'; ?>

    <h1 class="text-center">Customer List</h1>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Profile</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['firstName'] . " " . $row['lastName']); ?></td>
                        <td><a href="profile.php?id=<?php echo $row['ID']; ?>" class="btn btn-primary">View Profile</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" class="text-center">No customers found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <!-- Action Section: Add New Transaction Button -->
    <div class="mt-4">
        <a href="add_transaction.php" class="btn btn-success">Add New Transaction</a>
    </div>
</div>

<?php include 'footer.php'; ?>

