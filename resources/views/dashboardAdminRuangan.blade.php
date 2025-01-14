<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')

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
    </style>
</head>

<body class="text-gray-800 bg-white">
    <div class="flex min-h-screen" class="background-color: #eeeeee;">
        <!-- Sidebar -->
        @include('components.sidebaradmin')

        <!-- Content -->
        <div class="flex-grow">

            <!-- Navbar -->
            @include('components.navbaradmin')

            <!-- Main Content -->
            <!-- Welcome Back -->
            <div class="pl-8 pt-5 flex justify-left items-center">
                <p class="welcome-message-static">Welcome Back, </p>
                <span class="welcome-message" id="typewriter"></span>
                <span class="text-2xl" aria-label="Waving Hand" role="img">👋</span>
            </div>

            <div class="px-8 pt-5 flex justify-center items-center">
                <div class="grid grid-cols-12 w-full gap-14">

                </div>
            </div>

            <div>
                
            </div>
            
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const messages = ["Luthfan!"]; 
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

</html>