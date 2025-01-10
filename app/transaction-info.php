<?php
include('db_connection.php');

$transaction = null;

// Fetch transaction details
if (isset($_GET['id'])) {
    $transactionId = $_GET['id'];

    $query = "SELECT t.ID, t.IDAccountFrom, t.IDAccountTo, t.amount, t.dateCreated, tt.name
            FROM transactions t
            JOIN transaction_types tt ON t.IDTrType = tt.ID
            WHERE t.ID = " . $transactionId;
    $result = $conn->query($query);
    $transaction = $result->fetch_assoc();
}      
?>

    <?php include 'header.php'; // Include the header file ?>
    
    <h1 class="text-center">Transaction Detais</h1>

    <?php

        if ($transaction) {
            echo '<p><strong>Transaction ID:</strong> ' . $transaction['ID'] . '</p>';
            echo '<p><strong>From Customer:</strong> ' . $transaction['IDAccountFrom'] . '</p>';
            echo '<p><strong>To Customer:</strong> ' . $transaction['IDAccountTo'] . '</p>';
            echo '<p><strong>Amount:</strong> ' . $transaction['amount'] . '</p>';
            echo '<p><strong>Date Created:</strong> ' . $transaction['dateCreated'] . '</p>';
            echo '<p><strong>Transaction Type:</strong> ' . $transaction['name'] . '</p>';
        } else {
            echo '<p>No transaction found.</p>';
        }

        // Action Section: Modify and Delete Buttons
        echo '<div class="mt-4">';
        echo '<a href="modify_transaction.php?id=' . $transaction['ID'] . '" class="btn btn-primary">Modify Transaction</a>';
        echo ' ';
        echo '<a href="delete_transaction.php?id=' . $transaction['ID'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this transaction?\')">Delete Transaction</a>';
        echo '</div>';
        
    ?>

<?php  include('footer.php'); ?>
