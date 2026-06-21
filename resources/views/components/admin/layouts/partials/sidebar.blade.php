<!-- components/sidebar.blade.php -->

<aside id="sidebar"
    class="fixed lg:fixed top-0 left-0 z-50 w-[250px] h-full bg-white border-r border-gray-100 transition-all duration-300 -translate-x-full lg:translate-x-0">

    <!-- LOGO -->
    <div class="h-20 px-6 flex items-center border-b border-gray-100">

        <div class="flex items-center gap-3">

            <div
                class="w-11 h-11 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-500 flex items-center justify-center shadow-lg shadow-blue-500/20">

                <span class="text-white text-lg font-black">
                    A
                </span>

            </div>

            <div>

                <h1 class="text-base font-black text-gray-800 leading-none">
                    ROLET SPECTA
                </h1>

                <p class="text-xs text-gray-400 mt-1">
                    Dashboard Admin
                </p>

            </div>

        </div>

    </div>

    <!-- MENU -->
    <!-- MENU -->
    <div class="p-4 space-y-1.5">

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 h-11 px-4 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }} transition text-sm font-medium">

            <span class="material-symbols-rounded text-[20px]">
                dashboard
            </span>

            Dashboard

        </a>

        <!-- MASTER -->
        <div>

            <button onclick="toggleMasterMenu()"
                class="w-full flex items-center justify-between h-11 px-4 rounded-xl {{ request()->routeIs('master.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }} transition text-sm font-medium">

                <div class="flex items-center gap-3">

                    <span class="material-symbols-rounded text-[20px]">
                        inventory_2
                    </span>

                    Master

                </div>

                <span id="masterArrow" class="material-symbols-rounded text-[20px] transition duration-300">

                    expand_more

                </span>

            </button>

            <div id="masterMenu" class="{{ request()->routeIs('master.*') ? '' : 'hidden' }} mt-2 ml-6 space-y-1">

                <a href="{{ route('master.category.index') }}"
                    class="flex items-center gap-3 h-10 px-4 rounded-lg {{ request()->routeIs('master.category.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }} transition text-sm">

                    <span class="material-symbols-rounded text-[18px]">
                        category
                    </span>

                    Data Kategori

                </a>

                <a href="{{ route('master.paket.index') }}"
                    class="flex items-center gap-3 h-10 px-4 rounded-lg {{ request()->routeIs('master.paket.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }} transition text-sm">

                    <span class="material-symbols-rounded text-[18px]">
                        inventory
                    </span>

                    Data Paket

                </a>

            </div>

        </div>

        <!-- Gallery -->
        <a href="{{ route('gallery.index') }}"
            class="flex items-center gap-3 h-11 px-4 rounded-xl {{ request()->routeIs('gallery.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }} transition text-sm font-medium">

            <span class="material-symbols-rounded text-[20px]">
                photo_library
            </span>

            Gallery

        </a>

        <!-- List Menu -->
        <a href="{{ route('menu.index') }}"
            class="flex items-center gap-3 h-11 px-4 rounded-xl {{ request()->routeIs('menu.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }} transition text-sm font-medium">

            <span class="material-symbols-rounded text-[20px]">
                restaurant_menu
            </span>

            List Menu

        </a>

        <!-- Analytics -->
        <a href="#"
            class="flex items-center gap-3 h-11 px-4 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-800 transition text-sm font-medium">

            <span class="material-symbols-rounded text-[20px]">
                monitoring
            </span>

            Analytics

        </a>

        <!-- Settings -->
        <a href="#"
            class="flex items-center gap-3 h-11 px-4 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-800 transition text-sm font-medium">

            <span class="material-symbols-rounded text-[20px]">
                settings
            </span>

            Settings

        </a>

    </div>

</aside>
@push('script')
    <script>
        function toggleMasterMenu() {

            const menu = document.getElementById('masterMenu');
            const arrow = document.getElementById('masterArrow');

            menu.classList.toggle('hidden');

            arrow.classList.toggle('rotate-180');

        }

        window.addEventListener('DOMContentLoaded', () => {

            if (!document.getElementById('masterMenu').classList.contains('hidden')) {

                document.getElementById('masterArrow').classList.add('rotate-180');

            }

        });
    </script>
@endpush
