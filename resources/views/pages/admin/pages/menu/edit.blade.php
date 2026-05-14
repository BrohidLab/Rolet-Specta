@extends('components.admin.layouts.app')
@section('title', 'Edit Data Menu Rolet Specta')
@section('content')
    <!-- Product Edit Content -->
    <div class="w-full px-4 py-5 md:px-6">

        <!-- Header -->
        <div
            class="mb-6 flex flex-col gap-4 rounded-3xl bg-white p-5 shadow-sm md:flex-row md:items-center md:justify-between">

            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Edit Product
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Update data menu product
                </p>
            </div>

            <a href="{{ route('menu.index') }}"
                class="flex h-11 items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 text-sm font-medium text-slate-700 hover:bg-slate-100">

                <span class="material-symbols-rounded text-[20px]">arrow_back</span>
                Back
            </a>

        </div>

        <!-- Form -->
        <div class="rounded-3xl bg-white p-5 shadow-sm md:p-6">

            <form action="{{ route('menu.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                    <!-- Name -->
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Product Name</label>

                        <input type="text" name="name" value="{{ old('name', $product->name) }}"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm focus:border-indigo-500 focus:bg-white">

                        @error('name')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Category</label>

                        <select name="category"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm focus:border-indigo-500 focus:bg-white">

                            <option value="Makanan" {{ $product->category == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="Minuman" {{ $product->category == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="Cemilan" {{ $product->category == 'Cemilan' ? 'selected' : '' }}>Cemilan</option>

                        </select>

                        @error('category')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis -->
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Jenis Makanan</label>

                        <input type="text" name="jenis_makanan"
                            value="{{ old('jenis_makanan', $product->jenis_makanan) }}"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm">

                        @error('jenis_makanan')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Harga</label>

                        <input type="number" name="harga" value="{{ old('harga', $product->harga) }}"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm">

                        @error('harga')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Keterangan -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Keterangan</label>

                    <textarea name="keterangan" rows="4"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm">{{ old('keterangan', $product->keterangan) }}</textarea>

                    @error('keterangan')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Media Preview -->
                <div>

                    <h2 class="text-lg font-semibold text-slate-800">
                        Media Preview
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Current uploaded product image preview.
                    </p>

                    <!-- Image Preview -->
                    <div id="imagePreview" class="mt-5">

                        @if ($product->image)
                            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50">

                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="h-72 w-full object-cover">

                            </div>
                        @endif

                        <!-- Upload -->
                        <div class="mt-4">

                            <label
                                class="flex cursor-pointer flex-col items-center justify-center rounded-3xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-8 text-center transition hover:border-slate-400 hover:bg-slate-100">

                                <div
                                    class="flex h-16 w-16 items-center justify-center rounded-full bg-white text-slate-700 shadow-sm">

                                    <span class="material-symbols-rounded text-[32px]">
                                        upload
                                    </span>

                                </div>

                                <h3 class="mt-4 text-base font-semibold text-slate-800">
                                    Replace Image
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    Click to upload new image
                                </p>

                                <!-- File Name -->
                                <div id="imageFileName"
                                    class="mt-4 hidden w-full rounded-2xl bg-white px-4 py-3 text-left text-sm font-medium text-slate-700 shadow-sm">
                                </div>

                                <input type="file" name="image" id="imageInput" accept="image/*" class="hidden">

                            </label>

                        </div>

                        <!-- New Preview (after change) -->
                        <div id="newPreviewWrapper" class="mt-5 hidden">

                            <p class="mb-2 text-sm text-slate-500">
                                New Image Preview
                            </p>

                            <div class="overflow-hidden rounded-3xl border border-indigo-200 bg-slate-50">

                                <img id="newPreviewImage" class="h-72 w-full object-cover">

                            </div>

                        </div>

                    </div>

                    @error('image')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Action -->
                <div class="flex gap-3">

                    <button type="submit" class="h-12 rounded-2xl bg-indigo-600 px-6 text-white hover:bg-indigo-700">
                        Update Product
                    </button>

                    <a href="{{ route('menu.index') }}"
                        class="h-12 flex items-center rounded-2xl border px-6 text-slate-700 hover:bg-slate-100">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
@push('script')
    <!-- Script -->
    <script>
        const imageInput = document.getElementById('imageInput');
        const fileName = document.getElementById('imageFileName');
        const previewWrapper = document.getElementById('newPreviewWrapper');
        const previewImage = document.getElementById('newPreviewImage');

        imageInput.addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (file) {

                // show filename
                fileName.classList.remove('hidden');
                fileName.innerText = file.name;

                // preview image
                const reader = new FileReader();

                reader.onload = function(event) {

                    previewImage.src = event.target.result;
                    previewWrapper.classList.remove('hidden');

                }

                reader.readAsDataURL(file);
            }

        });
    </script>
@endpush
