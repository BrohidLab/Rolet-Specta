<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuPageController extends Controller
{
    public function index(Request $request)
    {
        $menu = Menu::query();

        // Search berdasarkan nama menu
        if ($request->filled('search')) {
            $menu->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan jenis makanan
        if ($request->filled('category')) {
            $menu->where('category', $request->category);
        }

        $menus = $menu->latest()->paginate(12);

        return view('pages.website.menu', compact('menus'));
    }
}
