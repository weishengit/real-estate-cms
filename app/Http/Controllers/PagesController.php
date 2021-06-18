<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequestValidation;
use App\Models\Amenity;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Property;
use App\Models\Settings;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // TODO: Move Meta Data Here
        $settings = [];
        foreach (Settings::all() as $setting) {
            $settings[$setting->name] = $setting->value;
        }

        $seo = [
            'seo_title' => 'Real Estate' .' | '. $settings['meta_site_name'],
            'seo_description' => $settings['meta_site_description']
        ];

        $showcase = Property::where('listed', 1)->get()->random(5);
        $latest = Property::where('listed', 1)->limit(7)->latest()->get();
        return view('welcome', compact('showcase', 'latest', 'settings', 'seo'));
    }

    public function about()
    {
        // TODO: Add About Model
        $settings = [];
        foreach (Settings::all() as $setting) {
            $settings[$setting->name] = $setting->value;
        }

        $seo = [
            'seo_title' => 'About' .' | '. $settings['meta_site_name'],
            'seo_description' => $settings['meta_site_description']
        ];

        return view('pages.about', compact('settings', 'seo'));
    }

    public function contact()
    {
        // TODO: Form Submit
        $settings = [];
        foreach (Settings::all() as $setting) {
            $settings[$setting->name] = $setting->value;
        }

        $seo = [
            'seo_title' => 'Contact' .' | '. $settings['meta_site_name'],
            'seo_description' => $settings['meta_site_description']
        ];

        return view('pages.contact', compact('settings'));
    }

    public function properties(Request $request)
    {
        // TODO: Add Filters
        $settings = [];
        foreach (Settings::all() as $setting) {
            $settings[$setting->name] = $setting->value;
        }

        $seo = [
            'seo_title' => 'Properties' .' | '. $settings['meta_site_name'],
            'seo_description' => $settings['meta_site_description']
        ];

        switch ($request->input('search')) {
            case 'newest':
                $properties = Property::where('listed', 1)->latest()->paginate(9);
                break;
            case 'oldest':
                $properties = Property::where('listed', 1)->oldest()->paginate(9);
                break;
            case 'rent':
                $properties = Property::where('listed', 1)->where(function($query){
                    $query->where('type', 'Rent')->orWhere('type', 'Rent/Sale');
                })->paginate(9);
                break;
            case 'sale':
                $properties = Property::where('listed', 1)->where(function($query){
                    $query->where('type', 'Sale')->orWhere('type', 'Rent/Sale');
                })->paginate(9);
                break;
            default:
                $properties = Property::where('listed', 1)->paginate(9);
                break;
        }

        return view('pages.properties', compact('properties', 'settings', 'seo'));
    }

    public function property($slug)
    {
        $settings = [];
        foreach (Settings::all() as $setting) {
            $settings[$setting->name] = $setting->value;
        }

        $property = Property::where('slug', $slug)->first();
        if ($property == null) {
            return redirect()->route('properties');
        }

        $images = Gallery::where('property_id', $property->id)->get();
        $amenities = Amenity::where('property_id', $property->id)->get();

        $seo = [
            'seo_title' => $property->title . ' | ' . $settings['meta_site_name'],
            'seo_description' => $property->introduction
        ];

        return view('pages.property', compact('property', 'images', 'amenities', 'settings', 'seo'));
    }

    public function inquire(ContactRequestValidation $request)
    {
        Message::create($request->validated());
        return redirect()->route('contact')->with('message', 'Your message was sent!, We will get back to you as soon as possible. Feel free to browse.');
    }
}
