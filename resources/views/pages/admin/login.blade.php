<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <!-- IMPORTANT -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title>Login UI</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
            overflow-x: hidden;
            background: #f5f7fb;
        }
    </style>

</head>

<body>

    <!-- Wrapper -->
    <div class="min-h-screen w-full flex items-center justify-center px-4">

        <!-- Card -->
        <div class="w-full max-w-[320px] bg-white rounded-3xl p-6 shadow-lg">

            <!-- Icon -->
            <div class="w-14 h-14 mx-auto mb-6 rounded-2xl bg-indigo-100 flex items-center justify-center">

                <span class="material-symbols-rounded text-indigo-600 text-3xl">
                    lock
                </span>

            </div>

            <!-- Heading -->
            <div class="text-center mb-6">

                <h1 class="text-2xl font-bold text-slate-800 mb-1">
                    Login
                </h1>

                <p class="text-xs text-slate-500">
                    Please sign in to continue
                </p>

            </div>

            <!-- Form -->
            <form action="{{ route('proses_login') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Username -->
                <div>

                    <label class="block text-xs font-semibold text-slate-600 mb-2">
                        Username
                    </label>

                    <div class="h-11 bg-slate-100 rounded-xl px-3 flex items-center gap-2">

                        <span class="material-symbols-rounded text-[18px] text-slate-400">
                            person
                        </span>

                        <input type="text" placeholder="Enter username" name="username"
                            class="w-full bg-transparent outline-none text-sm text-slate-700 placeholder:text-slate-400">

                    </div>

                </div>

                <!-- Password -->
                <div>

                    <label class="block text-xs font-semibold text-slate-600 mb-2">
                        Password
                    </label>

                    <div class="h-11 bg-slate-100 rounded-xl px-3 flex items-center gap-2">

                        <span class="material-symbols-rounded text-[18px] text-slate-400">
                            lock
                        </span>

                        <input id="password" type="password" name="password" placeholder="Enter password"
                            class="w-full bg-transparent outline-none text-sm text-slate-700 placeholder:text-slate-400">

                        <button type="button" id="togglePassword"
                            class="flex items-center justify-center text-slate-400">
                            <span class="material-symbols-rounded text-[18px]">
                                visibility
                            </span>
                        </button>

                    </div>

                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full h-11 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold transition">
                    Sign In
                </button>

            </form>

        </div>

    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', () => {

            password.type =
                password.type === 'password' ?
                'text' :
                'password';

        });
    </script>

</body>

</html>
