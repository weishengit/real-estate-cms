@extends('layouts.app')

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
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="property-grid.html">Properties</a>
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
                            <img src="{{ asset('assets/img/properties/' . $property->cover_image) }}" alt="{{ $property->slug }} image">
                        </div>
                        <div class="carousel-item-b">
                            <img src="{{ asset('assets/img/properties/' . $property->cover_image) }}" alt="{{ $property->slug }} image">
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-5 col-lg-4">
                            <div class="property-price d-flex justify-content-center foo">
                                <div class="card-header-c d-flex">
                                    <div class="card-box-ico">
                                        <span class="ion-money">&#8369;</span>
                                    </div>
                                    <div class="card-title-c align-self-center">
                                        <h5 class="title-c">{{ $property->cost }}</h5>
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
                                            <strong>Property Type:</strong>
                                            <span>Condo</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Status:</strong>
                                            <span>{{ $property->type }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Area:</strong>
                                            <span>{{ $property->area->name }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Beds:</strong>
                                            <span>4</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Baths:</strong>
                                            <span>2</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Garage:</strong>
                                            <span>1</span>
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
                                    <li>Balcony</li>
                                    <li>Outdoor Kitchen</li>
                                    <li>Cable Tv</li>
                                    <li>Deck</li>
                                    <li>Tennis Courts</li>
                                    <li>Internet</li>
                                    <li>Parking</li>
                                    <li>Sun Room</li>
                                    <li>Concrete Flooring</li>
                                </ul>
                            </div>
                            {{-- Amenities End --}}
                        </div>
                    </div>
                </div>

                {{-- TABS --}}
                <div class="col-md-10 offset-md-1">
                    <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab"
                                aria-controls="pills-plans" aria-selected="false">Floor Plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab"
                                aria-controls="pills-map" aria-selected="false">Location</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                            <img src="{{ asset('assets/img/plan2.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30890.05345698738!2d121.0209956286785!3d14.584444381011254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c835c77b9b79%3A0xdc4947c8b9d237f8!2sMandaluyong%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1623045956809!5m2!1sen!2sph"
                                width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                {{-- TABS END --}}
            </div>
        </div>
    </section><!-- End Property Single-->

</main><!-- End #main -->
@endsection
