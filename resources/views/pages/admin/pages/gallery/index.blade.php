@extends('components.admin.layouts.app')
@section('title', 'Management Gallery Rolet Specta')
@section('content')
    <!-- Gallery Content -->
    <div class="w-full px-4 py-6 md:px-6">

        <!-- Header -->
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-800">
                    Gallery Management
                </h1>
                <p class="mt-1 text-sm text-slate-500">
                    Manage image and video gallery content.
                </p>
            </div>
            <!-- Actions -->
            <div class="flex items-center gap-3">
                <!-- Search -->
                <div class="relative hidden md:block">
                    <!-- Search Form -->
                    <form action="{{ route('gallery.index') }}" method="GET" class="relative w-full md:w-[320px]">

                        <span
                            class="material-symbols-rounded absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-slate-400">
                            search
                        </span>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search gallery..."
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-white pl-12 pr-4 text-sm text-slate-700 outline-none transition focus:border-slate-400 focus:ring-4 focus:ring-slate-100">

                    </form>
                </div>
                <!-- Add -->
                <a href="{{ route('gallery.create') }}"
                    class="inline-flex h-12 items-center gap-2 rounded-2xl bg-slate-900 px-5 text-sm font-medium text-white transition hover:opacity-90">
                    <span class="material-symbols-rounded text-[20px]">
                        add_photo_alternate
                    </span>
                    Add Gallery
                </a>
            </div>
        </div>

        <!-- Mobile Search -->
        <div class="relative mt-4 md:hidden">
            <span class="material-symbols-rounded absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-slate-400">
                search
            </span>
            <input type="text" placeholder="Search gallery..."
                class="h-12 w-full rounded-2xl border border-slate-200 bg-white pl-12 pr-4 text-sm text-slate-700 outline-none transition focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
        </div>
        <!-- Stats -->
        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">
                            Total Media
                        </p>
                        <h2 class="mt-2 text-3xl font-bold text-slate-800">
                            {{ $galleries->count() }}
                        </h2>
                    </div>

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-700">
                        <span class="material-symbols-rounded text-[28px]">
                            perm_media
                        </span>
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">
                            Images
                        </p>
                        <h2 class="mt-2 text-3xl font-bold text-slate-800">
                            {{ $galleries->where('type', 'image')->count() }}
                        </h2>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-100 text-blue-700">
                        <span class="material-symbols-rounded text-[28px]">
                            image
                        </span>
                    </div>
                </div>
            </div>

            <!-- Video -->
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">
                            Videos
                        </p>
                        <h2 class="mt-2 text-3xl font-bold text-slate-800">
                            {{ $galleries->where('type', 'video')->count() }}
                        </h2>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-red-100 text-red-700">
                        <span class="material-symbols-rounded text-[28px]">
                            videocam
                        </span>
                    </div>
                </div>
            </div>

            <!-- Latest -->
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">
                            Latest Upload
                        </p>
                        <h2 class="mt-2 text-lg font-semibold text-slate-800">
                            {{ optional($galleries->first())->title ?? 'No Data' }}
                        </h2>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700">
                        <span class="material-symbols-rounded text-[28px]">
                            schedule
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
            @forelse ($galleries as $gallery)
                <!-- Card -->
                <div
                    class="group overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-2xl">
                    <!-- Media -->
                    <div class="relative overflow-hidden">
                        @if ($gallery->type === 'image')
                            <!-- Image -->
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->alt }}"
                                class="h-72 w-full object-cover transition duration-700 group-hover:scale-110">
                        @elseif ($gallery->type === 'video')
                            <!-- Video -->
                            <video class="h-72 w-full object-cover" muted controls>
                                <source src="{{ asset('storage/' . $gallery->video) }}" type="video/mp4">
                            </video>
                        @endif

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent">
                        </div>
                        <!-- Type Badge -->
                        <div class="absolute left-4 top-4">
                            @if ($gallery->type === 'image')
                                <div
                                    class="inline-flex items-center gap-1 rounded-xl bg-white/90 px-3 py-1 text-xs font-medium text-slate-700 backdrop-blur">
                                    <span class="material-symbols-rounded text-[16px]">
                                        image
                                    </span>
                                    Image
                                </div>
                            @else
                                <div
                                    class="inline-flex items-center gap-1 rounded-xl bg-red-500/90 px-3 py-1 text-xs font-medium text-white backdrop-blur">
                                    <span class="material-symbols-rounded text-[16px]">
                                        play_circle
                                    </span>
                                    Video
                                </div>
                            @endif
                        </div>
                        <!-- Action -->
                        <div class="absolute right-4 top-4">
                            <button
                                class="flex h-10 w-10 items-center justify-center rounded-2xl bg-white/90 text-slate-700 backdrop-blur transition hover:bg-white">
                                <span class="material-symbols-rounded text-[20px]">
                                    more_vert
                                </span>
                            </button>
                        </div>
                        <!-- Bottom Info -->
                        <div class="absolute bottom-4 left-4 right-4">
                            <h2 class="truncate text-lg font-semibold text-white">
                                {{ $gallery->title }}
                            </h2>
                        </div>
                    </div>
                    <!-- Body -->
                    <div class="p-5">
                        <!-- Alt -->
                        <p class="line-clamp-2 text-sm leading-relaxed text-slate-500">
                            {{ $gallery->alt }}
                        </p>
                        <!-- Footer -->
                        <div class="mt-5 flex items-center justify-between">
                            <!-- Date -->
                            <div class="flex items-center gap-2 text-sm text-slate-400">
                                <span class="material-symbols-rounded text-[18px]">
                                    schedule
                                </span>
                                {{ $gallery->created_at->diffForHumans() }}
                            </div>
                            <!-- Actions -->
                            <div class="flex items-center gap-2">
                                <!-- Edit -->
                                <a href="{{ route('gallery.edit', $gallery->id) }}"
                                    class="flex h-10 w-10 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-700 transition hover:bg-slate-100">
                                    <span class="material-symbols-rounded text-[20px]">
                                        edit
                                    </span>
                                </a>
                                <button data-url="{{ route('gallery.destroy', $gallery->id) }}"
                                    class="btn-delete-gallery flex relative z-50 h-10 w-10 items-center justify-center rounded-2xl border border-red-100 bg-red-50 text-red-600 transition hover:bg-red-100">

                                    <span class="material-symbols-rounded text-[20px]">
                                        delete
                                    </span>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-span-full">
                    <div
                        class="flex flex-col items-center justify-center rounded-[32px] border border-dashed border-slate-300 bg-white px-6 py-24 text-center">
                        <div class="flex h-24 w-24 items-center justify-center rounded-full bg-slate-100 text-slate-600">
                            <span class="material-symbols-rounded text-[46px]">
                                perm_media
                            </span>
                        </div>
                        <h2 class="mt-6 text-2xl font-bold text-slate-800">
                            Gallery Empty
                        </h2>
                        <p class="mt-3 max-w-md text-sm leading-relaxed text-slate-500">
                            No gallery content available yet. Start uploading your image or video content.
                        </p>
                        <button
                            class="mt-7 inline-flex items-center gap-2 rounded-2xl bg-slate-900 px-5 py-3 text-sm font-medium text-white transition hover:opacity-90">
                            <span class="material-symbols-rounded">
                                add
                            </span>
                            Upload Media
                        </button>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '.btn-delete-gallery', function() {

            let button = $(this);
            let url = button.data('url');
            let card = button.closest('.relative');

            Swal.fire({
                title: 'Hapus data?',
                text: "Data tidak bisa dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280'
            }).then((result) => {

                if (result.isConfirmed) {

                    // disable button + loading
                    button.prop('disabled', true);
                    button.html('Deleting...');

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        beforeSend: function() {
                            Swal.showLoading();
                        },

                        success: function(response) {


                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2500,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });

                            setTimeout(() => {
                                location.reload();
                            }, 800);
                        },

                        error: function(xhr) {

                            let errorMessage = 'Terjadi kesalahan pada server';

                            if (xhr.responseJSON) {

                                // kalau ada message langsung
                                if (xhr.responseJSON.message) {
                                    errorMessage = xhr.responseJSON.message;
                                }

                                // kalau validation error
                                else if (xhr.responseJSON.errors) {
                                    errorMessage = Object.values(xhr.responseJSON.errors)
                                        .flat()
                                        .join('<br>');
                                }
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                html: errorMessage
                            });

                            button.prop('disabled', false);
                            button.html('Delete');
                        }
                    });

                }

            });
        });
    </script>
@endpush
