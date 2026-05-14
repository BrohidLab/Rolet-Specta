<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $products = Menu::latest()->get();

        return view('pages.admin.pages.menu.index', compact('products'));
    }

    public function create() {
        return view('pages.admin.pages.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'category'        => 'required|string|max:255',
            'jenis_makanan'   => 'required|string|max:255',
            'harga'           => 'required|numeric',
            'keterangan'      => 'nullable|string',
            'image'           => 'required|image|mimes:jpg,jpeg,png,webp|max:20480',
        ]);

        try {

            $image = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('products', 'public');
            }

            Menu::create([
                'id' => generateUuid(),
                'name'            => $request->name,
                'category'        => $request->category,
                'jenis_makanan'   => $request->jenis_makanan,
                'harga'           => $request->harga,
                'keterangan'      => $request->keterangan,
                'image'           => $image,
            ]);

            return redirect()
                ->route('menu.index')
                ->with('success', 'Product berhasil ditambahkan');

        } catch (\Exception $e) {

            Log::error('Product Store Error : ' . $e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $product = Menu::findOrFail($id);

        return view('pages.admin.pages.menu.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'category'        => 'required|string|max:255',
            'jenis_makanan'   => 'required|string|max:255',
            'harga'           => 'required|numeric',
            'keterangan'      => 'nullable|string',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        try {

            $product = Menu::findOrFail($id);

            $imagePath = $product->image;

            // kalau ada gambar baru (replace image)
            if ($request->hasFile('image')) {

                // hapus gambar lama jika ada
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }

                // simpan gambar baru
                $imagePath = $request->file('image')->store('products', 'public');
            }

            $product->update([
                'name'            => $request->name,
                'category'        => $request->category,
                'jenis_makanan'   => $request->jenis_makanan,
                'harga'           => $request->harga,
                'keterangan'      => $request->keterangan,
                'image'           => $imagePath,
            ]);

            return redirect()
                ->route('menu.index')
                ->with('success', 'Product berhasil diupdate');

        } catch (\Exception $e) {

            Log::error('Update Product Error: ' . $e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal update product');
        }
}
}