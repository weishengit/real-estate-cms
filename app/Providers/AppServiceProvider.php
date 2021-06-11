<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view()->composer('layouts.app', function($view) {
            $meta_site_name = Settings::where('name', 'meta_site_name')->first();
            $meta_site_author = Settings::where('name', 'meta_site_author')->first();
            $meta_site_description = Settings::where('name', 'meta_site_description')->first();
            $meta_site_keywords = Settings::where('name', 'meta_site_keywords')->first();
            $contact = Settings::where('name', 'contact')->first();
            $email = Settings::where('name', 'email')->first();
            $view
                ->with('meta_site_name', $meta_site_name->value)
                ->with('meta_site_author', $meta_site_author->value)
                ->with('meta_site_description', $meta_site_description->value)
                ->with('meta_site_keywords', $meta_site_keywords->value)
                ->with('contact', $contact->value)
                ->with('email', $email->value);
        });
    }
}
