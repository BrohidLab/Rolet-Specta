<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- GOOGLE ICON -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            overflow-x: hidden;
        }
    </style>
</head>

<!-- layouts/app.blade.php -->

<body class="bg-[#f4f7fb]">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        @include('components.admin.layouts.partials.sidebar')

        <!-- CONTENT -->
        <div class="flex-1 lg:ml-[250px]">

            <!-- WRAPPER -->
            <div class="">

                <!-- HEADER -->
                @include('components.admin.layouts.partials.navbar')

                <!-- MAIN CONTENT -->
                <main class="mt-5 p-6">
                    @yield('content')
                </main>

            </div>

        </div>

    </div>

    <div id="overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    @include('components.admin.layouts.partials.script')

</body>

</html>
