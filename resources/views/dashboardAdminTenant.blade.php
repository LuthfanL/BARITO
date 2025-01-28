<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                                <p class="text-left text-gray-500 ml-3 mt-1 mb-6 text-lg font-semibold ">Total Event</p>
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
                                <h5 class="leading-none text-xl font-bold text-gray-900 pb-2">Statistik Pengunjung</h5>
                                <div class="flex items-center space-x-4">
                                    <!-- Dropdown -->
                                    <div class="relative">
                                        <button
                                        id="dropdownPengunjung"
                                        class="text-sm font-medium text-gray-500 hover:text-gray-900 text-center inline-flex items-center"
                                        type="button">
                                        7 Hari Terakhir
                                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownPengunjungList" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 absolute top-full mt-2">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                                <li>
                                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="updateDropdown('7 Hari Terakhir')">7 hari terakhir</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="updateDropdown('30 Hari Terakhir')">30 hari terakhir</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="area-chart" class="w-full pt-10 h-64"></div>
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
                                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kemarin</a></li>
                                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hari ini</a></li>
                                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">7 hari terakhir</a></li>
                                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">30 hari terakhir</a></li>
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
        if (chartElement) {
            // Opsi awal diagram
            const options = {
                series: [50, 25, 25], // Data awal Pie Chart
                colors: ["#1C64F2", "#16BDCA", "#9061F9"], // Warna setiap bagian
                chart: {
                    type: "donut",
                    height: 350 
                },
                labels: ["Event 1", "Event 2", "Event 3"], // Label bagian
                legend: {
                    position: "bottom", // Legend di bawah diagram
                    horizontalAlign: 'center', // Rata tengah legend
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif"
                    }
                }
            };

            // Buat chart
            const chart = new ApexCharts(chartElement, options);
            chart.render();

            // Fungsi untuk mendapatkan tanggal dalam format Indonesia
            function getIndonesiaFormattedDate(date) {
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZone: 'Asia/Jakarta' };
                return new Intl.DateTimeFormat('id-ID', options).format(date);
            }

            // Fungsi untuk mendapatkan data berdasarkan periode
            function getDataBasedOnPeriod(period) {
                const today = new Date();
                let newData;

                switch (period) {
                    case "Kemarin":
                        newData = [40, 35, 25]; // Data contoh untuk kemarin
                        break;
                    case "Hari ini":
                        newData = [30, 50, 20]; // Data contoh untuk hari ini
                        break;
                    case "7 hari terakhir":
                        newData = [50, 25, 25]; // Data untuk 7 hari terakhir
                        break;
                    case "30 hari terakhir":
                        newData = [45, 30, 25]; // Data untuk 30 hari terakhir
                        break;
                    default:
                        newData = [50, 25, 25]; // Data default
                }

                return newData;
            }

            // Event Listener untuk Dropdown Filter
            document.querySelectorAll("#lastDaysdropdown a").forEach(item => {
                item.addEventListener("click", function (event) {
                    event.preventDefault(); // Hindari reload halaman

                    const selectedText = this.innerText;
                    document.getElementById("dropdownDefaultButton").innerText = selectedText; // Update teks tombol

                    // Update chart dengan data baru berdasarkan periode
                    const newData = getDataBasedOnPeriod(selectedText);
                    chart.updateSeries(newData);
                });
            });
        }
    });
</script>

<!-- Script Statistik Pengunjung -->
<script>
    // Fungsi untuk format tanggal (misal: 01 Feb, 02 Feb, dst.)
    function formatDate(date) {
        const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        const day = String(date.getDate()).padStart(2, '0');
        const month = months[date.getMonth()];
        return `${day} ${month}`;
    }

    // Menghitung tanggal 7 hari terakhir
    function getLastNDays(n) {
        const today = new Date();
        let dates = [];
        for (let i = n - 1; i >= 0; i--) {
            let date = new Date(today);
            date.setDate(today.getDate() - i);
            dates.push(formatDate(date));
        }
        return dates;
    }

    // Menghitung tanggal 30 hari terakhir
    function getLast30Days() {
        return getLastNDays(30);
    }

    // Data untuk 7 hari terakhir dan 30 hari terakhir (diperbarui dinamis)
    const chartData = {
        "7 Hari Terakhir": {
            data: [5, 1, 2, 0, 0, 1, 3], // Data dummy, bisa diganti sesuai data asli
            categories: getLastNDays(7)
        },
        "30 Hari Terakhir": {
            data: [5, 1, 2, 0, 0, 1, 3, 4, 5, 3, 2, 1, 6, 7, 2, 3, 4, 5, 6, 2, 1, 3, 4, 5, 7, 8, 5, 3, 2, 1], // Data dummy, bisa diganti sesuai data asli
            categories: getLast30Days()
        }
    };

    // Opsi chart awal
    let chartOptions = {
        chart: {
            height: 300,
            width: "100%",
            type: "area",
            fontFamily: "Inter, sans-serif",
            dropShadow: { enabled: false },
            toolbar: { show: false },
        },
        tooltip: { enabled: true, x: { show: false } },
        fill: {
            type: "gradient",
            gradient: { opacityFrom: 0.55, opacityTo: 0, shade: "#1C64F2", gradientToColors: ["#00C6BF"] },
        },
        dataLabels: { enabled: false },
        stroke: { width: 6 },
        grid: {
            show: false,
            strokeDashArray: 4,
            padding: { left: 10, right: 10, top: 0 },
        },
        series: [{ name: "User baru", data: chartData["7 Hari Terakhir"].data, color: "#00C6BF" }],
        xaxis: {
            categories: chartData["7 Hari Terakhir"].categories,
            labels: { show: true },
            axisBorder: { show: false },
            axisTicks: { show: false },
        },
        yaxis: { show: false },
    };

    // Inisialisasi chart dengan data 7 hari terakhir
    let chart = new ApexCharts(document.getElementById("area-chart"), chartOptions);
    chart.render();

    // Fungsi untuk memperbarui chart berdasarkan periode yang dipilih
    function updateChart(period) {
        chart.updateOptions({
            series: [{ name: "User baru", data: chartData[period].data }],
            xaxis: { categories: chartData[period].categories }
        });
    }

    // Menampilkan dan menyembunyikan dropdown
    document.getElementById("dropdownPengunjung").addEventListener("click", function () {
        document.getElementById("dropdownPengunjungList").classList.toggle("hidden");
    });

    // Fungsi untuk memperbarui dropdown dan chart
    function updateDropdown(period) {
        document.getElementById("dropdownPengunjung").innerText = period; // Perbarui teks dropdown
        document.getElementById("dropdownPengunjungList").classList.add("hidden"); // Sembunyikan dropdown setelah memilih
        updateChart(period); // Perbarui chart berdasarkan pilihan
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