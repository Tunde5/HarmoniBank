
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

    // Fetch related data for dropdowns
    $accounts = $conn->query("SELECT ID, AccountName FROM Accounts")->fetch_all(MYSQLI_ASSOC);
    $branches = $conn->query("SELECT ID, BranchName FROM Branches")->fetch_all(MYSQLI_ASSOC);
    $employees = $conn->query("SELECT ID, EmployeeName FROM Employees")->fetch_all(MYSQLI_ASSOC);
    $transactionTypes = $conn->query("SELECT ID, TypeName FROM TransactionTypes")->fetch_all(MYSQLI_ASSOC);

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $accountFrom = $_POST['IDAccountFrom'];
        $accountTo = $_POST['IDAccountTo'];
        $amount = $_POST['amount'];
        $branchID = $_POST['IDBranch'];
        $employeeID = $_POST['IDEmployee'];
        $transactionTypeID = $_POST['IDTrType'];

        $sql = "UPDATE Transactions SET 
            IDAccountFrom = ?, 
            IDAccountTo = ?, 
            amount = ?, 
            IDBranch = ?, 
            IDEmployee = ?, 
            IDTrType = ? 
            WHERE ID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iidiiii", $accountFrom, $accountTo, $amount, $branchID, $employeeID, $transactionTypeID, $transactionID);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Transaction updated successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error updating transaction: " . $stmt->error . "</div>";
        }
    }
} else {
    echo "<div class='alert alert-danger'>Transaction ID not provided.</div>";
    exit;
}

$conn->close();
?>

<?php 
$page_title = "Modify transaction";
include 'header.php'; 
?>

<a href="transactions.php" class="btn btn-secondary mb-4">Back to list</a>

<h1 class="mb-4">Modify Transaction</h1>
<form method="POST">
    <div class="mb-3">
        <label for="IDAccountFrom" class="form-label">Account From:</label>
        <select class="form-control" id="IDAccountFrom" name="IDAccountFrom" required>
            <?php foreach ($accounts as $account): ?>
                <option value="<?php echo $account['ID']; ?>" <?php echo $transaction['IDAccountFrom'] == $account['ID'] ? 'selected' : ''; ?>>
                    <?php echo $account['AccountName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="IDAccountTo" class="form-label">Account To:</label>
        <select class="form-control" id="IDAccountTo" name="IDAccountTo" required>
            <?php foreach ($accounts as $account): ?>
                <option value="<?php echo $account['ID']; ?>" <?php echo $transaction['IDAccountTo'] == $account['ID'] ? 'selected' : ''; ?>>
                    <?php echo $account['AccountName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Amount:</label>
        <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="<?php echo $transaction['amount']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="IDBranch" class="form-label">Branch:</label>
        <select class="form-control" id="IDBranch" name="IDBranch" required>
            <?php foreach ($branches as $branch): ?>
                <option value="<?php echo $branch['ID']; ?>" <?php echo $transaction['IDBranch'] == $branch['ID'] ? 'selected' : ''; ?>>
                    <?php echo $branch['BranchName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="IDEmployee" class="form-label">Employee:</label>
        <select class="form-control" id="IDEmployee" name="IDEmployee" required>
            <?php foreach ($employees as $employee): ?>
                <option value="<?php echo $employee['ID']; ?>" <?php echo $transaction['IDEmployee'] == $employee['ID'] ? 'selected' : ''; ?>>
                    <?php echo $employee['EmployeeName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="IDTrType" class="form-label">Transaction Type:</label>
        <select class="form-control" id="IDTrType" name="IDTrType" required>
            <?php foreach ($transactionTypes as $type): ?>
                <option value="<?php echo $type['ID']; ?>" <?php echo $transaction['IDTrType'] == $type['ID'] ? 'selected' : ''; ?>>
                    <?php echo $type['TypeName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Transaction</button>
</form>

<?php include 'footer.php'; ?>
