<!-- employers.php -->
<?php
include 'db_connection.php'; // Include your database connection file

$query = "SELECT ID, firstName, lastName FROM employee";
$result = $conn->query($query);
?>

<?php 
$page_title = "Employee list";
include 'header.php'; 
?>
    <h1 class="text-center">Employee List</h1>
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
                    <td><a href="employee-profile.php?id=<?php echo $row['ID']; ?>" class="btn btn-primary">View Profile</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </tbody>
    </table>
    
    <!-- Action Section: Add New Transaction Button -->
    <div class="mt-4">
        <a href="add_transaction.php" class="btn btn-success">Add New Transaction</a>
    </div>

<?php include 'footer.php'; ?>