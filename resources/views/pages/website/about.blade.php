@extends('components.website.layouts.app')
@section('title', 'Tentang Rolet Specta Caffe & Resto')
@section('content')
    <section id="about" class="py-32  overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- Gambar -->
                <div class="relative">
                    <img src="{{ asset('website/assets/images/rolet specta.PNG') }}" alt="Rolet Specta Cafe"
                        class="w-full h-[500px] object-cover rounded-3xl shadow-xl">

                    <div class="absolute -bottom-6 -right-6 bg-red-600 text-white p-6 rounded-2xl shadow-lg">
                        <h3 class="text-3xl font-bold">2023</h3>
                        <p class="text-sm">Rolet Specta Cafe Berdiri</p>
                    </div>
                </div>

                <!-- Konten -->
                <div>
                    <span
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/10 border border-white/10 backdrop-blur-xl text-white text-sm tracking-[4px] uppercase">

                        ✦ Tentang Kami

                    </span>

                    <h2 class="mt-6 text-4xl md:text-5xl font-bold  leading-tight">
                        Tempat Nyaman Untuk
                        <span class="text-red-600">
                            Bersantai & Berkumpul
                        </span>
                    </h2>

                    <p class="mt-6 leading-relaxed">
                        Rolet Specta Cafe hadir sebagai tempat yang nyaman untuk menikmati
                        berbagai pilihan minuman sambil menghabiskan waktu bersama teman,
                        keluarga, maupun rekan kerja.
                    </p>

                    <p class="mt-4 leading-relaxed">
                        Dengan suasana yang santai, pelayanan yang ramah, dan tempat yang
                        instagramable, kami berkomitmen memberikan pengalaman terbaik bagi
                        setiap pengunjung.
                    </p>

                    <div class="mt-8 flex gap-4">
                        <a href="{{ route('menu') }}"
                            class="px-6 py-3 bg-red-600 text-white rounded-xl font-semibold hover:bg-red-700 transition">
                            Lihat Menu
                        </a>

                        <a href="{{ route('contact-us') }}"
                            class="px-6 py-3 border border-red-600 text-red-600 rounded-xl font-semibold hover:bg-red-50 transition">
                            Hubungi Kami
                        </a>
                    </div>
                </div>

            </div>

            <!-- Statistik -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-20">

                <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm">
                    <h3 class="text-3xl font-bold text-red-600">12k+</h3>
                    <p class="text-slate-500 mt-2">Pengunjung</p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm">
                    <h3 class="text-3xl font-bold text-red-600">1000+</h3>
                    <p class="text-slate-500 mt-2">Minuman Terjual</p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm">
                    <h3 class="text-3xl font-bold text-red-600">4.2 ★</h3>
                    <p class="text-slate-500 mt-2">Rating Pelanggan</p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm">
                    <h3 class="text-3xl font-bold text-red-600">100%</h3>
                    <p class="text-slate-500 mt-2">Pelayanan Ramah</p>
                </div>

            </div>

        </div>
    </section>
@endsection
