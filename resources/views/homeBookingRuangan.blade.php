<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ruangan</title>
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
    <div id="default-carousel" class="relative w-full pt-24 m-0 shadow-xl" data-carousel="slide">
        <!-- Cover -->
        <div class="relative h-56 overflow-hidden md:h-96">
            <!-- Gambar dengan teks -->
            <div class="hidden" data-carousel-item>
                <img 
                    src="assets/bookingRuangan.png" 
                    class="absolute w-full h-full object-cover" 
                    alt="Cover Image"
                />
                <!-- Teks di tengah gambar -->
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
                    <h2 class="text-white text-4xl md:text-5xl font-bold drop-shadow-lg">
                        Ruangan Kami
                    </h2>
                    <!-- Breadcrumb -->
                    <nav class="mt-4 flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="home" class="inline-flex items-center text-sm font-medium text-white hover:font-bold group">
                                    <svg class="w-3 h-3 me-2.5 transition-transform duration-200 group-hover:scale-110" 
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="ms-1 text-sm font-medium text-white md:ms-2">Booking Ruangan</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!-- Menu Booking Ruangan -->
    <div class="w-full">
        <div class="flex justify-center mt-12 shadow-[0_0_13px_3px_rgba(0,0,0,0.1)] p-8 space-x-8 ">
            <!-- Daftar Ruangan -->
            <a href="custDaftarRuangan" class="block transform transition-transform duration-300 hover:scale-105 group">
                <div class="bg-white-300 shadow-[0_0_12px_2px_rgba(0,0,0,0.1)] rounded-xl flex hover:shadow-xl">
                    <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center">
                        <div>
                            <p class="text-left text-gray-500 pt-3 pb-3 pr-3 ml-3 mt-6 mb-6 text-m font-semibold">
                                Daftar Ruangan
                            </p>
                        </div>
                        <div class="mr-3">
                            <img width="48" height="48" src="https://img.icons8.com/ios-filled/50/737373/room.png" 
                                alt="room"/>
                        </div>
                    </div>
                </div>
            </a>
            <!-- Status Booking -->
            <a href="custStatusBookingRuangan" class="block transform transition-transform duration-300 hover:scale-105 group">
                <div class="bg-white-300 shadow-[0_0_12px_2px_rgba(0,0,0,0.1)] rounded-xl flex hover:shadow-xl">
                    <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center">
                        <div>
                            <p class="text-left text-gray-500 pt-3 pb-3 pr-3 ml-4 mt-6 mb-6 text-m font-semibold">
                                Status Booking
                            </p>
                        </div>
                        <div class="mr-4">
                            <img width="45" height="45" src="https://img.icons8.com/ios-filled/50/737373/book.png" alt="book"/>
                        </div>
                    </div>
                </div>
            </a>
            <!-- Kontak -->
            <a href="kontakRuangan" class="block transform transition-transform duration-300 hover:scale-105 group">
                <div class="bg-white-300 shadow-[0_0_12px_2px_rgba(0,0,0,0.1)] rounded-xl flex hover:shadow-xl">
                    <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center">
                        <div>
                            <p class="text-left text-gray-500 pt-3 pb-3 pr-3 ml-4 mt-6 mb-6 text-m font-semibold">
                                Hubungi Kami
                            </p>
                        </div>
                        <div class="mr-4">
                            <img width="44" height="44" src="https://img.icons8.com/ios-filled/50/737373/phone.png" alt="phone"/>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Ruangan Terfavorit -->
    <div class="flex justify-center pt-10">
        <h2 class="font-bold text-2xl">Ruangan Terfavorit</h2>
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