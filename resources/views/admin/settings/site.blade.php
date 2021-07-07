@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header"><strong>Edit Site Settings</strong></div>
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
            action="{{ route('admin.settings.site.update') }}"
            method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="site_name">Site Name</label>
                <div class="col-md-9">
                    <input value="{{ $settings['meta_site_name'] }}" class="form-control" id="site_name" type="text" name="site_name" placeholder="Site Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="site_author">Site Author</label>
                <div class="col-md-9">
                    <input value="{{ $settings['meta_site_author'] }}" class="form-control" id="site_author" type="text" name="site_author" placeholder="Site Author" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="site_description">Site Description</label>
                <div class="col-md-9">
                    <input value="{{ $settings['meta_site_description'] }}" class="form-control" id="site_description" type="text" name="site_description" placeholder="Site Description" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="site_keywords">Keywords(keyword1, keyword2, ...)</label>
                <div class="col-md-9">
                    <input value="{{ $settings['meta_site_keywords'] }}" class="form-control" id="site_keywords" type="text" name="site_keywords" placeholder="Site Keywords" required>
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
