@extends('components.admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

    <div class="max-w-3xl mx-auto">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">

            <div>

                <h1 class="text-2xl font-bold text-gray-800">
                    Tambah Kategori
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Tambahkan kategori baru untuk mengelompokkan galeri.
                </p>

            </div>

            <a href="{{ route('master.category.index') }}"
                class="inline-flex items-center gap-2 h-11 px-5 rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50 transition">

                <span class="material-symbols-rounded text-[20px]">
                    arrow_back
                </span>

                Kembali

            </a>

        </div>

        <!-- Card -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">

            <form action="{{ route('master.category.store') }}" method="POST">

                @csrf

                <div class="p-8 space-y-6">

                    <!-- Nama -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">

                            Nama Kategori
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh : Reservasi"
                            class="w-full h-12 px-4 rounded-xl border @error('name') border-red-500 @else border-gray-200 @enderror focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

                        @error('name')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                        <p class="mt-2 text-sm text-gray-400">
                            Digunakan untuk mengelompokkan data galeri.
                        </p>

                    </div>

                </div>

                <div class="flex justify-end gap-3 px-8 py-5 border-t border-gray-100">

                    <a href="{{ route('master.category.index') }}"
                        class="h-11 px-5 rounded-xl border border-gray-200 text-gray-600 flex items-center hover:bg-gray-50 transition">

                        Batal

                    </a>

                    <button type="submit"
                        class="inline-flex items-center gap-2 h-11 px-6 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium transition">

                        <span class="material-symbols-rounded text-[20px]">
                            save
                        </span>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection
