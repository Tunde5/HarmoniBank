<?php
// Include database connection
include 'db_connection.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accountFrom = $_POST['IDAccountFrom'];
    $accountTo = $_POST['IDAccountTo'];
    $amount = $_POST['amount'];
    $branchID = $_POST['IDBranch'];
    $employeeID = $_POST['IDEmployee'];
    $transactionTypeID = $_POST['IDTrType'];

    // Insert new transaction
    $sql = "INSERT INTO Transactions 
            (IDAccountFrom, IDAccountTo, amount, IDBranch, IDEmployee, IDTrType) 
            VALUES ($accountFrom, $accountTo, $amount, $branchID, $employeeID, $transactionTypeID)";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>New transaction added successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error adding transaction: " . $conn->error . "</div>";
    }
}

$conn->close();
?>

<?php 
$page_title = "Add transaction";
include 'header.php'; 
?>

    <a href="transactions.php" class="btn btn-secondary mb-4">Back to list</a>

    <h1 class="mb-4">Add New Transaction</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="IDAccountFrom" class="form-label">Account From:</label>
            <input type="number" class="form-control" id="IDAccountFrom" name="IDAccountFrom" required>
        </div>
        <div class="mb-3">
            <label for="IDAccountTo" class="form-label">Account To:</label>
            <input type="number" class="form-control" id="IDAccountTo" name="IDAccountTo" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount:</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="mb-3">
            <label for="IDBranch" class="form-label">Branch ID:</label>
            <input type="number" class="form-control" id="IDBranch" name="IDBranch" required>
        </div>
        <div class="mb-3">
            <label for="IDEmployee" class="form-label">Employee ID:</label>
            <input type="number" class="form-control" id="IDEmployee" name="IDEmployee" required>
        </div>
        <div class="mb-3">
            <label for="IDTrType" class="form-label">Transaction Type ID:</label>
            <input type="number" class="form-control" id="IDTrType" name="IDTrType" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Transaction</button>
    </form>

<?php
include('footer.php');
?>
