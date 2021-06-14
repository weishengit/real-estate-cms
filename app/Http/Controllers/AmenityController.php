<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAmenityValidation;
use App\Models\Amenity;
use App\Models\Property;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreAmenityValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAmenityValidation $request)
    {
        $property = Property::find($request->input('property_id'));
        if ($property == null) {
            return redirect()->back()->with('message', 'Error: Amenity was not added.');
        }

        $property->amenities()->create($request->validated());

        return redirect()->back()->with('message', $request->input('name') . ' has been added to the list.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenity $amenity)
    {
        $name = $amenity->name;
        $amenity->delete();

        return redirect()->back()->with('message', $name . ' has been removed from the list of amenities');
    }
}
