@extends('components.website.layouts.app')
@section('title', 'Hubungi Kami Rolet Specta Caffe')
@push('style')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
@endpush
@section('content')
    <section id="contact" class="py-32 ">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Header -->
            <div class="text-center mb-16">

                <span
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/10 border border-white/10 backdrop-blur-xl text-white text-sm tracking-[4px] uppercase">
                    ✦ Contact Us
                </span>

                <h2 class="mt-4 text-5xl font-bold">
                    Hubungi Kami
                </h2>

                <p class="mt-4 text-slate-500 max-w-2xl mx-auto">
                    Punya pertanyaan atau ingin berkunjung? Jangan ragu untuk menghubungi kami dan nikmati suasana nyaman
                    khas Rolet Specta Cafe.
                </p>

            </div>

            <div class="grid lg:grid-cols-2 gap-10">

                <!-- Form Kontak -->
                <div class="bg-white rounded-3xl text-black p-8 shadow-sm border border-slate-100">

                    <h3 class="text-2xl font-bold text-slate-900 mb-6">
                        Kirim Pesan
                    </h3>

                    <form action="#" method="POST" class="space-y-5">

                        @csrf

                        <div>
                            <label class="block mb-2 text-sm font-medium text-slate-700">
                                Nama Lengkap
                            </label>

                            <input type="text" name="name" placeholder="Masukkan nama Anda"
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-slate-700">
                                Email
                            </label>

                            <input type="email" name="email" placeholder="Masukkan email Anda"
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-slate-700">
                                Pesan
                            </label>

                            <textarea rows="5" name="message" placeholder="Tulis pesan Anda..."
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none resize-none"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-700 text-white py-4 rounded-2xl font-semibold transition">
                            Kirim Pesan
                        </button>

                    </form>

                </div>

                <!-- Informasi Kontak -->
                <div class="space-y-5">

                    <!-- Lokasi -->
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

                        <div class="flex gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center text-red-600">

                                <span class="material-symbols-outlined text-red-600">
                                    location_on
                                </span>

                            </div>

                            <div>
                                <h4 class="font-bold text-lg text-slate-900">
                                    Lokasi
                                </h4>

                                <p class="text-slate-600 mt-1">
                                    Kelet, Keling, Jepara
                                </p>
                            </div>

                        </div>

                    </div>

                    <!-- Jam Operasional -->
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

                        <div class="flex gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center flex-shrink-0">

                                <span class="material-symbols-outlined text-red-600">
                                    schedule
                                </span>

                            </div>

                            <div>
                                <h4 class="font-bold text-lg text-slate-900">
                                    Jam Operasional
                                </h4>

                                <p class="text-slate-600 mt-1">
                                    Setiap Hari <br>
                                    10.00 - 22.00 WIB
                                </p>
                            </div>

                        </div>

                    </div>

                    <!-- WhatsApp -->
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

                        <div class="flex gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center flex-shrink-0">

                                <span class="material-symbols-outlined text-red-600">
                                    call
                                </span>

                            </div>

                            <div>
                                <h4 class="font-bold text-lg text-slate-900">
                                    WhatsApp
                                </h4>

                                <a href="https://wa.me/628123456789" target="_blank"
                                    class="text-red-600 hover:text-red-700">
                                    +62 812-3456-789
                                </a>
                            </div>

                        </div>

                    </div>

                    <!-- Instagram -->
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

                        <div class="flex gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center flex-shrink-0">

                                <span class="material-symbols-outlined text-red-600">
                                    photo_camera
                                </span>

                            </div>

                            <div>
                                <h4 class="font-bold text-lg text-slate-900">
                                    Instagram
                                </h4>

                                <a href="https://instagram.com/roletspecta_cafe" target="_blank"
                                    class="text-red-600 hover:text-red-700">
                                    @roletspecta_cafe
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Google Maps -->
            <div class="mt-16">

                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.13430266275!2d110.90425189999999!3d-6.504677999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e712fc8269b4bc9%3A0xa785bca8b87ad0a7!2sRolet%20Specta!5e0!3m2!1sid!2sid!4v1781473759293!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>

            </div>

        </div>

    </section>
@endsection
