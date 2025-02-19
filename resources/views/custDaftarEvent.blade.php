<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event</title>
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
        <div class="relative h-52 md:h-40 overflow-hidden">
            <!-- Gambar dengan teks -->
            <div class="hidden" data-carousel-item>
                <img 
                    src="assets/tenant.png" 
                    class="absolute w-full h-full object-cover" 
                    alt="Cover Image"
                />
                <!-- Teks di tengah gambar -->
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
                    <h2 class="text-white text-4xl md:text-4xl font-bold drop-shadow-lg">
                        Event Kami
                    </h2>
                    <!-- Breadcrumb -->
                    <nav class="mt-4 flex justify-center" aria-label="Breadcrumb">
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
                            <li>
                                <a href="homePengelolaanTenant" class="inline-flex items-center text-sm font-medium text-white hover:font-bold">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    Pemesanan Tenant
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="ms-1 text-sm font-medium text-white md:ms-2">Daftar Event</span>
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
            <!-- Cari Event -->
            <form id="searchForm" class=" w-full mx-auto">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Cari Event</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="search-inputs" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Event" required />
                    {{-- <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-4 py-2">Cari</button> --}}
                </div>
            </form>

            <!-- Daftar Event -->
            <div id="event-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 w-full mt-8">
                @foreach ($events as $evt)
                    @if ($now->diffInDay($evt->tglMulai) > 1)
                    <!-- Card Item -->
                    <div class="col-span-1 events-card" data-namaEvent="{{ $evt->namaEvent }}">
                        <div class="bg-white border border-gray-200 rounded-lg shadow-[0_0_13px_3px_rgba(0,0,0,0.2)]">
                            <!-- Gambar -->
                            <div>
                                <img class="rounded-t-lg w-full h-48 object-cover" src="{{ $evt->foto_urls[0] }}" alt="ruangan" />
                            </div>
                            <!-- Nama Event -->
                            <div class="p-5">
                                <a href="">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ $evt->namaEvent }}</h5>
                                </a>
                                <!-- Deskripsi -->
                                <p class="mb-3 text-sm text-gray-700">{{ $evt->deskripsi }}</p>
                                <!-- Button Detail -->
                                <button 
                                data-modal-target="modal-detailEvent" 
                                data-modal-toggle="modal-detailEvent"
                                data-barang="{{ $evt->nBarang }}"
                                data-jasa="{{ $evt->nJasa }}"
                                data-makanan="{{ $evt->nMakanan }}"
                                data-foto-url="{{ $evt->foto_urls[0] }}"
                                data-thumbnails="{{ json_encode($evt->foto_urls) }}" 
                                class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Lihat Detail
                                </button>
                                <!-- Button Booking -->
                                <a href="{{ route('custBookingTenant', [
                                    'namaEvent' => $evt->namaEvent,
                                ]) }}" 
                                class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                    Booking
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach 
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
                                    <label class="block text-sm font-medium text-gray-700">Jumlah Tenant Makanan</label>
                                    <input id="tenant-makanan" type="number" class="mt-1 block w-full rounded-md pointer-events-none border-gray-300 shadow-sm sm:text-sm" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Jumlah Tenant Barang</label>
                                    <input id="tenant-barang" type="number" class="mt-1 block w-full rounded-md pointer-events-none border-gray-300 shadow-sm sm:text-sm" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Jumlah Tenant Jasa</label>
                                    <input id="tenant-jasa" type="number" class="mt-1 block w-full rounded-md pointer-events-none border-gray-300 shadow-sm sm:text-sm" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <!-- Button Booking -->
                    <a href="{{ route('custBookingTenant', [
                        'namaEvent' => $evt->namaEvent,
                    ]) }}" 
                    class="inline-flex items-center px-4 py-2 mr-2 text-sm font-medium rounded-lg bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                        Booking
                    </a>
                    <!-- Button Tutup -->
                    <button data-modal-hide="modal-detailEvent" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Tutup</button>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Script Search -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("search-inputs"); 
            const eventCards = document.querySelectorAll(".events-card"); 

            searchInput.addEventListener("input", function() {
                const searchQuery = searchInput.value.toLowerCase(); 
                
                eventCards.forEach(function(card) {
                    const nama = card.getAttribute("data-namaEvent").toLowerCase(); 

                    if (nama.includes(searchQuery)) {
                        card.style.display = 'block'; 
                    } else {
                        card.style.display = 'none'; 
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>