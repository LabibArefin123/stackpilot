<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('backend.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('backend.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'icon'  => 'nullable|string',
        ]);

        $destination = public_path('uploads/images/gallery/');

        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $filePath = null;
        $filename = now()->format('d_m_Y_His') . '_' . uniqid() . '_gallery';

        // ✅ Priority: Base64 Image
        if ($request->icon && preg_match('/^data:image\/(\w+);base64,/', $request->icon, $type)) {

            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];

            $ext = strtolower($type[1]);

            if (!in_array($ext, $allowedTypes)) {
                return back()->withErrors(['icon' => 'Invalid image type']);
            }

            $image = substr($request->icon, strpos($request->icon, ',') + 1);
            $image = base64_decode($image);

            $fullName = $filename . '.' . $ext;

            file_put_contents($destination . $fullName, $image);

            $filePath = $fullName;
        }

        // ✅ Normal Upload
        elseif ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();

            $fullName = $filename . '.' . $ext;
            $file->move($destination, $fullName);

            $filePath = $fullName;
        }

        Gallery::create([
            'title' => $request->title,
            'image' => $filePath,
        ]);

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Gallery created successfully.');
    }

    public function show(Gallery $gallery)
    {
        return view('backend.gallery.show', compact('gallery'));
    }


    public function edit(Gallery $gallery)
    {
        return view('backend.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'icon'  => 'nullable|string',
        ]);

        $destination = public_path('uploads/images/gallery/');

        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $filePath = $gallery->image;
        $filename = now()->format('d_m_Y_His') . '_' . uniqid() . '_gallery';

        // ✅ BASE64 IMAGE (Highest Priority)
        if ($request->icon && preg_match('/^data:image\/(\w+);base64,/', $request->icon, $type)) {

            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
            $ext = strtolower($type[1]);

            if (!in_array($ext, $allowedTypes)) {
                return back()->withErrors(['icon' => 'Invalid image type']);
            }

            // delete old image
            if ($gallery->image && file_exists($destination . $gallery->image)) {
                unlink($destination . $gallery->image);
            }

            $image = substr($request->icon, strpos($request->icon, ',') + 1);
            $image = base64_decode($image);

            $fullName = $filename . '.' . $ext;
            file_put_contents($destination . $fullName, $image);

            $filePath = $fullName;
        }

        // ✅ NORMAL FILE UPLOAD
        elseif ($request->hasFile('image')) {

            if ($gallery->image && file_exists($destination . $gallery->image)) {
                unlink($destination . $gallery->image);
            }

            $file = $request->file('image');
            $fullName = $filename . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $fullName);

            $filePath = $fullName;
        }

        $gallery->update([
            'title' => $request->title,
            'image' => $filePath,
        ]);

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully.');
    }
}
