<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<style>
    body{
        font-family: 'Poppins', sans-serif;
    }
</style>

<div class="flex-grow pb-24">
    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200 shadow-lg">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between p-4">
            <!-- Logo -->
            <div class="z-30">
                <a href="home" class="flex items-center space-x-3 rtl:space-x-reverse ml-5">
                    <img class="h-8" src="{{ asset('assets/logo-black.png') }}" alt="Logo">
                </a>
            </div>

            <!-- Navigation menu (Right aligned) -->
            <div class="flex absolute right-0 mr-5 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse z-50">
                <!-- Foto Profil -->
                <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
                <div>
                    <div x-data="{ open: false }" class="flex justify-start items-center">
                        <div class="relative border-b-4 border-transparent">
                            <!-- Burger Menu -->
                            <div class="flex justify-center items-center space-x-3 z-30">
                                <div @click="open = true" class="cursor-pointer relative border-b-4 border-transparent" :class="{ 'border-blue-400 transform transition duration-300 ': open }">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0,0,300,150"
                                    style="fill:#1A1A1A;">
                                    <g fill="#1a1a1a" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(3.55556,3.55556)"><path d="M56,48c2.209,0 4,1.791 4,4c0,2.209 -1.791,4 -4,4c-1.202,0 -38.798,0 -40,0c-2.209,0 -4,-1.791 -4,-4c0,-2.209 1.791,-4 4,-4c1.202,0 38.798,0 40,0zM56,32c2.209,0 4,1.791 4,4c0,2.209 -1.791,4 -4,4c-1.202,0 -38.798,0 -40,0c-2.209,0 -4,-1.791 -4,-4c0,-2.209 1.791,-4 4,-4c1.202,0 38.798,0 40,0zM56,16c2.209,0 4,1.791 4,4c0,2.209 -1.791,4 -4,4c-1.202,0 -38.798,0 -40,0c-2.209,0 -4,-1.791 -4,-4c0,-2.209 1.791,-4 4,-4c1.202,0 38.798,0 40,0z"></path></g></g>
                                    </svg>
                                </div>
                            </div>
                            <div x-show="open"  
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                @click.away="open = false"
                                class="absolute right-0 w-60 z-50 px-5 py-3 bg-white text-black border border-gray-300 rounded-lg shadow mt-5">
                                <ul class="space-y-3 text-gray-900">
                                    <li class="font-medium">
                                        <a href="profile"
                                            class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-blue-400">
                                            <div class="mr-3">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                            </div>
                                            Profil
                                        </a>
                                    </li>

                                    <hr class="border-gray-300">
                                    <li class="font-medium">
                                        <a href="/login"
                                            class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-blue-600">
                                            <div class="mr-3 text-blue-500">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                            </div>
                                            Login
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu items in the center -->
            {{-- <div class="absolute inset-0 flex justify-center items-center hidden md:flex"> --}}
            <div class="absolute inset-0 flex justify-center items-center hidden md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="#" class="block py-2 px-3 text-lg text-gray-500 font-semibold hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-800 md:p-0">Booking Ruangan</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-lg text-gray-500 font-semibold hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-800 md:p-0">Booking Kendaraan</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-lg text-gray-500 font-semibold hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-800 md:p-0">Pengelolaan Tenant</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

