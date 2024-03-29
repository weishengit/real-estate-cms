@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header"><strong>Edit Property</strong></div>
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
            action="{{ route('admin.properties.update', ['property' => $property]) }}"
            method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="title">Property Title</label>
                <div class="col-md-9">
                    <input value="{{ $property->title }}" class="form-control" id="title" type="text" name="title" placeholder="Property Name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="slug">Slug Name(Auto)</label>
                <div class="col-md-9">
                    <input value="{{ $property->slug }}" class="form-control" id="slug" type="text" name="slug" hidden>
                    <input value="{{ $property->slug }}" class="form-control" id="slug-display" type="text" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="address">Address</label>
                <div class="col-md-9">
                    <input value="{{ $property->address }}" class="form-control" id="address" type="text" name="address" placeholder="Property Address">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="area">Area</label>
                <div class="col-md-9">
                    <select class="form-control" id="area" name="area">
                        @if (isset($areas))
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}" @if ($property->area_id == $area->id) selected @endif>{{ $area->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="introduction">Introduction</label>
                <div class="col-md-9">
                    <input value="{{ $property->introduction }}" class="form-control" id="introduction" type="text" name="introduction" placeholder="ex: ">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="map">Google Map Link</label>
                <div class="col-md-9">
                    <input value="{{ $property->map }}" class="form-control" id="map" type="text" name="map" placeholder='ex: <iframe src="https://www.google.com/maps/embed..."'>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="bedrooms">Bedrooms</label>
                <div class="col-md-9">
                    <input value="{{ $property->beds }}" class="form-control" id="bedrooms" type="number" name="bedrooms" min="1" placeholder="Number Of Bedrooms" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="bathrooms">Bathrooms</label>
                <div class="col-md-9">
                    <input value="{{ $property->baths }}" class="form-control" id="bathrooms" type="number" name="bathrooms" min="1" placeholder="Number Of Bathrooms" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Parking</label>
                <div class="col-md-9 col-form-label">
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="parking-yes" type="radio" value="Yes" name="parking" @if ($property->parking == 'Yes') checked @endif>
                        <label class="form-check-label" for="parking-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="parking-no" type="radio" value="No" name="parking" @if ($property->parking == 'No') checked @endif>
                        <label class="form-check-label" for="parking-no">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="description">Description</label>
                <div class="col-md-9">
                    <textarea class="form-control" id="description" name="description" rows="9"
                        placeholder="Property Description...">{{ $property->description }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Type</label>
                <div class="col-md-9 col-form-label">
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="Rent" type="radio" value="Rent" name="type" @if ($property->type == 'Rent') checked @endif>
                        <label class="form-check-label" for="Rent">Rent</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="Sale" type="radio" value="Sale" name="type" @if ($property->type == 'Sale') checked @endif>
                        <label class="form-check-label" for="Sale">Sale</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="Rent/Sale" type="radio" value="Rent/Sale" name="type" @if ($property->type == 'Rent/Sale') checked @endif>
                        <label class="form-check-label" for="Rent/Sale">Rent/Sale</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="cost">Cost</label>
                <div class="col-md-9">
                    <input value="{{ $property->cost }}" class="form-control" id="cost" type="text" name="cost" placeholder="Property Cost">
                </div>
            </div>
            <div class="form-group row">
                <img src="{{ asset('assets/img/properties/' . $property->cover_image) }}" alt="{{ $property->cover_image }}" class="img-fluid">

                <div class="col-md-9">
                    <label class="col-md-3 col-form-label" for="cover_image">Change Image</label>
                    <input id="cover_image" type="file" name="cover_image">
                </div>
            </div>

    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit"> Save Changes</button>
        <a href="{{ url()->previous() }}">
            <button class="btn btn-sm btn-danger" type="button"> Cancel</button>
        </a>
    </div>
    </form>
</div>
{{-- Gallery Card --}}
<div class="card">
    <div class="card-header"><strong>Edit Gallery</strong></div>
    <div class="card-body">
        @if (isset($pictures))
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <br>
                            <h2>Add Image</h2>
                            <button class="btn pl-4 pt-3" type="button" data-toggle="modal" data-target="#imageModal">
                                <svg class="c-sidebar-nav-icon" style="width: 4rem; height: 4rem">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @foreach ($pictures as $picture)
                <div class="col-6 col-lg-3">
                    <div class="card">
                        <form action="{{ route('admin.gallery.destroy', ['gallery' => $picture]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure you want to remove this image?')" style="position: absolute; top: 12%; left: 90%; transform: translate(-50%, -50%); font-size: 1rem; border: none; cursor: pointer; border-radius: 5px;">
                                &times;
                            </button>
                        </form>
                        <img src="{{ asset('assets/img/properties/gallery/' . $picture->image) }}" alt="{{ $picture->image }}"  class="img-thumbnail">
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <h2 class="text-center">No Images In Gallery</h2>
            <br>
            <form
                action="{{ route('admin.gallery.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                <input name="property_id" type="text" value="{{ $property->id }}" hidden>
                <div class="form-group text-center">
                    <label for="image" class="text-center">Add Image To Gallery</label>
                    <input name="image" type="file" class="form-control-sm text-center" id="new_image">
                    <button class="btn btn-sm btn-primary" type="submit"> Save Image</button>
                </div>
            </form>
        @endif
    </div>
</div>
{{-- Amenity Card --}}
<div class="card">
    <div class="card-header"><strong>Edit Amenities</strong> - <button data-toggle="modal" data-target="#amenityModal" type="button" class="btn btn-success">New+</button> </div>
    <div class="card-body">
        <div class="row">
        @if (isset($amenities))
            @foreach ($amenities as $amenity)
                <div class="col-3 col-lg-3">
                    <div class="card float-left">
                        <form action="{{ route('admin.amenities.destroy', ['amenity' => $amenity]) }}" method="POST">
                            @csrf
                            @method('delete')
                            {{ $amenity->name }}
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure you want to remove this amenity?')">
                                &times;
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
        @else
            <h3 class="text-center">No Ameneties On The List</h3>
        @endif
    </div>
</div>

{{-- Add Image Modal --}}
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form
            action="{{ route('admin.gallery.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <input name="property_id" type="text" value="{{ $property->id }}" hidden>
                    <div class="form-group text-center">
                        <label for="new_image" class="text-center">Select Image</label>
                        <input name="image" type="file" class="form-control-sm text-center" id="new_image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Image</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Add Amenity Modal --}}
<div class="modal fade" id="amenityModal" tabindex="-1" role="dialog" aria-labelledby="amenityModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form
            action="{{ route('admin.amenities.store') }}"
            method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Amenity</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <input name="property_id" type="text" value="{{ $property->id }}" hidden>
                    <div class="form-group text-center">
                        <label for="new_amenity" class="text-center">Amenity Name</label>
                        <input name="name" type="text" class="form-control-sm text-center" id="new_amenity">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Amenity</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

    $('#title').change(function(e) {
        $.get('{{ route('admin.properties.checkslug') }}',
            { 'title': $(this).val(), 'id': {{ $property->id }} },
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
