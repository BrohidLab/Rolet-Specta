@extends('components.admin.layouts.app')
@section('title', 'Create Data Menu Product Rolet Specta')
@section('content')
    <!-- Product Create Content -->
    <div class="w-full px-4 py-5 md:px-6">

        <!-- Header -->
        <div
            class="mb-6 flex flex-col gap-4 rounded-3xl bg-white p-5 shadow-sm md:flex-row md:items-center md:justify-between">

            <div>

                <h1 class="text-2xl font-bold text-slate-800">
                    Add Product
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Tambahkan menu product baru
                </p>

            </div>

            <a href="{{ route('menu.index') }}"
                class="flex h-11 items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 text-sm font-medium text-slate-700 transition-all hover:bg-slate-100">

                <span class="material-symbols-rounded text-[20px]">
                    arrow_back
                </span>

                Back

            </a>

        </div>

        <!-- Form Card -->
        <div class="rounded-3xl bg-white p-5 shadow-sm md:p-6">

            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">

                @csrf

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                    <!-- Product Name -->
                    <div>

                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            Product Name
                        </label>

                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter product name"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm outline-none transition-all focus:border-indigo-500 focus:bg-white">

                        @error('name')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Category -->
                    <div>

                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            Category
                        </label>

                        <select name="category"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm outline-none transition-all focus:border-indigo-500 focus:bg-white">

                            <option value="">
                                -- Select Category --
                            </option>

                            <option value="Makanan" {{ old('category') == 'Makanan' ? 'selected' : '' }}>
                                Makanan
                            </option>

                            <option value="Minuman" {{ old('category') == 'Minuman' ? 'selected' : '' }}>
                                Minuman
                            </option>

                            <option value="Cemilan" {{ old('category') == 'Cemilan' ? 'selected' : '' }}>
                                Cemilan
                            </option>

                        </select>

                        @error('category')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Jenis Makanan -->
                    <div>

                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            Jenis Makanan
                        </label>

                        <input type="text" name="jenis_makanan" value="{{ old('jenis_makanan') }}"
                            placeholder="Fast Food / Beverage"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm outline-none transition-all focus:border-indigo-500 focus:bg-white">

                        @error('jenis_makanan')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Harga -->
                    <div>

                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            Harga
                        </label>

                        <input type="number" name="harga" value="{{ old('harga') }}" placeholder="Enter harga"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm outline-none transition-all focus:border-indigo-500 focus:bg-white">

                        @error('harga')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

                <!-- Keterangan -->
                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Keterangan
                    </label>

                    <textarea name="keterangan" rows="5" placeholder="Enter product description"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition-all focus:border-indigo-500 focus:bg-white">{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Image Upload -->
                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Product Image
                    </label>

                    <label
                        class="flex cursor-pointer flex-col items-center justify-center rounded-3xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-10 transition-all hover:border-indigo-500 hover:bg-indigo-50">

                        <span class="material-symbols-rounded mb-3 text-[48px] text-slate-400">
                            cloud_upload
                        </span>

                        <h3 class="text-sm font-semibold text-slate-700">
                            Upload Product Image
                        </h3>

                        <p class="mt-1 text-xs text-slate-500">
                            PNG, JPG, JPEG, WEBP
                        </p>

                        <input type="file" name="image" class="hidden">

                    </label>

                    @error('image')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Action -->
                <div class="flex flex-col gap-3 pt-2 sm:flex-row">

                    <button type="submit"
                        class="flex h-12 items-center justify-center gap-2 rounded-2xl bg-indigo-600 px-6 text-sm font-medium text-white transition-all hover:bg-indigo-700">

                        <span class="material-symbols-rounded text-[20px]">
                            save
                        </span>

                        Save Product

                    </button>

                    <a href="{{ route('menu.index') }}"
                        class="flex h-12 items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-6 text-sm font-medium text-slate-700 transition-all hover:bg-slate-100">

                        <span class="material-symbols-rounded text-[20px]">
                            close
                        </span>

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
