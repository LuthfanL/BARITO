<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <title>Buat Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
    <!-- Tambahkan Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
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
    
        input[type="text"], textarea, input[type="file"] {
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
        
        .tenant-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
    
        .tenant-container label {
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
                <div class="w-full">
                    <!-- Judul Form -->
                    <div class="flex justify-center text-center pb-6">
                        <h1 class="font-bold text-2xl">Buat Event</h1>
                    </div>
            
                    <!-- Form Pembuatan Event -->
                    <div class="flex form-container bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)]">
                        <div class="flex form-inner m-3 rounded-lg outline outline-2 outline-[#00C6BF]">
                            <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Input Nama Event -->
                                <label for="namaEvent">Nama Event</label>
                                <input type="text" id="namaEvent" name="namaEvent" required>
                
                                <!-- Input Deskripsi Event -->
                                <label for="deskripsi">Deskripsi Event</label>
                                <textarea id="deskripsi" name="deskripsi" rows="3" required class="pl-2"></textarea>
                
                                <!-- Input Biaya Sewa -->
                                <label for="hargaTenant">Biaya Sewa (Per Hari)</label>
                                <input type="text" id="hargaTenant" name="hargaTenant" required oninput="validateAngka(this)">

                                <!-- Input Jenis Tenant -->
                                <label>Jenis Tenant</label>
                                <div class="tenant-container">
                                    <div>
                                        <label for="nBarang">Tenant Barang</label>
                                        <input type="text" id="nBarang" name="nBarang" oninput="validateAngka(this)">
                                    </div>
                                    <div>
                                        <label for="nJasa">Tenant Jasa</label>
                                        <input type="text" id="nJasa" name="nJasa" oninput="validateAngka(this)">
                                    </div>
                                    <div>
                                        <label for="nMakanan">Tenant Makanan</label>
                                        <input type="text" id="nMakanan" name="nMakanan" oninput="validateAngka(this)">
                                    </div>
                                </div>

                                <script>
                                    function validateAngka(input) {
                                        // Hapus karakter selain angka
                                        input.value = input.value.replace(/[^0-9]/g, '');

                                        // Jika ada karakter selain angka yang dimasukkan, tampilkan alert
                                        if (input.value !== '' && isNaN(input.value)) {
                                            alert("Hanya boleh memasukkan angka!");
                                        }
                                    }
                                </script>
                
                                <!-- Input Tanggal -->
                                <label for="tanggal-event" class="block font-bold">Tanggal Event</label>
                                <div id="date-range-picker" class="flex items-center space-x-2">
                                    <!-- Tanggal Mulai -->
                                    <div class="relative flex items-center">
                                        <svg class="w-5 h-5 absolute right-3 top-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2Z"/>
                                        </svg>
                                        <input id="tglMulai" name="tglMulai" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg pl-10 p-2.5 w-full" placeholder="Tanggal Mulai">
                                    </div>


                                    <!-- Tanggal Selesai -->
                                    <div class="relative flex items-center">
                                        <svg class="w-5 h-5 absolute right-3 top-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2Z"/>
                                        </svg>
                                        <input id="tglSelesai" name="tglSelesai" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg pl-10 p-2.5 w-full" placeholder="Tanggal Selesai">
                                    </div>
                                </div>
                                

                                <!-- Input Foto Event -->
                                <label for="foto">Upload Foto/Poster Event</label>
                                <input type="file" id="foto" name="foto[]" accept="image/jpeg, image/png" class="block w-full cursor-pointer" required multiple>
                
                                <!-- Informasi Tambahan -->
                                <p class="info">
                                    * File maksimal 2 MB, format: JPEG atau PNG<br>
                                    * Upload minimal 1 foto yang memperlihatkan informasi event
                                </p>
                
                                <!-- Tombol Submit -->
                                <div class="flex justify-end">
                                    <button type="submit" class="justify-end text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300  font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Buat Event</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>

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
            });
        @endif
    </script>

   <!-- Tambahkan Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Inisialisasi Flatpickr untuk tglMulai
            const tglMulaiPicker = flatpickr("#tglMulai", {
                dateFormat: "Y-m-d",
                minDate: "today", // Tidak bisa memilih tanggal sebelum hari ini
                onChange: function (selectedDates) {
                    // Jika tglMulai dipilih, update minDate untuk tglSelesai agar tidak bisa pilih sebelumnya
                    if (selectedDates.length > 0) {
                        tglSelesaiPicker.set("minDate", selectedDates[0]);
                    }
                }
            });

            // Inisialisasi Flatpickr untuk tglSelesai
            const tglSelesaiPicker = flatpickr("#tglSelesai", {
                dateFormat: "Y-m-d",
                minDate: "today" // Default minDate adalah hari ini
            });
        });
    </script>

</body>

</html>