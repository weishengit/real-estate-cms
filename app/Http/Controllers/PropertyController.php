<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\StorePropertyValidation;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('admin.properties.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StorePropertyValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyValidation $request)
    {
        $newImageName = 'cover' . '-' . $request->slug . '.' . $request->cover_image->extension();
        $request->cover_image->move(public_path('assets/img/properties/'), $newImageName);

        // CREATE PRODUCT
        Property::create([
            'title' => $request->input('title'),
            'area_id' => $request->input('area'),
            'slug' => $request->input('slug'),
            'address' => $request->input('address'),
            'introduction' => $request->input('introduction'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'cost' => $request->input('cost'),
            'cover_image' => $newImageName,
        ]);

        // REDIRECT TO PRODUCT INDEX
        return redirect()->route('admin.home')->with('message', $request->title . ' has been added.');
    }

    /**
     * Slugs the specified title.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Property::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
