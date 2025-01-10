
<!-- employer_profile.php -->
<?php
include 'db_connection.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT firstName, lastName, role, active, branchID, dateCreated FROM employee WHERE ID = $id";
    $result = $conn->query($query);
    $employee = $result->fetch_assoc();
}
?>

<?php 
$page_title = "Employee profile";
include 'header.php'; 
?>
    <a href="employee.php" class="btn btn-secondary mb-4">Back to list</a>

    <?php if (isset($employee)): ?>
        <h1 class="text-center">Profile Page</h1>
        <ul class="list-group mt-4">
        <li class="list-group-item"><strong>First Name:</strong> <?php echo htmlspecialchars($employee['firstName']); ?></li>
        <li class="list-group-item"><strong>Last Name:</strong> <?php echo htmlspecialchars($employee['lastName']); ?></li>
        <li class="list-group-item"><strong>Active Account:</strong> <?php echo htmlspecialchars($employee['active']); ?></li>
        <li class="list-group-item"><strong>Role:</strong> <?php echo htmlspecialchars($employee['role']); ?></li>
        <li class="list-group-item"><strong>Branch:</strong> <?php echo htmlspecialchars($employee['branchID']); ?></li>
        <li class="list-group-item"><strong>Date Created:</strong> <?php echo htmlspecialchars($employee['dateCreated']); ?></li>
        </ul>
    <?php endif; ?>
    
   <?php
  // Action Section: Modify and Delete Buttons
        echo '<div class="mt-4">';
        echo '<a href="modify_transaction.php?id=' . $transaction['ID'] . '" class="btn btn-primary">Modify Transaction</a>';
        echo ' ';
        echo '<a href="delete_transaction.php?id=' . $transaction['ID'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this transaction?\')">Delete Transaction</a>';
        echo '</div>';
    ?>

<?php include 'footer.php'; ?>