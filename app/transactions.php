<?php
include('db_connection.php');

// Fetch transactions
$query = "SELECT t.ID, t.IDAccountFrom, t.IDAccountTo, t.amount, t.dateCreated, tt.name
        FROM transactions t
        JOIN transaction_types tt ON t.IDTrType = tt.ID
        ORDER BY t.dateCreated DESC";
$transactions = $conn->query($query);

?>

<?php include 'header.php'; // Include the header file ?>
    
    <h1 class="text-center">Transaction List</h1>


    <?php
    echo '<table class="table table-bordered">';
    echo '<thead><tr><th>Transaction ID</th><th>From Customer</th><th>To Customer</th><th>Amount</th><th>Date Created</th><th>Transaction Type</th><th>Actions</th></tr></thead>';
    echo '<tbody>';

    foreach ($transactions as $transaction) {
        echo '<tr>';
        echo '<td>' . $transaction['ID'] . '</td>';
        echo '<td>' . $transaction['IDAccountFrom'] . '</td>';
        echo '<td>' . $transaction['IDAccountTo'] . '</td>';
        echo '<td>' . $transaction['amount'] . '</td>';
        echo '<td>' . $transaction['dateCreated'] . '</td>';
        echo '<td>' . $transaction['name'] . '</td>';
        echo '<td><a href="transaction-info.php?id=' . $transaction['ID'] . '" class="btn btn-info btn-sm">View</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    ?>
    
    <!-- Action Section: Add New Transaction Button -->
    <div class="mt-4">
        <a href="add_transaction.php" class="btn btn-success">Add New Transaction</a>
    </div>
</div>


<?php include('footer.php'); ?>
