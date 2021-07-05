<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function edit()
    {
        $privacy = Settings::where('name', 'privacy_policy')->first()->value;
        return view('admin.settings.privacy', compact('privacy'));
    }

    public function update(Request $request)
    {
        $privacy = Settings::where('name', 'privacy_policy')->first();
        $privacy->value = $request->input('description');

        if ($privacy->save()) {
            return redirect()->route('admin.settings.privacy')->with('success', 'Privacy Policy Updated.');
        }
        return redirect()->route('admin.settings.privacy')->with('success', 'An error occurred, no changes were made.');
    }
}
