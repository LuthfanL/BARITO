<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Kendaraan</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="https://unpkg.com/swiper@7/swiper-bundle.min.css" rel="stylesheet"/>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script> 
    <link rel="stylesheet" href="assets/style.css"/>
    
</head>

<body class="h-full bg-white">
    <!-- Navbar -->
    <div class="relative z-50">
        @include('components.navbargeneral')
    </div>

    <!-- Cover DIV -->
    <div id="default-carousel" class="relative w-full pt-24 m-0 p-0 shadow-xl" data-carousel="slide">
        <!-- Cover -->
        <div class="relative h-56 overflow-hidden md:h-96 ">
            <!-- Gambar dengan teks -->
            <div class="hidden" data-carousel-item>
                <img src="assets/bookingKendaraan.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 " alt="Cover Image">
                <!-- Teks di tengah gambar -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <h2 class="text-white text-4xl md:text-5xl font-bold drop-shadow-lg">
                        Kendaraan Kami
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Booking Kendaraan -->
    <div class="w-full">
        <div class="flex justify-center mt-12 shadow-[0_0_13px_3px_rgba(0,0,0,0.1)] p-8 space-x-8 ">
            <!-- Daftar Kendaraan -->
            <a href="" class="block transform transition-transform duration-300 hover:scale-105 group">
                <div class="bg-white-300 shadow-[0_0_12px_2px_rgba(0,0,0,0.1)] rounded-xl flex hover:shadow-xl">
                    <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center">
                        <div>
                            <p class="text-left text-gray-500 pt-3 pb-3 pr-3 ml-2 mt-6 mb-6 text-m font-semibold">
                                Daftar Kendaraan
                            </p>
                        </div>
                        <div class="mr-2">
                            <img width="50" height="50" src="https://img.icons8.com/ios-glyphs/60/737373/car--v1.png" alt="car--v1"/>
                        </div>
                    </div>
                </div>
            </a>
            <!-- Status Booking -->
            <a href="" class="block transform transition-transform duration-300 hover:scale-105 group">
                <div class="bg-white-300 shadow-[0_0_12px_2px_rgba(0,0,0,0.1)] rounded-xl flex hover:shadow-xl">
                    <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center">
                        <div>
                            <p class="text-left text-gray-500 pt-3 pb-3 pr-3 ml-5 mt-6 mb-6 text-m font-semibold">
                                Status Booking
                            </p>
                        </div>
                        <div class="mr-5">
                            <img width="42" height="42" src="https://img.icons8.com/ios-filled/50/737373/book.png" alt="book"/>
                        </div>
                    </div>
                </div>
            </a>
            <!-- Kontak -->
            <a href="" class="block transform transition-transform duration-300 hover:scale-105 group">
                <div class="bg-white-300 shadow-[0_0_12px_2px_rgba(0,0,0,0.1)] rounded-xl flex hover:shadow-xl">
                    <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center">
                        <div>
                            <p class="text-left text-gray-500 pt-3 pb-3 pr-3 ml-5 mt-6 mb-6 text-m font-semibold">
                                Hubungi Kami
                            </p>
                        </div>
                        <div class="mr-5">
                            <img width="42" height="42" src="https://img.icons8.com/ios-filled/50/737373/phone.png" alt="phone"/>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Kendaraan Terfavorit -->
    <div class="flex justify-center pt-10">
        <h2 class="font-bold text-2xl">Kendaraan Terfavorit</h2>
    </div>
    <div class="container swiper flex justify-center items-center pb-6">
        <div class="card-wrapper">
            <ul class="card-list swiper-wrapper">
                <!-- item 1 -->
                <li class="card-item swiper-slide">
                    <div href="" class="card-link">
                        <img src="assets/test.jpeg" alt="Ruangan" class="card-image">
                        <h2 class="font-bold pt-2 pb-2 ">Ruangan Lokakrida</h2>
                        <p class="card-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>                        
                        <p class="font-semibold text-sm pt-2">Banyak Terpinjam : 12</p>
                        <button href="#" class="inline-flex items-center mt-2 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-xl hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Lihat detail
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </li>
                <!-- item 2 -->
                <li class="card-item swiper-slide">
                    <div href="" class="card-link">
                        <img src="assets/test.jpeg" alt="Ruangan" class="card-image">
                        <h2 class="font-bold pt-2 pb-2 ">Ruangan Lokakrida</h2>
                        <p class="card-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <p class="font-semibold text-sm pt-2">Banyak Terpinjam : 12</p>
                        <button href="#" class="inline-flex items-center mt-2 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-xl hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Lihat detail
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </li>
                <!-- item 3 -->
                <li class="card-item swiper-slide">
                    <div href="" class="card-link">
                        <img src="assets/test.jpeg" alt="Ruangan" class="card-image">
                        <h2 class="font-bold pt-2 pb-2 ">Ruangan Lokakrida</h2>
                        <p class="card-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <p class="font-semibold text-sm pt-2">Banyak Terpinjam : 12</p>
                        <button href="#" class="inline-flex items-center mt-2 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-xl hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Lihat detail
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </li>
                <!-- item 4 -->
                <li class="card-item swiper-slide">
                    <div href="" class="card-link">
                        <img src="assets/test.jpeg" alt="Ruangan" class="card-image">
                        <h2 class="font-bold pt-2 pb-2 ">Ruangan Lokakrida</h2>
                        <p class="card-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <p class="font-semibold text-sm pt-2">Banyak Terpinjam : 12</p>
                        <button href="#" class="inline-flex items-center mt-2 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-xl hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Lihat detail
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </li>
                <!-- item 5 -->
                <li class="card-item swiper-slide">
                    <div href="" class="card-link">
                        <img src="assets/test.jpeg" alt="Ruangan" class="card-image">
                        <h2 class="font-bold pt-2 pb-2 ">Ruangan Lokakrida</h2>
                        <p class="card-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <p class="font-semibold text-sm pt-2">Banyak Terpinjam : 12</p>
                        <button href="#" class="inline-flex items-center mt-2 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-xl hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Lihat detail
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </li>
            </ul>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <!-- Pembatas -->
    <div class="pb-24">

    </div>

    <!-- Hubungi Kami -->

    <!-- Script Swiper JS-->
    <script>
        const swiper = new Swiper('.card-wrapper', {
            loop: true,
            spaceBetween: 30,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>