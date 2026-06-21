<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $pakets = Paket::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.admin.pages.paket.index', compact('pakets', 'search'));
    }

    public function create()
    {
        return view('pages.admin.pages.paket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
        ]);

        Paket::create($validated);

        return redirect()
            ->route('master.paket.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit(Paket $paket)
    {
        return view('pages.admin.pages.paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $Paket)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
            ],
        ]);

        $Paket->update($validated);

        return redirect()
            ->route('master.paket.index')
            ->with('success', 'Paket berhasil diperbarui.');
    }

    public function nonActive($id)
    {
        $paket = Paket::findOrFail($id);
        $paket->update([
            'status' => false
        ]);

        return redirect()
            ->route('master.paket.index')
            ->with('success', 'Paket berhasil di non aktifkan.');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();

        return redirect()
            ->route('master.paket.index')
            ->with('success', 'Paket berhasil dihapus.');
    }
}
