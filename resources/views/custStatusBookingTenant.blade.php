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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        .form-container {
            width: 100%;
            max-width: 1400px; 
            margin: auto; 
            padding: 24px;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-shadow: 0 0 20px 10px rgba(0, 0, 0, 0.1);
            background-color: white; 
        }
    
        .form-inner {
            margin: 8px auto; 
            width: 100%; 
            padding: 24px;
            border-radius: 20px;
            outline: 2px solid #00C6BF;
            background-color: #fff;
        }
    
        form {
            width: 100%; 
        }
    
        label {
            font-size: 14px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
    
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 14px;
        }
    
        textarea {
            resize: vertical;
        }
    
        .fasilitas-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
    
        .fasilitas-container label {
            display: inline-block;
            font-size: 13px;
            font-weight: normal;
        }

        #date-range-picker {
            margin-top: 10px;
        }

        #date-range-picker input[type="text"] {
            transition: all 0.2s ease-in-out;
        }
    
        .info {
            font-size: 12px;
            color: red;
            margin-bottom: 10px;
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

            <!-- Alert Belum Bayar -->
            @foreach ($bookings->where('status', 'Belum bayar') as $booking)
                @foreach ($waktuBuat->where('id', $booking->id) as $wb)
                    @if ($booking->id == $wb->id)
                        @php
                            // Hitung waktu kedaluwarsa (created_at + 1 menit)
                            $expiredTime = \Carbon\Carbon::parse($wb->created_at)->addMinutes(1)->timestamp;
                        @endphp
                    @endif
                @endforeach

                <div id="alert-box-tenant-{{ $booking->id }}" 
                    class="flex items-center p-4 mt-2 text-yellow-800 border-l-4 border-yellow-500 bg-yellow-100 rounded-lg shadow-md" 
                    role="alert"
                    data-expired="{{ $expiredTime }}"
                    
                    <svg class="w-6 h-6 text-yellow-700 flex-shrink-0 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 0 1 2 0v7a1 1 0 0 1-2 0V2Zm1 10a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"/>
                    </svg>

                    <div class="flex-1">
                        <strong>Perhatian!</strong> Anda memiliki pemesanan tenant dengan ID Booking 
                        <span class="font-semibold">{{ $booking->id }}</span>  
                        yang belum dibayar.  
                        Mohon segera selesaikan pembayaran dan unggah bukti pembayaran dalam 
                        <span id="countdown-tenant-{{ $booking->id }}" class="font-semibold text-red-600"></span>.
                    </div>

                    <button onclick="closeAlertTenant({{ $booking->id }})" class="text-yellow-800 hover:text-yellow-600 ml-4 p-2 rounded-full transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9l-3-3a1 1 0 0 1 1.414-1.414L10 6.586l3-3a1 1 0 1 1 1.414 1.414L11.414 8l3 3a1 1 0 0 1-1.414 1.414l-3-3-3 3a1 1 0 0 1-1.414-1.414l3-3Z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            @endforeach


            <script>
              function startCountdownTenant(id, expiredTime, serverNow) {
    let countdownElement = document.getElementById("countdown-tenant-" + id);

    // Sinkronisasi waktu browser dengan waktu server
    let localNow = Math.floor(Date.now() / 1000);
    let offset = localNow - serverNow; // Selisih waktu lokal dan server
    let adjustedExpiredTime = expiredTime + offset; // Sesuaikan expired time

    function updateCountdownTenant() {
        let now = Math.floor(Date.now() / 1000);
        let remainingTime = adjustedExpiredTime - now;

        if (remainingTime <= 0) {
            countdownElement.innerText = "Waktu pembayaran telah habis!";
            countdownElement.classList.add("text-red-700", "font-bold");

                            // Auto refresh setelah waktu habis dengan delay 3 detik
                            setTimeout(function() {
                                localStorage.removeItem("expiredTime-tenant-" + id);
                                location.reload();
                            }, 3000);

                            return;
                        }

        let minutes = Math.floor(remainingTime / 60);
        let seconds = remainingTime % 60;
        countdownElement.innerText = `${minutes} menit ${seconds} detik`;

        // Buat interval baru untuk setiap elemen (tidak tumpang tindih)
        setTimeout(updateCountdownTenant, 1000);
    }

    updateCountdownTenant();
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("[id^='alert-box-tenant-']").forEach(alertBox => {
        let id = alertBox.id.replace("alert-box-tenant-", "").trim();
        let expiredTime = parseInt(alertBox.getAttribute("data-expired"), 10);
        let serverNow = parseInt(alertBox.getAttribute("data-now"), 10);

        if (!isNaN(expiredTime) && !isNaN(serverNow)) {
            startCountdownTenant(id, expiredTime, serverNow);
        }
    });
});

            </script>

            
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
                                Tanggal Mulai
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
                        @foreach ($bookings as $booking)
                            <tr class="booking-list" data-bookingid="{{ $booking->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->namaPemohon }}</td>
                                <td>{{ $booking->noWa }}</td>
                                <td>{{ $booking->namaEvent }}</td>
                                <td>{{ $booking->namaTenant }}</td>
                                <td>{{ $booking->tipeTenant }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->event->tglMulai)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->event->tglSelesai)->format('d/m/Y') }}</td>

                                <!-- Status -->                
                                <td>
                                    @if ($booking->status == 'Disetujui')
                                        <div class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 text-white">
                                            Disetujui
                                        </div>
                                    @elseif ($booking->status == 'Ditolak')
                                        <div data-popover-target="pop-alasan-{{ $booking->id }}" data-popover-placement="top" class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 text-white">
                                            Ditolak dan Alasannya
                                        </div>
                                    @elseif ($booking->status == 'Menunggu persetujuan')
                                        <div class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 text-white">
                                            Menunggu persetujuan
                                        </div>
                                    @elseif ($booking->status == 'Belum bayar')
                                        <div class="px-3 py-1 rounded-lg font-medium bg-gradient-to-l from-indigo-500 via-indigo-600 to-indigo-700 text-white">
                                            Belum bayar
                                        </div>
                                    @endif
                                </td>

                                <!-- Tindakan -->
                                <td class="text-center">
                                    <div class="flex justify-center gap-2">
                                        @if ($booking->status == 'Belum bayar')
                                            <!-- Tindakan Edit dan Batalkan -->
                                            <button 
                                                data-modal-target="modal-edit" 
                                                data-modal-toggle="modal-edit"
                                                data-id="{{ $booking['id'] }}"
                                                data-namaPemohon="{{ $booking['namaPemohon'] }}" 
                                                data-noWa="{{ $booking['noWa'] }}" 
                                                data-namaTenant="{{ $booking['namaTenant'] }}" 
                                                data-tipeTenant="{{ $booking['tipeTenant'] }}" 
                                                class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white btn-edit">
                                                Edit
                                            </button>
                                            <button 
                                                data-modal-target="modal-batalkan" 
                                                data-modal-toggle="modal-batalkan"
                                                data-bookingid="{{ $booking->id }}"  
                                                class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                Batalkan
                                            </button>
                                            <button 
                                                data-modal-target="modal-bayar" 
                                                data-modal-toggle="modal-bayar" 
                                                data-bookingid="{{ $booking->id }}" 
                                                class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                Bayar
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
                            <!-- Popover alasan ditolak -->
                            @if ($booking->status == 'Ditolak')
                                <div data-popover id="pop-alasan-{{ $booking->id }}" role="tooltip" class="absolute z-[9999] invisible inline-block w-80 max-w-3xl text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xl opacity-0">
                                    <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                                        <h3 class="font-semibold text-gray-900">Alasan Penolakan</h3>
                                    </div>
                                    <div class="px-3 py-2">
                                        <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm text-gray-500 p-3" readonly>{{ $booking->alasanPenolakan }}</textarea>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal Edit -->
    <div id="modal-edit" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900">
                        Edit Pemesanan Tenant
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form id="editForm" action="/updateBookingTenant" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Gunakan metode PUT jika sesuai kebutuhan RESTful -->
                    
                        <!-- Input ID Booking -->
                        <input 
                            type="hidden"  
                            id="id" 
                            name="id" 
                            value="" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg pl-10 p-2.5 w-full">

                        <!-- Input Nama Pemohon -->
                        <label for="namaPemohon">Nama Pemohon</label>
                        <input type="text" id="namaPemohon" name="namaPemohon" value="{{ $user->name }}" required>

                        <!-- Input No. Whatapps -->
                        <label for="noWa">No. Whatapps</label>
                        <input type="text" id="noWa" name="noWa" value="{{ $user->noHP }}" required>

                        <!-- Input Nama Tenant -->
                        <label for="namaTenant">Nama Tenant</label>
                        <input type="text" id="namaTenant" name="namaTenant" required>

                        <!-- Input Jenis Tenant -->
                        <label for="tipeTenant">Jenis Tenant</label>
                        <select
                            id="tipeTenant"
                            name="tipeTenant"
                            class="bg-gray-50 mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            onchange="simpanPilihan()">
                            <option value="Tenant Makanan">Tenant Makanan</option>
                            <option value="Tenant Barang">Tenant Barang</option>
                            <option value="Tenant Jasa">Tenant Jasa</option>
                        </select>

                    </form>
                </div>

                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b space-x-2">
                   <button 
                        data-modal-target="modal-konfirmasiEdit" 
                        data-modal-toggle="modal-konfirmasiEdit" 
                        data-modal-hide="modal-edit" 
                        type="button" 
                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-bold font-medium rounded-lg text-sm px-4 py-2 text-center">
                        Simpan
                    </button>
                    <button data-modal-hide="modal-edit" type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-bold font-medium rounded-lg text-sm px-4 py-2 text-center">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Edit -->
    <div id="modal-konfirmasiEdit" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h1 class="mb-5 text-lg font-bold text-gray-900">Konfirmasi Perubahan Booking</h1>
                    <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin merubah booking tenant ini?</p>
                    
                    <!-- Tombol Konfirmasi -->
                    <button 
                        id="konfirmasi-button" 
                        data-modal-hide="modal-konfirmasiEdit" 
                        type="submit"
                        class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                        Setujui
                    </button>
                    <button 
                        data-modal-target="modal-edit" 
                        data-modal-toggle="modal-edit" 
                        data-modal-hide="modal-konfirmasiEdit" 
                        type="button"
                        class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                        Kembali
                    </button>
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
                    <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin membatalkan booking tenant ini?</p>

                    <!-- Form Pembatalan -->
                    <form id="form-batal" action="" method="POST">
                        @csrf
                        @method('DELETE')

                        <!-- Tombol Submit -->
                        <div class="flex justify-center gap-4 mt-6">
                            <button type="submit" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                Batalkan Booking
                            </button>
                            <button data-modal-hide="modal-batalkan" type="button" class="px-6 py-2 rounded-lg font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br text-white">
                                Kembali
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bayar -->
    <div id="modal-bayar" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900">
                        Upload Bukti Pembayaran
                    </h3>
                </div>
                <!-- Modal body -->
                <form action="{{ route('booking.uploadBuktiTenant') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="p-4 md:p-5">
                        @if(isset($booking) && $booking)
                            <input type="hidden" name="booking_id" id="booking-id" value={{$booking->id}}>
                        @endif
                        <!-- Informasi Rekening -->
                        <div class="mt-3 mb-4 p-3 border border-yellow-500 bg-yellow-100 rounded-lg text-center">
                            <p class="text-sm font-medium text-gray-900">
                                Pembayaran dapat dikirimkan ke rekening berikut :
                            </p>
                            <p class="text-xl font-bold text-red-600 mt-1">
                                1360 0318 8562
                            </p>
                            <p class="text-sm text-gray-700">Bank Mandiri</p>
                        </div>
                        <!-- Input Bukti -->
                        <label for="bukti-bayar" class="block mb-2 text-sm font-medium text-gray-900">
                            Upload Bukti Pembayaran
                        </label>
                        <input type="file" id="bukti-bayar" name="buktiBayar" accept="image/jpeg, image/png" 
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" 
                            required>

                        <!-- Informasi Tambahan -->
                        <p class="info mt-1">
                            * File maksimal 2 MB, format: JPEG atau PNG<br>
                            * Mohon diperhatikan kembali, setelah Anda mengunggah bukti pembayaran maka booking tidak dapat diedit dan dibatalkan.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b space-x-2">
                        <button 
                            type="submit" 
                            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-bold font-medium rounded-lg text-sm px-4 py-2 text-center">
                            Upload
                        </button>
                        <button data-modal-hide="modal-bayar" type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-bold font-medium rounded-lg text-sm px-4 py-2 text-center">Batal</button>
                    </div>
                </form>
                {{-- <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b space-x-2">
                    <button data-modal-hide="modal-bayar" type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-bold font-medium rounded-lg text-sm px-4 py-2 text-center">Batal</button>
                </div> --}}
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

<script>
    // Ambil semua tombol "Bayar"
    const bayarButtons = document.querySelectorAll('[data-modal-target="modal-bayar"]');

    bayarButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Ambil booking_id dari atribut data-bookingid pada tombol yang diklik
            const bookingId = this.getAttribute('data-bookingid');
            
            // Setel nilai booking_id di input tersembunyi dalam form modal
            document.getElementById('booking-id').value = bookingId;
        });
    });
</script>

{{-- Script untuk membatalkan booking --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const modalBatalkan = document.getElementById("modal-batalkan");
    const deleteForm = document.getElementById("form-batal");

    document.querySelectorAll("[data-modal-toggle='modal-batalkan']").forEach(button => {
        button.addEventListener("click", function () {
            let id = this.getAttribute("data-bookingid");
            deleteForm.setAttribute("action", `/hapusPemTenant/${id}`);
        });
    });
});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua tombol edit
        const editButtons = document.querySelectorAll(".btn-edit");

        // Loop setiap tombol edit
        editButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Ambil data dari atribut tombol
                const id = button.getAttribute("data-id");
                const namaPemohon = button.getAttribute("data-namaPemohon");
                const noWa = button.getAttribute("data-noWa");
                const namaTenant = button.getAttribute("data-namaTenant");
                const tipeTenant = button.getAttribute("data-tipeTenant");

                // Tampilkan modal edit
                const modalEdit = document.getElementById("modal-edit");
                modalEdit.classList.remove("hidden");

                // Isi data input di modal
                document.getElementById("id").value = id;
                document.getElementById("namaPemohon").value = namaPemohon;
                document.getElementById("noWa").value = noWa;
                document.getElementById("namaTenant").value = namaTenant;
                document.getElementById("tipeTenant").value = tipeTenant;
            });
        });

        // Tambahkan event listener untuk tombol batal atau close modal
        const closeModalButtons = document.querySelectorAll("[data-modal-hide]");
        closeModalButtons.forEach(button => {
            button.addEventListener("click", function () {
                const modalId = button.getAttribute("data-modal-hide");
                const modal = document.getElementById(modalId);
                modal.classList.add("hidden");
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Tombol Simpan di modal
        const simpanButton = document.getElementById("konfirmasi-button");

        simpanButton.addEventListener("click", function () {
            // Ambil form dari modal
            const editForm = document.getElementById("editForm");

            // Update value form input dari modal
            editForm.querySelector("#id").value = document.getElementById("id").value;
            editForm.querySelector("#namaPemohon").value = document.getElementById("namaPemohon").value;
            editForm.querySelector("#noWa").value = document.getElementById("noWa").value;
            editForm.querySelector("#namaTenant").value = document.getElementById("namaTenant").value;
            editForm.querySelector("#tipeTenant").value = document.getElementById("tipeTenant").value;

            // Kirim form ke server
            editForm.submit();
        });

        // Event listener untuk tombol batal atau close modal
        const closeModalButtons = document.querySelectorAll("[data-modal-hide]");
        closeModalButtons.forEach(button => {
            button.addEventListener("click", function () {
                const modalId = button.getAttribute("data-modal-hide");
                const modal = document.getElementById(modalId);
                modal.classList.add("hidden");
            });
        });
    });
</script>

<script>
    document.getElementById("konfirmasi-button").addEventListener("click", function () {
        const editForm = document.getElementById("editForm");
        editForm.submit(); // Kirim form ke server
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

{{-- {{-- <script>
    // Refresh halaman setiap 3 menit
    setTimeout(function () {
        location.reload();
    }, 1000); // 60000 ms = 60 detik
</script> --}}

</html>