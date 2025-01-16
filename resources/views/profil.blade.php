<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

</head>

<body class="h-full bg-white">
    <!-- Navbar -->
    @include('components.navbargeneral')

    <div class="bg-gradient-to-b from-blue-400 to-cyan-400 min-h-screen h-full p-6 md:p-12 text-center flex flex-col items-center justify-center">
        <div class="bg-white mt-24 mb-4 border border-white/10 rounded-2xl shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] p-10 w-full max-w-2xl backdrop-blur-lg">
            <div class="sm:mx-auto sm:w-full sm:max-w-lg">
                <h2 class="mb-6 mt-0 text-center text-2xl font-bold leading-9 tracking-tight text-black">Detail Profil</h2>
            </div>

            <div class="mt-8">
                <div class="text-left">
                    <div class="my-6">
                        <label for="nik" class="block text-lg font-medium text-gray-900">NIK</label>
                        <p id="nik" class="mt-2 block w-full rounded-md bg-gray-100 border border-gray-300 py-3 px-4 text-gray-900">24060122120010</p>
                    </div>
                    <div class="my-6">
                        <label for="name" class="block text-lg font-medium text-gray-900">Nama</label>
                        <p id="name" class="mt-2 block w-full rounded-md bg-gray-100 border border-gray-300 py-3 px-4 text-gray-900">Paijo</p>
                    </div>
                    <div class="my-6">
                        <label for="alamat" class="block text-lg font-medium text-gray-900">Alamat</label>
                        <p id="alamat" class="mt-2 block w-full rounded-md bg-gray-100 border border-gray-300 py-3 px-4 text-gray-900">Sampokong</p>
                    </div>
                    <div class="my-6">
                        <label for="email" class="block text-lg font-medium text-gray-900">Email</label>
                        <p id="email" class="mt-2 block w-full rounded-md bg-gray-100 border border-gray-300 py-3 px-4 text-gray-900">lhokogaku@jamil.com</p>
                    </div>
                </div>
            </div>
            <!-- Tombol -->
            <div class="flex justify-end mt-8 space-x-4">
                <a href="edit-akun">
                    <button class="bg-gradient-to-b from-gray-500 to-gray-500 hover:from-gray-600 hover:to-gray-600 focus:outline-none rounded-md py-2 px-4 text-sm font-semibold text-white focus:ring-2">Edit Akun</button>
                </a>
                <a href="hapus-akun">
                    <button class="bg-gradient-to-b from-red-500 to-red-500 hover:from-red-600 hover:to-red-600 focus:outline-none rounded-md py-2 px-4 text-sm font-semibold text-white focus:ring-2">Hapus Akun</button>
                </a>
                <a href="home">
                    <button class="bg-gradient-to-b from-blue-400 to-cyan-400 hover:from-blue-500 hover:to-cyan-500 focus:outline-none rounded-md py-2 px-4 text-sm font-semibold text-white focus:ring-2">Home</button>
                </a>
            </div>
        </div>
    </div>
</body>


</html>