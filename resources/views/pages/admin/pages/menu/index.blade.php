@extends('components.admin.layouts.app')
@section('title', 'List Menu Rolet Specta')
@section('content')
    <!-- Product Menu Content -->
    <div class="w-full px-4 py-5 md:px-6">

        <!-- Header -->
        <div
            class="mb-6 flex flex-col gap-4 rounded-3xl bg-white p-5 shadow-sm md:flex-row md:items-center md:justify-between">

            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Product Menu
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola daftar menu produk cafe/resto
                </p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row">

                <!-- Search -->
                <div class="relative">

                    <span
                        class="material-symbols-rounded absolute left-3 top-1/2 -translate-y-1/2 text-[20px] text-slate-400">
                        search
                    </span>

                    <input type="text" placeholder="Search product..."
                        class="h-11 w-full rounded-2xl border border-slate-200 bg-slate-50 pl-11 pr-4 text-sm outline-none transition-all focus:border-indigo-500 focus:bg-white sm:w-64">

                </div>

                <!-- Add -->
                <a href="{{ route('menu.create') }}"
                    class="flex h-11 items-center justify-center gap-2 rounded-2xl bg-indigo-600 px-5 text-sm font-medium text-white transition-all hover:bg-indigo-700">

                    <span class="material-symbols-rounded text-[20px]">
                        add
                    </span>

                    Add Product

                </a>

            </div>

        </div>

        <!-- Table Card -->
        <div class="overflow-hidden rounded-3xl bg-white shadow-sm">

            <!-- Top -->
            <div
                class="flex flex-col gap-4 border-b border-slate-100 px-5 py-4 md:flex-row md:items-center md:justify-between">

                <div>
                    <h2 class="text-lg font-semibold text-slate-800">
                        Product List
                    </h2>

                    <p class="text-sm text-slate-500">
                        Total {{ $products->count() }} products
                    </p>
                </div>

            </div>

            <!-- Table -->
            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th
                                class="whitespace-nowrap px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                ID
                            </th>

                            <th
                                class="whitespace-nowrap px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Product
                            </th>

                            <th
                                class="whitespace-nowrap px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Category
                            </th>

                            <th
                                class="whitespace-nowrap px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Jenis Makanan
                            </th>

                            <th
                                class="whitespace-nowrap px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Harga
                            </th>

                            <th
                                class="whitespace-nowrap px-5 py-4 text-center text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($products as $index => $product)
                            <tr class="transition-all hover:bg-slate-50">

                                <!-- ID -->
                                <td class="px-5 py-4 text-sm font-medium text-slate-700">
                                    #{{ $index + 1 }}
                                </td>

                                <!-- Product -->
                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-4">

                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="h-14 w-14 rounded-2xl object-cover">

                                        <div>

                                            <h3 class="text-sm font-semibold text-slate-800">
                                                {{ $product->name }}
                                            </h3>

                                        </div>

                                    </div>

                                </td>

                                <!-- Category -->
                                <td class="px-5 py-4">

                                    <span class="rounded-full bg-indigo-100 px-3 py-1 text-xs font-medium text-indigo-700">

                                        {{ $product->category }}

                                    </span>

                                </td>

                                <!-- Jenis Makanan -->
                                <td class="px-5 py-4 text-sm text-slate-600">
                                    {{ $product->jenis_makanan }}
                                </td>

                                <!-- Harga -->
                                <td class="px-5 py-4 text-sm font-semibold text-slate-700">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </td>

                                <!-- Action -->
                                <td class="px-5 py-4">

                                    <div class="flex items-center justify-center gap-2">

                                        <!-- Edit -->
                                        <a href="{{ route('menu.edit', $product->id) }}"
                                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-600 transition-all hover:scale-105">

                                            <span class="material-symbols-rounded text-[20px]">
                                                edit
                                            </span>

                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('menu.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirm('Delete this product?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-100 text-red-600 transition-all hover:scale-105">

                                                <span class="material-symbols-rounded text-[20px]">
                                                    delete
                                                </span>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="px-5 py-12 text-center">

                                    <div class="flex flex-col items-center justify-center">

                                        <span class="material-symbols-rounded mb-3 text-[48px] text-slate-300">
                                            inventory_2
                                        </span>

                                        <h3 class="text-base font-semibold text-slate-700">
                                            Product Not Found
                                        </h3>

                                        <p class="mt-1 text-sm text-slate-500">
                                            Belum ada data produk tersedia
                                        </p>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
