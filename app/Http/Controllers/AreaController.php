<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::withTrashed()->paginate(10);

        return view('admin.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CREATE PROPERTY
        Area::create([
            'name' => $request->input('name'),
        ]);

        // REDIRECT TO PROPERTY INDEX
        return redirect()->route('admin.areas.index')->with('message', $request->name . ' has been added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::withTrashed()->find($id);
        return view('admin.areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $area = Area::withTrashed()->find($id);
        $request->validate(['name' => 'required|string|max:255|unique:areas,name,'. $area->id]);
        $area->update([
            'name' => $request->input('name')
        ]);

        return redirect()->back()->with('message', $area->name . ' has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        // $area->delete();
        $area->update(['deleted_at' => now()]);
        return redirect()->back()->with('message', $area->name . ' has been disabled.');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        // $area->delete();
        $area = Area::withTrashed()->find($id);
        $area->update(['deleted_at' => null]);
        return redirect()->back()->with('message', $area->name . ' has been enabled.');
    }
}
