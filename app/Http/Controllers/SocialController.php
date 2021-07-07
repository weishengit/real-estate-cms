<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SocialSettingsValidation;

class SocialController extends Controller
{
    public function edit()
    {
        $settings = [];
        foreach (Settings::all() as $setting) {
            $settings[$setting->name] = $setting->value;
        }

        return view('admin.settings.social', compact('settings'));
    }

    public function update(SocialSettingsValidation $request)
    {
        $inputs = $request->validated();

        DB::beginTransaction();
        try {
            Settings::where('name', 'facebook')->update(['value' => $inputs['facebook']]);
            Settings::where('name', 'instagram')->update(['value' => $inputs['instagram']]);
            Settings::where('name', 'twitter')->update(['value' => $inputs['twitter']]);
            Settings::where('name', 'pinterest')->update(['value' => $inputs['pinterest']]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.settings.social.edit')->with('message', 'An error occurred, no changes were made.');
        }

        return redirect()->route('admin.settings.social.edit')->with('message', 'Changes successfully saved.');
    }
}
