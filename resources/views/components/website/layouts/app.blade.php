<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Specta Cafee & Resto')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background: #050505;
            color: white;
            overflow-x: hidden;
        }

        /* SCROLLBAR */

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0a0a0a;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #ff0000, #7f1d1d);
            border-radius: 50px;
        }

        /* LOADER */

        #loader {
            transition: 1s;
        }

        /* GLASS */

        .glass {
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .08);
            backdrop-filter: blur(15px);
        }

        /* NAVBAR */

        .nav-scroll {
            background: rgba(0, 0, 0, .75);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, .05);
        }

        /* CARD */

        .card {
            transition: .5s;
        }

        .card:hover {
            transform: translateY(-10px);
            border-color: #ef4444;
            box-shadow: 0 0 35px rgba(255, 0, 0, .2);
        }

        /* MOBILE MENU */

        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: .5s;
        }

        .mobile-menu.active {
            max-height: 500px;
        }

        /* ANIMATION */

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-18px);
            }
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 10px rgba(255, 0, 0, .2);
            }

            to {
                box-shadow: 0 0 40px rgba(255, 0, 0, .7);
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .animate-glow {
            animation: glow 2s infinite alternate;
        }

        .rotate-slow {
            animation: rotate 8s linear infinite;
        }
    </style>
    @stack('style')
</head>


<body class="bg-[#071014] text-white overflow-x-hidden">

    {{-- STYLE --}}
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .gradient-text {
            background: linear-gradient(to right, #ef4444, #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .floating {
            animation: floating 5s ease-in-out infinite;
        }

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-14px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .fade-up {
            animation: fadeUp 1.2s ease forwards;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0px);
            }
        }

        .gallery-hover img {
            transition: .7s;
        }

        .gallery-hover:hover img {
            transform: scale(1.1);
        }

        #loader {
            transition: all .8s ease;
        }
    </style>




    {{-- LOADING SCREEN --}}
    @include('components.website.loading')

    {{-- NAVBAR --}}
    @include('components.website.layouts.partial.navigation')

    <div>
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('components.website.layouts.partial.footer')






    {{-- SCRIPT --}}
    <script>
        window.addEventListener('load', () => {

            const loader = document.getElementById('loader');

            setTimeout(() => {

                loader.style.opacity = '0';
                loader.style.visibility = 'hidden';

            }, 2200);

        });
    </script>
    @stack('script')
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        menuBtn.addEventListener('click', () => {

            mobileMenu.classList.toggle('hidden');

        });
    </script>

</body>

</html>
