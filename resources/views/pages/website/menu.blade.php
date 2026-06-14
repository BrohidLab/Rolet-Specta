@extends('components.website.layouts.app')
@section('title', 'Daftar List Menu Rolet Specta')
@section('content')
    <section class="py-32">
        <div class="text-center mb-12">
            <span
                class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/10 border border-white/10 backdrop-blur-xl text-white text-sm tracking-[4px] uppercase">
                ✦ Kuliner Specta
            </span>

            <h2 class="text-4xl font-bold mt-5">
                Temukan Menu Favorit Anda
            </h2>

            <p class="text-gray-500 mt-3">
                Nikmati berbagai pilihan makanan dan minuman yang disajikan dengan cita rasa terbaik untuk menemani setiap
                momen Anda di Rolet Specta Cafe.
            </p>
        </div>
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex flex-col md:flex-row gap-4 justify-between items-center mb-10">

                @if (request('search'))
                    <span class="text-white">Hasil Pencarian : {{ request('search') }}</span>
                @endif
                <!-- Search -->
                <form method="GET" class="w-full md:w-auto flex gap-3">

                    <div class="relative">

                        <input type="text" name="search" placeholder="Cari menu..."
                            class="w-full md:w-80 pl-12 pr-4 py-3 border text-black border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-red-500">

                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 105.5 5.5a7.5 7.5 0 0011.15 11.15z" />

                        </svg>

                    </div>

                    <button type="submit" class="px-6 py-3 bg-red-600 text-white rounded-2xl hover:bg-red-700 transition">
                        Cari
                    </button>

                </form>

            </div>


            <!-- Filter Jenis -->
            <div class="flex flex-wrap gap-3 mb-12">

                <a href="{{ route('menu', ['search' => request('search')]) }}"
                    class="px-5 py-2 rounded-full transition
               {{ request('category') == null ? 'bg-red-600 text-white' : 'bg-red-50 text-red-600' }}">
                    Semua
                </a>

                <a href="{{ route('menu', [
                    'search' => request('search'),
                    'category' => 'Minuman',
                ]) }}"
                    class="px-5 py-2 rounded-full transition
               {{ request('category') == 'Minuman' ? 'bg-red-600 text-white' : 'bg-red-50 text-red-600' }}">
                    Minuman
                </a>

                <a href="{{ route('menu', [
                    'search' => request('search'),
                    'category' => 'Makanan',
                ]) }}"
                    class="px-5 py-2 rounded-full transition
               {{ request('category') == 'Makanan' ? 'bg-red-600 text-white' : 'bg-red-50 text-red-600' }}">
                    Makanan
                </a>
                <a href="{{ route('menu', [
                    'search' => request('search'),
                    'category' => 'cemilan',
                ]) }}"
                    class="px-5 py-2 rounded-full transition
               {{ request('category') == 'cemilan' ? 'bg-red-600 text-white' : 'bg-red-50 text-red-600' }}">
                    Cemilan
                </a>

            </div>

            <!-- List Menu -->
            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-8">

                @forelse($menus as $menu)
                    <div class="bg-white rounded-3xl overflow-hidden shadow hover:shadow-xl transition">

                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                            class="w-full h-64 object-cover">

                        <div class="p-6">

                            <div class="flex justify-between items-center mb-3">

                                <span class="text-xs bg-red-100 text-red-600 px-3 py-1 rounded-full">
                                    {{ $menu->category }}
                                </span>

                                <span class="text-xs text-gray-500">
                                    {{ $menu->jenis_makanan }}
                                </span>

                            </div>

                            <h3 class="text-xl text-gray-700 font-bold">
                                {{ $menu->name }}
                            </h3>

                            <div class="mt-5 flex justify-between items-center">

                                <span class="text-2xl font-bold text-red-600">
                                    Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                </span>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-span-full text-center py-20">

                        <h3 class="text-2xl font-semibold text-gray-700">
                            Menu tidak ditemukan
                        </h3>

                        <p class="text-gray-500 mt-2">
                            Coba gunakan kata kunci lain.
                        </p>

                    </div>
                @endforelse

            </div>

        </div>

    </section>
@endsection
