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
                        <h1 class="title-single"> {{ $abouts['about_header'] }}</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                About
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <!-- ======= About Section ======= -->
    <section class="section-about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="about-img-box">
                        <img src="{{ asset('assets/img/about/' . $abouts['about_cover_image']) }}" alt="{{ $abouts['about_cover_image'] }}" class="img-fluid">
                    </div>
                    <div class="sinse-box">
                        <h3 class="sinse-title">{{ $settings['meta_site_name'] }}
                            <span></span>
                        </h3>
                        <p>Real Estate</p>
                    </div>
                </div>
                <div class="col-md-12 section-t8">
                    <div class="row">
                        <div class="col-md-6 col-lg-5">
                            <img src="{{ asset('assets/img/about/' . $abouts['about_side_image']) }}" alt="{{ $abouts['about_side_image'] }}" class="img-fluid">
                        </div>
                        <div class="col-md-6 col-lg-5 section-md-t3">
                            <div class="title-box-d">
                                <h3 class="title-d">
                                    {{ $abouts['about_title'] }}
                                </h3>
                            </div>
                            <p class="color-text-a">
                                {!! $abouts['about_description'] !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
