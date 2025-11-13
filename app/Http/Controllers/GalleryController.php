<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $img = gallery::latest()->paginate(8);
        return view('admin.Gallery.gallery', compact('img'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✅ Validate request
        $validation = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // ✅ Upload file
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('gallery', 'public');
        }

        // ✅ Detect which guard is logged in
        $user = null;
        foreach (['admin', 'teacher', 'student'] as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                $activeGuard = $guard;
                break;
            }
        }

        // ✅ Always check if user is found (important)
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Authentication required']);
        }

        // ✅ Add data to array
        $data = [

            'photo' => $path,
            'uploadedby' => $user->id,
            'uploadedby_type' => $activeGuard,
        ];

        // ✅ Store in database
        Gallery::create($data);

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->photo && Storage::disk('public')->exists($gallery->photo)) {
            Storage::disk('public')->delete($gallery->photo);
        }

        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Image deleted successfully',
            'id' => $gallery->id
        ]);
    }
}
