<?php
include 'db_connection.php'; // Include your database connection file
?>

html header menu...

<?php
// Check if ID is provided
if (isset($_GET['id'])) {
    $transactionID = intval($_GET['id']);
    
    // Delete query
    $sql = "DELETE FROM transactions WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $transactionID);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Transaction with ID $transactionID has been successfully deleted.";
        } else {
            echo "No transaction found with ID $transactionID.";
        }
    } else {
        echo "Error deleting transaction: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Transaction ID not provided.";
}

$conn->close();
?>
