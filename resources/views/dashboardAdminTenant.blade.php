<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png') }}">
    <title>Dashboard Admin Tenant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .welcome-message {
            font-size: 1.5rem;
            font-weight: bold;
            margin-left: 0.5rem;
            white-space: nowrap;
            overflow: hidden;
            display: inline-block;
            width: fit-content;
        }
    
        .welcome-message-static {
            font-size: 1.5rem;
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            display: inline-block;
            width: fit-content;
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

            <!-- Welcome Back -->
            <div class="pl-8 pt-8 pb-3 flex justify-left items-center">
                <p class="welcome-message-static">Welcome Back, </p>
                <span class="welcome-message" id="typewriter"></span>
                <span class="text-2xl" aria-label="Waving Hand" role="img">👋</span>
            </div>

            <!-- Main Content -->
            <div class="px-8 pt-5 flex justify-center items-center">
                <div class="grid grid-cols-12 w-full gap-14">

                    <!-- Total Customer -->
                    <div class="col-span-3 bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col">
                        <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center justify-between">
                            <div>
                                <h2 class="text-left ml-3 mt-6 text-3xl font-bold">{{ $totalCustomer }}</h2>
                                <p class="text-left text-gray-500 ml-3 mt-1 mb-6 text-lg font-semibold ">Total Customer</p>
                            </div>
                            <div class="mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill text-[#00C6BF]" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                            </div>                            
                        </div>
                    </div>

                    <!-- Total Booking -->
                    <div class="col-span-3 bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col">
                        <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center justify-between">
                            <div>
                                <h2 class="text-left ml-3 mt-6 text-3xl font-bold">{{ $totalBooking }}</h2>
                                <p class="text-left text-gray-500 ml-3 mt-1 mb-6 text-lg font-semibold ">Total Booking</p>
                            </div>
                            <div class="mr-3">
                                <img width="50" height="50" src="https://img.icons8.com/deco-glyph/48/00c6bf/booking.png" alt="booking"/>
                            </div>
                        </div>
                    </div>

                    <!-- Belum Diverifikasi -->
                    <div class="col-span-3 bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col">
                        <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center justify-between">
                            <div>
                                <h2 class="text-left ml-3 mt-6 text-3xl font-bold">{{ $verifikasi }}</h2>
                                <p class="text-left text-gray-500 ml-3 mt-1 mb-6 text-lg font-semibold ">Belum Diverifikasi</p>
                            </div>
                            <div class="mr-3">
                                <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/00c6bf/visa-stamp.png" alt="visa-stamp"/>
                            </div>
                        </div>
                    </div>

                    <!-- Total Tenant -->
                    <div class="col-span-3 bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col">
                        <div class="m-3 rounded-lg outline outline-2 outline-[#00C6BF] flex items-center justify-between">
                            <div>
                                <h2 class="text-left ml-3 mt-6 text-3xl font-bold">{{ $totalEvent }}</h2>
                                <p class="text-left text-gray-500 ml-3 mt-1 mb-6 text-lg font-semibold ">Total Event Aktif</p>
                            </div>
                            <div class="mr-3">
                                <img width="58" height="58" src="https://img.icons8.com/fluency-systems-filled/48/00c6bf/event.png" alt="event"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-8 pt-12 flex justify-center items-center">
                <div class="grid grid-cols-12 w-full gap-14">
                    <!-- Statistik Pengunjung -->
                    <div class="col-span-6 pt-6 mb-10 bg-white shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col items-center">
                        <div class="w-full pl-8 pr-4">
                            <div class="flex flex-col items-center text-center">
                                <!-- Judul -->
                                <h5 class="leading-none text-xl font-bold text-gray-900 pb-2">Statistik Booking Customer</h5>
                                <div class="flex items-center space-x-4">
                                    <!-- Dropdown -->
                                    <div class="relative">
                                        <p class="text-sm font-medium text-gray-500 text-center inline-flex items-center">
                                            7 hari terakhir
                                        </p>
                                        {{-- <button
                                        id="dropdownPengunjung"
                                        class="dropdown text-sm font-medium text-gray-500 hover:text-gray-900 text-center inline-flex items-center"
                                        type="button">
                                        7 Hari Terakhir
                                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg>
                                        </button> --}}
                                        {{-- <!-- Dropdown menu -->
                                        <div id="dropdownPengunjungList" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 absolute top-full mt-2">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                                <li id="7HariTerakhir">
                                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="updateDropdown('7 Hari Terakhir')">7 hari terakhir</a>
                                                </li>
                                                <li id="30HariTerakhir">
                                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="updateDropdown('30 Hari Terakhir')">30 hari terakhir</a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div id="area-chart-pengunjung" class="w-full pt-10 h-64"></div>
                        </div>
                    </div>

                    <!-- Statistik Diagram Lingkaran Ruangan Terbooking -->
                    <div class="col-span-6 pt-6 mb-10 bg-white-300 shadow-[0_0_20px_10px_rgba(0,0,0,0.1)] rounded-xl flex flex-col items-center p-6">
                        <!-- Bagian Kiri: Diagram & Judul -->
                        <div class="w-full text-center">
                            <!-- Judul -->
                            <h5 class="text-xl font-bold text-gray-900 pb-2">
                                Statistik Event Terbooking
                            </h5>

                            <!-- Filter Dropdown (Pindah ke bawah judul) -->
                            <div class="relative mb-4">
                                <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                                    class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 inline-flex items-center">
                                    7 Hari Terakhir
                                    <svg class="w-2.5 h-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-md w-44 dark:bg-gray-700 absolute mt-2">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                        <li><a href="#" class="dropdown-item block px-4 py-2 hover:bg-gray-100" data-value="kemarin">Kemarin</a></li>
                                        <li><a href="#" class="dropdown-item block px-4 py-2 hover:bg-gray-100" data-value="hari ini">Hari ini</a></li>
                                        <li><a href="#" class="dropdown-item block px-4 py-2 hover:bg-gray-100" data-value="7 hari terakhir">7 hari terakhir</a></li>
                                        <li><a href="#" class="dropdown-item block px-4 py-2 hover:bg-gray-100" data-value="30 hari terakhir">30 hari terakhir</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Pie Chart -->
                            <div id="pie-chart" class="mb-4"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

<!-- Script Welcome Back -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const messages = ["David Nugroho!"]; 
        let messageIndex = 0;
        let charIndex = 0;
        const typingSpeed = 100; 
        const erasingSpeed = 50; 
        const delayBetweenMessages = 2000; 
        const typewriterElement = document.getElementById("typewriter");

        function typeMessage() {
            if (charIndex < messages[messageIndex].length) {
                typewriterElement.textContent += messages[messageIndex].charAt(charIndex);
                charIndex++;
                setTimeout(typeMessage, typingSpeed);
            } else {
                setTimeout(eraseMessage, delayBetweenMessages);
            }
        }

        function eraseMessage() {
            if (charIndex > 0) {
                typewriterElement.textContent = messages[messageIndex].substring(0, charIndex - 1);
                charIndex--;
                setTimeout(eraseMessage, erasingSpeed);
            } else {
                messageIndex = (messageIndex + 1) % messages.length; // Loop pesan
                setTimeout(typeMessage, typingSpeed);
            }
        }

        // Mulai mengetik pesan
        setTimeout(typeMessage, typingSpeed);
    });
</script>

<!-- Script Diagram Lingkaran -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const chartElement = document.getElementById("pie-chart");
        let chart;
        let fetchUrl = @json(url('/dashboardAdminTenant')); // Ambil URL dari Laravel

        if (chartElement) {
            let labels = @json($labels);
            let data = @json($data);

            const options = {
                series: data,
                chart: {
                    type: "donut",
                    height: 350
                },
                labels: labels,
                legend: {
                    position: "bottom",
                    horizontalAlign: 'center',
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif"
                    }
                }
            };

            chart = new ApexCharts(chartElement, options);
            chart.render();
        }

        // Event Listener untuk Dropdown
        document.querySelectorAll(".dropdown-item").forEach(item => {
            item.addEventListener("click", function (event) {
                event.preventDefault(); // Hindari reload halaman

                const selectedPeriod = this.getAttribute("data-value"); // Ambil nilai dari data-value
                console.log("Dropdown diklik:", selectedPeriod); // Debugging

                document.getElementById("dropdownDefaultButton").innerText = this.innerText; // Update teks tombol

                // Ambil data baru dari server berdasarkan periode yang dipilih
                fetch(`${fetchUrl}?periode=${encodeURIComponent(selectedPeriod)}`, {
                    method: "GET",
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        "Accept": "application/json"
                    }
                })
                .then(response => response.json())
                .then(result => {
                    console.log("Data yang diterima:", result); // Debugging
                    if (result.labels && result.data) {
                        chart.updateOptions({
                            labels: result.labels,
                            series: result.data
                        });
                    }
                })
                .catch(error => console.error("Error fetching data:", error));
            });
        });
    });
</script>

<!-- Script Diagram Booking Customer -->
<script>
    // Data chart pengunjung
    const pengunjungData = {
        "7 Hari Terakhir": {
            data: @json($pengunjungCounts),  // Ambil semua data dalam 7 hari
            categories: @json($pengunjungLabels), // Semua label tanggal dalam 7 hari
        },
        "30 Hari Terakhir": {
            data: @json($pengunjungCounts), // Ambil semua data dalam 30 hari
            categories: @json($pengunjungLabels), // Semua label tanggal dalam 30 hari
        }
    };

    // Opsi chart pengunjung
    let chartPengunjungOptions = {
        chart: {
            height: 300,
            width: "100%",
            type: "area",
            fontFamily: "Inter, sans-serif",
            dropShadow: { enabled: false },
            toolbar: { show: false },
        },
        tooltip: { 
            enabled: true, 
            x: { show: true },
            y: { 
                formatter: function (val) {
                    return Math.floor(val); // Menghilangkan koma pada tooltip
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: { opacityFrom: 0.55, opacityTo: 0, shade: "#1C64F2", gradientToColors: ["#00C6BF"] },
        },
        dataLabels: { enabled: false },
        stroke: { width: 6 },
        grid: {
            show: true,
            strokeDashArray: 4,
            padding: { left: 18, right: 10, top: 0 },
        },
        series: [{ name: "Booking", data: pengunjungData["7 Hari Terakhir"].data, color: "#00C6BF" }],
        xaxis: {
            categories: pengunjungData["7 Hari Terakhir"].categories, // Pastikan ini berisi semua tanggal untuk 7 hari terakhir
            labels: { show: true },
            axisBorder: { show: true },
            axisTicks: { show: true },
        },
        yaxis: { 
            show: false,
            labels: {
                formatter: function (val) {
                    return Math.floor(val); // Menghilangkan koma pada sumbu Y
                }
            }
        },
    };

    // Inisialisasi chart pengunjung
    let chartPengunjung = new ApexCharts(document.getElementById("area-chart-pengunjung"), chartPengunjungOptions);
    chartPengunjung.render();

    // Fungsi untuk memperbarui chart pengunjung
    function updateChartPengunjung(period) {
        chartPengunjung.updateOptions({
            series: [{ name: "Booking", data: pengunjungData[period].data }],
            xaxis: { categories: pengunjungData[period].categories } // Menyesuaikan kategori berdasarkan periode
        });
    }

    // Menampilkan dan menyembunyikan dropdown pengunjung
    document.getElementById("dropdownPengunjung").addEventListener("click", function () {
        document.getElementById("dropdownPengunjungList").classList.toggle("hidden");
    });

    // Fungsi untuk memperbarui dropdown dan chart pengunjung
    function updateDropdown(period) {
        document.getElementById("dropdownPengunjung").innerText = period; // Perbarui teks dropdown
        document.getElementById("dropdownPengunjungList").classList.add("hidden"); // Sembunyikan dropdown setelah memilih
        updateChartPengunjung(period); // Perbarui chart berdasarkan pilihan
    }
</script>

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

</html>