<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StorePropertyValidation;
use App\Http\Requests\UpdatePropertyValidation;
use App\Models\Amenity;
use App\Models\Gallery;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate(['filter' => 'string']);
        $filter = $request->input('filter');
        $properties = null;
        switch ($filter) {
            case 'Listed':
                $properties = Property::where('listed', 1)->paginate(10);
                break;
            case 'Unlisted':
                $properties = Property::where('listed', 0)->paginate(10);
                break;
            default:
                $properties = Property::paginate(10);
                break;
        }

        return view('admin.properties.index', compact('properties', 'filter'));
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

        // CREATE PROPERTY
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

        // REDIRECT TO PROPERTY INDEX
        return redirect()->route('admin.properties.index')->with('message', $request->title . ' has been added.');
    }

    /**
     * Slugs the specified title.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkSlug(Request $request)
    {
        $property = Property::find($request->input('id'));
        $slug = SlugService::createSlug(Property::class, 'slug', $request->title);
        if ($property != null) {
            if (strtolower($property->title) == strtolower($request->title)) {
                $slug = $property->slug;
            }
        }

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
        $areas = Area::all();
        $pictures = Gallery::where('property_id', $property->id)->get();
        $amenities = Amenity::where('property_id', $property->id)->get();

        return view('admin.properties.edit', compact('property', 'areas', 'pictures', 'amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdatePropertyValidation  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyValidation $request, Property $property)
    {
        $cover_picture = $property->cover_image;

        if ($request->hasFile('cover_image')) {
            $cover_picture  = 'cover' . '-' . $request->slug . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('assets/img/properties/'), $cover_picture);
        }

        $property->update([
            'title' => $request->input('title'),
            'area_id' => $request->input('area'),
            'slug' => $request->input('slug'),
            'address' => $request->input('address'),
            'introduction' => $request->input('introduction'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'cost' => $request->input('cost'),
            'cover_image' => $cover_picture,
        ]);

        return redirect()->back()->with('message', $request->title . ' has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        // $property->delete();
        $property->update(['listed' => false]);
        return redirect()->back()->with('message', $property->title . ' has been unlisted.');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function restore(Property $property)
    {
        // $property->delete();
        $property->update(['listed' => true]);
        return redirect()->back()->with('message', $property->title . ' has been listed.');
    }
}
