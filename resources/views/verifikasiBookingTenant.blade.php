<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Booking Tenant</title>
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
            padding: 8px 7px; /* Mengurangi padding antar sel */
            text-align: center;
            white-space: nowrap; /* Membatasi teks agar tidak wrap */
        }

        #default-table td.nama-tenant {
            white-space: normal; /* Mengizinkan teks untuk membungkus */
            max-width: 140px; /* Atur lebar maksimal sesuai kebutuhan */
        }

        #default-table th {
            max-width: 140px; /* Membatasi lebar maksimal header kolom */
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
        @include('components.sidebarAdminTenant')

        <!-- Content -->
        <div class="flex-grow">

            <!-- Navbar -->
            @include('components.navbarAdminTenant')

            <!-- Main Content -->
            <div class="px-8 pt-8 pb-8 flex justify-center items-center">
                <div class="max-w-full w-full">
                    <!-- Judul Page -->
                    <div class="flex justify-center text-center pb-6">
                        <h1 class="font-bold text-2xl">Verifikasi Booking Tenant</h1>
                    </div>
                    <!-- Cari Booking -->
                    <form class=" w-full mx-auto">   
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Cari Booking</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Booking" required />
                            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-4 py-2">Cari</button>
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
                                <th>
                                    <span class="flex items-center">
                                        Event
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th data-type="date" data-format="DD/MM/YYYY">
                                    <span class="flex items-center">
                                        Tgl Mulai
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
                                    <span class="flex items-center">
                                        Tindakan
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- No -->
                                <td>1</td>
                                <!-- ID. Booking -->
                                <td>E12</td>
                                <!-- Nama Pemohon -->
                                <td>Mulyono</td>
                                <!-- No. Whatapps -->
                                <td>0821345543</td>
                                <!-- Nama Tenant -->
                                <td class="nama-tenant">Mie gacor</td>
                                <!-- Jenis Tenant -->
                                <td>Makanan</td>
                                <!-- Nama Event -->
                                <td>Event 2</td>
                                <!-- Tanggal Mulai -->
                                <td class="text-center"> 
                                    10/07/2025
                                </td>
                                <!-- Tanggal Selesai -->
                                <td class="text-center">
                                    17/07/2025
                                </td>
                                <!-- Bukti Pembayaran -->
                                <td class="text-center">
                                    BuktiPembayaran.jpg
                                </td>
                                <!-- Tindakan -->
                                <td class="text-center">
                                    <div class="flex flex-col gap-2">
                                        <button data-modal-target="modal-setujui" data-modal-toggle="modal-setujui" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Setujui</button>
                                        <button data-modal-target="modal-tolak" data-modal-toggle="modal-tolak" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Tolak</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>E11</td>
                                <td>Pujiono</td>
                                <td>0821388956</td>
                                <td class="nama-tenant">Wedding Organizer</td>
                                <td>Jasa</td>
                                <td>Event 1</td>
                                <td class="text-center"> 
                                    15/04/2025
                                </td>
                                <td class="text-center">
                                    22/04/2025
                                </td>
                                <td class="text-center">
                                    BuktiPembayaran.jpg
                                </td>
                                <td class="text-center">
                                    <div class="flex flex-col gap-2">
                                        <button data-modal-target="modal-setujui" data-modal-toggle="modal-setujui" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Setujui</button>
                                        <button data-modal-target="modal-tolak" data-modal-toggle="modal-tolak" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Tolak</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>E10</td>
                                <td>Bobby</td>
                                <td>0821346666</td>
                                <td class="nama-tenant">Suvenir Kayu Jepara Top Markotop</td>
                                <td>Barang</td>
                                <td>Event 3</td>
                                <td class="text-center"> 
                                    01/07/2025
                                </td>
                                <td class="text-center">
                                    08/07/2025
                                </td>
                                <td class="text-center">
                                    BuktiPembayaran.jpg
                                </td>
                                <td class="text-center">
                                    <div class="flex flex-col gap-2">
                                        <button data-modal-target="modal-setujui" data-modal-toggle="modal-setujui" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Setujui</button>
                                        <button data-modal-target="modal-tolak" data-modal-toggle="modal-tolak" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Tolak</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                    <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin menyetujui booking tenant ini? Pastikan semua detail booking telah sesuai sebelum melanjutkan.</p>
                    <button data-modal-hide="modal-setujui" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                        Setujui
                    </button>
                    <button data-modal-hide="modal-setujui" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Kembali</button>
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
                    <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin menolak booking tenant ini? Tindakan ini akan memberi tahu customer bahwa booking tidak dapat diproses.</p>
                    <button data-modal-hide="modal-tolak" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                        Tolak
                    </button>
                    <button data-modal-hide="modal-tolak" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Kembali</button>
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
            perPageSelect: false
        });
    }
</script>

</html>