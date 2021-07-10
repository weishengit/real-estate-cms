@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header"><strong>Edit Area - {{ $area->name }}</strong></div>
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
            action="{{ route('admin.areas.update', ['area' => $area->id]) }}"
            method="post">
            @csrf
            @method('put')

            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="name">Area Name</label>
                <div class="col-md-9">
                    <input value="{{ $area->name }}" class="form-control" id="name" type="text" name="name" placeholder="Area Name...">
                </div>
            </div>

    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
        <a href="{{ url()->previous() }}">
            <button class="btn btn-sm btn-danger" type="button"> Cancel</button>
        </a>
    </div>
    </form>
</div>
@endsection
