<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">

    <style>
        .active-state {
            /* transform: translateX(0.5rem); */
            /* text-decoration: underline; */

            a {
                color: #000000;
            }
            
        }
    </style>
</head>

<body>
<aside class="flex-none w-1/6 box-border bg-gray-100 shadow-2xl">
    <div class="p-10">
        <img class="w-auto" src="{{ asset('assets/logo-black.png') }}" alt="Logo">
    </div>
    <nav class="mt-14 ml-3 mr-2 text-left">
        <ul>
            <!-- Admin Ruangan -->
            <li class="pl-1 py-7 transition-colors duration-200">
                <a href="/dashboardAdminRuangan" class="flex items-center block text-gray-500 hover:text-black font-semibold" aria-label="Admin Ruangan">
                    <svg class="w-[32px] h-[32px] opacity-100 scale-100 ml-5 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform translate-x-3 group-hover:translate-x-3">Dashboard</span>
                </a>
            </li>
        
            <!-- Buat Ruangan -->
            <li class="pl-1 py-7 transition-colors duration-200">
                <a href="/buatRuangan" class="flex items-center block text-gray-500 hover:text-black font-semibold" aria-label="Buat Ruangan">
                    <svg class="w-[32px] h-[32px] opacity-100 scale-100 ml-5 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform translate-x-3 group-hover:translate-x-3">Tambah Ruangan</span>
                </a>
            </li>

            <!-- Daftar Ruangan -->
            <li class="pl-1 py-7 transition-colors duration-200">
                <a href="/daftarRuangan" class="flex items-center block text-gray-500 hover:text-black font-semibold" aria-label="Kelola Ruangan">
                    <svg class="w-[32px] h-[32px] opacity-100 scale-100 ml-5 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform translate-x-3 group-hover:translate-x-3">Daftar Ruangan</span>
                </a>
            </li>
        
            <!-- Verifikasi Booking -->
            <li class="pl-1 py-7 transition-colors duration-200">
                <a href="/verifikasiBookingRuangan" class="flex items-center block text-gray-500 hover:text-black font-semibold" aria-label="Verifikasi Booking Ruangan">
                    <svg class="w-[32px] h-[32px] opacity-100 scale-100 ml-5 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform translate-x-3 group-hover:translate-x-3">Verifikasi Booking</span>
                </a>
            </li>
        
            <!-- Riwayat Booking -->
            <li class="pl-1 py-7 transition-colors duration-200">
                <a href="/riwayatBookingRuangan" class="flex items-center block text-gray-500 hover:text-black font-semibold" aria-label="Riwayat Booking">
                    <svg class="w-[32px] h-[32px] opacity-100 scale-100 ml-5 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform translate-x-3 group-hover:translate-x-3">Riwayat Booking</span>
                </a>
            </li>

            <!-- Logout -->
            <li class="pl-1 py-7 transition-colors duration-200">
                <a data-modal-target="modal-logout" data-modal-toggle="modal-logout" class="flex cursor-pointer items-center block text-gray-500 hover:text-black font-semibold" aria-label="logout">
                    <svg class="w-[38px] h-[38px] opacity-100 scale-100 ml-5 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14 19V5h4a1 1 0 0 1 1 1v11h1a1 1 0 0 1 0 2h-6Z"/>
                        <path fill-rule="evenodd" d="M12 4.571a1 1 0 0 0-1.275-.961l-5 1.428A1 1 0 0 0 5 6v11H4a1 1 0 0 0 0 2h1.86l4.865 1.39A1 1 0 0 0 12 19.43V4.57ZM10 11a1 1 0 0 1 1 1v.5a1 1 0 0 1-2 0V12a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform translate-x-3 group-hover:translate-x-3">Logout</span>
                </a>
            </li>
        </ul>                        
    </nav>
</aside>

<!-- Modal Konfirmasi Logout -->
<div id="modal-logout" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h1 class="mb-5 text-lg font-bold text-gray-900">Konfirmasi Logout</h1>
                <p class="mb-5 text-m font-normal text-gray-500">Apakah Anda yakin ingin keluar dari akun Anda?</p>
                <a href='/logout' data-modal-hide="modal-logout" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">
                    Logout
                </a>
                <button data-modal-hide="modal-logout" type="button" class="px-3 py-1 rounded-lg cursor-pointer font-medium bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br transition duration-200 ease-in-out text-white">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentPage = window.location.pathname;
        const links = document.querySelectorAll('li a');

        links.forEach(link => {
            if (link.getAttribute('href') === currentPage) {
                link.parentElement.classList.add('active-state');
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>

</html>