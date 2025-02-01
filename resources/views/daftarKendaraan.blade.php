<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <title>Daftar Kendaraan</title>
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
            padding: 8px 10px; /* Mengurangi padding antar sel */
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
                            <h1 class="font-bold text-2xl">Daftar Kendaraan</h1>
                        </div>

                        <!-- Cari Kendaraan -->
                        <form id="searchForm" class="w-full mx-auto">   
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Cari Kendaraan</label>
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
                                    placeholder="Cari Nama atau Plat Nomor Kendaraan" 
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
                                        Nama Kendaraan
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Deskripsi Kendaraan
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
                                        Kapasitas
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Plat Nomor
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        CC
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Tahun
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Fasilitas
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
                        @if (!empty($kendaraan))
                            <tbody>
                                @foreach ($kendaraan as $data)
                                    <tr class="kendaraan-list" data-nama="{{ $data['nama'] }}" data-plat="{{ $data['platNomor'] }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data['nama'] }}</td>
                                        <td>{{ $data['deskripsi'] }}</td>
                                        <td>Rp. {{ number_format($data['biayaSewa'], 0, ',', '.') }}</td>
                                        <td class="text-center">{{ $data['jumlahKursi'] }}</td>
                                        <td class="text-center">{{ $data['platNomor'] }}</td>
                                        <td class="text-center">{{ $data['cc'] }}</td>
                                        <td class="text-center">{{ $data['tahunKeluar'] }}</td>
                                        <td class="text-center"> 
                                            <button 
                                                data-modal-target="modal-fasilitas" 
                                                data-modal-toggle="modal-fasilitas" 
                                                data-tv="{{ $data['tv'] }}" 
                                                data-sound="{{ $data['sound'] }}" 
                                                data-ac="{{ $data['ac'] }}" 
                                                type="button" 
                                                class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                Detail
                                            </button>
                                        </td>
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
                                                <button 
                                                    class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white btn-edit"
                                                    data-modal-target="modal-edit"
                                                    data-modal-toggle="modal-edit"
                                                    data-nama="{{ $data['nama'] }}" 
                                                    data-deskripsi="{{ $data['deskripsi'] }}" 
                                                    data-biaya="{{ $data['biayaSewa'] }}" 
                                                    data-kursi="{{ $data['jumlahKursi'] }}" 
                                                    data-plat="{{ $data['platNomor'] }}" 
                                                    data-cc="{{ $data['cc'] }}" 
                                                    data-tahun="{{ $data['tahunKeluar'] }}" 
                                                    data-tv="{{ $data['tv'] }}" 
                                                    data-sound="{{ $data['sound'] }}" 
                                                    data-ac="{{ $data['ac'] }}"
                                                    data-foto-url="{{ $data->foto_url }}"
                                                    data-thumbnails="{{ json_encode($data->foto_urls) }}">   
                                                    Edit
                                                </button>

                                                <button 
                                                    data-modal-target="modal-hapus" 
                                                    data-modal-toggle="modal-hapus"
                                                    data-plat="{{ $data['platNomor'] }}"  
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
                        Edit Kendaraan
                    </h3>
                </div>

                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form id="editForm" action="/update-kendaraan" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Gunakan metode PUT jika sesuai kebutuhan RESTful -->
                        
                        <!-- Input tersembunyi untuk platNomor -->
                        <input type="hidden" id="platNomor" name="platNomor">

                        <!-- Input Nama Kendaraan -->
                        <label for="nama">Nama Kendaraan</label>
                        <input type="text" id="nama" name="nama" required>
        
                        <!-- Input Deskripsi Kendaraan -->
                        <label for="deskripsi">Deskripsi Kendaraan</label>
                        <textarea id="deskripsi" name="deskripsi" rows="3" required class="pl-2"></textarea>
        
                        <!-- Input Biaya Sewa, Kapasitas, Plat Nomor, CC dan Tahun Kendaraan -->
                        <label for="biayaSewa">Biaya Sewa (Per Hari)</label>
                        <input type="text" id="biayaSewa" name="biayaSewa" required>

                        <label for="jumlahKursi">Kapasitas</label>
                        <input type="text" id="jumlahKursi" name="jumlahKursi" required>
        
                        <input type="text" id="plat" name="platNomor" required style="display: none;">

                        <label for="cc">CC</label>
                        <input type="text" id="cc" name="cc" required>

                        <label for="tahunKeluar">Tahun</label>
                        <input type="text" id="tahunKeluar" name="tahunKeluar" required>
        
                        <!-- Input Fasilitas Kendaraan -->
                        <label>Fasilitas Kendaraan</label>
                        <div class="fasilitas-container">
                            <div>
                                <label for="tv">TV</label>
                                <input type="text" id="tv" name="tv">
                            </div>
                            <div>
                                <label for="sound">Sound</label>
                                <input type="text" id="sound" name="sound">
                            </div>
                            <div>
                                <label for="ac">AC</label>
                                <input type="text" id="ac" name="ac">
                            </div>
                        </div>
                                
                        <!-- Input Foto Kendaraan -->
                        <label for="foto">Upload Foto Kendaraan</label>
                        <input type="file" id="foto" name="foto[]" accept="image/jpeg, image/png" class="block mb-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" multiple>
                
                        <!-- Informasi Tambahan -->
                        <p class="info">
                            * File maksimal 2 MB, format: JPEG atau PNG<br>
                            * Upload minimal 1 foto yang memperlihatkan keseluruhan kendaraan
                        </p>
                    </form>
                </div>

                <!-- Modal footer -->
                {{-- <form id="editForm" action="/update-kendaraan" method="POST">
                    @csrf
                    @method('PUT') <!-- Gunakan metode PUT jika sesuai kebutuhan RESTful -->
                    
                    <!-- Input tersembunyi untuk platNomor -->
                    <input type="hidden" id="platNomor" name="platNomor">

                    <!-- Tambahkan input lainnya sebagai bagian dari form -->
                    <input type="hidden" id="nama" name="nama">
                    <input type="hidden" id="deskripsi" name="deskripsi">
                    <input type="hidden" id="biayaSewa" name="biayaSewa">
                    <input type="hidden" id="jumlahKursi" name="jumlahKursi">
                    <input type="hidden" id="cc" name="cc">
                    <input type="hidden" id="tahunKeluar" name="tahunKeluar">
                    <input type="hidden" id="tv" name="tv">
                    <input type="hidden" id="sound" name="sound">
                    <input type="hidden" id="ac" name="ac">
                </form> --}}

                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b space-x-2">
                    <button id="konfirmasi-button" type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-bold font-medium rounded-lg text-sm px-4 py-2 text-center">Simpan</button>
                    <button data-modal-hide="modal-edit" type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-bold font-medium rounded-lg text-sm px-4 py-2 text-center">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Fasilitas -->
    <div id="modal-fasilitas" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Fasilitas Kendaraan
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="tv" class="block text-sm font-medium text-gray-700">TV</label>
                            <input type="text" id="tv" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 sm:text-sm" value="{{ $data['tv'] ?? '' }}" readonly>
                        </div>
                        <div>
                            <label for="sound" class="block text-sm font-medium text-gray-700">Sound</label>
                            <input type="text" id="sound" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 sm:text-sm" value="{{ $data['sound'] ?? '' }}" readonly>
                        </div>
                        <div>
                            <label for="ac" class="block text-sm font-medium text-gray-700">AC</label>
                            <input type="text" id="ac" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 sm:text-sm" value="{{ $data['ac'] ?? '' }}" readonly>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="modal-fasilitas" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Kembali</button>
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
                        Foto Kendaraan
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
                    <h1 class="mb-5 text-lg font-bold text-gray-900">Konfirmasi Hapus Kendaraan</h1>
                    <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin menghapus kendaraan ini?</p>
                    <!-- Form untuk hapus kendaraan -->
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

// Scipt untuk mengambil data fasilitas 
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua tombol yang membuka modal fasilitas
        const detailButtons = document.querySelectorAll("[data-modal-target='modal-fasilitas']");

        detailButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Ambil data dari tombol yang diklik
                const tv = this.getAttribute("data-tv");
                const sound = this.getAttribute("data-sound");
                const ac = this.getAttribute("data-ac");

                // Temukan elemen input dalam modal dan isi dengan data yang sesuai
                document.querySelector("#modal-fasilitas #tv").value = tv || "Tidak tersedia";
                document.querySelector("#modal-fasilitas #sound").value = sound || "Tidak tersedia";
                document.querySelector("#modal-fasilitas #ac").value = ac || "Tidak tersedia";
            });
        });
    });
</script>

// Script untuk menghapus data 
<script>
document.addEventListener("DOMContentLoaded", function () {
    const modalHapus = document.getElementById("modal-hapus");
    const deleteForm = document.getElementById("delete-form");

    document.querySelectorAll("[data-modal-toggle='modal-hapus']").forEach(button => {
        button.addEventListener("click", function () {
            let platNomor = this.getAttribute("data-plat");
            deleteForm.setAttribute("action", `/kendaraan/${platNomor}`);
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua tombol edit
        const editButtons = document.querySelectorAll(".btn-edit");

        // Loop setiap tombol edit
        editButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Ambil data dari atribut tombol
                const nama = button.getAttribute("data-nama");
                const deskripsi = button.getAttribute("data-deskripsi");
                const biaya = button.getAttribute("data-biaya");
                const kursi = button.getAttribute("data-kursi");
                const plat = button.getAttribute("data-plat");
                const cc = button.getAttribute("data-cc");
                const tahun = button.getAttribute("data-tahun");
                const tv = button.getAttribute("data-tv");
                const sound = button.getAttribute("data-sound");
                const ac = button.getAttribute("data-ac");
                const fotoUrls = JSON.parse(button.getAttribute("data-thumbnails")); // Array foto lama

                // Tampilkan modal edit
                const modalEdit = document.getElementById("modal-edit");
                modalEdit.classList.remove("hidden");

                // Isi data input di modal
                document.getElementById("nama").value = nama;
                document.getElementById("deskripsi").value = deskripsi;
                document.getElementById("biayaSewa").value = biaya;
                document.getElementById("jumlahKursi").value = kursi;
                document.getElementById("plat").value = plat;
                document.getElementById("cc").value = cc;
                document.getElementById("tahunKeluar").value = tahun;
                document.getElementById("tv").value = tv;
                document.getElementById("sound").value = sound;
                document.getElementById("ac").value = ac;
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
            editForm.querySelector("#platNomor").value = document.getElementById("plat").value;
            editForm.querySelector("#nama").value = document.getElementById("nama").value;
            editForm.querySelector("#deskripsi").value = document.getElementById("deskripsi").value;
            editForm.querySelector("#biayaSewa").value = document.getElementById("biayaSewa").value;
            editForm.querySelector("#jumlahKursi").value = document.getElementById("jumlahKursi").value;
            editForm.querySelector("#cc").value = document.getElementById("cc").value;
            editForm.querySelector("#tahunKeluar").value = document.getElementById("tahunKeluar").value;
            editForm.querySelector("#tv").value = document.getElementById("tv").value;
            editForm.querySelector("#sound").value = document.getElementById("sound").value;
            editForm.querySelector("#ac").value = document.getElementById("ac").value;

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

<!-- Search -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("search-input"); 
        const kendaraanList = document.querySelectorAll(".kendaraan-list"); 

        searchInput.addEventListener("input", function() {
            const searchQuery = searchInput.value.toLowerCase(); 
            
            kendaraanList.forEach(function(card) {
                const nama = card.getAttribute("data-nama").toLowerCase();
                const plat = card.getAttribute("data-plat").toLowerCase();  

                if (nama.includes(searchQuery) || plat.includes(searchQuery)) {
                    card.style.display = 'table-row'; 
                } else {
                    card.style.display = 'none'; 
                }
            });
        });
    });
</script>

</html>

