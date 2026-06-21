<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\SubPaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SubPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $idPaket)
    {
        $search = $request->search;

        $subpakets = SubPaket::query()
            ->with('paket')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->where('paket_id', $idPaket)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $paket = Paket::findOrFail($idPaket);

        return view('pages.admin.pages.paket.sub-paket.index', compact('subpakets', 'paket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($idPaket)
    {
        $paket = Paket::where('id', $idPaket)->first();

        return view('pages.admin.pages.paket.sub-paket.create', compact('paket'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        DB::beginTransaction();

        try {
            // validation
            $request->validate([
                'name' => 'required|string|max:255',
                'details'   => 'required|string',
                'price' => 'required',
                'paket_id' => 'required',
                'images' => 'required_if:type,image|nullable|image|mimes:jpg,jpeg,png,webp|max:20480',
            ]);
            // default value
            $imagePath = null;

            /**
             * Upload Image
             */
            if ($request->hasFile('images')) {

                $imagePath = $request
                    ->file('images')
                    ->store('Paket/images', 'public');
            }

            /**
             * Save Database
             */
            SubPaket::create([
                'name' => $request->name,
                'details'   => $request->details,
                'price'  => $request->price,
                'paket_id' => $request->paket_id,
                'images' => $imagePath,
            ]);

            DB::commit();

            return redirect()
                ->route('master.paket.sub_paket.index', $request->paket_id)
                ->with('success', 'Gallery uploaded successfully.');
        } catch (\Exception $e) {

            DB::rollBack();

            /**
             * delete uploaded file if failed
             */
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {

                Storage::disk('public')->delete($imagePath);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to create paket : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
