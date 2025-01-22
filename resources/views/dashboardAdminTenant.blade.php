<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Tenant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .welcome-message {
            font-size: 1.5rem;
            font-weight: bold;
            margin-left: 0.5rem;
            white-space: nowrap;
            overflow: hidden;
            display: inline-block;
            width: fit-content;
        }
    
        .welcome-message-static {
            font-size: 1.5rem;
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            display: inline-block;
            width: fit-content;
        }
    </style>
</head>

<body class="bg-white">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebarAdminTenant')

        <!-- Content -->
        <div class="flex-grow">

            <!-- Navbar -->
            @include('components.navbarAdminTenant')

            <!-- Welcome Back -->
            <div class="pl-8 pt-8 pb-3 flex justify-left items-center">
                <p class="welcome-message-static">Welcome Back, </p>
                <span class="welcome-message" id="typewriter"></span>
                <span class="text-2xl" aria-label="Waving Hand" role="img">👋</span>
            </div>

            <!-- Main Content -->
            <div class="px-8 pt-5 flex justify-center items-center">
                <div class="grid grid-cols-12 w-full gap-14">

                    <!-- Total Customer -->
                    <div class="col-span-3 bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col">
                        <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center justify-between">
                            <div>
                                <h2 class="text-left ml-3 mt-6 text-3xl font-bold">67</h2>
                                <p class="text-left text-gray-500 ml-3 mt-1 mb-6 text-lg font-semibold ">Total Customer</p>
                            </div>
                            <div class="mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill text-[#00C6BF]" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                            </div>                            
                        </div>
                    </div>

                    <!-- Total Booking -->
                    <div class="col-span-3 bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col">
                        <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center justify-between">
                            <div>
                                <h2 class="text-left ml-3 mt-6 text-3xl font-bold">34</h2>
                                <p class="text-left text-gray-500 ml-3 mt-1 mb-6 text-lg font-semibold ">Total Booking</p>
                            </div>
                            <div class="mr-3">
                                <img width="50" height="50" src="https://img.icons8.com/deco-glyph/48/00c6bf/booking.png" alt="booking"/>
                            </div>
                        </div>
                    </div>

                    <!-- Belum Diverifikasi -->
                    <div class="col-span-3 bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col">
                        <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center justify-between">
                            <div>
                                <h2 class="text-left ml-3 mt-6 text-3xl font-bold">8</h2>
                                <p class="text-left text-gray-500 ml-3 mt-1 mb-6 text-lg font-semibold ">Belum Diverifikasi</p>
                            </div>
                            <div class="mr-3">
                                <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/00c6bf/visa-stamp.png" alt="visa-stamp"/>
                            </div>
                        </div>
                    </div>
                    <!-- Total Tenant -->
                    <div class="col-span-3 bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col">
                        <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center justify-between">
                            <div>
                                <h2 class="text-left ml-3 mt-6 text-3xl font-bold">50</h2>
                                <p class="text-left text-gray-500 ml-3 mt-1 mb-6 text-lg font-semibold ">Total Event</p>
                            </div>
                            <div class="mr-3">
                                <img width="58" height="58" src="https://img.icons8.com/fluency-systems-filled/48/00c6bf/event.png" alt="event"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-8 pt-12 flex justify-center items-center">
                <div class="grid grid-cols-12 w-full gap-14">
                    <!-- Statistik Pengunjung -->
                     @auth
                    <div class="col-span-6 pt-24 pb-24 bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col">
                        <div>
                            <h2 class="text-left ml-3 mt-6 text-3xl font-bold">{{ $AT->name }}</h2>
                            <p class="text-left text-gray-500 ml-3 mt-1 mb-6 text-lg font-semibold ">Diagran Garis/Batang</p>
                        </div>
                    </div>
                    @endauth
                    <!-- Statistik Tenant Terbooking -->
                    <div class="col-span-6 pt-24 pb-24 bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col">
                        <div>
                            <h2 class="text-left ml-3 mt-6 text-3xl font-bold">Statistik Tenant Terbooking</h2>
                            <p class="text-left text-gray-500 ml-3 mt-1 mb-6 text-lg font-semibold ">Diagran Lingkaran</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const messages = ["David Nugroho!"]; 
        let messageIndex = 0;
        let charIndex = 0;
        const typingSpeed = 100; 
        const erasingSpeed = 50; 
        const delayBetweenMessages = 2000; 
        const typewriterElement = document.getElementById("typewriter");

        function typeMessage() {
            if (charIndex < messages[messageIndex].length) {
                typewriterElement.textContent += messages[messageIndex].charAt(charIndex);
                charIndex++;
                setTimeout(typeMessage, typingSpeed);
            } else {
                setTimeout(eraseMessage, delayBetweenMessages);
            }
        }

        function eraseMessage() {
            if (charIndex > 0) {
                typewriterElement.textContent = messages[messageIndex].substring(0, charIndex - 1);
                charIndex--;
                setTimeout(eraseMessage, erasingSpeed);
            } else {
                messageIndex = (messageIndex + 1) % messages.length; // Loop pesan
                setTimeout(typeMessage, typingSpeed);
            }
        }

        // Mulai mengetik pesan
        setTimeout(typeMessage, typingSpeed);
    });
</script>

</html>