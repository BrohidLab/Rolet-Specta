@extends('components.admin.layouts.app')
@section('title', 'Form Upload Gallery Rolet Specta')
@section('content')
    <!-- Upload Gallery Content -->
    <div class="w-full px-4 py-6 md:px-6">

        <!-- Header -->
        <div class="flex flex-col gap-2">

            <h1 class="text-2xl font-bold tracking-tight text-slate-800">
                Upload Gallery
            </h1>

            <p class="text-sm text-slate-500">
                Upload image or video media for gallery content.
            </p>

        </div>

        <!-- Form -->
        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="mt-6">

            @csrf

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

                <!-- Left Content -->
                <div class="xl:col-span-2">

                    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">

                        <!-- Title -->
                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Gallery Title
                            </label>

                            <input type="text" name="title" value="{{ old('title') }}"
                                placeholder="Enter gallery title..."
                                class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-slate-400 focus:ring-4 focus:ring-slate-100">

                            @error('title')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- Alt -->
                        <div class="mt-5">

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Alt Text
                            </label>

                            <textarea name="alt" rows="4" placeholder="Enter image or video description..."
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-slate-400 focus:ring-4 focus:ring-slate-100">{{ old('alt') }}</textarea>

                            @error('alt')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                        <div class="mt-5">
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Category
                            </label>

                            <select name="id_category"
                                class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
                                <option value="">-- Pilih Category --</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('id_category', $gallery->id_category ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type -->
                        <div class="mt-5">

                            <label class="mb-3 block text-sm font-semibold text-slate-700">
                                Media Type
                            </label>

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                                <!-- Image -->
                                <label
                                    class="group relative cursor-pointer overflow-hidden rounded-3xl border border-slate-200 bg-white p-5 transition hover:border-slate-300">

                                    <input type="radio" name="type" value="image" checked class="peer hidden">

                                    <div
                                        class="absolute inset-0 hidden rounded-3xl border-2 border-slate-900 peer-checked:block">
                                    </div>

                                    <div class="flex items-start gap-4">

                                        <div
                                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-100 text-blue-700">

                                            <span class="material-symbols-rounded text-[28px]">
                                                image
                                            </span>

                                        </div>

                                        <div>

                                            <h3 class="font-semibold text-slate-800">
                                                Image
                                            </h3>

                                            <p class="mt-1 text-sm text-slate-500">
                                                Upload JPG, PNG, WEBP image.
                                            </p>

                                        </div>

                                    </div>

                                </label>

                                <!-- Video -->
                                <label
                                    class="group relative cursor-pointer overflow-hidden rounded-3xl border border-slate-200 bg-white p-5 transition hover:border-slate-300">

                                    <input type="radio" name="type" value="video" class="peer hidden">

                                    <div
                                        class="absolute inset-0 hidden rounded-3xl border-2 border-slate-900 peer-checked:block">
                                    </div>

                                    <div class="flex items-start gap-4">

                                        <div
                                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-red-100 text-red-700">

                                            <span class="material-symbols-rounded text-[28px]">
                                                videocam
                                            </span>

                                        </div>

                                        <div>

                                            <h3 class="font-semibold text-slate-800">
                                                Video
                                            </h3>

                                            <p class="mt-1 text-sm text-slate-500">
                                                Upload MP4 video media.
                                            </p>

                                        </div>

                                    </div>

                                </label>

                            </div>

                            @error('type')
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
                            Upload Media
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
                                <input type="file" name="image" id="imageInput" accept="image/*" class="hidden">

                            </label>

                            @error('image')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- Video Upload -->
                        <div id="videoUpload" class="mt-5 hidden">

                            <label
                                class="flex cursor-pointer flex-col items-center justify-center rounded-3xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-10 text-center transition hover:border-slate-400 hover:bg-slate-100">

                                <!-- Icon -->
                                <div
                                    class="flex h-20 w-20 items-center justify-center rounded-full bg-white text-slate-700 shadow-sm">

                                    <span class="material-symbols-rounded text-[40px]">
                                        video_library
                                    </span>

                                </div>

                                <!-- Text -->
                                <h3 class="mt-5 text-base font-semibold text-slate-800">
                                    Upload Video
                                </h3>

                                <p class="mt-2 text-sm text-slate-500">
                                    Click to browse video file
                                </p>

                                <!-- File Name -->
                                <div id="videoFileName"
                                    class="mt-4 hidden w-full rounded-2xl bg-white px-4 py-3 text-left text-sm font-medium text-slate-700 shadow-sm">
                                </div>

                                <!-- Input -->
                                <input type="file" name="video" id="videoInput" accept="video/mp4" class="hidden">

                            </label>

                            @error('video')
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
    <!-- Script -->
    <script>
        /**
         * Toggle Upload Section
         */
        const imageRadio = document.querySelector('input[value="image"]');
        const videoRadio = document.querySelector('input[value="video"]');

        const imageUpload = document.getElementById('imageUpload');
        const videoUpload = document.getElementById('videoUpload');

        function toggleUpload() {

            if (imageRadio.checked) {

                imageUpload.classList.remove('hidden');
                videoUpload.classList.add('hidden');

            } else {

                imageUpload.classList.add('hidden');
                videoUpload.classList.remove('hidden');

            }

        }

        imageRadio.addEventListener('change', toggleUpload);
        videoRadio.addEventListener('change', toggleUpload);

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

        /**
         * Video Preview File Name
         */
        const videoInput = document.getElementById('videoInput');
        const videoFileName = document.getElementById('videoFileName');

        videoInput.addEventListener('change', function() {

            if (this.files.length > 0) {

                videoFileName.classList.remove('hidden');

                videoFileName.innerHTML = `
                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-100 text-red-700">

                        <span class="material-symbols-rounded text-[20px]">
                            videocam
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
