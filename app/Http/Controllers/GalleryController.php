<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreGalleryValidation;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Property $property
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryValidation $request)
    {
        $property = Property::find($request->input('property_id'));
        if ($property == null) {
            return redirect()->back()->with('message', 'Error: Image was not added.');
        }

        $newImageName = uniqid() . '-' . $property->id . '.' . $request->image->extension();
        $request->image->move(public_path('assets/img/properties/gallery/'), $newImageName);

        $property->galleries()->create(['property_id' => $property->id, 'image' => $newImageName]);

        return redirect()->back()->with('message', 'Image has been added to the gallery.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        DB::transaction(function () use($gallery){
            File::delete(public_path('assets/img/properties/gallery/'. $gallery->image));
            $gallery->delete();
        });

        return redirect()->back()->with('message', 'Image has been removed.');
    }
}
