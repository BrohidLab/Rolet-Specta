@extends('components.admin.layouts.app')

@section('title', 'Edit Kategori')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="flex items-center justify-between mb-8">

            <div>
                <h1 class="text-2xl font-bold">
                    Edit Kategori
                </h1>

                <p class="text-gray-500 mt-1">
                    Perbarui data kategori.
                </p>
            </div>

            <a href="{{ route('master.category.index') }}" class="h-11 px-5 rounded-xl border flex items-center">
                Kembali
            </a>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border">

            <form action="{{ route('master.category.update', $category) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="p-8">

                    <label class="block mb-2 font-semibold">
                        Nama Kategori
                    </label>

                    <input type="text" name="name" value="{{ old('name', $category->name) }}"
                        class="w-full h-12 px-4 rounded-xl border @error('name') border-red-500 @else border-gray-200 @enderror">

                    @error('name')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="border-t p-6 flex justify-end gap-3">

                    <a href="{{ route('master.category.index') }}" class="h-11 px-5 rounded-xl border flex items-center">
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
