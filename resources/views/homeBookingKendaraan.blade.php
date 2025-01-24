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
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
                    <h2 class="text-white text-4xl md:text-5xl font-bold drop-shadow-lg">
                        Kendaraan Kami
                    </h2>
                    <!-- Breadcrumb -->
                    <nav class="mt-4 flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="/" class="inline-flex items-center text-sm font-medium text-white hover:font-bold group">
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
                                    <span class="ms-1 text-sm font-medium text-white md:ms-2">Booking Kendaraan</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Booking Kendaraan -->
    <div class="w-full">
        <div class="flex justify-center mt-12 shadow-[0_0_13px_3px_rgba(0,0,0,0.1)] p-8 space-x-8 ">
            <!-- Daftar Kendaraan -->
            <a href="custDaftarKendaraan" class="block transform transition-transform duration-300 hover:scale-105 group">
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
            <a href="custStatusBookingKendaraan" class="block transform transition-transform duration-300 hover:scale-105 group">
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
            <a href="kontakKendaraan" class="block transform transition-transform duration-300 hover:scale-105 group">
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
        <h2 class="font-bold text-2xl">Galeri Kendaraan</h2>
    </div>
    <div class="container swiper flex justify-center items-center pb-6">
        <div class="card-wrapper">
            <ul class="card-list swiper-wrapper">
            @foreach ($kendaraan as $kendara)
                <li class="card-item swiper-slide">
                    <div href="" class="card-link">
                        <img src="{{ $kendara->foto_urls[0] }}" alt="Kendaraan" class="card-image">
                        <h2 class="font-bold pt-2 pb-2 ">{{ $kendara->nama }}</h2>
                        <p class="card-title">{{ $kendara->deskripsi }}</p>
                        <button
                        data-modal-target="modal-detailKendaraan" data-modal-toggle="modal-detailKendaraan"
                        data-tv="{{ $kendara->tv }}" 
                        data-sound="{{ $kendara->sound }}" 
                        data-ac="{{ $kendara->ac }}" 
                        data-foto-url="{{ $kendara->foto_urls[0] }}"
                        data-thumbnails="{{ json_encode($kendara->foto_urls) }}"
                        href="#" class="inline-flex items-center mt-2 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-xl hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Lihat detail
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                    </div>
                </li>
            @endforeach
            </ul>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <div id="modal-detailKendaraan" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900">
                        Detail Kendaraan
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Kolom Kiri: Foto -->
                        <div class="space-y-4">
                            <!-- Foto Utama -->
                            <div>
                                <h2 class="font-semibold mb-3 text-lg">Foto Kendaraan</h2>
                                <img id="main-image-kendaraan" class="h-auto max-w-full rounded-lg" src="" alt="Foto Kendaraan">
                            </div>
                            <!-- Foto di bawah -->
                            <div class="grid grid-cols-3 md:grid-cols-5 gap-2 md:gap-4" id="image-thumbnails-kendaraan">
                                <!-- Thumbnails akan diubah dengan gambar dinamis -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="modal-detailKendaraan" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pembatas -->
    <div class="pb-24">

    </div>

    <!-- Hubungi Kami -->

    <!-- Script Swiper JS-->
    <script>
        const swiper = new Swiper('.card-wrapper', {
            loop: false,
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
                    slidesPerView: 2
                },
            }
        });
    </script>

    <script>
        // Menambahkan event listener untuk tombol yang membuka modal
        document.querySelectorAll('[data-modal-target="modal-detailKendaraan"]').forEach(button => {
            button.addEventListener('click', function () {
                const fotoUrl = this.getAttribute('data-foto-url');
                const thumbnails = JSON.parse(this.getAttribute('data-thumbnails'));

                // Menampilkan foto utama di modal
                const mainImage = document.getElementById('main-image-kendaraan');
                mainImage.src = fotoUrl;

                // Kosongkan dulu thumbnail sebelumnya
                const imageThumbnails = document.getElementById('image-thumbnails-kendaraan');
                imageThumbnails.innerHTML = '';

                // Loop untuk menampilkan thumbnail gambar-gambar kecil
                thumbnails.forEach(url => {
                    const thumbnailElement = document.createElement('div');
                    thumbnailElement.innerHTML = `
                        <img onclick="swapImageKendaraan(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="${url}" alt="Thumbnail">
                    `;
                    imageThumbnails.appendChild(thumbnailElement);
                });

                // Menampilkan modal
                document.getElementById('modal-detailKendaraan').classList.remove('hidden');
            });
        });

        // Fungsi untuk mengganti gambar utama saat thumbnail diklik
        function swapImageKendaraan(element) {
            const mainImage = document.getElementById('main-image-kendaraan');
            mainImage.src = element.src;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>