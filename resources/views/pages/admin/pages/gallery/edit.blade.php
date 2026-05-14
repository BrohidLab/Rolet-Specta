@extends('components.admin.layouts.app')
@section('title', 'Form Edit Gallery Rolet Specta')
@section('content')
    <!-- Edit Gallery Content -->
    <div class="w-full px-4 py-6 md:px-6">

        <!-- Header -->
        <div class="flex flex-col gap-2">

            <h1 class="text-2xl font-bold tracking-tight text-slate-800">
                Edit Gallery
            </h1>

            <p class="text-sm text-slate-500">
                Update image or video gallery content.
            </p>

        </div>

        <!-- Form -->
        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="mt-6">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

                <!-- Left Content -->
                <div class="xl:col-span-2">

                    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">

                        <!-- Title -->
                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Gallery Title
                            </label>

                            <input type="text" name="title" value="{{ old('title', $gallery->title) }}"
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
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-slate-400 focus:ring-4 focus:ring-slate-100">{{ old('alt', $gallery->alt) }}</textarea>

                            @error('alt')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
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

                                    <input type="radio" name="type" value="image" id="typeImage"
                                        {{ old('type', $gallery->type) == 'image' ? 'checked' : '' }} class="peer hidden">

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

                                    <input type="radio" name="type" value="video" id="typeVideo"
                                        {{ old('type', $gallery->type) == 'video' ? 'checked' : '' }} class="peer hidden">

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

                        </div>

                    </div>

                </div>

                <!-- Right Sidebar -->
                <div>

                    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">

                        <h2 class="text-lg font-semibold text-slate-800">
                            Media Preview
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Current uploaded media preview.
                        </p>

                        <!-- Image Preview -->
                        <div id="imagePreview" class="{{ old('type', $gallery->type) == 'image' ? '' : 'hidden' }} mt-5">

                            @if ($gallery->image)
                                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50">

                                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->alt }}"
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

                        </div>

                        <!-- Video Preview -->
                        <div id="videoPreview" class="{{ old('type', $gallery->type) == 'video' ? '' : 'hidden' }} mt-5">

                            @if ($gallery->video)
                                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50">

                                    <video controls class="h-72 w-full object-cover">

                                        <source src="{{ asset('storage/' . $gallery->video) }}" type="video/mp4">

                                    </video>

                                </div>
                            @endif

                            <!-- Upload -->
                            <div class="mt-4">

                                <label
                                    class="flex cursor-pointer flex-col items-center justify-center rounded-3xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-8 text-center transition hover:border-slate-400 hover:bg-slate-100">

                                    <div
                                        class="flex h-16 w-16 items-center justify-center rounded-full bg-white text-slate-700 shadow-sm">

                                        <span class="material-symbols-rounded text-[32px]">
                                            video_library
                                        </span>

                                    </div>

                                    <h3 class="mt-4 text-base font-semibold text-slate-800">
                                        Replace Video
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500">
                                        Click to upload new video
                                    </p>

                                    <!-- File Name -->
                                    <div id="videoFileName"
                                        class="mt-4 hidden w-full rounded-2xl bg-white px-4 py-3 text-left text-sm font-medium text-slate-700 shadow-sm">
                                    </div>

                                    <input type="file" name="video" id="videoInput" accept="video/mp4" class="hidden">

                                </label>

                            </div>

                        </div>

                        <!-- Submit -->
                        <div class="mt-6">

                            <button type="submit"
                                class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-2xl bg-slate-900 px-5 text-sm font-medium text-white transition hover:opacity-90">

                                <span class="material-symbols-rounded text-[20px]">
                                    save
                                </span>

                                Update Gallery

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
         * Toggle Media Preview
         */
        const typeImage = document.getElementById('typeImage');
        const typeVideo = document.getElementById('typeVideo');

        const imagePreview = document.getElementById('imagePreview');
        const videoPreview = document.getElementById('videoPreview');

        function togglePreview() {

            if (typeImage.checked) {

                imagePreview.classList.remove('hidden');
                videoPreview.classList.add('hidden');

            } else {

                imagePreview.classList.add('hidden');
                videoPreview.classList.remove('hidden');

            }

        }

        typeImage.addEventListener('change', togglePreview);
        typeVideo.addEventListener('change', togglePreview);

        /**
         * Image File Preview
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
         * Video File Preview
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
