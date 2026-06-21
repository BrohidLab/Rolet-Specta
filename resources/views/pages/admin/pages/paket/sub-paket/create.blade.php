@extends('components.admin.layouts.app')
@section('title', 'Form Upload Gallery Rolet Specta')
@push('style')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endpush
@section('content')
    <!-- Upload Gallery Content -->
    <div class="w-full px-4 py-6 md:px-6">

        <!-- Header -->
        <div class="flex flex-col gap-2">

            <h1 class="text-2xl font-bold tracking-tight text-slate-800">
                Tambah Variant Paket
            </h1>

            <p class="text-sm text-slate-500">
                Tambah data variant paket content.
            </p>

        </div>

        <!-- Form -->
        <form action="{{ route('master.paket.sub_paket.store') }}" method="POST" enctype="multipart/form-data" class="mt-6">

            @csrf

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

                <!-- Left Content -->
                <div class="xl:col-span-2">

                    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">

                        <!-- Title -->
                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Name
                            </label>

                            <input type="text" name="name" value="{{ old('name') }}"
                                placeholder="Enter name paket..."
                                class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
                            <input type="hidden" name="paket_id" value="{{ $paket->id }}" />
                            @error('name')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                        <div class="mt-5">

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Harga Paket
                            </label>

                            <input type="number" name="price" value="{{ old('price') }}"
                                placeholder="Enter harga paket..."
                                class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-slate-400 focus:ring-4 focus:ring-slate-100">

                            @error('name')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- Alt -->
                        <div class="mt-5">

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Detail
                            </label>

                            <textarea id="editor" name="details" rows="4" placeholder="Enter description..."
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-slate-400 focus:ring-4 focus:ring-slate-100">{{ old('details') }}</textarea>

                            @error('details')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>

                <!-- Right Sidebar -->
                <div>
                    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">

                        <h2 class="text-lg font-semibold text-slate-800">
                            Image Paket
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Select media file based on chosen type.
                        </p>

                        <!-- Image Upload -->
                        <div id="imageUpload" class="mt-5">

                            <label
                                class="flex cursor-pointer flex-col items-center justify-center rounded-3xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-10 text-center transition hover:border-slate-400 hover:bg-slate-100">

                                <!-- Icon -->
                                <div
                                    class="flex h-20 w-20 items-center justify-center rounded-full bg-white text-slate-700 shadow-sm">

                                    <span class="material-symbols-rounded text-[40px]">
                                        upload
                                    </span>

                                </div>

                                <!-- Text -->
                                <h3 class="mt-5 text-base font-semibold text-slate-800">
                                    Upload Image
                                </h3>

                                <p class="mt-2 text-sm text-slate-500">
                                    Click to browse image file
                                </p>

                                <!-- File Name -->
                                <div id="imageFileName"
                                    class="mt-4 hidden w-full rounded-2xl bg-white px-4 py-3 text-left text-sm font-medium text-slate-700 shadow-sm">
                                </div>

                                <!-- Input -->
                                <input type="file" name="images" id="imageInput" accept="image/*" class="hidden">

                            </label>

                            @error('images')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- Submit -->
                        <div class="mt-6">

                            <button type="submit"
                                class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-2xl bg-slate-900 px-5 text-sm font-medium text-white transition hover:opacity-90">

                                <span class="material-symbols-rounded text-[20px]">
                                    cloud_upload
                                </span>

                                Upload Gallery

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>



@endsection
@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        const imageUpload = document.getElementById('imageUpload');
        const videoUpload = document.getElementById('videoUpload');

        /**
         * Image Preview File Name
         */
        const imageInput = document.getElementById('imageInput');
        const imageFileName = document.getElementById('imageFileName');

        imageInput.addEventListener('change', function() {

            if (this.files.length > 0) {

                imageFileName.classList.remove('hidden');

                imageFileName.innerHTML = `
                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-blue-700">

                        <span class="material-symbols-rounded text-[20px]">
                            image
                        </span>

                    </div>

                    <div class="min-w-0">

                        <p class="truncate font-medium text-slate-700">
                            ${this.files[0].name}
                        </p>

                        <p class="text-xs text-slate-400">
                            ${(this.files[0].size / 1024 / 1024).toFixed(2)} MB
                        </p>

                    </div>

                </div>
            `;
            }

        });
    </script>
@endpush
