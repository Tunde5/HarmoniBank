<!-- customers.php -->
<?php
include 'db_connection.php'; // Include your database connection file

$query = "SELECT ID, firstName, lastName FROM users";
$result = $conn->query($query);
?>

<?php 
$page_title = "Customers";
include 'header.php'; 
?>

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
    
    <div class="mt-4">
        <a href="add_customer.php" class="btn btn-success">Add New</a>
    </div>


<?php include 'footer.php'; ?>

