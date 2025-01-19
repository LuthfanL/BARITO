<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ruangan</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="assets/style.css"/>
    
</head>

<body class="h-full bg-white">
    <!-- Navbar -->
    <div class="relative z-30">
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
                    <nav class="mt-4 flex justify-center" aria-label="Breadcrumb">
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
                            <li>
                                <a href="homeBookingRuangan" class="inline-flex items-center text-sm font-medium text-white hover:font-bold">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    Booking Ruangan
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="ms-1 text-sm font-medium text-white md:ms-2">Daftar Ruangan</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="px-24 pt-8 pb-8 flex justify-center items-center">
        <div class="max-w-full w-full">
            <!-- Cari Ruangan -->
            <form class=" w-full mx-auto">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Cari Ruangan</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Ruangan" required />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-4 py-2">Cari</button>
                </div>
            </form>

            <!-- Daftar Ruangan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 w-full mt-8">
                {{-- @foreach ($rooms as $room) --}}
                    <!-- Card Item -->
                    <div class="col-span-1">
                        <div class="bg-white border border-gray-200 rounded-lg shadow-[0_0_13px_3px_rgba(0,0,0,0.2)]">
                            <!-- Gambar -->
                            <div>
                                <img class="rounded-t-lg w-full h-48 object-cover" src="assets/test.jpeg" alt="ruangan" />
                            </div>
                            <!-- Nama Ruangan -->
                            <div class="p-5">
                                <a href="">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Ruangan Lokakrida</h5>
                                </a>
                                <!-- Deskripsi -->
                                <p class="mb-3 text-sm text-gray-700">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
                                <!-- Button Detail -->
                                <button data-modal-target="modal-detail" data-modal-toggle="modal-detail" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Lihat Detail
                                </button>
                                <!-- Button Booking -->
                                <a href="" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Booking
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="bg-white border border-gray-200 rounded-lg shadow-[0_0_13px_3px_rgba(0,0,0,0.2)]">
                            <!-- Gambar -->
                            <div>
                                <img class="rounded-t-lg w-full h-48 object-cover" src="assets/test.jpeg" alt="ruangan" />
                            </div>
                            <!-- Nama Ruangan -->
                            <div class="p-5">
                                <a href="">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Ruangan Lokakrida</h5>
                                </a>
                                <!-- Deskripsi -->
                                <p class="mb-3 text-sm text-gray-700">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
                                <!-- Button Detail -->
                                <button data-modal-target="modal-detail" data-modal-toggle="modal-detail"  class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Lihat Detail
                                </button>
                                <!-- Button Booking -->
                                <a href="" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Booking
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="bg-white border border-gray-200 rounded-lg shadow-[0_0_13px_3px_rgba(0,0,0,0.2)]">
                            <!-- Gambar -->
                            <div>
                                <img class="rounded-t-lg w-full h-48 object-cover" src="assets/test.jpeg" alt="ruangan" />
                            </div>
                            <!-- Nama Ruangan -->
                            <div class="p-5">
                                <a href="">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Ruangan Lokakrida</h5>
                                </a>
                                <!-- Deskripsi -->
                                <p class="mb-3 text-sm text-gray-700">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
                                <!-- Button Detail -->
                                <button data-modal-target="modal-detail" data-modal-toggle="modal-detail"  class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Lihat Detail
                                </button>
                                <!-- Button Booking -->
                                <a href="" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Booking
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="bg-white border border-gray-200 rounded-lg shadow-[0_0_13px_3px_rgba(0,0,0,0.2)]">
                            <!-- Gambar -->
                            <div>
                                <img class="rounded-t-lg w-full h-48 object-cover" src="assets/test.jpeg" alt="ruangan" />
                            </div>
                            <!-- Nama Ruangan -->
                            <div class="p-5">
                                <a href="">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Ruangan Lokakrida</h5>
                                </a>
                                <!-- Deskripsi -->
                                <p class="mb-3 text-sm text-gray-700">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
                                <!-- Button Detail -->
                                <button data-modal-target="modal-detail" data-modal-toggle="modal-detail"  class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Lihat Detail
                                </button>
                                <!-- Button Booking -->
                                <a href="" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Booking
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="bg-white border border-gray-200 rounded-lg shadow-[0_0_13px_3px_rgba(0,0,0,0.2)]">
                            <!-- Gambar -->
                            <div>
                                <img class="rounded-t-lg w-full h-48 object-cover" src="assets/test.jpeg" alt="ruangan" />
                            </div>
                            <!-- Nama Ruangan -->
                            <div class="p-5">
                                <a href="">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Ruangan Lokakrida</h5>
                                </a>
                                <!-- Deskripsi -->
                                <p class="mb-3 text-sm text-gray-700">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
                                <!-- Button Detail -->
                                <button data-modal-target="modal-detail" data-modal-toggle="modal-detail"  class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Lihat Detail
                                </button>
                                <!-- Button Booking -->
                                <a href="" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Booking
                                </a>
                            </div>
                        </div>
                    </div>
                {{-- @endforeach --}}
            </div>            
        </div>
    </div>

    <!-- Modal Lihat Detail -->
    <div id="modal-detail" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900">
                        Detail Ruangan
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Kolom Kiri: Foto -->
                        <div class="space-y-4">
                            <!-- Foto Utama -->
                            <div>
                                <h2 class="font-semibold mb-3 text-lg">Foto Ruangan</h2>
                                <img id="main-image" class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="">
                            </div>
                            <!-- Foto di bawah -->
                            <div class="grid grid-cols-3 md:grid-cols-5 gap-2 md:gap-4">
                                <div>
                                    <img onclick="swapImage(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                                </div>
                                <div>
                                    <img onclick="swapImage(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                                </div>
                                <div>
                                    <img onclick="swapImage(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
                                </div>
                                <div>
                                    <img onclick="swapImage(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
                                </div>
                                <div>
                                    <img onclick="swapImage(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan: Fasilitas -->
                        <div class="space-y-4">
                            <h2 class="font-semibold text-lg">Fasilitas</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="podium" class="block text-sm font-medium text-gray-700">Podium</label>
                                    <input type="number" id="podium" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="2" readonly>
                                </div>
                                <div>
                                    <label for="sound" class="block text-sm font-medium text-gray-700">Sound</label>
                                    <input type="number" id="sound" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="8" readonly>
                                </div>
                                <div>
                                    <label for="meja" class="block text-sm font-medium text-gray-700">Meja</label>
                                    <input type="number" id="meja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="50" readonly>
                                </div>
                                <div>
                                    <label for="ac" class="block text-sm font-medium text-gray-700">AC</label>
                                    <input type="number" id="ac" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="8" readonly>
                                </div>
                                <div>
                                    <label for="kursi" class="block text-sm font-medium text-gray-700">Kursi</label>
                                    <input type="number" id="kursi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="100" readonly>
                                </div>
                                <div>
                                    <label for="proyektor" class="block text-sm font-medium text-gray-700">Proyektor</label>
                                    <input type="number" id="proyektor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="6" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="modal-detail" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Swap Image -->
    <script>
        function swapImage(element) {
            const mainImage = document.getElementById('main-image');
            mainImage.src = element.src;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>