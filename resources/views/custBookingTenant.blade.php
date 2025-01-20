<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Booking Tenant</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.11.3/main.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.11.3/main.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css"/>
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

        select option {
        font-family: inherit; 
        font-size: inherit; 
        color: inherit;      
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
                        Event Kami
                    </h2>
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
                                <a href="homePengelolaanTenant" class="inline-flex items-center text-sm font-medium text-white hover:font-bold">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    Pengelolaan Tenant
                                </a>
                            </li>                            
                            <li>
                                <a href="custDaftarEvent" class="inline-flex items-center text-sm font-medium text-white hover:font-bold">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    Daftar Event
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="ms-1 text-sm font-medium text-white md:ms-2">Booking</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="px-24 pt-8 pb-8 flex justify-center items-center">
        <div class="relative w-full max-w-full max-h-full">
            <!-- Nama Event -->
            <div class="flex justify-center mb-4">
                <h2 class="font-bold text-3xl">Event A</h2>
            </div>
            <!-- Isi -->
            <div class="p-4 md:p-5">
                <div class="rounded-3xl shadow-[0_0_13px_3px_rgba(0,0,0,0.2)] pl-12 pr-12 pt-6 pb-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Kolom Kiri: Foto -->
                    <div class="space-y-4">
                        <!-- Foto Utama -->
                        <div>
                            <h2 class="font-semibold mb-3 text-lg">Foto/Poster Event</h2>
                            <img id="main-image" class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="Foto Utama">
                        </div>
                        <!-- Foto di bawah -->
                        <div class="grid grid-cols-3 md:grid-cols-5 gap-2 md:gap-4">
                            <div>
                                <img onclick="swapImage(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="assets/test.jpeg" alt="Foto 1">
                            </div>
                            <div>
                                <img onclick="swapImage(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="Foto 2">
                            </div>
                            <div>
                                <img onclick="swapImage(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="Foto 3">
                            </div>
                            <div>
                                <img onclick="swapImage(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="Foto 4">
                            </div>
                            <div>
                                <img onclick="swapImage(this)" class="h-auto max-w-full rounded-lg cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="Foto 5">
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="space-y-4">
                        <!-- Deskripsi -->
                        <h2 class="font-semibold text-lg">Deskripsi</h2>
                        <div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at nisl in lacus feugiat tincidunt.
                            </p>
                        </div>
                        <!-- Informasi Detail -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="tglMulai" class="block text-m font-semibold">Tanggal Mulai</label>
                                <span id="tglMulai" class="mt-1 block w-full rounded-md bg-transparent text-gray-700 sm:text-sm">15/03/2025</span>
                            </div>
                            <div>
                                <label for="tglSelesai" class="block text-m font-semibold">Tanggal Selesai</label>
                                <span id="tglSelesai" class="mt-1 block w-full rounded-md bg-transparent text-gray-700 sm:text-sm">22/03/2025</span>
                            </div>
                            <div>
                                <label for="biaya" class="block text-m font-semibold">Biaya Sewa (Per Hari)</label>
                                <span id="biaya" class="mt-1 block w-full rounded-md bg-transparent text-gray-700 sm:text-sm">Rp. 500.000</span>
                            </div>
                        </div>
                        <!-- Jenis Tenant -->
                        <h2 class="font-semibold text-lg">Total Tenant yang Disediakan</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="makanan" class="block text-sm font-medium text-gray-700">Tenant Makanan</label>
                                <input type="number" id="makanan" class="mt-1 block w-full rounded-md bg-transparent border-gray-300 shadow-sm text-gray-700 focus:outline-none pointer-events-none sm:text-sm" value="10" readonly>
                            </div>
                            <div>
                                <label for="barang" class="block text-sm font-medium text-gray-700">Tenant Barang</label>
                                <input type="number" id="barang" class="mt-1 block w-full rounded-md bg-transparent border-gray-300 shadow-sm text-gray-700 focus:outline-none pointer-events-none sm:text-sm" value="10" readonly>
                            </div>
                            <div>
                                <label for="jasa" class="block text-sm font-medium text-gray-700">Tenant Jasa</label>
                                <input type="number" id="jasa" class="mt-1 block w-full rounded-md bg-transparent border-gray-300 shadow-sm text-gray-700 focus:outline-none pointer-events-none sm:text-sm" value="8" readonly>
                            </div>
                        </div>
                        <div>
                            <button data-modal-target="modal-booking" data-modal-toggle="modal-booking" class="inline-flex justify-center w-full items-center px-4 py-3 text-m font-bold rounded-lg bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                                Booking
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Calendar -->
            <div class="relative w-full max-w-screen-4xl mx-auto mt-8">
                <div class="calendar ml-4 mr-4 p-6 flex justify-center rounded-3xl shadow-[0_0_13px_3px_rgba(0,0,0,0.2)]">
                    <div id="calendar"></div>
                </div>
            </div>
            <!-- Pembatas Bawah -->
            <div class="pb-12">

            </div>
        </div>
    </div>

    <!-- Modal Booking -->
    <div id="modal-booking" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900">
                        Form Booking Tenant
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form id="booking-form">
                        <!-- Input Nama Pemohon -->
                        <label for="nama-pemohon">Nama Pemohon</label>
                        <input type="text" id="nama-pemohon" name="nama-pemohon" required>

                        <!-- Input No. Whatapps -->
                        <label for="no-whatsapp">No. Whatapps</label>
                        <input type="text" id="no-whatsapp" name="no-whatsapp" required>

                        <!-- Input Nama Tenant -->
                        <label for="namaTenant">Nama Tenant</label>
                        <input type="text" id="namaTenant" name="namaTenant" required>

                        <!-- Input Jenis Tenant -->
                        <label for="jenisTenant">Jenis Tenant</label>
                        <select id="jenisTenant" class="bg-gray-50 mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option>Tenant Makanan</option>
                            <option>Tenant Barang</option>
                            <option>Tenant Jasa</option>
                        </select>

                        <!-- Input Bukti Pembayaran -->
                        <label for="bukti-bayar" class="block mb-2 text-sm font-medium text-gray-900">Upload Bukti Pembayaran</label>
                        <input type="file" id="bukti-bayar" name="bukti-bayar" accept="image/jpeg, image/png" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" required>
                    
                        <!-- Informasi Tambahan -->
                        <p class="info mt-1">
                            * File maksimal 2 MB, format: JPEG atau PNG<br>
                            * Upload bukti pembayaran Anda. Harap diperhatikan bahwa jika Anda membatalkan booking setelah mengonfirmasi, pengembalian biaya akan dilakukan sebesar 90% dari total biaya yang telah dibayar.
                        </p>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b space-x-2">
                    <button data-modal-target="modal-konfirmasi" data-modal-toggle="modal-konfirmasi" data-modal-hide="modal-booking" id="konfirmasi-button" type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-bold font-medium rounded-lg text-sm px-4 py-2 text-center opacity-50 cursor-not-allowed" disabled>Konfirmasi Booking</button>
                    <button data-modal-hide="modal-booking" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold font-medium rounded-lg text-sm px-4 py-2 text-center">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Booking Konfirmasi -->
    <div id="modal-konfirmasi" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-6xl max-h-full"> <!-- Mengubah max-w-xl menjadi max-w-3xl -->
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h1 class="mb-5 text-lg font-bold text-gray-900">Konfirmasi Booking Ruangan</h1>
                    <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin konfirmasi booking ini? Harap diperhatikan kembali bahwa jika Anda membatalkan booking setelah mengonfirmasi, pengembalian biaya akan dilakukan sebesar 90% dari total biaya yang telah dibayar.</p>
                    <button data-modal-hide="modal-konfirmasi" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-bold font-medium bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                        Setuju, Konfirmasi Booking
                    </button>
                    <button data-modal-hide="modal-konfirmasi" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-bold font-medium bg-gradient-to-l from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Swap Image -->
    <script>
        function swapImage(element) {
            const mainImage = document.getElementById('main-image');
            mainImage.src = element.src;
        }
    </script>

    <!-- Script Agar Button tidak dapat ditekan sebelum mengisi semua form booking -->
    <script>
        // Cek apakah semua field terisi
        document.getElementById('booking-form').addEventListener('input', function () {
            var allFilled = true;

            // Loop untuk mengecek apakah ada input kosong
            var inputs = this.querySelectorAll('input, textarea');
            inputs.forEach(function(input) {
                if (!input.value) {
                    allFilled = false;
                }
            });

            // Mengaktifkan atau menonaktifkan tombol Konfirmasi Booking
            var button = document.getElementById('konfirmasi-button');
            if (allFilled) {
                button.disabled = false;  // Mengaktifkan tombol jika semua field terisi
                button.classList.remove('opacity-50', 'cursor-not-allowed');  
            } else {
                button.disabled = true;  // Menonaktifkan tombol jika ada field yang kosong
                button.classList.add('opacity-50', 'cursor-not-allowed');  
            }
        });
    </script>

    <!-- FullCalendar JS -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'id',
            initialView: 'dayGridMonth',
            buttonText: {
                today: 'Hari Ini'  
            },
            events: [
                { title: 'Rapat PP', start: '2025-01-20T10:00:00', end: '2025-01-21T12:00:00', color: '#ff2345'  },
                { title: 'Workshop', start: '2025-01-23T13:00:00', end: '2025-01-24T12:00:00', color: '#ff9f89' },
                { title: 'Reuni TK', start: '2025-01-27T09:00:00', end: '2025-01-27T11:00:00', color: '#f3fd56' }
            ],
            height: 'auto', 
            contentHeight: 'auto', 
            windowResize: true 
        });

        calendar.render();
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.11.3/main.min.js"></script>
</body>

</html>