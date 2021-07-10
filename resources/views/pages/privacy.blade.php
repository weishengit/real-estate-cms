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
                        <h1 class="title-single">Privacy Policy</h1>
                        <span class="color-text-a">Updated: {{ $privacy->updated_at->format('d M Y') }}</span>
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
                    {!! $privacy->value !!}
                </div>
            </div>
        </div>
    </section>

@endsection
