<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        #default-table {
            width: 100%;
            border-collapse: collapse; /* Mengurangi jarak antar border */
        }
        #default-table th, #default-table td {
            padding: 8px 5px; /* Mengurangi padding antar sel */
            text-align: center;
        }
        #default-table th {
            max-width: 150px; /* Membatasi lebar maksimal header kolom */
        }
        #default-table td {
            max-width: 200px; /* Membatasi lebar maksimal sel data */
            overflow: hidden; /* Menyembunyikan teks yang terlalu panjang */
            text-overflow: ellipsis; /* Menambahkan elipsis untuk teks yang terlalu panjang */
        }
        #default-table td.deskripsi-ruangan {
        text-align: left;
        white-space: normal; /* Membolehkan teks membungkus */
        word-wrap: break-word; /* Memastikan kata-kata yang terlalu panjang terpecah */
        max-width: none; /* Membebaskan batas lebar maksimal untuk deskripsi */
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
                        <h1 class="font-bold text-2xl">Daftar Event</h1>
                    </div>

                    <!-- Cari event -->
                    <form action="{{ route('searchEvent') }}" method="GET" class="w-full mx-auto">   
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Cari Event</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input 
                                type="search" 
                                name="keyword" 
                                id="default-search" 
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Cari Event Berdasarkan Nama Event" 
                                value="{{ old('keyword', '') }}" 
                            />
                            <button 
                                type="submit" 
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-4 py-2">
                                Cari
                            </button>
                        </div>
                    </form>

                    <!-- Tampilkan Daftar event -->
                    @if(!empty($event) && count($event) > 0)
                        <table>
                            <!-- Tabel event ditampilkan di sini -->
                        </table>
                    @endif

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
                                        Nama Event
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Deskripsi Event
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Biaya Sewa 
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Tenant Barang
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Tenant Jasa
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Tenant Makanan
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
                                        Foto
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Tindakan
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        @if (!empty($event))
                            <tbody>
                                @foreach ($event as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $data['namaEvent'] }}</td>
                                        <td class="text-center">{{ $data['deskripsi'] }}</td>
                                        <td class="text-center">Rp. {{ number_format($data['hargaTenant'], 0, ',', '.') }}</td>
                                        <td class="text-center">{{ $data['nBarang'] }}</td>
                                        <td class="text-center">{{ $data['nJasa'] }}</td>
                                        <td class="text-center">{{ $data['nMakanan'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data['tglMulai'])->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data['tglSelesai'])->format('d/m/Y') }}</td>
                                        <td class="text-center">
                                            <button 
                                                data-modal-target="modal-foto" 
                                                data-modal-toggle="modal-foto" 
                                                data-foto-url="{{ $data->foto_url }}"
                                                data-thumbnails="{{ json_encode($data->foto_urls) }}"   
                                                type="button" 
                                                class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                Detail
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <div class="flex flex-col gap-2">
                                                <button class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Edit</button>
                                                <button 
                                                    data-modal-target="modal-hapus" 
                                                    data-modal-toggle="modal-hapus"
                                                    data-namaEvent="{{ $data['namaEvent'] }}"  
                                                    class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
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
                        Edit Event
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form>
                        <!-- Input Nama Event -->
                        <label for="nama-event">Nama Event</label>
                        <input type="text" id="nama-event" name="nama-event" required>
        
                        <!-- Input Deskripsi Event -->
                        <label for="deskripsi-event">Deskripsi Event</label>
                        <textarea id="deskripsi-event" name="deskripsi-event" rows="3" required></textarea>
        
                        <!-- Input Biaya Sewa -->
                        <label for="biayaSewa">Biaya Sewa (Per Hari)</label>
                        <input type="text" id="biayaSewa" name="biayaSewa" required>

                        <!-- Input Jenis Tenant -->
                        <label>Jenis Tenant</label>
                        <div class="tenant-container">
                            <div>
                                <label for="barang">Tenant Barang</label>
                                <input type="text" id="barang" name="barang">
                            </div>
                            <div>
                                <label for="jasa">Tenant Jasa</label>
                                <input type="text" id="jasa" name="jasa">
                            </div>
                            <div>
                                <label for="makanan">Tenant Makanan</label>
                                <input type="text" id="makanan" name="makanan">
                            </div>
                        </div>
        
                        <!-- Input Tanggal -->
                        <label for="tanggal-event" class="block font-bold">Tanggal Event</label>
                        <div id="date-range-picker" date-rangepicker class="grid grid-cols-3 gap-2 items-center">
                            <!-- Tanggal Mulai -->
                            <div class="relative flex items-center">
                                <svg class="w-5 h-5 absolute right-3 top-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2Z"/>
                                </svg>
                                <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg pl-10 p-2.5 w-full" placeholder="Tanggal Mulai">
                            </div>
                        
                            <!-- Teks Separator -->
                            <div class="text-center text-gray-500 mb-4">sampai</div>
                        
                            <!-- Tanggal Selesai -->
                            <div class="relative flex items-center">
                                <svg class="w-5 h-5 absolute right-3 top-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2Z"/>
                                </svg>
                                <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg pl-10 p-2.5 w-full" placeholder="Tanggal Selesai">
                            </div>
                        </div> 
                        
                        <!-- Input Foto Event -->
                        <label for="foto-event">Upload Foto/Poster Event</label>
                        <input type="file" id="foto-event" name="foto-event" accept="image/jpeg, image/png" class="block mb-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" required>
        
                        <!-- Informasi Tambahan -->
                        <p class="info">
                            * File maksimal 2 MB, format: JPEG atau PNG<br>
                            * Upload minimal 1 foto yang memperlihatkan informasi event
                        </p>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b space-x-2">
                    <button data-modal-hide="modal-edit" id="konfirmasi-button" type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-bold font-medium rounded-lg text-sm px-4 py-2 text-center">Konfirmasi Edit</button>
                    <button data-modal-hide="modal-edit" type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-bold font-medium rounded-lg text-sm px-4 py-2 text-center">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Foto -->
    <div id="modal-foto" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900">
                        Foto Event
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="grid gap-4">
                        <div>
                            <img id="main-image" class="h-auto max-w-full rounded-lg" src="" alt="Foto Ruangan">
                        </div>
                        <div class="grid grid-cols-3 md:grid-cols-5 gap-2 md:gap-4" id="image-thumbnails">
                            <!-- Thumbnails akan diubah dengan gambar dinamis -->
                        </div>
                    </div>                    
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="modal-foto" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div id="modal-hapus" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h1 class="mb-5 text-lg font-bold text-gray-900">Konfirmasi Hapus Event</h1>
                    <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin menghapus event ini?</p>
                    <!-- Form untuk hapus event -->
                    <form id="delete-form" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                            Hapus
                        </button>
                        <button data-modal-hide="modal-hapus" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                            Kembali
                        </button>
                </form>
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

<!-- Swap Image -->
    <script>
        // Menambahkan event listener untuk tombol yang membuka modal
        document.querySelectorAll('[data-modal-target="modal-foto"]').forEach(button => {
            button.addEventListener('click', function () {
                // Ambil URL foto utama dan thumbnails dari atribut data
                const fotoUrl = this.getAttribute('data-foto-url');
                const thumbnails = JSON.parse(this.getAttribute('data-thumbnails')); // Misal array URL thumbnails
        
                const mainImage = document.getElementById('main-image');
                const imageThumbnails = document.getElementById('image-thumbnails');
        
                // Update foto utama di modal dengan gambar pertama dari foto utama atau thumbnails
                mainImage.src = thumbnails[0];  // Jika fotoUrl tidak ada, gunakan thumbnail pertama
        
                // Kosongkan dulu thumbnail sebelumnya
                imageThumbnails.innerHTML = '';
        
                // Loop untuk menampilkan thumbnail gambar-gambar kecil
                thumbnails.forEach(url => {
                    const thumbnailElement = document.createElement('div');
                    thumbnailElement.innerHTML = `
                        <img onclick="swapImage(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="${url}" alt="Thumbnail">
                    `;
                    imageThumbnails.appendChild(thumbnailElement);
                });
        
                // Menampilkan modal
                document.getElementById('modal-foto').classList.remove('hidden');
            });
        });
        
        // Fungsi untuk mengganti gambar utama saat thumbnail diklik
        function swapImage(element) {
            const mainImage = document.getElementById('main-image');
            mainImage.src = element.src;
        }
    </script>


<!-- Script untuk menghapus data  -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const modalHapus = document.getElementById("modal-hapus");
    const deleteForm = document.getElementById("delete-form");

    document.querySelectorAll("[data-modal-toggle='modal-hapus']").forEach(button => {
        button.addEventListener("click", function () {
            let namaEvent = this.getAttribute("data-namaEvent");
            deleteForm.setAttribute("action", `/event/${namaEvent}`);
        });
    });
});
</script>

<!-- Script Alert Berhasil -->
@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            icon: 'success',
            timer: 3000, 
            timerProgressBar: true,
            showConfirmButton: false
        });
    });
</script>
@endif

<!-- Script Alert Error -->
@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Gagal!',
            text: "{{ session('error') }}",
            icon: 'error',
            timer: 3000, 
            timerProgressBar: true,
            showConfirmButton: false
        });
    });
</script>
@endif

</html>