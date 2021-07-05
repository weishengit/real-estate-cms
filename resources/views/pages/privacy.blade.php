@extends('layouts.app')

@section('content')
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Privacy Policy</h1>
                        <span class="color-text-a">This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Privacy Policy
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="privacy">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {!! $settings['privacy_policy'] !!}
                </div>
            </div>
        </div>
    </section>

@endsection
