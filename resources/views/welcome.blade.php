@extends('layouts.app')

@section('content')
<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
        {{-- CAROUSEL --}}
        @if (isset($showcase))
            @foreach ($showcase as $property)
            <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ asset('assets/img/properties/' . $property->cover_image) }}); object-fit: none; ">
                <div class="overlay overlay-a"></div>
                <div class="intro-content display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="intro-body">
                                        <p class="intro-title-top">
                                            @php $address = explode(' ', $property->address, 2) @endphp
                                            {{ $address[1] }}
                                            <br>
                                            {{ $address[0] }}
                                        </p>
                                        <h1 class="intro-title mb-4">
                                            @php $title = explode(' ', $property->title, 2) @endphp
                                            <span class="color-b">{{ $title[0] }} </span>
                                            {{ $title[1] }}
                                        </h1>
                                        <p class="intro-subtitle intro-price">
                                            <a href="{{ route('property', ['property' => $property->slug]) }}"><span class="price-a">{{ $property->type }} | &#8369; {{ is_numeric($property->cost) ? number_format($property->cost, 0) : $property->cost }}</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <h1>Amazing Properties</h1>
        @endif


    </div>
</div><!-- End Intro Section -->

<main id="main">

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Latest Properties</h2>
                        </div>
                        <div class="title-link">
                            <a href="{{ route('properties') }}">All Property
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="property-carousel" class="owl-carousel owl-theme">

                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <div class="img-box-a">
                            <img src="assets/img/property-6.jpg" alt="" class="img-a img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-overlay-a-content">
                                <div class="card-header-a">
                                    <h2 class="card-title-a">
                                        <a href="property-single.html">206 Mount
                                            <br /> Olive Road Two</a>
                                    </h2>
                                </div>
                                <div class="card-body-a">
                                    <div class="price-box d-flex">
                                        <span class="price-a">rent | $ 12.000</span>
                                    </div>
                                    <a href="#" class="link-a">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                </div>
                                <div class="card-footer-a">
                                    <ul class="card-info d-flex justify-content-around">
                                        <li>
                                            <h4 class="card-info-title">Area</h4>
                                            <span>340m
                                                <sup>2</sup>
                                            </span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Beds</h4>
                                            <span>2</span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Baths</h4>
                                            <span>4</span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Garages</h4>
                                            <span>1</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Latest Properties Section -->

</main><!-- End #main -->
@endsection
