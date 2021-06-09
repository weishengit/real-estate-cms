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
                                <span class="badge badge-secondary">Unlisted</span>
                            @endif
                        </td>
                        <td>{{ $property->created_at->format('M d Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.properties.edit', ['property' => $property]) }}">
                                    <button class="btn btn-sm btn-info" type="button">Edit</button>
                                </a>
                                @if ($property->listed)
                                <form action="{{ route('admin.properties.destroy', ['property' => $property]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure you want to unlist this property?')">Unlist</button>
                                </form>
                                @else
                                <form action="{{ route('admin.properties.restore', ['property' => $property]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-sm btn-success" type="submit" onclick="return confirm('Are you sure you want to relist this property?')">List</button>
                                </form>
                                @endif

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
