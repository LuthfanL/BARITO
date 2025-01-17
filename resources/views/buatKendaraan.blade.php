<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Kendaraan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
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
        @include('components.sidebarAdminKendaraan')

        <!-- Content -->
        <div class="flex-grow">

            <!-- Navbar -->
            @include('components.navbaradmin')

            <!-- Main Content -->
            <div class="px-8 pt-8 pb-8 flex justify-center items-center">
                <div class="w-full">
                    <!-- Judul Form -->
                    <div class="flex justify-center text-center pb-6">
                        <h1 class="font-bold text-2xl">Buat Kendaraan</h1>
                    </div>
            
                    <!-- Form Pembuatan Kendaraan -->
                    <div class="flex form-container bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)]">
                        <div class="flex form-inner m-3 rounded-lg outline outline-2 outline-[#00C6BF]">
                            <form>
                                <!-- Input Nama Kendaraan -->
                                <label for="nama-kendaraan">Nama Kendaraan</label>
                                <input type="text" id="nama-kendaraan" name="nama-kendaraan" required>
                
                                <!-- Input Deskripsi Kendaraan -->
                                <label for="deskripsi-kendaraan">Deskripsi Kendaraan</label>
                                <textarea id="deskripsi-kendaraan" name="deskripsi-kendaraan" rows="3" required></textarea>
                
                                <!-- Input Biaya Sewa, Kapasitas, Plat Nomor, CC dan Tahun Kendaraan -->
                                <label for="biayaSewa">Biaya Sewa (Per Hari)</label>
                                <input type="text" id="biayaSewa" name="biayaSewa" required>

                                <label for="kapasitas">Kapasitas</label>
                                <input type="text" id="kapasitas" name="kapasitas" required>
                
                                <label for="plat">Plat Nomor</label>
                                <input type="text" id="plat" name="plat" required>

                                <label for="cc">CC</label>
                                <input type="text" id="cc" name="cc" required>

                                <label for="tahun">Tahun</label>
                                <input type="text" id="tahun" name="tahun" required>
                
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
                                <label for="foto-kendaraan">Upload Foto Kendaraan</label>
                                <input type="file" id="foto-kendaraan" name="foto-kendaraan" accept="image/jpeg, image/png" class="block w-full cursor-pointer" required>
                
                                <!-- Informasi Tambahan -->
                                <p class="info">
                                    * File maksimal 2 MB, format: JPEG atau PNG<br>
                                    * Upload minimal 1 foto yang memperlihatkan keseluruhan kendaraan
                                </p>
                
                                <!-- Tombol Submit -->
                                <div class="flex justify-end">
                                    <button type="button" class="justify-end text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300  font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Buat Kendaraan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</body>

</html>