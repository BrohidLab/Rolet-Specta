<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rolet Specta Cafee & Resto</title>

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
    <div id="loader" class="fixed inset-0 z-[99999] bg-[#071014] flex flex-col items-center justify-center">

        <div class="relative w-28 h-28">

            <div class="absolute inset-0 rounded-full border-[5px] border-red-500 border-t-transparent animate-spin">
            </div>

            <div class="absolute inset-3 rounded-full border-[5px] border-white border-b-transparent animate-spin"
                style="animation-direction: reverse; animation-duration: 2s">
            </div>

        </div>

        <p class="mt-8 text-3xl md:text-5xl font-black tracking-[5px] gradient-text animate-pulse">

            ROLET SPECTA

        </p>

        <p class="mt-3 text-gray-400 tracking-[2px] md:tracking-[5px] text-sm uppercase">
            Cafee & Resto
        </p>

    </div>





    {{-- BACKGROUND BLUR --}}
    <div class="fixed inset-0 overflow-hidden -z-10">

        <div class="absolute top-[-120px] left-[-120px] w-[400px] h-[400px] bg-red-500/20 blur-[140px] rounded-full">
        </div>

        <div class="absolute bottom-[-120px] right-[-120px] w-[400px] h-[400px] bg-white/10 blur-[140px] rounded-full">
        </div>

    </div>





    {{-- NAVBAR --}}
    @include('components.website.layouts.partial.navigation')



    {{-- HERO --}}
    <section id="home" class="min-h-screen flex items-center relative bg-cover bg-center"
        style="background-image:
        linear-gradient(to top, rgba(7,16,20,1), rgba(7,16,20,.4)),
        url('website/assets/images/Capture.PNG');">

        <div class="max-w-7xl mx-auto px-6 lg:px-12 w-full py-32 relative z-10">

            <div class="grid lg:grid-cols-2 gap-20 items-center">

                {{-- LEFT --}}
                <div class="fade-up">

                    <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full glass text-sm text-red-300 mb-8">

                        ✦ Cafe Dengan Pemandangan Alam

                    </span>



                    <h1 class="text-3xl md:text-6xl font-black leading-tight">

                        Nikmati

                        <span class="gradient-text block mt-2">
                            Pemandangan Alam
                        </span>

                        Sambil Bersantai

                    </h1>



                    <p class="mt-8 text-md md:text-lg text-gray-300 leading-relaxed max-w-2xl">

                        Rolet Specta menghadirkan pengalaman nongkrong modern
                        dengan nuansa alam terbuka, udara segar,
                        dan suasana estetik yang memanjakan mata.

                    </p>



                    <div class="mt-10 flex flex-wrap gap-5">

                        <button
                            class="px-8 py-4 rounded-full bg-red-500 text-white font-bold hover:scale-105 transition duration-300 shadow-2xl shadow-red-500/30">
                            Jelajahi Sekarang
                        </button>
                        <button
                            class="px-8 py-4 rounded-full border border-white/20 glass hover:bg-white/10 transition duration-300">
                            Lihat Gallery
                        </button>
                    </div>

                </div>
                {{-- RIGHT --}}
                <div class="relative hidden lg:flex justify-center floating">

                    <div class="absolute -top-10 -left-10 w-72 h-72 bg-red-500/20 blur-[120px] rounded-full">
                    </div>
                    <div class="glass p-5 rounded-[40px] shadow-2xl shadow-black/50 w-[420px]">

                        <img src="{{ asset('website/assets/images/sd.PNG') }}"
                            class="rounded-[30px] h-[520px] w-full object-cover" alt="Cafe">

                    </div>
                </div>

            </div>

        </div>

    </section>







    {{-- ABOUT --}}
    <section id="about" class="py-28 px-6 lg:px-12 relative overflow-hidden">

        <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-500/10 blur-[150px] rounded-full">
        </div>

        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-20 items-center relative z-10">

            <div>

                <img src="{{ asset('website/assets/images/rolet specta.PNG') }}"
                    class="rounded-[40px] h-[600px] w-full object-cover shadow-2xl shadow-black/40"
                    alt="Rolet Specta Caffe">

            </div>



            <div>

                <span class="text-red-400 uppercase tracking-[5px] text-sm">

                    Tentang Cafe

                </span>

                <h2 class="text-3xl md:text-6xl font-black mt-5 leading-tight">

                    Tempat Nongkrong

                    <span class="gradient-text block">
                        Dengan Nuansa Alam
                    </span>

                </h2>

                <p class="mt-8 text-gray-300 text-lg leading-relaxed">

                    Kami menghadirkan cafe dengan pemandangan alam luas,
                    suasana nyaman, area outdoor modern,
                    dan spot estetik terbaik untuk bersantai.

                </p>



                <div class="mt-10 grid sm:grid-cols-2 gap-6">

                    <div class="glass rounded-3xl p-6">

                        <div class="text-4xl">
                            🌿
                        </div>

                        <h3 class="mt-4 text-xl font-bold">
                            Udara Segar
                        </h3>

                        <p class="mt-3 text-gray-300 text-sm leading-relaxed">

                            Nikmati udara alam yang sejuk dan nyaman.

                        </p>

                    </div>



                    <div class="glass rounded-3xl p-6">

                        <div class="text-4xl">
                            ☕
                        </div>

                        <h3 class="mt-4 text-xl font-bold">
                            Kopi Premium
                        </h3>

                        <p class="mt-3 text-gray-300 text-sm leading-relaxed">

                            Racikan kopi spesial dengan kualitas terbaik.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>








    {{-- GALLERY --}}
    <section id="gallery" class="py-28 px-6 lg:px-12 bg-[#0b161b]">

        <div class="max-w-7xl mx-auto">

            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-10">

                <div>

                    <span class="text-red-400 tracking-[5px] uppercase text-sm">

                        Gallery

                    </span>

                    <h2 class="text-3xl md:text-6xl font-black mt-5 leading-tight">

                        Keindahan

                        <span class="gradient-text">
                            Rolet Specta
                        </span>

                    </h2>

                </div>



                <button
                    class="px-8 py-4 rounded-full bg-red-500 text-white font-bold hover:scale-105 transition duration-300 shadow-2xl shadow-red-500/30 w-fit">

                    Explore Gallery Lainnya

                </button>

            </div>





            <div class="mt-20 grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($gallery as $items)
                    <div class="gallery-hover overflow-hidden rounded-[35px] relative h-[450px]">

                        <img src="{{ asset('storage/' . $items->image) }}" alt="Galley Rolet Specta"
                            class="w-full h-full object-cover" alt="Gallery">

                    </div>
                @endforeach

            </div>

        </div>

    </section>








    {{-- MENU --}}
    <section id="menu" class="py-28 px-6 lg:px-12">

        <div class="max-w-7xl mx-auto">

            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-10">

                <div>

                    <span class="text-red-400 tracking-[5px] uppercase text-sm">

                        Menu Favorit

                    </span>

                    <h2 class="text-3xl md:text-6xl font-black mt-5 leading-tight">
                        Kuliner
                        <span class="gradient-text">
                            Rolet Specta
                        </span>
                    </h2>

                </div>



                <button
                    class="px-8 py-4 rounded-full bg-red-500 text-white font-bold hover:scale-105 transition duration-300 shadow-2xl shadow-red-500/30 w-fit">

                    Explore Menu Lainnya

                </button>

            </div>





            <div class="mt-20 grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($menu as $item)
                    <div class="glass rounded-[35px] overflow-hidden hover:-translate-y-2 transition duration-500">
                        <img src="{{ asset('storage/' . $item->image) }}" class="h-[260px] w-full object-cover"
                            alt="Coffee">
                        <div class="p-7">
                            <div class="flex items-center justify-between">

                                <h3 class="text-2xl font-bold">
                                    {{ $item->name }}
                                </h3>

                                <span class="text-red-400 font-bold">
                                    {{ format_rupiah($item->harga) }}
                                </span>
                            </div>
                            <p class="mt-4 text-gray-300 leading-relaxed">
                                {{ $item->keterangan }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </section>

    <section id="reservasi" class="relative py-20 px-6 lg:px-12 overflow-hidden">

        {{-- BACKGROUND IMAGE --}}
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image:
        linear-gradient(to top, rgba(7,16,20,1), rgba(7,16,20,.4)),
        url('website/assets/images/Capture.PNG');">

            {{-- OVERLAY --}}
            <div class="absolute
            inset-0 bg-gradient-to-t from-[#071014] via-[#071014]/70 to-[#071014]/40">
            </div>

            {{-- DARK SHADOW --}}
            <div class="absolute inset-0 bg-black/10">
            </div>

        </div>

        {{-- BLUR LIGHT --}}
        <div class="absolute top-[-150px] right-[-120px] w-[420px] h-[420px] bg-red-500/20 blur-[150px] rounded-full">
        </div>

        <div class="absolute bottom-[-150px] left-[-120px] w-[420px] h-[420px] bg-white/10 blur-[150px] rounded-full">
        </div>





        <div class="max-w-7xl mx-auto relative z-10">

            <div class="min-h-[650px] flex items-center">

                <div class="max-w-3xl">

                    <span
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/10 border border-white/10 backdrop-blur-xl text-white text-sm tracking-[4px] uppercase">

                        ✦ Reservasi Sekarang

                    </span>
                    <h2 class="text-3xl md:text-7xl font-black leading-tight mt-8">

                        Nikmati Momen
                        <span class="gradient-text block">
                            Terbaikmu
                        </span>

                    </h2>

                    <p class="mt-8 text-lg md:text-xl text-gray-300 leading-relaxed max-w-2xl">

                        Rasakan pengalaman nongkrong modern dengan view alam luas,
                        udara sejuk, dan suasana khas Rolet Specta
                        bersama teman maupun keluarga.
                    </p>
                    {{-- BUTTON --}}
                    <div class="mt-12 flex flex-wrap gap-5">

                        <a href="#"
                            class="px-10 py-5 rounded-2xl bg-red-500 hover:bg-red-600 text-white font-bold transition duration-300 shadow-2xl shadow-red-500/30 hover:scale-105">

                            Reservasi Sekarang

                        </a>

                        <a href="#gallery"
                            class="px-10 py-5 rounded-2xl border border-white/20 bg-white/10 backdrop-blur-xl hover:bg-white/20 transition duration-300">

                            Explore Gallery

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>









    {{-- ============================= --}}
    {{-- CONTACT US SECTION --}}
    {{-- ============================= --}}
    <section id="contact" class="relative py-32 px-6 lg:px-12 overflow-hidden bg-[#0b161b]">

        {{-- BLUR --}}
        <div
            class="absolute bottom-[-150px] left-[-120px] w-[420px] h-[420px] bg-red-500/10 blur-[150px] rounded-full">
        </div>





        <div class="max-w-7xl mx-auto relative z-10">

            {{-- HEADER --}}
            <div class="text-center max-w-3xl mx-auto">

                <span
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-red-500/10 border border-red-500/20 text-red-400 text-sm tracking-[4px] uppercase">

                    ✦ Contact Us

                </span>

                <h2 class="text-5xl md:text-6xl font-black leading-tight mt-8">

                    Hubungi
                    <span class="gradient-text">
                        Rolet Specta
                    </span>

                </h2>

                <p class="mt-6 text-lg text-gray-400 leading-relaxed">

                    Hubungi kami untuk reservasi, pertanyaan,
                    maupun informasi lainnya mengenai cafe kami.

                </p>

            </div>








            {{-- CONTACT CARD --}}
            <div class="mt-20 grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- CARD --}}
                <div
                    class="group relative overflow-hidden rounded-[35px] border border-white/10 bg-white/[0.03] backdrop-blur-xl p-8 hover:-translate-y-2 transition duration-500">

                    <div
                        class="absolute inset-0 bg-gradient-to-b from-red-500/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>

                    <div class="relative z-10">

                        <div
                            class="w-20 h-20 rounded-3xl bg-red-500/10 border border-red-500/20 flex items-center justify-center text-4xl">

                            📍

                        </div>

                        <h3 class="mt-8 text-2xl font-bold">
                            Lokasi
                        </h3>

                        <p class="mt-4 text-gray-400 leading-relaxed">
                            Kelet, Kec. Keling, Kab. Jepara, Jawa Tengah
                        </p>

                    </div>

                </div>
                {{-- CARD --}}
                <div
                    class="group relative overflow-hidden rounded-[35px] border border-white/10 bg-white/[0.03] backdrop-blur-xl p-8 hover:-translate-y-2 transition duration-500">

                    <div
                        class="absolute inset-0 bg-gradient-to-b from-red-500/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>

                    <div class="relative z-10">

                        <div
                            class="w-20 h-20 rounded-3xl bg-red-500/10 border border-red-500/20 flex items-center justify-center text-4xl">

                            ☎️

                        </div>

                        <h3 class="mt-8 text-2xl font-bold">
                            Telepon
                        </h3>

                        <p class="mt-4 text-gray-400 leading-relaxed">

                            +62 812 3481 9907

                        </p>

                    </div>

                </div>
                {{-- CARD --}}
                <div
                    class="group relative overflow-hidden rounded-[35px] border border-white/10 bg-white/[0.03] backdrop-blur-xl p-8 hover:-translate-y-2 transition duration-500">

                    <div
                        class="absolute inset-0 bg-gradient-to-b from-red-500/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>

                    <div class="relative z-10">

                        <div
                            class="w-20 h-20 rounded-3xl bg-red-500/10 border border-red-500/20 flex items-center justify-center text-4xl">

                            ✉️

                        </div>

                        <h3 class="mt-8 text-2xl font-bold">
                            Email
                        </h3>

                        <p class="mt-4 text-gray-400 leading-relaxed break-all">

                            roletspecta@gmail.com

                        </p>

                    </div>

                </div>
                {{-- SOCIAL --}}
                <div
                    class="group relative overflow-hidden rounded-[35px] border border-white/10 bg-white/[0.03] backdrop-blur-xl p-8 hover:-translate-y-2 transition duration-500">

                    <div
                        class="absolute inset-0 bg-gradient-to-b from-red-500/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>

                    <div class="relative z-10">

                        <div
                            class="w-20 h-20 rounded-3xl bg-red-500/10 border border-red-500/20 flex items-center justify-center text-4xl">

                            🌐

                        </div>

                        <h3 class="mt-8 text-2xl font-bold">
                            Sosial Media
                        </h3>





                        <div class="mt-6 flex items-center gap-4">

                            {{-- FACEBOOK --}}
                            <a href="https://www.facebook.com/RoletSpectaCafe" title="Facebook" target="_blank"
                                class="w-12 h-12 rounded-2xl border border-white/10 bg-white/5 flex items-center justify-center text-lg hover:bg-red-500 hover:border-red-500 transition duration-300 hover:scale-110">

                                f

                            </a>
                            {{-- INSTAGRAM --}}
                            <a href="https://www.instagram.com/roletspecta_cafe/" target="_blank" title="Instagram"
                                class="w-12 h-12 rounded-2xl border border-white/10 bg-white/5 flex items-center justify-center text-lg hover:bg-gradient-to-br hover:from-pink-500 hover:to-orange-400 transition duration-300 hover:scale-110">

                                ◎

                            </a>
                            {{-- TIKTOK --}}
                            <a href="https://www.tiktok.com/@roletspecta_cafe" target="_blank" title="Tik Tok"
                                class="w-12 h-12 rounded-2xl border border-white/10 bg-white/5 flex items-center justify-center text-lg hover:bg-white hover:text-black transition duration-300 hover:scale-110">

                                ♪

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- FOOTER --}}
    <footer class="py-10 border-t border-white/10">

        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col md:flex-row items-center justify-between gap-5">

            <h1 class="text-2xl font-black tracking-[6px] gradient-text">

                ROLET SPECTA

            </h1>

            <p class="text-gray-400 text-sm">
                © 2026 Rolet Specta. All Rights Reserved.
            </p>

        </div>

    </footer>






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
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        menuBtn.addEventListener('click', () => {

            mobileMenu.classList.toggle('hidden');

        });
    </script>

</body>

</html>
