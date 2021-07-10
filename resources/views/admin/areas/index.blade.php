@extends('layouts.admin')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i> Areas</div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areas as $area)
                    <tr>
                        <td>{{ $area->id }}</td>
                        <td>{{ $area->name }}</td>
                        <td>
                            @if (!$area->deleted_at)
                                <span class="badge badge-success">Enabled</span>
                            @else
                                <span class="badge badge-secondary">Disabled</span>
                            @endif
                        </td>
                        <td>{{ $area->updated_at->format('M d Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.areas.edit', ['area' => $area->id]) }}">
                                    <button class="btn btn-sm btn-info" type="button">Edit</button>
                                </a>
                                @if (!$area->deleted_at)
                                <form action="{{ route('admin.areas.destroy', ['area' => $area]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Disabling this area will prevent you from assigning properties in this area. Are you sure you want to disable this area?')">Disable</button>
                                </form>
                                @else
                                <form action="{{ route('admin.areas.restore', ['area' => $area->id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-sm btn-success" type="submit" onclick="return confirm('Enabling will allow you to assign properties to this area. Are you sure you want to enable this area?')">Enable</button>
                                </form>
                                @endif

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $areas->links() }}
        </div>
    </div>
</div>
@endsection
