<!-- components/sidebar.blade.php -->

<aside id="sidebar"
    class="fixed lg:fixed top-0 left-0 z-50 w-[250px] h-screen bg-white border-r border-gray-100 transition-all duration-300 -translate-x-full lg:translate-x-0">

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
                    AdminPro
                </h1>

                <p class="text-xs text-gray-400 mt-1">
                    Dashboard Panel
                </p>

            </div>

        </div>

    </div>

    <!-- MENU -->
    <div class="p-4 space-y-1.5">

        <!-- ACTIVE -->
        <a href="#"
            class="flex items-center gap-3 h-11 px-4 rounded-xl bg-blue-50 text-blue-600 font-medium text-sm">

            <span class="material-symbols-rounded text-[20px]">
                dashboard
            </span>

            Dashboard

        </a>

        <!-- ITEM -->
        <a href="#"
            class="flex items-center gap-3 h-11 px-4 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-800 transition text-sm font-medium">

            <span class="material-symbols-rounded text-[20px]">
                group
            </span>

            Users

        </a>

        <!-- ITEM -->
        <a href="#"
            class="flex items-center gap-3 h-11 px-4 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-800 transition text-sm font-medium">

            <span class="material-symbols-rounded text-[20px]">
                monitoring
            </span>

            Analytics

        </a>

        <!-- ITEM -->
        <a href="#"
            class="flex items-center gap-3 h-11 px-4 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-800 transition text-sm font-medium">

            <span class="material-symbols-rounded text-[20px]">
                payments
            </span>

            Transactions

        </a>

        <!-- ITEM -->
        <a href="#"
            class="flex items-center gap-3 h-11 px-4 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-800 transition text-sm font-medium">

            <span class="material-symbols-rounded text-[20px]">
                settings
            </span>

            Settings

        </a>

    </div>

</aside>
