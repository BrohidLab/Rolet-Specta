@extends('components.admin.layouts.app')

@section('title', 'Data Kategori Gallery')

@section('content')

    <div class="space-y-6">

        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-2xl font-bold text-gray-800">
                    Data Kategori
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Kelola seluruh kategori paket.
                </p>

            </div>

            <a href="{{ route('master.category.create') }}"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white h-11 px-5 rounded-xl font-medium transition">

                <span class="material-symbols-rounded text-[20px]">
                    add
                </span>

                Tambah Kategori

            </a>

        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">

            <div class="p-5 border-b border-gray-100 flex items-center justify-between">

                <form method="GET" action="{{ route('master.category.index') }}" class="w-80">

                    <div class="relative">

                        <span class="material-symbols-rounded absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            search
                        </span>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kategori..."
                            class="w-full h-11 pl-11 pr-12 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                        @if (request('search'))
                            <a href="{{ route('master.category.index') }}"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-red-500">

                                <span class="material-symbols-rounded text-[18px]">
                                    close
                                </span>

                            </a>
                        @endif

                    </div>

                </form>

                <div class="text-sm text-gray-500">

                    Total :
                    <span class="font-semibold text-gray-700">
                        {{ $categories->total() }}
                    </span>

                </div>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="bg-gray-50">

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                ID
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Nama Kategori
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($categories as $index => $category)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 font-semibold text-gray-700">
                                    {{ $index + 1 }}.
                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">

                                            <span class="material-symbols-rounded text-blue-600">
                                                category
                                            </span>

                                        </div>

                                        <span class="font-medium text-gray-700">
                                            {{ $category->name }}
                                        </span>

                                    </div>

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('master.category.edit', $category) }}"
                                            class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 hover:bg-amber-100 flex items-center justify-center transition">

                                            <span class="material-symbols-rounded text-[20px]">
                                                edit
                                            </span>

                                        </a>

                                        <form action="{{ route('master.category.destroy', $category) }}" method="POST"
                                            class="delete-form inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100">

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

                                <td colspan="3" class="py-16 text-center">

                                    <span class="material-symbols-rounded text-6xl text-gray-300">
                                        category
                                    </span>

                                    <h3 class="mt-4 font-semibold text-gray-600">
                                        Belum ada data kategori
                                    </h3>

                                    <p class="text-sm text-gray-400 mt-2">
                                        Silakan tambahkan kategori pertama.
                                    </p>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            @if ($categories->hasPages())
                <div class="border-t border-gray-100 px-6 py-4">

                    {{ $categories->links() }}

                </div>
            @endif

        </div>

    </div>

@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.delete-form').forEach(form => {

                form.addEventListener('submit', function(e) {

                    e.preventDefault();

                    Swal.fire({
                        title: 'Hapus kategori?',
                        text: 'Data yang dihapus tidak dapat dikembalikan.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#6b7280',
                        reverseButtons: true,
                    }).then((result) => {

                        if (result.isConfirmed) {
                            form.submit();
                        }

                    });

                });

            });

        });
    </script>
@endpush
