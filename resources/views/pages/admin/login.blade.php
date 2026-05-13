<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Elegant Login</title>

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>

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

        .glass {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .input-style {
            width: 100%;
            height: 56px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 0 18px;
            color: white;
            outline: none;
            transition: .3s;
        }

        .input-style:focus {
            border-color: #22d3ee;
            box-shadow: 0 0 0 5px rgba(34, 211, 238, .12);
        }

        .input-style::placeholder {
            color: #6b7280;
        }

        .bg-blur {
            position: absolute;
            border-radius: 999px;
            filter: blur(100px);
            opacity: .35;
        }
    </style>
</head>

<body class="min-h-screen bg-[#070b18] flex items-center justify-center p-4 relative">

    <!-- BACKGROUND -->
    <div class="bg-blur w-[280px] h-[280px] bg-cyan-500 top-[-80px] left-[-80px]"></div>

    <div class="bg-blur w-[280px] h-[280px] bg-fuchsia-500 bottom-[-80px] right-[-80px]"></div>
    <!-- LOGIN CARD -->
    <div class="w-full max-w-md glass rounded-[32px] p-7 sm:p-10 shadow-[0_20px_80px_rgba(0,0,0,0.45)] relative z-10">

        <!-- LOGO -->
        <div class="flex justify-center mb-8">

            <div
                class="w-20 h-20 rounded-3xl bg-gradient-to-br from-cyan-400 to-fuchsia-500 flex items-center justify-center text-3xl font-black text-white shadow-[0_10px_40px_rgba(34,211,238,0.35)]">
                A
            </div>

        </div>

        <!-- TITLE -->
        <div class="text-center mb-10">

            <h1 class="text-3xl sm:text-4xl font-black text-white mb-3">
                Welcome Back
            </h1>

            <p class="text-gray-400 leading-relaxed">
                Login to continue access dashboard administrator.
            </p>

        </div>

        <!-- ALERT -->
        @if (session('error'))
            <div class="mb-6 bg-red-500/10 border border-red-500/20 text-red-300 px-5 py-4 rounded-2xl text-sm">
                {{ session('error') }}
            </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('proses_login') }}" method="POST" class="space-y-5">

            @csrf

            <!-- EMAIL -->
            <div>

                <label class="block text-sm text-gray-300 mb-3">
                    Username
                </label>

                <input type="text" name="username" placeholder="adminsepcta" class="input-style">

            </div>
            <!-- PASSWORD -->
            <div>

                <label class="block text-sm text-gray-300 mb-3">
                    Password
                </label>

                <input type="password" name="password" placeholder="••••••••" class="input-style">

            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full h-14 rounded-2xl bg-gradient-to-r from-cyan-400 to-fuchsia-500 text-white font-bold text-lg hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 shadow-[0_10px_40px_rgba(34,211,238,0.25)]">
                Sign In
            </button>

        </form>

        <!-- FOOTER -->
        <div class="mt-8 text-center">

            <p class="text-gray-500 text-sm">
                © 2026 Admin Dashboard
            </p>

        </div>

    </div>

</body>

</html>
