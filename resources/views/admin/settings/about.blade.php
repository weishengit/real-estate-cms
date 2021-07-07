@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header"><strong>Edit About Page</strong></div>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
        Check The Following
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <div class="card-body">

        <form class="form-horizontal"
            action="{{ route('admin.settings.about.update') }}"
            method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="header">About Header</label>
                <div class="col-md-9">
                    <input value="{{ $abouts['about_header'] }}" class="form-control" id="header" type="text" name="header" placeholder="About Header..." required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="cover_image">Cover Image</label>
                <div class="col-md-9">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/about/' . $abouts['about_cover_image']) }}" alt="{{ $abouts['about_cover_image'] }}">
                        <div class="card-body">
                            <input class="form-control" id="cover_image" type="file" name="cover_image" placeholder="Change Cover Photo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="side_image">Side Image</label>
                <div class="col-md-9">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/about/' . $abouts['about_side_image']) }}" alt="{{ $abouts['about_side_image'] }}">
                        <div class="card-body">
                            <input class="form-control" id="side_image" type="file" name="side_image" placeholder="Change Side Photo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="title">About Title</label>
                <div class="col-md-9">
                    <input value="{{ $abouts['about_title'] }}" class="form-control" id="title" type="text" name="title" placeholder="About Title" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea class="form-control" id="description" name="description" rows="9"
                        placeholder="About Description">{{ $abouts['about_description'] }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit"> Save Changes</button>
                <a href="{{ route('admin.home') }}">
                    <button class="btn btn-sm btn-danger" type="button"> Cancel</button>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection

