@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header"><strong>Edit Contact Settings</strong></div>
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
            action="{{ route('admin.settings.contact.update') }}"
            method="post">
            @csrf
            @method('put')
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="address">Physical Address</label>
                <div class="col-md-9">
                    <input value="{{ $settings['address'] }}" class="form-control" id="address" type="text" name="address" placeholder="Physical Address Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="contact">Contact Number</label>
                <div class="col-md-9">
                    <input value="{{ $settings['contact'] }}" class="form-control" id="contact" type="text" name="contact" placeholder="Contact Number" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email">Email Address</label>
                <div class="col-md-9">
                    <input value="{{ $settings['email'] }}" class="form-control" id="email" type="email" name="email" placeholder="Email Address" required>
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
