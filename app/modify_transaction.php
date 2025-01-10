<?php
// Include database connection
include 'db_connection.php';

// Check if ID is provided
if (isset($_GET['id'])) {
    $transactionID = intval($_GET['id']);

    // Fetch existing transaction details
    $sql = "SELECT * FROM Transactions WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $transactionID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $transaction = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger'>No transaction found with ID $transactionID.</div>";
        exit;
    }
    $stmt->close();

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $accountFrom = $_POST['IDAccountFrom'];
        $accountTo = $_POST['IDAccountTo'];
        $amount = $_POST['amount'];
        $branchID = $_POST['IDBranch'];
        $employeeID = $_POST['IDEmployee'];
        $transactionTypeID = $_POST['IDTrType'];

        $sql = "UPDATE Transactions SET 
            IDAccountFrom = $accountFrom, 
            IDAccountTo = $accountTo, 
            amount = $amount, 
            IDBranch = $branchID, 
            IDEmployee = $employeeID, 
            IDTrType = $transactionTypeID 
            WHERE ID = $transactionID";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Transaction updated successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error updating transaction: " . $conn->error . "</div>";
        }
    }
} else {
    echo "<div class='alert alert-danger'>Transaction ID not provided.</div>";
    exit;
}

$conn->close();
?>

<?php include 'header.php'; ?>

    <a href="transactions.php" class="btn btn-secondary mb-4">Back to list</a>

    <h1 class="mb-4">Modify Transaction</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="IDAccountFrom" class="form-label">Account From:</label>
            <input type="number" class="form-control" id="IDAccountFrom" name="IDAccountFrom" value="<?php echo $transaction['IDAccountFrom']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="IDAccountTo" class="form-label">Account To:</label>
            <input type="number" class="form-control" id="IDAccountTo" name="IDAccountTo" value="<?php echo $transaction['IDAccountTo']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount:</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="<?php echo $transaction['amount']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="IDBranch" class="form-label">Branch ID:</label>
            <input type="number" class="form-control" id="IDBranch" name="IDBranch" value="<?php echo $transaction['IDBranch']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="IDEmployee" class="form-label">Employee ID:</label>
            <input type="number" class="form-control" id="IDEmployee" name="IDEmployee" value="<?php echo $transaction['IDEmployee']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="IDTrType" class="form-label">Transaction Type ID:</label>
            <input type="number" class="form-control" id="IDTrType" name="IDTrType" value="<?php echo $transaction['IDTrType']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Transaction</button>
    </form>

<?php include 'footer.php'; ?>