<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Booking Tenant</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <link rel="stylesheet" href="assets/style.css"/>
    
    <style>
        #default-table {
            width: 100%;
            border-collapse: collapse; /* Mengurangi jarak antar border */
        }
        #default-table th, #default-table td {
            padding: 8px 10px; /* Mengurangi padding antar sel */
            text-align: center;
            white-space: nowrap; /* Membatasi teks agar tidak wrap */
        }
        #default-table th {
            max-width: 150px; /* Membatasi lebar maksimal header kolom */
        }
        #default-table td {
            max-width: 200px; /* Membatasi lebar maksimal sel data */
            overflow: hidden; /* Menyembunyikan teks yang terlalu panjang */
            text-overflow: ellipsis; /* Menambahkan elipsis untuk teks yang terlalu panjang */
        }
    </style>

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
                    src="assets/tenant.png" 
                    class="absolute w-full h-full object-cover" 
                    alt="Cover Image"
                />
                <!-- Teks di tengah gambar -->
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
                    <h2 class="text-white text-4xl md:text-5xl font-bold drop-shadow-lg">
                        Status Booking Tenant
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
                                <span class="ms-1 text-sm font-medium text-white md:ms-2">Status Booking</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="px-8 pt-8 pb-8 flex justify-center items-center">
        <div class="max-w-full w-full">

            <!-- Cari Booking -->
            <form id="searchForm" class="w-full mx-auto">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Cari Booking</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input 
                        type="search" 
                        name="keyword" 
                        id="search-input" 
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Cari ID Booking atau Nama Tenant" 
                    />
                </div>
            </form>
           
            <!-- Table Data -->
            <table id="default-table">
                <thead>
                    <tr>
                        <th>
                            <span class="flex items-center">
                                No
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                ID. Booking
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Event
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Nama Tenant
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Jenis Tenant
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th data-type="date" data-format="DD/MM/YYYY">
                            <span class="flex items-center">
                                Tanggal Pinjam
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th data-type="date" data-format="DD/MM/YYYY">
                            <span class="flex items-center">
                                Tanggal Selesai
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Status
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Tindakan
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <!-- No -->
                        <td>1</td>
                        <!-- ID. Booking -->
                        <td>E12</td>
                        <!-- Event -->
                        <td>Event A</td>
                        <!-- Nama Tenant -->
                        <td>Teh Sosor Mantap</td>
                        <!-- Jenis Tenant -->
                        <td>Makanan</td>
                        <!-- Tanggal Pinjam -->
                        <td class="text-center"> 
                            14/03/2025
                        </td>
                        <!-- Tanggal Selesai -->
                        <td class="text-center">
                            15/03/2025
                        </td>
                        <!-- Status -->
                        <td class="text-center">
                            <div class="flex flex-col gap-2">
                                <div class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 text-white">Menunggu
                                </div>
                            </div>
                        </td>
                        <!-- Tindakan -->
                        <td class="text-center">
                            <div class="flex justify-center gap-2">
                                <button data-modal-target="modal-edit" data-modal-toggle="modal-edit" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Edit</button>
                                <button data-modal-target="modal-batalkan" data-modal-toggle="modal-batalkan" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Batalkan</button>
                            </div>
                        </td>
                    </tr> --}}
                    @if (!empty($bookings))
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr class="booking-list" data-bookingid="{{ $booking->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->namaEvent }}</td>
                                    <td>{{ $booking->namaTenant }}</td>
                                    <td>{{ $booking->tipeTenant }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->tglMulai)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->tglSelesai)->format('d/m/Y') }}</td>

                                    <!-- Status -->                
                                    <td>
                                        @if ($booking->status == 'Disetujui')
                                            <div class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 text-white">
                                                Disetujui
                                            </div>
                                        @elseif ($booking->status == 'Ditolak')
                                            <div class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 text-white">
                                                Ditolak
                                            </div>
                                        @elseif ($booking->status == 'Belum disetujui')
                                            <div class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 text-white">
                                                Belum disetujui
                                            </div>
                                        @endif
                                    </td>

                                    <!-- Tindakan -->
                                    <td class="text-center">
                                        <div class="flex justify-center gap-2">
                                            @if ($booking->status == 'Belum disetujui')
                                                <!-- Tindakan Edit dan Batalkan -->
                                                <button data-modal-target="modal-edit" data-modal-toggle="modal-edit" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                    Edit
                                                </button>
                                                <button data-modal-target="modal-batalkan" data-modal-toggle="modal-batalkan" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                    Batalkan
                                                </button>
                                            @else
                                                <!-- Tindakan Selesai dengan background abu-abu -->
                                                <div class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-gray-300 via-gray-400 to-gray-500 text-white">
                                                    Selesai
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                  
                </tbody>
            </table>
        </div>
    </div>

    {{-- <!-- Modal Edit -->
    <div id="modal-setujui" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h1 class="mb-5 text-lg font-bold text-gray-900">Konfirmasi Persetujuan Booking</h1>
                    <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin menyetujui booking ruangan ini? Pastikan semua detail booking telah sesuai sebelum melanjutkan.</p>
                    <button data-modal-hide="modal-setujui" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                        Setujui
                    </button>
                    <button data-modal-hide="modal-setujui" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Batalkan -->
    <div id="modal-batalkan" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <div class="relative bg-white rounded-lg shadow-lg p-6">
                <div class="text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h1 class="mb-5 text-lg font-bold text-gray-900">Konfirmasi Pembatalan Booking</h1>
                    <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin membatalkan booking tenant ini? Tindakan ini akan dikonfirmasi terlebih dahulu oleh admin.</p>
                    <textarea id="alasan-pembatalan" placeholder="Berikan Alasan Pembatalan" class="w-full h-24 mt-2 p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm"></textarea>
                    <p class="text-red-500 text-left text-xs mt-2">* Harap diperhatikan: Setelah Anda setuju untuk membatalkan booking, uang pembayaran akan dikembalikan sebesar 90% dari total pembayaran.</p>
                    <!-- Checkbox -->
                    <div class="flex items-center mt-4">
                        <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" required>
                        <label for="link-checkbox" class="ms-2 text-sm font-medium text-gray-900">Saya telah membaca dan memahami konsekuensi pembatalan.</label>
                    </div>
                    <!-- Tombol -->
                    <div class="flex justify-center gap-4 mt-6">
                        <!-- Button (disabled until checkbox is checked) -->
                        <button id="submit-btn" data-modal-hide="modal-batalkan" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            Setujui dan Batalkan Booking
                        </button>
                        <button data-modal-hide="modal-batalkan" type="button" class="px-6 py-2 rounded-lg font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br text-white">
                            Kembali
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

<!-- Table -->
<script>
    if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#default-table", {
            searchable: false,
            perPageSelect: true
        });
    }
</script>

<!-- Checkbox Batalkan wajib diklik -->
<script>
    const checkbox = document.getElementById('link-checkbox');
    const submitBtn = document.getElementById('submit-btn');
    const alasanPembatalan = document.getElementById('alasan-pembatalan');

    // Event listener untuk checkbox dan textarea
    function toggleButtonState() {
        submitBtn.disabled = !checkbox.checked || alasanPembatalan.value.trim() === '';
    }

    // Cek ketika checkbox berubah
    checkbox.addEventListener('change', toggleButtonState);

    // Cek ketika textarea diubah
    alasanPembatalan.addEventListener('input', toggleButtonState);
</script>

<!-- Search -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("search-input"); 
        const kendaraanList = document.querySelectorAll(".booking-list"); 

        searchInput.addEventListener("input", function() {
            const searchQuery = searchInput.value.toLowerCase(); 
            
            kendaraanList.forEach(function(card) {
                const bookingId = card.getAttribute("data-bookingid");

                if (bookingId.includes(searchQuery)) {
                    card.style.display = 'table-row'; 
                } else {
                    card.style.display = 'none'; 
                }
            });
        });
    });
</script>

</html>