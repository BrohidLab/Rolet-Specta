<!-- components/header.blade.php -->

<header
    class="h-20 px-4 sm:px-6 lg:px-8 bg-white border-b border-gray-100 flex items-center justify-between sticky top-0 z-40">

    <!-- LEFT -->
    <div class="flex items-center gap-3">

        <!-- MOBILE BUTTON -->
        <button onclick="toggleSidebar()"
            class="lg:hidden w-10 h-10 rounded-xl hover:bg-gray-100 flex items-center justify-center transition">

            <span class="material-symbols-rounded text-gray-700 text-[22px]">
                menu
            </span>

        </button>


    </div>

    <!-- RIGHT -->
    <div class="relative">

        <!-- PROFILE BUTTON -->
        <button onclick="toggleDropdown()" class="flex items-center gap-3 p-2 rounded-2xl hover:bg-gray-50 transition">

            <img src="https://i.pravatar.cc/100" class="w-11 h-11 rounded-xl object-cover">

            <div class="hidden sm:block text-left">

                <h3 class="text-sm font-semibold text-gray-800 leading-none">
                    Administrator
                </h3>

                <p class="text-xs text-gray-400 mt-1">
                    Super Admin
                </p>

            </div>

            <span class="material-symbols-rounded text-gray-500 text-[20px]">
                expand_more
            </span>

        </button>

        <!-- DROPDOWN -->
        <div id="profileDropdown"
            class="hidden absolute right-0 top-[70px] w-[220px] bg-white border border-gray-100 rounded-2xl shadow-xl overflow-hidden">

            <!-- USER INFO -->
            <div class="p-4 border-b border-gray-100">

                <h3 class="font-semibold text-gray-800">
                    Administrator
                </h3>

                <p class="text-sm text-gray-400 mt-1">
                    admin@gmail.com
                </p>

            </div>

            <!-- MENU -->
            <div class="p-2">

                <form action="" method="POST">
                    @csrf

                    <button type="submit"
                        class="w-full h-11 px-4 rounded-xl flex items-center gap-3 text-red-500 hover:bg-red-50 transition text-sm font-medium">

                        <span class="material-symbols-rounded text-[20px]">
                            logout
                        </span>

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</header>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('profileDropdown')

        dropdown.classList.toggle('hidden')
    }

    window.addEventListener('click', function(e) {
        const button = e.target.closest('button')
        const dropdown = document.getElementById('profileDropdown')

        if (!e.target.closest('#profileDropdown') &&
            !e.target.closest('[onclick=\"toggleDropdown()\"]')) {
            dropdown.classList.add('hidden')
        }
    })
</script>
