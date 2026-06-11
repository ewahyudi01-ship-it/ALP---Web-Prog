<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about us Wallpeak</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <link href="style.css" rel="Stylesheet">

</head>

<body class ="!bg-[rgb(22,23,48)]">

 <div id="navBar"
        class="fixed inset-x-0 items-center flex flex-row px-10 py-5 backdrop-blur-md font-bold backdrop-filter justify-between lg:justify-center top-0 gap-7 lg:gap-10 md:gap-3 text-black text-center text-sm md:text-[14px] lg:text-[16px] md:text-xs z-50">
        <li class="nav-item rounded-2xl bg-green-200 p-1 px-3"><a class="nav-link" href="index.php">Main menu</a></li>
        <li class="nav-item rounded-2xl bg-blue-300 p-1 px-3"><a class="nav-link" href="index.php#storePage">Store</a></li>
        <li class="nav-item rounded-2xl bg-pink-200 p-1 px-3"><a class="nav-link" href="aboutUs.php">About us</a></li>
    </div>

    <div class="flex flex-col fixed pt-[10px] lg:pt-[50px] w-full h-screen justify-end">
        <img src="https://lh3.googleusercontent.com/d/1IBge6UnXOtcIbw4_CrWZK4swnYJqyrW5"
            class="w-auto h-screen object-[70%] object-cover lg:w-[80%] lg:h-auto object-contain">
    </div>


    <div class="relative w-full min-h-screen">

        <div class = "absolute inset-0 flex flex-col items-center justify-center gap-5">
        <h2 id="judul" class ="font-bold text-6xl lg:text-[250px] text-[rgb(104,116,231)]/70 text-center ">ORIGIN</h2>
        <p id="text" class ="text-[rgb(186,192,251)] mt:10 text-sm lg:text-[17px] px-5 lg:px-120 text-left lg:text-center">We created a website that can provide quality wallpapers for our customers and use the name Wallpeak which originally comes from the word 'wallpaper', but we believe that all images created by human hands are masterpieces that have value, so that's where we combine the word 'peak' and show the specialness of the images created! And please note that all wallpaper works on this website are entirely created in such partnership of both courage and will, without any AI intervention! such love from creator. enjoy your visit! :)</p>
        </div>

    </div>


    <div class ="flex flex-col items-end gap-5 pr-4 lg:pr-22 relative z-10">

        <h2 class ="text-[rgb(250,135,210)] text-2xl lg:text-5xl text-left lg:text-end">Support us</h2>

            <form action="proses_donations.php" method="POST" class="space-y-4">
                <input 
                    type="text" 
                    name="donations" 
                    placeholder="Rp. " 
                    required
                    class="w-full px-4 py-3 bg-[#2a2c4e]/60 border border-white/10 rounded-xl text-white placeholder-gray-400 text-sm">

                <button 
                type="submit" 
                name="submit_donations"
                class="w-full py-3 bg-purple-600 hover:bg-purple-700 active:scale-[0.98] text-white font-semibold rounded-xl transition shadow-lg mt-2 cursor-pointer">Donate!
                </button>
            </form>
    </div>
    

    <rooter class="flex flex-col items-end px:5 lg:px-30 mt-60 text-white">
        <p>IG: eriick_881009</p>
        <p>LINE: e.rck_lune.</p>
    </rooter>
</body>

<script>
        gsap.from("#judul", {
            y: 100,
            opacity: 0,
            duration: 1
        });

        gsap.from("#navBar", {
            y: -50,
            opacity: 100,
            duration: 1.4
        });

        gsap.from("#text", {
            y: 100,
            opacity: 0,
            duration: 1.5
        });


    </script>
</html>