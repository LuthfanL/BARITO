<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <div class="relative z-30">
        @include('components.navbargeneral')
    </div>

    <!-- Carousel -->
    <div id="default-carousel" class="relative w-full pt-24 m-0 p-0 shadow-xl" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="assets/c1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="assets/c2.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="assets/c3.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="assets/c4.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="assets/c5.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    {{-- @if(session('success'))
        <div class="bg-cyan-400 text-black p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif --}}

    <!-- Galeri Ruangan -->
    <div class="flex justify-center pt-10">
        <h2 class="font-bold text-2xl">Galeri Ruangan</h2>
    </div>
    <div class="container swiper flex justify-center items-center pb-6">
        <div class="card-wrapper">
            <ul class="card-list swiper-wrapper">
                @foreach ($ruangan as $ruang)
                <li class="card-item swiper-slide">
                    <div href="" class="card-link">
                        <img src="{{ $ruang->foto_urls[0] }}" alt="Ruangan" class="card-image">
                        <h2 class="font-bold pt-2 pb-2 ">{{ $ruang->nama }}</h2>
                        <p class="card-title">{{ $ruang->deskripsi }}</p>
                        <button href="#" data-modal-target="modal-detailRuangan" data-modal-toggle="modal-detailRuangan"
                        data-podium="{{ $ruang->podium }}" 
                        data-sound="{{ $ruang->sound }}" 
                        data-ac="{{ $ruang->ac }}" 
                        data-meja="{{ $ruang->meja }}" 
                        data-kursi="{{ $ruang->kursi }}" 
                        data-proyektor="{{ $ruang->proyektor }}"
                        data-foto-url="{{ $ruang->foto_urls[0] }}"
                        data-thumbnails="{{ json_encode($ruang->foto_urls) }}"  
                        class="inline-flex items-center mt-2 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-xl hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
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
    
    <!-- Galeri Kendaraan -->
    <div class="flex justify-center pt-4">
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

    <!-- Galeri Event -->
    <div class="flex justify-center pt-4">
        <h2 class="font-bold text-2xl">Galeri Event</h2>
    </div>
    <div class="container swiper flex justify-center items-center pb-6">
        <div class="card-wrapper">
            <ul class="card-list swiper-wrapper">
                @foreach ($events as $evt)
                <li class="card-item swiper-slide">
                    <div href="" class="card-link">
                        <img src="{{ $evt->foto_urls[0] }}" alt="Event" class="card-image">
                        <h2 class="font-bold pt-2 pb-2 ">{{ $evt->namaEvent }}</h2>
                        <p class="card-title">{{ $evt->deskripsi }}</p>
                        <button 
                        data-modal-target="modal-detailEvent" 
                        data-modal-toggle="modal-detailEvent"
                        data-barang="{{ $evt->nBarang }}"
                        data-jasa="{{ $evt->nJasa }}"
                        data-makanan="{{ $evt->nMakanan }}"
                        data-foto-url="{{ $evt->foto_urls[0] }}"
                        data-thumbnails="{{ json_encode($evt->foto_urls) }}" 
                        class="inline-flex items-center mt-2 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-xl hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
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

    <!-- Pembatas -->
    <div class="pb-24">

    </div>

    <!-- Modal Lihat Detail Ruangan -->
    <div id="modal-detailRuangan" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900">
                        Detail Ruangan
                    </h3>
                </div>
                <div class="p-4 md:p-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Kolom Kiri: Foto -->
                        <div class="space-y-4">
                            <div>
                                <h2 class="font-semibold mb-3 text-lg">Foto Ruangan</h2>
                                <img id="main-image-ruang" class="h-auto max-w-full rounded-lg" src="" alt="Foto Ruangan">
                            </div>
                            <div class="grid grid-cols-3 md:grid-cols-5 gap-2 md:gap-4" id="image-thumbnails-ruangan"></div>
                        </div>

                        <!-- Kolom Kanan: Fasilitas -->
                        <div class="space-y-4">
                            <h2 class="font-semibold text-lg">Fasilitas</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="podium" class="block text-sm font-medium text-gray-700">Podium</label>
                                    <input type="number" id="podium" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" readonly>
                                </div>
                                <div>
                                    <label for="sound" class="block text-sm font-medium text-gray-700">Sound</label>
                                    <input type="number" id="sound" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" readonly>
                                </div>
                                <div>
                                    <label for="meja" class="block text-sm font-medium text-gray-700">Meja</label>
                                    <input type="number" id="meja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" readonly>
                                </div>
                                <div>
                                    <label for="ac" class="block text-sm font-medium text-gray-700">AC</label>
                                    <input type="number" id="ac" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" readonly>
                                </div>
                                <div>
                                    <label for="kursi" class="block text-sm font-medium text-gray-700">Kursi</label>
                                    <input type="number" id="kursi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" readonly>
                                </div>
                                <div>
                                    <label for="proyektor" class="block text-sm font-medium text-gray-700">Proyektor</label>
                                    <input type="number" id="proyektor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="modal-detailRuangan" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Kendaraan -->
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

                        <!-- Kolom Kanan: Fasilitas Kendaraan -->
                        <div class="space-y-4">
                            <h2 class="font-semibold text-lg">Fasilitas Kendaraan</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="ac-kendaraan" class="block text-sm font-medium text-gray-700">AC</label>
                                    <input type="text" id="ac-kendaraan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="" readonly>
                                </div>
                                <div>
                                    <label for="tv-kendaraan" class="block text-sm font-medium text-gray-700">TV</label>
                                    <input type="text" id="tv-kendaraan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="" readonly>
                                </div>
                                <div>
                                    <label for="sound-kendaraan" class="block text-sm font-medium text-gray-700">Sound</label>
                                    <input type="text" id="sound-kendaraan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="" readonly>
                                </div>
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

    <!-- Modal Detail Event -->
    <div id="modal-detailEvent" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900">
                        Detail Event
                    </h3>
                </div>
                <div class="p-4 md:p-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <h2 class="font-semibold mb-3 text-lg">Foto/Poster Event</h2>
                            <img id="main-image-event" class="h-auto max-w-full rounded-lg" src="" alt="Poster Event">
                            <div class="grid grid-cols-3 md:grid-cols-5 gap-2 md:gap-4" id="thumbnails-event"></div>
                        </div>
                        <div class="space-y-4">
                            <h2 class="font-semibold text-lg">Jenis Tenant</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tenant Makanan</label>
                                    <input id="tenant-makanan" type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tenant Barang</label>
                                    <input id="tenant-barang" type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tenant Jasa</label>
                                    <input id="tenant-jasa" type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="modal-detailEvent" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Kembali</button>
                </div>
            </div>
        </div>
    </div>

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
                    slidesPerView: 1.5
                },
            }
        });
    </script>

    <!-- Script Detail Ruangan -->
    <script>
        // Menambahkan event listener untuk tombol yang membuka modal
        document.querySelectorAll('[data-modal-target="modal-detailRuangan"]').forEach(button => {
            button.addEventListener('click', function () {
                const fotoUrl = this.getAttribute('data-foto-url');
                const thumbnails = JSON.parse(this.getAttribute('data-thumbnails'));
        
                const mainImage = document.getElementById('main-image-ruang');
                const imageThumbnails = document.getElementById('image-thumbnails-ruangan');
        
                mainImage.src = fotoUrl || thumbnails[0];
        
                imageThumbnails.innerHTML = '';
                thumbnails.forEach(url => {
                    const thumbnailElement = document.createElement('div');
                    thumbnailElement.innerHTML = `
                        <img onclick="swapImageRuangan(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="${url}" alt="Thumbnail">
                    `;
                    imageThumbnails.appendChild(thumbnailElement);
                });
        
                // Update fasilitas di modal
                document.getElementById('podium').value = this.getAttribute('data-podium') || 'Tidak tersedia';
                document.getElementById('sound').value = this.getAttribute('data-sound') || 'Tidak tersedia';
                document.getElementById('meja').value = this.getAttribute('data-meja') || 'Tidak tersedia';
                document.getElementById('ac').value = this.getAttribute('data-ac') || 'Tidak tersedia';
                document.getElementById('kursi').value = this.getAttribute('data-kursi') || 'Tidak tersedia';
                document.getElementById('proyektor').value = this.getAttribute('data-proyektor') || 'Tidak tersedia';
            });
        });
        
        function swapImageRuangan(element) {
            const mainImage = document.getElementById('main-image-ruang');
            mainImage.src = element.src;
        }
    </script>

    <!-- Script Detail Kendaraan -->
    <script>
        // Menambahkan event listener untuk tombol yang membuka modal
        document.querySelectorAll('[data-modal-target="modal-detailKendaraan"]').forEach(button => {
            button.addEventListener('click', function () {
                // Ambil data dari atribut data-*
                const tv = this.getAttribute('data-tv');
                const sound = this.getAttribute('data-sound');
                const ac = this.getAttribute('data-ac');
                const fotoUrl = this.getAttribute('data-foto-url');
                const thumbnails = JSON.parse(this.getAttribute('data-thumbnails'));

                // Menampilkan data fasilitas kendaraan ke dalam input
                document.getElementById('tv-kendaraan').value = tv || "Tidak Tersedia";
                document.getElementById('sound-kendaraan').value = sound || "Tidak Tersedia";
                document.getElementById('ac-kendaraan').value = ac || "Tidak Tersedia";

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

    <!-- Script Detail Event -->
    <script>
        // Menambahkan event listener untuk tombol yang membuka modal
        document.querySelectorAll('[data-modal-target="modal-detailEvent"]').forEach(button => {
            button.addEventListener('click', function () {
                const fotoUrl = this.getAttribute('data-foto-url');
                const thumbnails = JSON.parse(this.getAttribute('data-thumbnails'));
                const mainImage = document.getElementById('main-image-event');
                const thumbnailContainer = document.getElementById('thumbnails-event');

                mainImage.src = fotoUrl || thumbnails[0];

                thumbnailContainer.innerHTML = '';
                thumbnails.forEach(url => {
                    const thumbnailElement = document.createElement('div');
                    thumbnailElement.innerHTML = `
                        <img onclick="swapImageEvent(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="${url}" alt="Thumbnail">
                    `;
                    thumbnailContainer.appendChild(thumbnailElement);
                });
                const barang = this.getAttribute('data-barang');
                const jasa = this.getAttribute('data-jasa');
                const makanan = this.getAttribute('data-makanan');

                document.getElementById('tenant-barang').value = barang || "Tidak Tersedia";
                document.getElementById('tenant-jasa').value = jasa || "Tidak Tersedia";
                document.getElementById('tenant-makanan').value = makanan || "Tidak Tersedia";
            });
        });

        // Fungsi untuk mengganti gambar utama saat thumbnail diklik
        function swapImageEvent(element) {
            const mainImage = document.getElementById('main-image-event');
            mainImage.src = element.src;
        }
    </script>




    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>