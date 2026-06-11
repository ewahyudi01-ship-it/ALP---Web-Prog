<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$amount = $_POST['amount'];

mysqli_query(
    $conn,
    "UPDATE users
     SET balance_user = balance_user + $amount
     WHERE user_id = $user_id"
);

header("Location: dashboard.php");
exit();
?>