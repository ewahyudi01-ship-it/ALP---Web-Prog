<?php
include 'connect.php';
sleep(1);


$wallpaper_id = $_GET['id'];

$query = "SELECT * FROM wallpapers WHERE wallpaper_id = $wallpaper_id";
$result = mysqli_query($conn, $query);

$wallpaper = mysqli_fetch_assoc($result);

header("Location: " . $wallpaper['file_path']);
?>