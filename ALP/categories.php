<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php';

function showCategorizedWallpaper($conn)
{
    // tangkap nama kategori ($_GET) yang diklik dari URL halaman sebelumnya yakni index.html di bagian: (?name=...)
    if (isset($_GET['name'])) {
        $category_name = mysqli_real_escape_string($conn, $_GET['name']);
        echo "<h2 class ='text-[rgb(246,246,246)] text-2xl lg:text-7xl text-left lg:px-20 lg:pt-20'>$category_name</h2>";

        $query = "SELECT wallpapers.* FROM wallpapers 
          INNER JOIN categories_wallpapers_pivot ON wallpapers.wallpaper_id = categories_wallpapers_pivot.wallpaper_id
          INNER JOIN categories ON categories.categories_id = categories_wallpapers_pivot.category_id
          WHERE categories.name_categories = '$category_name'";
        return mysqli_query($conn, $query);

    } else {
        // jika diakses langsung tanpa ngeklik kategori, alihkan ke halaman utama
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallpeak Wallpapers</title>
    <link href="style.css" rel="Stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<!-- mengambil nilai dari function yang akan dipakai untuk tunjukin wallpaperr di dalam categories page -->
<?php
$result = showCategorizedWallpaper($conn);
?>

<body class="!bg-[rgb(25,27,27)]">

    <div id="navBar"
        class="fixed inset-x-0 items-center flex flex-row px-10 py-5 backdrop-blur-md font-bold backdrop-filter justify-between lg:justify-center top-0 gap-7 lg:gap-10 md:gap-3 text-black text-center text-sm md:text-[14px] lg:text-[16px] md:text-xs z-50">
        <li class="nav-item rounded-2xl bg-green-200 p-1 px-3"><a class="nav-link" href="index.php">Main menu</a></li>
        <li class="nav-item rounded-2xl bg-blue-300 p-1 px-3"><a class="nav-link" href="#storePage">Store</a></li>
        <li class="nav-item rounded-2xl bg-pink-200 p-1 px-3"><a class="nav-link" href="aboutUs.php">About us</a></li>
    </div>

    <div class="relative flex flex-wrap max-w-fit gap-4 mt-5">

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="rounded-xl">
                
                <a href="infoWallpaper.php?id=<?= $row['wallpaper_id'] ?>&name=<?= $_GET['name'] ?>">
                    <img src="<?php echo $row['file_path']; ?>"
                    class="w-auto h-[100px] md:h-[200px] lg:h-[250px] object-cover rounded hover:scale-[1.02] transition duration-300">
                </a>
            </div>
            <?php
        }
        ?>

    </div>
</body>

</html>