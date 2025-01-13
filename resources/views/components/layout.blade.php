<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="./output.css" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Pastikan menggunakan app.jsx -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <title>PodCentral</title>
</head>
<body class="h-full bg-black">



    <!-- Konten lainnya bisa ditambahkan di bawah ini -->
    {{ $slot }}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
      // JavaScript to show the sticky header only after scrolling
const stickyHeader = document.getElementById("sticky-header-container");
const mainHeader = document.querySelector(".container > .flex.items-center");

window.addEventListener("scroll", () => {
    const scrollPosition = window.scrollY;
    const mainHeaderBottom = mainHeader.getBoundingClientRect().bottom;

    if (mainHeaderBottom <= 0) {
        // Show sticky header when main header scrolls out of view
        stickyHeader.classList.remove("hidden");
    } else {
        // Hide sticky header when main header is visible
        stickyHeader.classList.add("hidden");
    }
});

    </script>
    <script>
        function showPopup() {
            document.getElementById('logoutPopup').classList.remove('hidden');
        }

        function hidePopup() {
            document.getElementById('logoutPopup').classList.add('hidden');
        }

        function confirmLogout() {
            document.getElementById('logoutForm').submit();
        }
    </script>
</body>
</html>