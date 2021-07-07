<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SiteSettingsValidation;

class SiteController extends Controller
{
    public function edit()
    {
        $settings = [];
        foreach (Settings::all() as $setting) {
            $settings[$setting->name] = $setting->value;
        }

        return view('admin.settings.site', compact('settings'));
    }

    public function update(SiteSettingsValidation $request)
    {
        $inputs = $request->validated();

        DB::beginTransaction();
        try {
            Settings::where('name', 'meta_site_name')->update(['value' => $inputs['site_name']]);
            Settings::where('name', 'meta_site_author')->update(['value' => $inputs['site_author']]);
            Settings::where('name', 'meta_site_description')->update(['value' => $inputs['site_description']]);
            Settings::where('name', 'meta_site_keywords')->update(['value' => $inputs['site_keywords']]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.settings.site.edit')->with('message', 'An error occurred, no changes were made.');
        }

        return redirect()->route('admin.settings.site.edit')->with('message', 'Changes successfully saved.');
    }
}
