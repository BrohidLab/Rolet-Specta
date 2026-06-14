<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $gallery = Gallery::where('type', 'image')->get();
        $menu = Menu::latest()->take(3)->get();
        return view('pages.website.home', compact('gallery', 'menu'));
    }
}
