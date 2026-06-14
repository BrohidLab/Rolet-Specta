@extends('components.website.layouts.app')
@section('title', 'Gallery Rolet Specta')
@section('content')
    <section class="py-32" x-data="galleryModal()">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-12">
                <span
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/10 border border-white/10 backdrop-blur-xl text-white text-sm tracking-[4px] uppercase">
                    ✦ Gallery Specta
                </span>

                <h2 class="text-4xl font-bold mt-5">
                    Momen Rolet Specta Cafe
                </h2>

                <p class="text-gray-500 mt-3">
                    Suasana cafe, kegiatan pelanggan, dan berbagai momen menarik.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach ($galleries as $gallery)
                    <div @click="openModal(
                        '{{ $gallery->type }}',
                        '{{ asset('storage/' . $gallery->image) }}'
                    )"
                        class="relative overflow-hidden rounded-2xl cursor-pointer group shadow-md bg-white">

                        @if ($gallery->type == 'image')
                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                        @else
                            <div class="relative">

                                <video class="w-full h-64 object-cover" muted preload="metadata">
                                    <source src="{{ asset('storage/' . $gallery->image) }}">
                                </video>

                                <div class="absolute inset-0 bg-black/30 flex items-center justify-center">

                                    <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center">
                                        ▶
                                    </div>

                                </div>

                            </div>
                        @endif

                        <div class="absolute top-3 right-3">

                            @if ($gallery->type == 'image')
                                <span class="bg-red-600 text-white text-xs px-3 py-1 rounded-full">
                                    Foto
                                </span>
                            @else
                                <span class="bg-black text-white text-xs px-3 py-1 rounded-full">
                                    Video
                                </span>
                            @endif

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

        <!-- MODAL -->

        <div x-show="show" x-transition class="fixed inset-0 z-50 bg-black/80 flex items-center justify-center p-4">

            <div class="relative max-w-5xl w-full">

                <button @click="closeModal()" class="absolute -top-12 right-0 text-white text-3xl">
                    ✕
                </button>

                <template x-if="type === 'image'">

                    <img :src="src" class="w-full rounded-xl max-h-[80vh] object-contain">

                </template>

                <template x-if="type === 'video'">

                    <video controls autoplay class="w-full rounded-xl max-h-[90vh]">
                        <source :src="src">
                    </video>

                </template>

            </div>

        </div>

    </section>
@endsection
@push('script')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function galleryModal() {
            return {
                show: false,
                type: '',
                src: '',

                openModal(type, src) {
                    this.type = type;
                    this.src = src;
                    this.show = true;
                    document.body.style.overflow = 'hidden';
                },

                closeModal() {
                    this.show = false;
                    this.src = '';
                    document.body.style.overflow = 'auto';
                }
            }
        }
    </script>
@endpush
