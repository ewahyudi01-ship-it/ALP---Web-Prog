<?php
session_start();

include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

//cek apakah user sudah logged in atau belum
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href='login.php'</script>";
    exit();
}


//ambil data dari halaman sebelumnya (infoWallpaper.php)
$user_id = $_SESSION['user_id'];
$wallpaper_id = $_POST['wallpaper_id'];

$queryUser = "SELECT * FROM users WHERE user_id = $user_id";
$resultUser = mysqli_query($conn, $queryUser);
$user = mysqli_fetch_assoc($resultUser);

$queryWallpaper = "SELECT * FROM wallpapers WHERE wallpaper_id = $wallpaper_id";
$resultWallpaper = mysqli_query($conn, $queryWallpaper);
$wallpaper = mysqli_fetch_assoc($resultWallpaper);

$price = $wallpaper['price_wallpaper'];


// periksa transaksi
if($user['balance_user'] >= $wallpaper['price_wallpaper']) {

        $newBalance = $user['balance_user'] - $wallpaper['price_wallpaper'];

    mysqli_query(
    $conn,
    "UPDATE users
     SET balance_user = $newBalance
     WHERE user_id = $user_id"
);
    

// simpan transaksi (berhasil bayar)
mysqli_query(
    $conn,
    "INSERT INTO transactions
    (buyer_id, wallpaper_id, date_bought, price, status)
    VALUES
    ($user_id, $wallpaper_id, NOW(), $price, 'complete')"
);

mysqli_query(
    $conn,
    "UPDATE users
     SET balance_user = balance_user + $price
     WHERE role = 'owner'"
);

    //header("Location: infoWallpaper.php?id=$wallpaper_id&success=1");
    header("Location:download_wallpaper.php?id=$wallpaper_id");
    exit();

} else {

// simpan transaksi ke database sebagai "Failed" atau (gagal bayar)
mysqli_query(
    $conn,
    "INSERT INTO transactions
    (buyer_id, wallpaper_id, date_bought, price, status)
    VALUES
    ($user_id, $wallpaper_id, NOW(), $price, 'failed')"
);
    echo "<script>
    alert('Insufficient balance :(');
    exit;
    </script>";
}

?>
