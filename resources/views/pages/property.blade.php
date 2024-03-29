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
                <div class="col-md-12 col-lg-6">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ $property->title }}</h1>
                        <span class="color-text-a">{{ $property->address }}</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('properties') }}">Properties</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $property->title }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                        <div class="carousel-item-b">
                            <img loading="lazy" style="object-fit: cover" src="{{ asset('assets/img/properties/' . $property->cover_image) }}" alt="{{ $property->slug }} image">
                        </div>
                        @if (isset($images))
                            @foreach ($images as $image)
                                <div class="carousel-item-b">
                                    <img loading="lazy" style="object-fit: cover" src="{{ asset('assets/img/properties/gallery/' . $image->image) }}" alt="{{ $property->slug }} image">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-5 col-lg-4">
                            <div class="property-price d-flex justify-content-center foo">
                                <div class="card-header-c d-flex">
                                    <div class="card-box-ico">
                                        <span class="ion-money">&#8369;</span>
                                    </div>
                                    <div class="card-title-c align-self-center">
                                        <h5 class="title-c">{{ is_numeric($property->cost) ? number_format($property->cost, 0) : $property->cost }}</h5>
                                    </div>
                                </div>
                            </div>
                            {{-- Summary --}}
                            <div class="property-summary">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d section-t4">
                                            <h3 class="title-d">Quick Summary</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list">
                                    <ul class="list text-right">
                                        <li class="d-flex justify-content-between">
                                            <strong>Property Name:</strong>
                                            <span>{{ $property->title }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Location:</strong>
                                            <span>{{ $property->address }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Status:</strong>
                                            <span>For {{ $property->type }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Area:</strong>
                                            <span>{{ $property->area->name }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Beds:</strong>
                                            <span>{{ $property->beds }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Baths:</strong>
                                            <span>{{ $property->baths }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Parking:</strong>
                                            <span>{{ $property->parking }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- Summary End --}}
                        </div>

                        <div class="col-md-7 col-lg-7 section-md-t3">
                            {{-- Description --}}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Property Description</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="property-description">
                                <p class="description color-text-a">
                                    <strong>{{ $property->introduction }}</strong>
                                </p>
                                <p class="description color-text-a no-margin">
                                    {!! $property->description !!}
                                </p>
                            </div>
                            {{-- Description End --}}
                            {{-- Amenities --}}
                            <div class="row section-t3">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Amenities</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-list color-text-a">
                                <ul class="list-a no-margin">
                                    @if (isset($amenities))
                                        @foreach ($amenities as $amenity)
                                            <li>{{ $amenity->name }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            {{-- Amenities End --}}
                        </div>
                    </div>
                </div>

                {{-- TABS --}}
                <div class="col-md-10 offset-md-1">
                    {{-- Header --}}
                    <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                        {{-- Location --}}
                        <li class="nav-item">
                            <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab"
                                aria-controls="pills-map" aria-selected="false">Show Location</a>
                        </li>
                    </ul>
                    {{-- Content --}}
                    <div class="tab-content" id="pills-tabContent">
                        {{-- Location --}}
                        <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                            <div loading="lazy" class="row">
                                {!! $property->map !!}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- TABS END --}}
            </div>
        </div>
    </section><!-- End Property Single-->

</main><!-- End #main -->
@endsection
