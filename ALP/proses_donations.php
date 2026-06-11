<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php';

$user_id = $_SESSION['user_id'];
$queryUser = "SELECT * FROM users WHERE user_id = $user_id";
$resultUser = mysqli_query($conn, $queryUser);
$user = mysqli_fetch_assoc($resultUser);


if (isset($_POST['submit_donations'])) {
    if ($_SESSION['role'] == 'owner') {

        echo "<script>
        alert('Your the owner :/');
        window.location.href = 'aboutUs.php';
        </script>";
        exit();

    } else if ($_SESSION['role'] == 'member') {
        $ammount = $_POST['donations'];

        if ($user['balance_user'] < $ammount) {
            echo "<script>
    alert('Balance is not enough');
    window.location.href='aboutUs.php';
    </script>";
            exit();
        }

        $newBalance = $user['balance_user'] - $ammount;

        // kurangi saldo member
        mysqli_query(
            $conn,
            "UPDATE users
     SET balance_user = $newBalance
     WHERE user_id = $user_id"
        );

        // tambah saldo owner
        mysqli_query(
            $conn,
            "UPDATE users
     SET balance_user = balance_user + $ammount
     WHERE role = 'owner'"
        );

        echo "<script>
alert('WOW! thankyou thankyou! thankyou!! for donation! :)');
window.location.href='aboutUs.php';
</script>";

    } else {
        echo "<script>
        window.location.href = 'login.php';
        </script>";
    }
}
$conn->close();
?>