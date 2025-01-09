<?php
// Start a session to track user login status
session_start();

include_once("db_connection.php");

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
    $user = $conn->real_escape_string($_POST["username"]);
    $pass = md5($conn->real_escape_string($_POST["password"])); // Encode password with MD5

    $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $user;
    } else {
        $error = "Invalid username or password.";
    }
}

// Handle logout
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-3">
    <?php include 'header.php'; ?>
    <h1 class="text-center">Login</h1>

    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]): ?>
        <div class="text-center">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
            <a href="?logout" class="btn btn-danger">Logout</a>
        </div>
    <?php else: ?>
        <form method="post" action="" class="w-50 mx-auto mt-4">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"> <?php echo $error; ?> </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </form>
    <?php endif; ?>
</div>

<!-- Bootstrap JS Bundle -->
<?php include 'footer.php'; ?>