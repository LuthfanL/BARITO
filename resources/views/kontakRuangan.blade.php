<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Admin Ruangan</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link rel="stylesheet" href="assets/style.css"/>
    
</head>

<body class="h-full bg-gradient-to-b from-blue-400 to-cyan-400">
    <!-- Navbar -->
    <div class="relative z-50">
        @include('components.navbargeneral')
    </div>

<!-- Form Kontak Kami  -->
<div class="flex justify-center items-center min-h-screen px-4">
    <!-- Container Utama -->
    <div class="w-full max-w-7xl bg-white shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col md:flex-row overflow-hidden">
        <!-- Bagian Kiri (Gambar dan Judul) -->
        <div class="w-full md:w-1/2 bg-cover bg-center relative" style="background-image: url('assets/bookingRuangan.png');">
            <div class="absolute inset-0 flex flex-col justify-center px-6">
                <h1 class="text-white text-3xl sm:text-4xl font-bold text-center">Hubungi Kami</h1>
                <p class="pt-2 text-white text-xl sm:text-2xl font-bold text-center">Admin Ruangan</p>
                <!-- Breadcrumb -->
                <nav class="mt-4 flex justify-center" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="home" class="inline-flex items-center text-sm font-medium text-white hover:font-bold group">
                                <svg class="w-3 h-3 me-2.5 transition-transform duration-200 group-hover:scale-110" 
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="homeBookingRuangan" class="inline-flex items-center text-sm font-medium text-white hover:font-bold">
                                <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                Booking Ruangan
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ms-1 text-sm font-medium text-white md:ms-2">Hubungi Kami</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Bagian Kanan (Formulir) -->
        <div class="w-full md:w-1/2 p-6 sm:p-8">
            <form class="space-y-4">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="subjek" class="block text-sm font-medium text-gray-700">Subjek Pesan</label>
                    <input type="text" id="subjek" name="subjek" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                </div>
                <div>
                    <button type="submit" class="w-full bg-gradient-to-b from-blue-400 to-cyan-400 hover:from-blue-500 hover:to-cyan-500 focus:outline-none text-white font-semibold py-2 px-4 rounded-lg">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

    

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>