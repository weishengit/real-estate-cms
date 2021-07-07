<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Settings;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AboutSettingsValidation;

class AboutController extends Controller
{
    public function edit()
    {
        $settings = [];
        foreach (Settings::all() as $setting) {
            $settings[$setting->name] = $setting->value;
        }

        $abouts = [];
        foreach (About::all() as $about) {
            $abouts[$about->name] = $about->value;
        }

        return view('admin.settings.about', compact('abouts'));
    }

    public function update(AboutSettingsValidation $request)
    {
        $inputs = $request->validated();


        DB::beginTransaction();
        try {
            $cover_picture = About::where('name', 'about_cover_image')->first()->value;
            $side_picture = About::where('name', 'about_side_image')->first()->value;

            if ($request->hasFile('cover_image')) {
                $cover_picture  = 'about_cover_image.' . $request->cover_image->extension();
                $request->cover_image->move(public_path('assets/img/about/'), $cover_picture);
            }

            if ($request->hasFile('side_image')) {
                $side_picture  = 'about_side_image.' . $request->side_image->extension();
                $request->side_image->move(public_path('assets/img/about/'), $side_picture);
            }

            About::where('name', 'about_header')->update(['value' => $inputs['header']]);
            About::where('name', 'about_cover_image')->update(['value' => $cover_picture]);
            About::where('name', 'about_side_image')->update(['value' => $side_picture]);
            About::where('name', 'about_title')->update(['value' => $inputs['title']]);
            About::where('name', 'about_description')->update(['value' => $inputs['description']]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.settings.about.edit')->with('message', 'An error occurred, no changes were made.');
        }

        return redirect()->route('admin.settings.about.edit')->with('message', 'Changes successfully saved.');
    }
}
