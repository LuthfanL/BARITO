<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ruangan</title>
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
                        <h1 class="font-bold text-2xl">Daftar Ruangan</h1>
                    </div>
                    <!-- Cari Kendaraan -->
                        <form action="{{ route('searchRuangan') }}" method="GET" class="w-full mx-auto">   
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Cari Ruangan</label>
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
                                    placeholder="Cari Nama Ruangan" 
                                    value="{{ old('keyword', '') }}" 
                                />
                                <button 
                                    type="submit" 
                                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-4 py-2">
                                    Cari
                                </button>
                            </div>
                        </form>

                        <!-- Tampilkan Daftar Kendaraan -->
                        @if(!empty($ruangan) && count($ruangan) > 0)
                            <table>
                                <!-- Tabel ruangan ditampilkan di sini -->
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
                                        ID. Ruangan
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Nama Ruangan
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Deskripsi Ruangan
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
                                        Lokasi
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Lantai
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Luas
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
                        @if (!empty($ruangan))
                            <tbody>
                                @foreach ($ruangan as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data['id'] }}</td>
                                        <td>{{ $data['nama'] }}</td>
                                        <td>{{ $data['deskripsi'] }}</td>
                                        <td>Rp. {{ number_format($data['biayaSewa'], 0, ',', '.') }}</td>
                                        <td class="text-center">{{ $data['lokasi'] }}</td>
                                        <td class="text-center">{{ $data['lantai'] }}</td>
                                        <td class="text-center">{{ $data['luas'] }}</td>
                                        <td class="text-center"> 
                                            <button 
                                                data-modal-target="modal-fasilitas" 
                                                data-modal-toggle="modal-fasilitas" 
                                                data-podium="{{ $data['podium'] }}" 
                                                data-sound="{{ $data['sound'] }}" 
                                                data-ac="{{ $data['ac'] }}" 
                                                data-meja="{{ $data['meja'] }}" 
                                                data-kursi="{{ $data['kursi'] }}" 
                                                data-proyektor="{{ $data['proyektor'] }}" 
                                                type="button" 
                                                class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                Detail
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button 
                                                data-modal-target="modal-foto" 
                                                data-modal-toggle="modal-foto" 
                                                data-foto="{{ $data['foto'] }}"  
                                                type="button" 
                                                class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                Detail
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <div class="flex flex-col gap-2">
                                                <button 
                                                    data-modal-target="modal-edit" 
                                                    data-modal-toggle="modal-edit" 
                                                    class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                                    Edit
                                                </button>
                                                <button 
                                                    data-modal-target="modal-hapus" 
                                                    data-modal-toggle="modal-hapus"
                                                    data-plat="{{ $data['id'] }}"  
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
                        Edit Ruangan
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form>
                        <!-- Input Nama Ruangan -->
                        <label for="nama</label>
                        <input type="text" id="nama" name="nama" required>
        
                        <!-- Input Deskripsi Ruangan -->
                        <label for="deskripsi">Deskripsi Ruangan</label>
                        <textarea id="deskripsi" name="deskripsi" rows="3" required></textarea>
        
                        <!-- Input Biaya Sewa, Lokasi, Lantai dan Luas Ruangan -->
                        <label for="biayaSewa">Biaya Sewa (Per Hari)</label>
                        <input type="text" id="biayaSewa" name="biayaSewa" required>

                        <label for="lokasi">Lokasi (Nama Gedung)</label>
                        <input type="text" id="lokasi" name="lokasi" required>
        
                        <label for="lantai">Lantai</label>
                        <input type="text" id="lantai" name="lantai" required>

                        <label for="luas">Luas Ruangan</label>
                        <input type="text" id="luas" name="luas" required>
        
                        <!-- Input Fasilitas Ruangan -->
                        <label>Fasilitas Ruangan</label>
                        <div class="fasilitas-container">
                            <div>
                                <label for="podium">Podium</label>
                                <input type="text" id="podium" name="podium">
                            </div>
                            <div>
                                <label for="sound">Sound</label>
                                <input type="text" id="sound" name="sound">
                            </div>
                            <div>
                                <label for="meja">Meja</label>
                                <input type="text" id="meja" name="meja">
                            </div>
                            <div>
                                <label for="ac">AC</label>
                                <input type="text" id="ac" name="ac">
                            </div>
                            <div>
                                <label for="kursi">Kursi</label>
                                <input type="text" id="kursi" name="kursi">
                            </div>
                            <div>
                                <label for="proyektor">Proyektor</label>
                                <input type="text" id="proyektor" name="proyektor">
                            </div>
                        </div>
        
                        <!-- Input Foto Ruangan -->
                        <label for="foto-ruangan">Upload Foto Ruangan</label>
                        <input type="file" id="foto-ruangan" name="foto-ruangan" accept="image/jpeg, image/png" class="block mb-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" required>
        
                        <!-- Informasi Tambahan -->
                        <p class="info">
                            * File maksimal 2 MB, format: JPEG atau PNG<br>
                            * Upload minimal 1 foto yang memperlihatkan keseluruhan ruangan
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

    <!-- Modal Fasilitas -->
    <div id="modal-fasilitas" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Fasilitas Ruangan
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="podium" class="block text-sm font-medium text-gray-700">Podium</label>
                            <input type="number" id="podium" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="{{ $data['podium'] ?? '' }}" readonly>
                        </div>
                        <div>
                            <label for="sound" class="block text-sm font-medium text-gray-700">Sound</label>
                            <input type="number" id="sound" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="{{ $data['sound'] ?? '' }}" readonly>
                        </div>
                        <div>
                            <label for="meja" class="block text-sm font-medium text-gray-700">Meja</label>
                            <input type="number" id="meja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="{{ $data['meja'] ?? '' }}" readonly>
                        </div>
                        <div>
                            <label for="ac" class="block text-sm font-medium text-gray-700">AC</label>
                            <input type="number" id="ac" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="{{ $data['ac'] ?? '' }}" readonly>
                        </div>
                        <div>
                            <label for="kursi" class="block text-sm font-medium text-gray-700">Kursi</label>
                            <input type="number" id="kursi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"value="{{ $data['kursi'] ?? '' }}" readonly>
                        </div>
                        <div>
                            <label for="proyektor" class="block text-sm font-medium text-gray-700">Proyektor</label>
                            <input type="number" id="proyektor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="{{ $data['proyektor'] ?? '' }}" readonly>
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
{{-- 
    <!-- Modal Foto -->
    <div id="modal-foto" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900">
                        Foto Ruangan
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="grid gap-4">
                        <div>
                            <img id="main-image" class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="">
                        </div>
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
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="modal-foto" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Kembali</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Modal Foto -->
    <div id="modal-foto" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900">
                        Foto Ruangan
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="grid gap-4">
                        <div>
                            <img id="main-image" class="h-auto max-w-full rounded-lg" src="" alt="Foto Ruangan">
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
                    <h1 class="mb-5 text-lg font-bold text-gray-900">Konfirmasi Hapus Ruangan</h1>
                    <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin menghapus ruangan ini?</p>
                    <!-- Form untuk hapus ruangan -->
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
    function swapImage(element) {
        const mainImage = document.getElementById('main-image');
        mainImage.src = element.src;
    }
</script>

<!-- Scipt untuk mengambil data fasilitas -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua tombol yang membuka modal fasilitas
        const detailButtons = document.querySelectorAll("[data-modal-target='modal-fasilitas']");

        detailButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Ambil data dari tombol yang diklik
                const podium = this.getAttribute("data-podium");
                const sound = this.getAttribute("data-sound");
                const meja = this.getAttribute("data-meja");
                const ac = this.getAttribute("data-ac");
                const kursi = this.getAttribute("data-kursi");
                const proyektor = this.getAttribute("data-proyektor");

                // Temukan elemen input dalam modal dan isi dengan data yang sesuai
                document.querySelector("#modal-fasilitas #podium").value = podium || "Tidak tersedia";
                document.querySelector("#modal-fasilitas #sound").value = sound || "Tidak tersedia";
                document.querySelector("#modal-fasilitas #meja").value = meja || "Tidak tersedia";
                document.querySelector("#modal-fasilitas #ac").value = ac || "Tidak tersedia";
                document.querySelector("#modal-fasilitas #kursi").value = kursi || "Tidak tersedia";
                document.querySelector("#modal-fasilitas #proyektor").value = proyektor || "Tidak tersedia";
            });
        });
    });
</script>

<!-- Script untuk menghapus data -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const modalHapus = document.getElementById("modal-hapus");
    const deleteForm = document.getElementById("delete-form");

    document.querySelectorAll("[data-modal-toggle='modal-hapus']").forEach(button => {
        button.addEventListener("click", function () {
            let id = this.getAttribute("data-plat");
            deleteForm.setAttribute("action", `/ruangan/${id}`);
        });
    });
});
</script>

</html>