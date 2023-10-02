<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::all();
        return view('developer.index', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->image;
        $image_name = $request->name . '.' . $image->extension();
        Image::make($image)->save(base_path('public/files/developer/' . $image_name));
        Developer::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => $image_name,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $developer = Developer::find($id);
        return view('developer.editdeveloper', compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if ($request->image) {
            $image = $request->image;
            $image_name = $request->name . '.' . $image->extension();
            $image_name = $request->old_image;
            $image_path = base_path('public/files/developer/' . $image_name);
            unlink($image_path);
            Image::make($image)->save(base_path('public/files/developer/' . $image_name));
            $developer = Developer::find($id);
            $developer->name = $request->input('name');
            $developer->phone = $request->input('phone');
            $developer->image = $image_name;
            $developer->update();
            return back();
        } else {
            $image = $request->image;
            $image_name = $request->name . '.' . $image->extension();
            Image::make($image)->save(base_path('public/files/developer/' . $image_name));
            $developer = Developer::find($id);
            $developer->name = $request->input('name');
            $developer->phone = $request->input('phone');
            $developer->image = $image_name;
            $developer->update();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $developer = Developer::find($id);
        $image_name = $developer->image;
        $image_path = base_path('public/files/developer/' . $image_name);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $developer->delete();
        return back();
    }
}
