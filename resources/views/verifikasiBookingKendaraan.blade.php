<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <title>Verifikasi Booking Kendaraan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        #default-table {
            width: 100%;
            border-collapse: collapse; /* Mengurangi jarak antar border */
        }
        #default-table th, #default-table td {
            padding: 8px 8px; /* Mengurangi padding antar sel */
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
        /* Mengubah warna teks dan latar belakang tombol */
        .swal2-confirm.custom-confirm-button {
            background-color: #808080 !important; /* Warna abu-abu */
            color: white !important; 
            border: none;
        }

        /* Efek hover untuk tombol konfirmasi */
        .swal2-confirm.custom-confirm-button:hover {
            background-color: #A9A9A9 !important; /* Warna abu-abu lebih gelap */
        }

        /* Efek fokus untuk tombol konfirmasi */
        .swal2-confirm.custom-confirm-button:focus {
            outline: none !important; 
            box-shadow: none !important;
        }
    </style>
</head>

<body class="bg-white">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebarAdminKendaraan')

        <!-- Content -->
        <div class="flex-grow">

            <!-- Navbar -->
            @include('components.navbarAdminKendaraan')

            <!-- Main Content -->
            <div class="px-8 pt-8 pb-8 flex justify-center items-center">
                <div class="max-w-full w-full">
                    <!-- Judul Page -->
                    <div class="flex justify-center text-center pb-6">
                        <h1 class="font-bold text-2xl">Verifikasi Booking Kendaraan</h1>
                    </div>

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
                                placeholder="Cari ID Booking, Nama Kendaraan atau Nama Pemohon" 
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
                                        Nama Pemohon
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        No. Whatapps
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Nama Kendaraan
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th data-type="date" data-format="DD/MM/YYYY">
                                    <span class="flex items-center">
                                        Tgl Pinjam
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th data-type="date" data-format="DD/MM/YYYY">
                                    <span class="flex items-center">
                                        Tgl Selesai
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Bukti Pembayaran
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center justify-center">
                                        Info Lain
                                    </span>
                                </th>
                                {{-- <th>
                                    <span class="flex items-center justify-center">
                                        Pembatalan
                                    </span>
                                </th> --}}
                                <th>
                                    <span class="flex items-center">
                                        Tindakan
                                    </span>
                                </th>
                            </tr>
                        </thead>

                        @if (!empty($bookings))
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr class="booking-list @if($booking->status == 'Disetujui') bg-green-100 @elseif($booking->status == 'Ditolak') bg-red-100 @endif" data-bookingid="{{ $booking->id }}" data-bookingidCustomer="{{ $booking->idCustomer }}" data-bookingnamaPemohon="{{ $booking->namaPemohon }}" data-bookingnamaKendaraan="{{ $booking->namaKendaraan }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->namaPemohon }}</td>
                                        <td>{{ $booking->noWa }}</td>
                                        <td>{{ $booking->namaKendaraan }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->tglMulai)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->tglSelesai)->format('d/m/Y') }}</td>
                                        <!-- Bukti Bayar -->
                                        <td class="flex justify-center items-center text-center mt-5">
                                            @if($booking->buktiBayar)
                                                <button onclick="showBukti('{{ asset($booking->buktiBayar) }}')" 
                                                    class="px-3 py-1 bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white rounded-lg">
                                                    Lihat Bukti
                                                </button>
                                            @else
                                                <span class="text-red-500">Belum diupload</span>
                                            @endif
                                        </td>            
                                        <!-- Info Lain -->
                                        <td class=" items-center text-center mt-5"> 
                                            <div class="flex justify-center">
                                                <button 
                                                    data-modal-target="detail-booking" 
                                                    data-modal-toggle="detail-booking"
                                                    data-bookingkeperluan="{{ $booking->keperluan }}" 
                                                    data-bookinglokasi="{{ $booking->lokasi }}" 
                                                    data-bookingtitikJemput="{{ $booking->titikJemput }}" 
                                                    type="button" 
                                                    class="block px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                    Detail
                                                </button>
                                            </div>
                                        </td>

                                        {{-- <!-- Alasan Pembatalan -->
                                        <td class=" items-center text-center mt-5"> 
                                            <div class="flex justify-center ">
                                                <button 
                                                    data-modal-target="detail-batal" 
                                                    data-modal-toggle="detail-batal" 
                                                    type="button" 
                                                    class="block px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-700 via-red-800 to-red-900 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                    Alasan
                                                </button>
                                            </div>
                                        </td> --}}

                                        <!-- Tindakan -->
                                        <td class="text-center">
                                            <div class="flex flex-col gap-2">
                                                <?php if ($booking->status == "Disetujui") : ?>
                                                    <button disabled class="px-3 py-1 rounded-lg font-medium bg-gray-400 text-white cursor-not-allowed">Setujui</button>
                                                <?php else : ?>
                                                    <button data-modal-target="modal-setujui" data-modal-toggle="modal-setujui" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Setujui</button>
                                                <?php endif; ?>

                                                <?php if ($booking->status == "Ditolak") : ?>
                                                    <button disabled class="px-3 py-1 rounded-lg font-medium bg-gray-400 text-white cursor-not-allowed">Tolak</button>
                                                <?php else : ?>
                                                    <button data-modal-target="modal-tolak" data-modal-toggle="modal-tolak" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Tolak</button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach    
                            </tbody>
                        @else
                        <!-- Tampilkan baris ini jika tidak ada data -->
                            <tr>
                                <td colspan="12" class="text-center py-3 text-gray-500">
                                    Tidak ada data yang tersedia.
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bukti Bayar -->
    <div id="detail-bayar" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" 
        class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-screen bg-gray-900 bg-opacity-50">
        
        <div class="relative p-6 w-full max-w-xl bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between border-b pb-4">
                <h3 class="text-lg font-semibold text-gray-900">
                    Bukti Pembayaran
                </h3>
            </div>

            <!-- Modal Body -->
            <div class="p-4 space-y-4">
                <div class="flex justify-center">
                    <img id="buktiBayarImg" class="h-96 max-w-xl rounded-lg" src="" alt="Bukti Bayar">
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end space-x-2 border-t pt-4">
                <a id="downloadBukti" href="#" class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300" download>
                    Unduh
                </a>
                <button onclick="closeModal()" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    Kembali
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Info Lain -->
    <div id="detail-booking" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Detail Booking
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-6">
                    <div>
                        <label for="keperluan" class="block text-sm font-medium text-gray-900 mb-2">Keperluan Acara</label>
                        <input type="text" id="keperluan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 sm:text-sm" value="{{ $booking->keperluan ?? '' }}" readonly>
                    </div>
                    <div>
                        <label for="lokasi" class="block text-sm font-medium text-gray-900 mb-2">Lokasi Acara</label>
                        <input type="text" id="lokasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 sm:text-sm" value="{{ $booking->lokasi ?? '' }}" readonly>
                    </div>
                    <div>
                        <label for="titikJemput" class="block text-sm font-medium text-gray-900 mb-2">Titik Jemput</label>
                        <input type="text" id="titikJemput" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 sm:text-sm" value="{{ $booking->titikJemput ?? '' }}" readonly>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="detail-booking" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Setujui -->
    <div id="modal-setujui" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h1 class="mb-5 text-lg font-bold text-gray-900">Konfirmasi Persetujuan Booking</h1>
                    <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin menyetujui booking kendaraan ini? Pastikan semua detail booking telah sesuai sebelum melanjutkan.</p>

                    @if (isset($booking))
                        <form action="{{ route('update.status') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $booking->id }}"> <!-- Kirim ID booking -->
                            <input type="hidden" name="status" value="Disetujui"> <!-- Kirim status -->
                            <button 
                                type="submit"
                                class="btn-setujui px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                Setujui
                            </button>
                            <button 
                                data-modal-hide="modal-setujui" 
                                type="button" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                Kembali
                            </button>
                        </form>
                    @else
                        <p class="text-red-500">Data booking tidak ditemukan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tolak -->
    <div id="modal-tolak" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h1 class="mb-5 text-lg font-bold text-gray-900">Konfirmasi Penolakan Booking</h1>
                    <p class="mb-2 ml-2 mr-2 text-m font-normal text-gray-500">Apakah Anda yakin ingin menolak booking kendaraan ini? Berikan alasan penolakan yang nantinya akan diberitahukan ke customer.</p>
                    @if (isset($booking))
                        <form action="{{ route('update.status') }}" method="POST">
                        @csrf
                            <div class="p-4 md:p-5 space-y-6">
                                <div>
                                    <input type="text" id="alasanPenolakan" name="alasanPenolakan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm text-gray-500 p-3" placeholder="Berikan alasan penolakan booking ini." require oninput="toggleTolakButton()"></input>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $booking->id }}"> <!-- Kirim ID booking -->
                            <input type="hidden" name="status" value="Ditolak"> <!-- Kirim status -->
                            <button 
                                type="submit"
                                id="btnTolak"
                                class="btn-tolak px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                Tolak
                            </button>
                            <button 
                                data-modal-hide="modal-tolak" 
                                type="button" 
                                class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                Kembali
                            </button>
                        </form>
                    @else
                        <p class="text-red-500">Data booking tidak ditemukan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Modal Alasan Pembatalan -->
    <div id="detail-batal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Booking Dibatalkan Customer
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-6">
                    <div>
                        <label for="keperluan-acara" class="block text-sm font-medium text-gray-900 mb-2">Alasan Pembatalan</label>
                        <textarea id="keperluan-acara" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm text-gray-500 p-3" readonly>Ada rencana lain</textarea>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="detail-batal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Kembali</button>
                </div>
            </div>
        </div>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

<!-- Script agar button tolak tidak dapat diklik sebelum diisi alasan penolakannya -->
<script>
    function toggleTolakButton() {
        const textarea = document.getElementById('alasanPenolakan');
        const btnTolak = document.getElementById('btnTolak');
        btnTolak.disabled = textarea.value.trim() === '';
    }
</script>

<!-- Table -->
<script>
    if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#default-table", {
            searchable: false,
            perPageSelect: false
        });
    }
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
                // const idCustomer = card.getAttribute("data-bookingidCustomer"); 
                const namaPemohon = card.getAttribute("data-bookingnamaPemohon").toLowerCase();
                const namaKendaraan = card.getAttribute("data-bookingnamaKendaraan").toLowerCase();  

                if (bookingId.includes(searchQuery)  || namaPemohon.includes(searchQuery) || namaKendaraan.includes(searchQuery)) {
                    card.style.display = 'table-row'; 
                } else {
                    card.style.display = 'none'; 
                }
            });
        });
    });
</script>

{{-- Scipt untuk mengambil data fasilitas  --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua tombol yang membuka modal fasilitas
        const detailButtons = document.querySelectorAll("[data-modal-target='detail-booking']");

        detailButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Ambil data dari tombol yang diklik
                const keperluan = this.getAttribute("data-bookingkeperluan");
                const lokasi = this.getAttribute("data-bookinglokasi");
                const titikJemput = this.getAttribute("data-bookingtitikJemput");

                // Temukan elemen input dalam modal dan isi dengan data yang sesuai
                document.querySelector("#detail-booking #keperluan").value = keperluan || "Tidak tersedia";
                document.querySelector("#detail-booking #lokasi").value = lokasi || "Tidak tersedia";
                document.querySelector("#detail-booking #titikJemput").value = titikJemput || "Tidak tersedia";
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Untuk tombol "Setujui"
        document.querySelectorAll('[data-modal-target="modal-setujui"]').forEach(button => {
            button.addEventListener('click', function () {
                const bookingId = this.closest('tr').dataset.bookingid; // Ambil ID booking dari data attribute
                const form = document.querySelector('#modal-setujui form'); // Form di dalam modal "Setujui"

                form.querySelector('input[name="id"]').value = bookingId; // Isi ID booking ke input hidden
            });
        });

        // Untuk tombol "Tolak"
        document.querySelectorAll('[data-modal-target="modal-tolak"]').forEach(button => {
            button.addEventListener('click', function () {
                const bookingId = this.closest('tr').dataset.bookingid; // Ambil ID booking dari data attribute
                const form = document.querySelector('#modal-tolak form'); // Form di dalam modal "Tolak"

                form.querySelector('input[name="id"]').value = bookingId; // Isi ID booking ke input hidden
            });
        });
    });
</script>   

<!-- Script Alert -->
<script>
    // Notifikasi jika berhasil
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timerProgressBar: true,
            timer: 3000 // Durasi 3 detik
        });
    @endif
    
        // Notifikasi jika ada error
        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                html: `
                    <ul style="text-align: left;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                confirmButtonText: 'Tutup',
                customClass: {
                    confirmButton: 'custom-confirm-button'
                }
            });
        @endif
</script>

<!-- Script Bukti Bayar -->
<script>
    function showBukti(url) {
        document.getElementById('buktiBayarImg').src = url;
        document.getElementById('downloadBukti').href = url;
        document.getElementById('detail-bayar').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('detail-bayar').classList.add('hidden');
    }
</script>

</html>