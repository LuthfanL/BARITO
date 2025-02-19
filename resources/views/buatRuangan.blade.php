<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <title>Tambah Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
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
                <div class="w-full">
                    <!-- Judul Form -->
                    <div class="flex justify-center text-center pb-6">
                        <h1 class="font-bold text-2xl">Tambah Ruangan</h1>
                    </div>

                    {{-- <!-- Alert Pesan Sukses/Gagal -->
                    @if(session('success'))
                    <div class="bg-green-500 text-white p-3 rounded mb-4">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                    @elseif($errors->any())
                        <div class="bg-red-500 text-white p-3 rounded mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
            
                    <!-- Form Pembuatan Ruangan -->
                    <div class="flex form-container bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)]">
                        <div class="flex form-inner m-3 rounded-lg outline outline-2 outline-[#00C6BF]">
                            <form action="{{ route('ruangan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf 

                                <!-- Input Nama Ruangan -->
                                <label for="nama">Nama Ruangan</label>
                                <input type="text" id="nama" name="nama" required>
                
                                <!-- Input Deskripsi Ruangan -->
                                <label for="deskripsi">Deskripsi Ruangan</label>
                                <textarea id="deskripsi" name="deskripsi" rows="3" required class="pl-2"></textarea>
                
                                <!-- Input Biaya Sewa, Lokasi, Lantai dan Luas Ruangan -->
                                <label for="biayaSewa">Biaya Sewa (Per Hari)</label>
                                <input type="text" id="biayaSewa" name="biayaSewa" required oninput="validateAngka(this)">
                                <p class="mb-4 text-xs text-gray-500">
                                    * Masukkan jumlah biaya sewa dalam angka, misalnya 500000. Nilai tersebut akan otomatis dikonversi ke format rupiah.
                                </p>

                                <label for="lokasi">Lokasi (Nama Gedung)</label>
                                <input type="text" id="lokasi" name="lokasi" required>
                
                                <label for="lantai">Lantai</label>
                                <input type="text" id="lantai" name="lantai" required oninput="validateAngka(this)">

                                <label for="luas">Luas Ruangan</label>
                                <input type="text" id="luas" name="luas" required>
                
                                <!-- Input Fasilitas Ruangan -->
                                <label>Fasilitas Ruangan</label>
                                <div class="fasilitas-container">
                                    <div>
                                        <label for="podium">Jumlah Podium</label>
                                        <input type="text" id="podium" name="podium" required oninput="validateAngka(this)">
                                    </div>
                                    <div>
                                        <label for="sound">Jumlah Sound</label>
                                        <input type="text" id="sound" name="sound" required oninput="validateAngka(this)">
                                    </div>
                                    <div>
                                        <label for="meja">Jumlah Meja</label>
                                        <input type="text" id="meja" name="meja" required oninput="validateAngka(this)">
                                    </div>
                                    <div>
                                        <label for="ac">Jumlah AC</label>
                                        <input type="text" id="ac" name="ac" required oninput="validateAngka(this)">
                                    </div>
                                    <div>
                                        <label for="kursi">Jumlah Kursi</label>
                                        <input type="text" id="kursi" name="kursi" required oninput="validateAngka(this)">
                                    </div>
                                    <div>
                                        <label for="proyektor">Jumlah Proyektor</label>
                                        <input type="text" id="proyektor" name="proyektor" required oninput="validateAngka(this)">
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
                
                                <!-- Input Foto Ruangan -->
                                <label for="foto">Upload Foto Ruangan</label>
                                <input type="file" id="foto" name="foto[]" accept="image/jpeg, image/png" class="block w-full cursor-pointer" multiple required>
                
                                <!-- Informasi Tambahan -->
                                <p class="info">
                                    * File maksimal 2 MB, format: JPEG atau PNG<br>
                                    * Upload minimal 1 foto yang memperlihatkan keseluruhan ruangan
                                </p>
                
                                <!-- Tombol Submit -->
                                <div class="flex justify-end">
                                    <button type="submit" class="justify-end text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300  font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Tambah Ruangan</button>
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
    
</body>

</html>