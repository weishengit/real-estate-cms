@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header"><strong>Edit Social Links</strong></div>
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
            action="{{ route('admin.settings.social.update') }}"
            method="post">
            @csrf
            @method('put')
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="facebook">Facebook Link</label>
                <div class="col-md-9">
                    <input value="{{ $settings['facebook'] }}" class="form-control" id="facebook" type="text" name="facebook" placeholder="facebook link" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="instagram">Instragram Link</label>
                <div class="col-md-9">
                    <input value="{{ $settings['instagram'] }}" class="form-control" id="instagram" type="text" name="instagram" placeholder="Instagram Link" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="twitter">Twitter Link</label>
                <div class="col-md-9">
                    <input value="{{ $settings['twitter'] }}" class="form-control" id="twitter" type="text" name="twitter" placeholder="Twitter Link" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="pinterest">Pinterest Link</label>
                <div class="col-md-9">
                    <input value="{{ $settings['pinterest'] }}" class="form-control" id="pinterest" type="text" name="pinterest" placeholder="Pinterest Link" required>
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
