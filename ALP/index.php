<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WALLPEAK LANDING PAGE</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <link href="style.css" rel="Stylesheet">


</head>

<body class="bg-[rgb(0,204,255)]">

    <div class="absolute top-[200px] lg:top-[300px] flex-row justify-center items-center text-center left-1/2 -translate-x-1/2 z-0">
        <p id="trans1" class="text-white text-sm md:text-base lg:text-2xl font-light tracking-wide mb-3 lg:mb-13 z-30">
            Search all your epic wallpapers with </p>

        <h1 id="judul" class="text-5xl md:text-7xl lg:text-[180px] font-black uppercase tracking-wider leading-[0.8]">
            <span class="text-[rgb(255,130,255)]">W</span><span class="text-[rgb(255,252,68)]">ALLPEAK</span>
        </h1>
    </div>

    <div class="relative flex items-center justify-center -right-8 lg:-right-30 pt-[250px] lg:pt-[350px]">
        <img src="https://lh3.googleusercontent.com/d/1L4jOA80r8ys0RUbMZ3JThnTuUUCRQo0C"
            class="w-full h-auto object-contain lg:w-[50%] md:w-[400px] mx-auto z-20">
    </div>



    <div id="navBar"
        class="fixed inset-x-0 items-center flex flex-row px-10 py-5 bg-black/60 backdrop-blur-md font-bold backdrop-filter justify-between lg:justify-center top-0 gap-7 lg:gap-10 md:gap-3 text-white text-center text-sm md:text-[14px] lg:text-[16px] md:text-xs z-50">
        <?php
        session_start();

        if (isset($_SESSION['username'])) {

    
                echo '<li class="nav-item rounded-2xl bg-orange-200 text-black p-1 px-3"><a class="nav-link" href="dashboard.php">Dashboard</a></li>';
            
        } 
        ?>

        <li class="nav-item"><a class="nav-link" href="#storePage">Store</a></li>
        <li class="nav-item"><a class="nav-link" href="aboutUs.php">About us</a></li> 

        <?php
        if (isset($_SESSION['username'])) {
            //jika user sudah login
            echo '<li class="nav-item rounded-2xl bg-red-500 text-white p-1 px-3 hover:bg-red-600 transition"><a class="nav-link" href="logout.php">Log Out</a></li>';
        } else {
            echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
        }
        ?>
    </div>


    <div class="absolute inset-x-0 w-screen h-50 bg-gradient-to-t from-[rgb(25,27,27)] to-transparent"></div>


    <div id="storePage" class="absolute inset-x-0 h-auto bg-[rgb(25,27,27)] mt-50">

        <div class="sticky inset-x-0 flex items-center felx-row justify-center top-14 bg-[rgb(25,27,27)] py-5 text-white z-40 overflow-x-auto overflow-y-hidden whitespace-nowrap px-4 py-4 scrollbar-none">
            <div class = "w-full md:w-auto lg:w-auto">
            
        <ul class="flex flex-row flex-nowrap w-full text-[10px] lg:text-[14px] gap-2 md:gap-4 lg:gap-6">
            <li>
                <a href="categories.php?name=Most liked"
                    class="px-5 py-2 bg-[rgb(255,80,20)] hover:bg-[rgb(255,120,20)] text-white rounded-full transition">
                    Most liked
                </a>
            </li>
            <li>
                <a href="categories.php?name=Light"
                    class="px-5 py-2 bg-white/20 hover:bg-white/40 text-white rounded-full transition">
                    Light
                </a>
            </li>
            <li>
                <a href="categories.php?name=Dark" class="px-5 py-2 bg-white/20 hover:bg-white/40 text-white rounded-full transition">
                    Dark
                </a>
            </li>
            <li>
                <a href="categories.php?name=Minimalist" class="px-5 py-2 bg-white/20 hover:bg-white/40 text-white rounded-full transition">
                    Minimalist
                </a>
            </li>
            <li>
                <a href="categories.php?name=Horror" class="px-5 py-2 bg-white/20 hover:bg-white/40 text-white rounded-full transition">
                    Horror
                </a>
            </li>
            <li>
                <a href="categories.php?name=Mobile wallpaper" class="px-5 py-2 bg-white/20 hover:bg-white/40 text-white rounded-full transition">
                    Mobile Wallpaper
                </a>
            </li>
            <li>
                <a href="categories.php?name=Desktop wallpaper" class="px-5 py-2 bg-white/20 hover:bg-white/40 text-white rounded-full transition">
                    Desktop Wallpaper
                </a>
            </li>
        </ul>
        </div>
    </div>


        <div class="relative w-full h-full lg:py-10 overflow-hidden">
                <h2 class="text-1xl md:text-2xl lg:text-5xl text-white text-center">Check out the most Liked</h2>
            
                    <h4 class="text-sm text-white text-center">Click to find out more ></h4>
                
        </div>



    <div class="relative flex flex-wrap max-w-fit gap-4">

    <!-- tunjukin semua wallpaper dari database -->
    <?php
        include 'connect.php';

        $query = "SELECT * FROM wallpapers";
        $result = mysqli_query($conn, $query);
        ?>

        <?php
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <a href="infoWallpaper.php?id=<?php echo $row['wallpaper_id']; ?>">
            <div class="overflow-hidden rounded-xl shadow-lg hover:scale-[1.02] transition duration-300">

            <img src="<?php echo $row['file_path']; ?>" class="w-auto h-[100px] md:h-[200px] lg:h-[250px] object-cover rounded lg:rounded-2xl">

            </div>
        </a>
        <?php
        }
        ?>

        </div>

<div class="h-2 w-full bg-gradient-to-r from-purple-300 via-green-200 to-blue-300 to-orange-300 shadow-lg"></div>


<!-- animasi -->
    <script>
        gsap.from("#judul", {
            y: 900,
            opacity: 100,
            duration: 1.7
        });

        gsap.from("#navBar", {
            y: -50,
            opacity: 100,
            duration: 1.4
        });

        gsap.from("#trans1", {
            y: 25,
            opacity: 0,
            duration: 1.5
        });
    </script>


</body>

</html>