<?php
include("connect.php");

$id = $_GET['id'];
$name_category = $_GET['name'];

$query = "SELECT * FROM wallpapers WHERE wallpaper_id = $id";
$result = mysqli_query($conn, $query);

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="style.css" rel="Stylesheet">
</head>

<body class="!bg-[rgb(25,27,27)]">

    <div id="navBar"
        class="fixed inset-x-0 items-center flex flex-row px-10 py-5 backdrop-blur-md font-bold backdrop-filter justify-between lg:justify-center top-0 gap-7 lg:gap-10 md:gap-3 text-black text-center text-sm md:text-[14px] lg:text-[16px] md:text-xs z-50">
        <li class="nav-item rounded-2xl bg-green-200 p-1 px-3"><a class="nav-link" href="index.php">Main menu</a></li>
        <li class="nav-item rounded-2xl bg-blue-300 p-1 px-3"><a class="nav-link" href="index.php#storePage">Store</a></li>
        <li class="nav-item rounded-2xl bg-pink-200 p-1 px-3"><a class="nav-link" href="aboutUs.php">About us</a></li>
    </div>

    <div class="relative flex flex-col justify-center lg:px-45 pt-35 lg:pt-20">

    
            <?php
            //dijalankan setelah buyWallpaper.php berhasil beli wallpaper
                if(isset($_GET['success'])){
                echo "
                <div class='items-center bg-green-500 text-white font-bold p-3 rounded-2xl max-w-fit'>
                    Purchase Successful
                </div>";
                }
                ?>      

        <div>
            <p class="text-white font-bold text-[40px] lg:text-[85px] text-center">
                <?php echo $data['name_wallpaper']; ?>
            </p>

            <img src="<?php echo $data['file_path']; ?>"
                class="w-full h-auto lg:w-auto lg:h-[60%] lg:object-contain mt-30 lg:mt-60">
        </div>

        <div class="bg-[rgb(70,119,94)] pt-3 px-1 pb-1 rounded-2xl mt-15 lg:mt-20">
            <p class="text-white font-bold text-2xl lg:text-[35px] pl-5">INFO</pclass></p>

            <div class="bg-[rgb(36,37,38)] p-5 rounded-2xl">
                <div class="bg-[rgb(48,49,50)] p-3 max-w-fit">
                    <a href="categories.php?name=<?php echo $name_category; ?>"
                        class="text-sm text-white/80"><?php echo $name_category; ?></a>
                </div>

                <p class="text-white font-bold text-sm lg:text-[25px]"><?php echo $data['name_wallpaper']; ?></p>
                <p class="text-white font-bold text-sm lg:text-[16px]">Price : <?php echo $data['price_wallpaper']; ?></p>

                <form action="buyWallpaper.php" method="POST">
                    <input type="hidden" name="wallpaper_id" value="<?php echo $data['wallpaper_id']; ?>">
                    <button type="submit" onclick="return confirm('Are you sure want to purchase?')" class="max-w-fit py-3 px-3 bg-orange-600 text-white font-semibold rounded-xl">
                        Buy Wallpaper
                    </button>
                </form>
            </div>

        </div>
        <div class="bg-[rgb(55,114,145)] pt-3 px-1 pb-1 rounded-2xl mt-15 lg:mt-20">
            <p class="text-white font-bold text-2xl lg:text-[35px] pl-5">Description</p>
            </p>

            <div class="bg-[rgb(36,37,38)] p-5 rounded-2xl">
                <p class="text-white text-sm lg:text-[16px]"><?php echo $data['description']; ?></p>
            </div>

        </div>
    </div>
</body>

</html>