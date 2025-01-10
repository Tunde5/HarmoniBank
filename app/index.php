<?php

echo "Welcome to the Bank bank!";

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
else{

  echo "Wellcome to the bank";
}