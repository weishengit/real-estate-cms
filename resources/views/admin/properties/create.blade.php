@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header"><strong>Add Property</strong></div>
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
            action="{{ route('admin.properties.store') }}"
            method="post"
            enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="title">Property Title</label>
                <div class="col-md-9">
                    <input value="{{ old('title') }}" class="form-control" id="title" type="text" name="title" placeholder="Property Name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="slug">Slug Name(Auto)</label>
                <div class="col-md-9">
                    <input value="{{ old('slug') }}" class="form-control" id="slug" type="text" name="slug" hidden>
                    <input value="{{ old('slug') }}" class="form-control" id="slug-display" type="text" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="address">Address</label>
                <div class="col-md-9">
                    <input value="{{ old('address') }}" class="form-control" id="address" type="text" name="address" placeholder="Property Address">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="area">Area</label>
                <div class="col-md-9">
                    <select class="form-control" id="area" name="area">
                        @if (isset($areas))
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="introduction">Introduction</label>
                <div class="col-md-9">
                    <input value="{{ old('introduction') }}" class="form-control" id="introduction" type="text" name="introduction" placeholder="Property Introduction Text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="bedrooms">Bedrooms</label>
                <div class="col-md-9">
                    <input value="{{ old('bedrooms') }}" class="form-control" id="bedrooms" type="number" name="bedrooms" min="1" placeholder="Number Of Bedrooms" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="bathrooms">Bathrooms</label>
                <div class="col-md-9">
                    <input value="{{ old('bathrooms') }}" class="form-control" id="bathrooms" type="number" name="bathrooms" min="1" placeholder="Number Of Bathrooms" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Parking</label>
                <div class="col-md-9 col-form-label">
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="parking-yes" type="radio" value="Yes" name="parking">
                        <label class="form-check-label" for="parking-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="parking-no" type="radio" value="No" name="parking">
                        <label class="form-check-label" for="parking-no">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="description">Description</label>
                <div class="col-md-9">
                    <textarea class="form-control" id="description" name="description" rows="9"
                        placeholder="Property Description...">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Type</label>
                <div class="col-md-9 col-form-label">
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="Rent" type="radio" value="Rent" name="type">
                        <label class="form-check-label" for="Rent">Rent</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="Sale" type="radio" value="Sale" name="type">
                        <label class="form-check-label" for="Sale">Sale</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="Rent/Sale" type="radio" value="Rent/Sale" name="type">
                        <label class="form-check-label" for="Rent/Sale">Rent/Sale</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="cost">Cost</label>
                <div class="col-md-9">
                    <input value="{{ old('cost') }}" class="form-control" id="cost" type="text" name="cost" placeholder="Property Cost">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="cover_image">Cover Image</label>
                <div class="col-md-9">
                    <input id="cover_image" type="file" name="cover_image">
                </div>
            </div>

    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
        <a href="{{ route('admin.home') }}">
            <button class="btn btn-sm btn-danger" type="button"> Cancel</button>
        </a>
    </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('#title').change(function(e) {
        $.get('{{ route('admin.properties.checkslug') }}',
            { 'title': $(this).val() },
            function( data ) {
                $('#slug').val(data.slug);
                $('#slug-display').val(data.slug);
            }
        );
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
