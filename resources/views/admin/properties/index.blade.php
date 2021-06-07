@extends('layouts.admin')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i> {{ $filter }} Properties</div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Area</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                    <tr>
                        <td>{{ $property->title }}</td>
                        <td>{{ $property->area->name }}</td>
                        <td>{{ $property->type }}</td>
                        <td>
                            @if ($property->listed)
                                <span class="badge badge-success">Listed</span>
                            @else
                                <span class="badge badge-success">Unlisted</span>
                            @endif
                        </td>
                        <td>{{ $property->created_at->format('M d Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.properties.edit', ['property' => $property]) }}">
                                    <button class="btn btn-sm btn-info" type="button">Edit</button>
                                </a>
                                <form action="{{ route('admin.properties.destroy', ['property' => $property]) }}">
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure you wan\'t to delete this property?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $properties->links() }}
        </div>
    </div>
</div>
@endsection
