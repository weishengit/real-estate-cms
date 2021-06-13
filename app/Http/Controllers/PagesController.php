<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequestValidation;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Property;
use App\Models\Settings;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // TODO:
        $showcase = Property::where('listed', 1)->get()->random(5);
        $latest = Property::where('listed', 1)->limit(7)->latest()->get();
        return view('welcome', compact('showcase', 'latest'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        // TODO: Form Submit
        $settings = [];
        foreach (Settings::all() as $setting) {
            $settings[$setting->name] = $setting->value;
        }
        return view('pages.contact', compact('settings'));
    }

    public function properties()
    {
        $properties = Property::where('listed', 1)->paginate(9);
        return view('pages.properties', compact('properties'));
    }

    public function property($slug)
    {
        $property = Property::where('slug', $slug)->first();
        if ($property == null) {
            return redirect()->route('properties');
        }
        $images = Gallery::where('property_id', $property->id)->get();
        return view('pages.property', compact('property', 'images'));
    }

    public function inquire(ContactRequestValidation $request)
    {
        Message::create($request->validated());
        return redirect()->route('contact')->with('message', 'Your message was sent!, We will get back to you as soon as possible. Feel free to browse.');
    }
}
