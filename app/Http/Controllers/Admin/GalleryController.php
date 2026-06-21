<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryGallery;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $galleries = Gallery::when($search, function ($query) use ($search) {

            $query->where('title', 'like', "%{$search}%")
                ->orWhere('alt', 'like', "%{$search}%")
                ->orWhere('type', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(12)
            ->withQueryString();


        return view('pages.admin.pages.gallery.index', compact('galleries'));
    }

    public function create()
    {
        $categories = CategoryGallery::latest()->get();
        return view('pages.admin.pages.gallery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'title' => 'required|string|max:255',
            'alt'   => 'required|string',
            'type'  => 'required|in:image,video',
            'id_category' => 'required',
            'image' => 'required_if:type,image|nullable|image|mimes:jpg,jpeg,png,webp|max:20480',

            'video' => 'required_if:type,video|nullable|mimes:mp4,mov,avi|max:20480',
        ]);

        DB::beginTransaction();

        try {

            // default value
            $imagePath = null;
            $videoPath = null;

            /**
             * Upload Image
             */
            if (
                $request->type === 'image' &&
                $request->hasFile('image')
            ) {

                $imagePath = $request
                    ->file('image')
                    ->store('gallery/images', 'public');
            }

            /**
             * Upload Video
             */
            if (
                $request->type === 'video' &&
                $request->hasFile('video')
            ) {

                $videoPath = $request
                    ->file('video')
                    ->store('gallery/videos', 'public');
            }

            /**
             * Save Database
             */
            Gallery::create([
                'title' => $request->title,
                'alt'   => $request->alt,
                'type'  => $request->type,
                'id_category' => $request->id_category,
                'image' => $imagePath,
                'video' => $videoPath,
            ]);

            DB::commit();

            return redirect()
                ->route('gallery.index')
                ->with('success', 'Gallery uploaded successfully.');
        } catch (\Exception $e) {

            DB::rollBack();

            /**
             * delete uploaded file if failed
             */
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {

                Storage::disk('public')->delete($imagePath);
            }

            if ($videoPath && Storage::disk('public')->exists($videoPath)) {

                Storage::disk('public')->delete($videoPath);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to upload gallery : ' . $e->getMessage());
        }
    }

    public function edit(Gallery $gallery)
    {
        $categories = CategoryGallery::latest()->get();
        return view('pages.admin.pages.gallery.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery)
    {


        DB::beginTransaction();

        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'alt'   => 'required|string',
                'id_category' => 'required',
                'type'  => 'required|in:image,video',

                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:20480',

                'video' => 'nullable|mimes:mp4,mov,avi|max:20480',
            ]);
            /**
             * Default old data
             */
            $imagePath = $gallery->image;
            $videoPath = $gallery->video;

            /**
             * If type image
             */
            if ($request->type === 'image') {

                /**
                 * Delete old video
                 */
                if ($gallery->video && Storage::disk('public')->exists($gallery->video)) {

                    Storage::disk('public')->delete($gallery->video);
                }

                $videoPath = null;

                /**
                 * Upload new image
                 */
                if ($request->hasFile('image')) {

                    /**
                     * Delete old image
                     */
                    if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {

                        Storage::disk('public')->delete($gallery->image);
                    }

                    $imagePath = $request
                        ->file('image')
                        ->store('gallery/images', 'public');
                }
            }

            /**
             * If type video
             */
            if ($request->type === 'video') {

                /**
                 * Delete old image
                 */
                if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {

                    Storage::disk('public')->delete($gallery->image);
                }

                $imagePath = null;

                /**
                 * Upload new video
                 */
                if ($request->hasFile('video')) {

                    /**
                     * Delete old video
                     */
                    if ($gallery->video && Storage::disk('public')->exists($gallery->video)) {

                        Storage::disk('public')->delete($gallery->video);
                    }

                    $videoPath = $request
                        ->file('video')
                        ->store('gallery/videos', 'public');
                }
            }

            /**
             * Update database
             */
            $gallery->update([
                'title' => $request->title,
                'alt'   => $request->alt,
                'type'  => $request->type,
                'id_category' => $request->id_category,
                'image' => $imagePath,
                'video' => $videoPath,
            ]);

            DB::commit();

            return redirect()
                ->route('gallery.index')
                ->with('success', 'Gallery updated successfully.');
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to update gallery : ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            $gallery->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product berhasil dihapus',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
