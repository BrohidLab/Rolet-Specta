<nav class="fixed top-0 left-0 w-full z-50 border-b border-white/10 backdrop-blur-xl bg-black/20">

    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-5 flex items-center justify-between">

        <h1 class="text-2xl md:text-3xl font-black tracking-[6px] gradient-text">

            ROLET SPECTA

        </h1>



        {{-- DESKTOP MENU --}}
        <div class="hidden md:flex items-center gap-10 text-sm tracking-wide text-gray-200">

            <a href="/" class="hover:text-red-400 transition duration-300">
                Beranda
            </a>

            <a href="{{ route('about') }}" class="hover:text-red-400 transition duration-300">
                Tentang
            </a>

            <a href="{{ route('gallery') }}" class="hover:text-red-400 transition duration-300">
                Gallery
            </a>

            <a href="{{ route('menu') }}" class="hover:text-red-400 transition duration-300">
                Menu
            </a>

            <a href="{{ route('contact-us') }}" class="hover:text-red-400 transition duration-300">
                Kontak
            </a>

        </div>



        {{-- BUTTON --}}
        <a href="https://wa.me/6281234819907" target="_blank"
            class="hidden md:block px-6 py-3 rounded-full bg-red-500 text-white font-bold hover:scale-105 transition duration-300 shadow-2xl shadow-red-500/30">

            Reservasi

        </a>
        {{-- MOBILE BUTTON --}}
        <button id="menuBtn" class="md:hidden text-3xl text-white">

            ☰

        </button>

    </div>



    {{-- MOBILE MENU --}}
    <div id="mobileMenu" class="hidden md:hidden px-6 pb-6 backdrop-blur-xl border-t border-white/10">
        <div class="flex flex-col gap-5 pt-5 text-gray-200">
            <a href="/" class="hover:text-red-400 transition duration-300">
                Beranda
            </a>
            <a href="{{ route('about') }}" class="hover:text-red-400 transition duration-300">
                Tentang
            </a>
            <a href="{{ route('gallery') }}" class="hover:text-red-400 transition duration-300">
                Gallery
            </a>
            <a href="{{ route('menu') }}" class="hover:text-red-400 transition duration-300">
                Menu
            </a>
            <a href="{{ route('contact-us') }}" class="hover:text-red-400 transition duration-300">
                Kontak
            </a>
            <a href="https://wa.me/6281234819907" target="_blank"
                class="mt-3 px-6 py-3 rounded-full bg-red-500 text-white font-bold shadow-lg shadow-red-500/30">
                Reservasi
            </a>
        </div>
    </div>
</nav>
