<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <title>Riwayat Booking Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    
    <style>
        #default-table {
            width: 100%;
            border-collapse: collapse; /* Mengurangi jarak antar border */
        }
        #default-table th, #default-table td {
            padding: 8px 9px; /* Mengurangi padding antar sel */
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

<body class="bg-white">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebarAdminRuangan')

        <!-- Content -->
        <div class="flex-grow">

            <!-- Navbar -->
            @include('components.navbarAdminRuangan')

            <!-- Main Content -->
            <div class="px-8 pt-8 pb-8 flex justify-center items-center">
                <div class="max-w-full w-full">
                    <!-- Judul Page -->
                    <div class="flex justify-center text-center pb-6">
                        <h1 class="font-bold text-2xl">Riwayat Booking Ruangan</h1>
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
                                placeholder="Cari ID Booking, Nama Pemohon atau Nama Ruangan" 
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
                                        Ruangan
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
                                        Status
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        @if (!empty($bookings))
                            <tbody>
                                @foreach ($bookings as $index => $booking)
                                    <tr class="booking-list" data-bookingid="{{ $booking->id }}" data-bookingidCustomer="{{ $booking->idCustomer }}" data-bookingnamaPemohon="{{ $booking->namaPemohon }}" data-bookingnamaRuangan="{{ $booking->namaRuangan }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->namaPemohon }}</td>
                                        <td>{{ $booking->noWa }}</td>
                                        <td>{{ $booking->namaRuangan }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->tglMulai)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->tglSelesai)->format('d/m/Y') }}</td>
                                        <!-- Bukti Bayar -->
                                        <td class="flex justify-center items-center text-center">
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
                                        <td class="mb-4 items-center text-center mt-5"> 
                                            <div class="flex justify-center ">
                                                <button 
                                                    data-modal-target="detail-booking" 
                                                    data-modal-toggle="detail-booking"
                                                    data-bookingkeperluan="{{ $booking->keperluan }}" 
                                                    data-bookingketerangan="{{ $booking->keterangan }}" 
                                                    type="button" 
                                                    class="block px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                    Detail
                                                </button>
                                            </div>
                                        </td>

                                        <td>
                                            @if ($booking->status == 'Disetujui')
                                                <div class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 text-white">
                                                    Disetujui
                                                </div>
                                            @elseif ($booking->status == 'Ditolak')
                                                <div data-popover-target="pop-alasan-{{ $booking->id }}" data-popover-placement="left" class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 text-white">
                                                    Ditolak dan Alasannya
                                                </div>
                                            @elseif ($booking->status == 'Expired')
                                                <div class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-slate-500 via-slate-600 to-slate-700 text-white">
                                                    Expired
                                                </div>
                                            @elseif ($booking->status == 'Dibatalkan')
                                                <div class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-amber-700 via-amber-800 to-amber-900 text-white">
                                                    Dibatalkan
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    <!-- Popover alasan ditolak -->
                                    @if ($booking->status == 'Ditolak')
                                        <div data-popover id="pop-alasan-{{ $booking->id }}" role="tooltip" class="absolute z-10 invisible inline-block w-80 max-w-3xl text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xl opacity-0">
                                            <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                                                <h3 class="font-semibold text-gray-900">Alasan Penolakan</h3>
                                            </div>
                                            <div class="px-3 py-2">
                                                <textarea id="keperluan-acara" rows="3" class="mt-1 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm text-gray-500 p-3" readonly>{{ isset($booking) && !empty($booking->alasanPenolakan) ? $booking->alasanPenolakan : 'Tidak ada alasan penolakan.' }}</textarea>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    @endif
                                @endforeach    
                            </tbody>
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
                        <label for="keterangan" class="block text-sm font-medium text-gray-900 mb-2">Keterangan Acara</label>
                        <input type="text" id="keterangan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 sm:text-sm" value="{{ $booking->keterangan ?? '' }}" readonly>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="detail-booking" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

<!-- Table -->
<script>
    if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#default-table", {
            searchable: false,
            perPage: -1, // Menampilkan semua baris
            perPageSelect: false
        });
    }
</script>


<!-- Search -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("search-input"); 
        const ruanganList = document.querySelectorAll(".booking-list"); 

        searchInput.addEventListener("input", function() {
            const searchQuery = searchInput.value.toLowerCase(); 
            
            ruanganList.forEach(function(card) {
                const bookingId = card.getAttribute("data-bookingid").toLowerCase();
                // const idCustomer = card.getAttribute("data-bookingidCustomer").toLowerCase(); 
                const namaPemohon = card.getAttribute("data-bookingnamaPemohon").toLowerCase();
                const namaRuangan = card.getAttribute("data-bookingnamaRuangan").toLowerCase();  

                if (bookingId.includes(searchQuery) || namaPemohon.includes(searchQuery) || namaRuangan.includes(searchQuery)) {
                    card.style.display = 'table-row'; 
                } else {
                    card.style.display = 'none'; 
                }
            });
        });
    });
</script>

<!-- Script Info Detail -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const detailButtons = document.querySelectorAll("[data-modal-target='detail-booking']");

        detailButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Ambil data dari tombol yang diklik
                const keperluan = this.getAttribute("data-bookingkeperluan");
                const keterangan = this.getAttribute("data-bookingketerangan");

                // Temukan elemen input dalam modal dan isi dengan data yang sesuai
                document.querySelector("#detail-booking #keperluan").value = keperluan || "Tidak tersedia";
                document.querySelector("#detail-booking #keterangan").value = keterangan || "Tidak tersedia";
            });
        });
    });
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