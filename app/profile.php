
<!-- profile.php -->
<?php
include 'db_connection.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT firstName, lastName, active, email, phoneNumber, dob, dateCreated, address FROM users WHERE ID = $id";
    $result = $conn->query($query);
    $customer = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

  <?php include 'header.php'; ?>

    <a href="customers.php" class="btn btn-secondary mb-4">Back to Customer List</a>

    <?php if (isset($customer)): ?>
        <h1 class="text-center">Profile Page</h1>
        <ul class="list-group mt-4">
        <li class="list-group-item"><strong>First Name:</strong> <?php echo htmlspecialchars($customer['firstName']); ?></li>
        <li class="list-group-item"><strong>Last Name:</strong> <?php echo htmlspecialchars($customer['lastName']); ?></li>
        <li class="list-group-item"><strong>Active Account:</strong> <?php echo htmlspecialchars($customer['active']); ?></li>
        <li class="list-group-item"><strong>Birthday:</strong> <?php echo htmlspecialchars($customer['dob']); ?></li>
        <li class="list-group-item"><strong>Phone number:</strong> <?php echo htmlspecialchars($customer['phoneNumber']); ?></li>
        <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($customer['email']); ?></li>
        <li class="list-group-item"><strong>Date Created:</strong> <?php echo htmlspecialchars($customer['dateCreated']); ?></li>
        <li class="list-group-item"><strong>Address:</strong> <?php echo htmlspecialchars($customer['address']); ?></li>
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
</div>
<?php include 'footer.php'; ?>