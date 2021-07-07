<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactSettingsValidation;

class ContactController extends Controller
{
    public function edit()
    {
        $settings = [];
        foreach (Settings::all() as $setting) {
            $settings[$setting->name] = $setting->value;
        }

        return view('admin.settings.contact', compact('settings'));
    }

    public function update(ContactSettingsValidation $request)
    {
        $inputs = $request->validated();

        DB::beginTransaction();
        try {
            Settings::where('name', 'address')->update(['value' => $inputs['address']]);
            Settings::where('name', 'contact')->update(['value' => $inputs['contact']]);
            Settings::where('name', 'email')->update(['value' => $inputs['email']]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.settings.contact.edit')->with('message', 'An error occurred, no changes were made.');
        }

        return redirect()->route('admin.settings.contact.edit')->with('message', 'Changes successfully saved.');
    }
}
