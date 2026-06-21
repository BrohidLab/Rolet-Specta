@extends('components.admin.layouts.app')

@section('title', 'Edit Paket')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="flex items-center justify-between mb-8">

            <div>
                <h1 class="text-2xl font-bold">
                    Edit Paket
                </h1>

                <p class="text-gray-500 mt-1">
                    Perbarui data Paket.
                </p>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('master.paket.index') }}"
                    class="inline-flex items-center gap-2 h-11 px-5 rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50 transition">

                    <span class="material-symbols-rounded text-[20px]">
                        arrow_back
                    </span>

                    Kembali

                </a>
                <form action="{{ route('master.paket.non_active', $paket) }}" method="POST" class="delete-form inline">

                    @csrf
                    @method('PUT')
                    <button type="submit"
                        class="h-11 px-5 rounded-xl border bg-red-100 text-red-700 border-red-700 flex items-center">
                        Non Aktif
                    </button>

                </form>
            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border">

            <form action="{{ route('master.paket.update', $paket) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="p-8">

                    <label class="block mb-2 font-semibold">
                        Nama Paket
                    </label>

                    <input type="text" name="name" value="{{ old('name', $paket->name) }}"
                        class="w-full h-12 px-4 rounded-xl border @error('name') border-red-500 @else border-gray-200 @enderror">

                    @error('name')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="border-t p-6 flex justify-end gap-3">

                    <a href="{{ route('master.paket.index') }}" class="h-11 px-5 rounded-xl border flex items-center">
                        Batal
                    </a>
                    <button class="h-11 px-6 rounded-xl bg-blue-600 text-white">
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.delete-form').forEach(form => {

                form.addEventListener('submit', function(e) {

                    e.preventDefault();

                    Swal.fire({
                        title: 'Non Aktif paket?',
                        text: 'Data yang dinon aktifkan tidak dapat ditampilkan pada halaman utama dan tidak bisa diedit lagi.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#6b7280',
                        reverseButtons: true,
                    }).then((result) => {

                        if (result.isConfirmed) {
                            form.submit();
                        }

                    });

                });

            });

        });
    </script>
@endpush
