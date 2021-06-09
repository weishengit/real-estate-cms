<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequestValidation;
use App\Models\Message;
use App\Models\Property;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // TODO:
        // properties to display
        return view('welcome');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        // TODO: Form Submit
        return view('pages.contact');
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
        return view('pages.property', compact('property'));
    }

    public function inquire(ContactRequestValidation $request)
    {
        Message::create($request->validated());
        return redirect()->route('contact')->with('message', 'Your message was sent!, We will get back to you as soon as possible. Feel free to browse.');
    }
}
