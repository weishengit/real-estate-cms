@extends('layouts.app')

@section('seo')
<title>{{ $seo['seo_title'] }}</title>
<meta name="description" content="{{ $seo['seo_description'] }}" />
@endsection

@section('content')
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Our Amazing Properties</h1>
                        <span class="color-text-a">Amazing Properties</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Properties
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
        <div class="container">
            <div class="row">
                {{-- Filter --}}
                <div class="col-sm-12">
                    <div class="grid-option">
                        <form action="{{ route('properties')}}">
                            <select name="area" class="custom-select">
                                @if (isset($areas))
                                    <option @if (isset($_GET['area']) && ($_GET['area'] == 'all' || $_GET['area'] == null)) selected @endif value="all">All</option>
                                    @foreach ($areas as $area)
                                        <option @if (isset($_GET['area']) && $_GET['area'] == $area->name) selected @endif value="{{ $area->name }}">{{ $area->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <select name="search" class="custom-select">
                                <option @if (isset($_GET['search']) && ($_GET['search'] == 'all' || $_GET['search'] == null)) selected @endif value="all">All</option>
                                <option @if (isset($_GET['search']) && $_GET['search'] == 'newest') selected @endif value="newest">New to Old</option>
                                <option @if (isset($_GET['search']) && $_GET['search'] == 'oldest') selected @endif value="oldest">Old to New</option>
                                <option @if (isset($_GET['search']) && $_GET['search'] == 'sale') selected @endif value="sale">For Sale</option>
                                <option @if (isset($_GET['search']) && $_GET['search'] == 'rent') selected @endif value="rent">For Rent</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Search</button>
                        </form>
                    </div>
                </div>
                {{-- Properties --}}
                @if (isset($properties))
                    @foreach ($properties as $property)
                    <div class="col-md-4">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="{{ asset('assets/img/properties/' .  $property->cover_image ) }}" alt="{{ $property->slug }} image" class="img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="{{ route('property', ['property' => $property->slug]) }}">
                                                {{ $property->title }}
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">{{ $property->type }} | &#8369; {{ is_numeric($property->cost) ? number_format($property->cost, 0) : $property->cost }}</span>
                                        </div>
                                        <a href="{{ route('property', ['property' => $property->slug]) }}" class="link-a">Click here to view
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">Area</h4>
                                                <span>{{ $property->area->name }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Beds</h4>
                                                <span>{{ $property->beds }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Baths</h4>
                                                <span>{{ $property->baths }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Parking</h4>
                                                <span>{{ $property->parking }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    Nothing to show
                @endif

            </div>
            {{-- PAGINATION --}}
            {{ $properties->appends(['search' =>  $_GET['search'] ?? 'all', 'area' => $_GET['area'] ?? 'all' ])->links() }}
        </div>
    </section><!-- End Property Grid Single-->

</main><!-- End #main -->
@endsection
