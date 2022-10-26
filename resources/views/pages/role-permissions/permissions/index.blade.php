@extends('layouts.app')

@push('scripts')
<script>
    $(function() {
        $('.table').DataTable()
    })
</script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('create permission')
            <div class="card mb-4">
                <div class="card-header">Create Permission</div>

                <div class="card-body">
                    <form action="{{ route('permissions.store') }}" method="post">
                        @csrf
                        @include('pages.role-permissions.permissions.partials.form-control', ['submit' => 'Create'])
                    </form>
                </div>
            </div>
            @endcan

            <div class="card">
                <div class="card-header">List Permission</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="text-light bg-primary">
                                <tr>
                                    <th width="20">#</th>
                                    <th>Permission Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $index => $permission)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->created_at->format('d F Y H:i') }}</td>
                                    <td>
                                        @can('update permission')
                                        <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-warning btn-sm">Edit</a>
                                        @endcan
                                        @can('delete permission')
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection