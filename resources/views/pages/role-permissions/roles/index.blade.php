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
            @can('create role')
            <div class="card mb-4">
                <div class="card-header">Create Role</div>

                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        @include('pages.role-permissions.roles.partials.form-control', ['submit' => 'Create'])
                    </form>
                </div>
            </div>
            @endcan

            <div class="card">
                <div class="card-header">List Role</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="text-light bg-primary">
                                <tr>
                                    <th width="20">#</th>
                                    <th>Role Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $index => $role)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->created_at->format('d F Y H:i') }}</td>
                                    <td>
                                        @can('update role')
                                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning btn-sm">Edit</a>
                                        @endcan
                                        @can('delete role')
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