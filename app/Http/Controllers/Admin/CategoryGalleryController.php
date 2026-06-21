<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryGallery;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryGalleryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = CategoryGallery::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.admin.pages.category_gallery.index', compact('categories', 'search'));
    }

    public function create()
    {
        return view('pages.admin.pages.category_gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
        ]);

        CategoryGallery::create($validated);

        return redirect()
            ->route('master.category.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(CategoryGallery $category)
    {
        return view('pages.admin.pages.category_gallery.edit', compact('category'));
    }

    public function update(Request $request, CategoryGallery $category)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
            ],
        ]);

        $category->update($validated);

        return redirect()
            ->route('master.category.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(CategoryGallery $category)
    {
        $category->delete();

        return redirect()
            ->route('master.category.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
