@extends('components.admin.layouts.app')

@section('title', 'Data Paket Rolet Specta')

@section('content')

    <div class="space-y-6">

        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-2xl font-bold text-gray-800">
                    Data Paket
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Kelola seluruh data paket.
                </p>

            </div>

            <a href="{{ route('master.paket.create') }}"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white h-11 px-5 rounded-xl font-medium transition">

                <span class="material-symbols-rounded text-[20px]">
                    add
                </span>

                Tambah Paket

            </a>

        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">

            <div class="p-5 border-b border-gray-100 flex items-center justify-between">

                <form method="GET" action="{{ route('master.paket.index') }}" class="w-80">

                    <div class="relative">

                        <span class="material-symbols-rounded absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            search
                        </span>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari paket..."
                            class="w-full h-11 pl-11 pr-12 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                        @if (request('search'))
                            <a href="{{ route('master.paket.index') }}"
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
                        {{ $pakets->total() }}
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
                                Nama Paket
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($pakets as $index => $paket)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 font-semibold text-gray-700">
                                    {{ $index + 1 }}.
                                </td>

                                <td class="px-1 md:px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">

                                            <span class="material-symbols-rounded text-blue-600">
                                                inventory
                                            </span>

                                        </div>

                                        <span class="font-medium text-gray-700">
                                            {{ $paket->name }}
                                        </span>

                                    </div>

                                </td>
                                <td class="px-1 md:px-6 py-4">
                                    @if ($paket->status)
                                        <span
                                            class="px-4 py-2 text-xs font-semibold text-green-700 bg-green-200 rounded-3xl">Aktif</span>
                                    @else
                                        <span
                                            class="px-4 py-2 text-xs font-semibold text-red-700 bg-red-200 rounded-3xl">Tidak
                                            Aktif</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex flex-col md:flex-row items-center justify-center gap-2">
                                        @if ($paket->status)
                                            <a href="{{ route('master.paket.edit', $paket) }}"
                                                class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 hover:bg-amber-100 flex items-center justify-center transition">

                                                <span class="material-symbols-rounded text-[20px]">
                                                    edit
                                                </span>

                                            </a>
                                        @endif

                                        <form action="{{ route('master.paket.destroy', $paket) }}" method="POST"
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
                                        <a href="{{ route('master.paket.sub_paket.index', $paket->id) }}" title="List Paket"
                                            class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center transition">
                                            <span class="material-symbols-rounded">
                                                list_alt
                                            </span>
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="py-16 text-center">

                                    <span class="material-symbols-rounded text-6xl text-gray-300">
                                        inventory
                                    </span>

                                    <h3 class="mt-4 font-semibold text-gray-600">
                                        Belum ada data paket
                                    </h3>

                                    <p class="text-sm text-gray-400 mt-2">
                                        Silakan tambahkan paket pertama.
                                    </p>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            @if ($pakets->hasPages())
                <div class="border-t border-gray-100 px-6 py-4">

                    {{ $pakets->links() }}

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
                        title: 'Hapus paket?',
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
