@extends('layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function() {
        $('.table').DataTable()
        $('.select2').select2()
    })
</script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card mb-4">
                <div class="card-header">Assign Role to Permission</div>

                <div class="card-body">
                    <form action="{{ route('assign-permissions.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Role Name</label>
                                    <select name="role" id="role" class="form-control">
                                        <option disabled selected>Choose a role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="text-danger mt-2 d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="permission">Permission Name</label>
                                    <select name="permissions[]" id="permissions" class="form-control select2" multiple>
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('permissions')
                                        <div class="text-danger mt-2 d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Assign</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">List Role & Permission</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="text-light bg-primary">
                                <tr>
                                    <th width="20">#</th>
                                    <th>Role Name</th>
                                    <th>List Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $index => $role)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ implode(', ', $role->getPermissionNames()->toArray()) }}</td>
                                    <td><a href="{{ route('assign-permissions.edit', $role) }}" class="btn btn-warning btn-sm">Edit</a></td>
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