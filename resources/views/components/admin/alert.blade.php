<!-- resources/views/components/alert.blade.php -->

@if (session('success'))
    <div id="alert-success"
        class="fixed right-4 top-4 z-50 flex w-full max-w-sm items-start gap-4 rounded-3xl border border-emerald-100 bg-white p-4 shadow-2xl">

        <!-- Icon -->
        <div
            class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600">

            <span class="material-symbols-rounded">
                check_circle
            </span>

        </div>

        <!-- Content -->
        <div class="flex-1">

            <h3 class="text-sm font-semibold text-slate-800">
                Success
            </h3>

            <p class="mt-1 text-sm leading-relaxed text-slate-500">
                {{ session('success') }}
            </p>

        </div>

        <!-- Close -->
        <button onclick="closeAlert('alert-success')"
            class="flex h-8 w-8 items-center justify-center rounded-xl text-slate-400 transition hover:bg-slate-100 hover:text-slate-700">

            <span class="material-symbols-rounded text-[20px]">
                close
            </span>

        </button>

    </div>
@endif

@if (session('error'))
    <div id="alert-error"
        class="fixed right-4 top-4 z-50 flex w-full max-w-sm items-start gap-4 rounded-3xl border border-red-100 bg-white p-4 shadow-2xl">

        <!-- Icon -->
        <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-red-100 text-red-600">

            <span class="material-symbols-rounded">
                error
            </span>

        </div>

        <!-- Content -->
        <div class="flex-1">

            <h3 class="text-sm font-semibold text-slate-800">
                Error
            </h3>

            <p class="mt-1 text-sm leading-relaxed text-slate-500">
                {{ session('error') }}
            </p>

        </div>

        <!-- Close -->
        <button onclick="closeAlert('alert-error')"
            class="flex h-8 w-8 items-center justify-center rounded-xl text-slate-400 transition hover:bg-slate-100 hover:text-slate-700">

            <span class="material-symbols-rounded text-[20px]">
                close
            </span>

        </button>

    </div>
@endif

<script>
    /**
     * Close Alert
     */
    function closeAlert(id) {

        const alertBox = document.getElementById(id);

        if (alertBox) {

            alertBox.classList.add(
                'opacity-0',
                'translate-x-10',
                'transition',
                'duration-300'
            );

            setTimeout(() => {

                alertBox.remove();

            }, 300);

        }

    }

    /**
     * Auto Close
     */
    setTimeout(() => {

        closeAlert('alert-success');
        closeAlert('alert-error');

    }, 4000);
</script>
