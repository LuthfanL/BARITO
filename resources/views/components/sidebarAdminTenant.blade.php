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
    <nav class="mt-14 mr-6 text-left">
        <ul>
            <!-- Admin Tenant -->
            <li class="pl-1 py-7 transition-colors duration-200">
                <a href="/dashboardAdminTenant" class="flex items-center block text-gray-500 hover:text-black font-semibold" aria-label="Admin Ruangan">
                    <svg class="w-[32px] h-[32px] opacity-100 scale-100 ml-5 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform translate-x-3 group-hover:translate-x-3">Dashboard</span>
                </a>
            </li>
        
            <!-- Buat Event -->
            <li class="pl-1 py-7 transition-colors duration-200">
                <a href="/buatEvent" class="flex items-center block text-gray-500 hover:text-black font-semibold" aria-label="Buat Event">
                    <svg class="w-[32px] h-[32px] opacity-100 scale-100 ml-5 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform translate-x-3 group-hover:translate-x-3">Buat Event</span>
                </a>
            </li>

            <!-- Daftar Event -->
            <li class="pl-1 py-7 transition-colors duration-200">
                <a href="/daftarEvent" class="flex items-center block text-gray-500 hover:text-black font-semibold" aria-label="Daftar Event">
                    <svg class="w-[32px] h-[32px] opacity-100 scale-100 ml-5 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform translate-x-3 group-hover:translate-x-3">Daftar Event</span>
                </a>
            </li>
        
            <!-- Verifikasi Booking Tenant -->
            <li class="pl-1 py-7 transition-colors duration-200">
                <a href="/verifikasiBookingTenant" class="flex items-center block text-gray-500 hover:text-black font-semibold" aria-label="Verifikasi Booking Tenant">
                    <svg class="w-[32px] h-[32px] opacity-100 scale-100 ml-5 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform translate-x-3 group-hover:translate-x-3">Verifikasi Booking</span>
                </a>
            </li>
        
            <!-- Riwayat Booking Tenant -->
            <li class="pl-1 py-7 transition-colors duration-200">
                <a href="/riwayatBookingTenant" class="flex items-center block text-gray-500 hover:text-black font-semibold" aria-label="Riwayat Booking Tenant">
                    <svg class="w-[32px] h-[32px] opacity-100 scale-100 ml-5 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform translate-x-3 group-hover:translate-x-3">Riwayat Booking</span>
                </a>
            </li>
        </ul>                        
    </nav>
</aside>

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

</body>

</html>