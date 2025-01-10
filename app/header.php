<?php 

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check if the user is not logged in and the current page is not login.php
    if (
        (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
        && basename($_SERVER['PHP_SELF']) !== 'login.php'
        ) {
        // Redirect to login.php
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

<h1>Harmoni Bank</h1>
<a href="index.php">
<img src="assets/img/logo.webp" width="100"  class="img-fluid" alt="">
</a>
<header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login-Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customers.php">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employee.php">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transactions.php">Transactions</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
