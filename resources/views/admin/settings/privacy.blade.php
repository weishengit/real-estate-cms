@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header"><strong>Edit Privacy Policy</strong></div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
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
            action="{{ route('admin.settings.privacy.update') }}"
            method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea class="form-control" id="description" name="description" rows="9"
                        placeholder="Privacy Policy...">{{ $privacy }}</textarea>
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
