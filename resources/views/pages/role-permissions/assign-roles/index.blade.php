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
                <div class="card-header">Assign User to Role</div>

                <div class="card-body">
                    <form action="{{ route('assign-roles.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user">User</label>
                                    <select name="user" id="user" class="form-control">
                                        <option disabled selected>Choose a user</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user')
                                        <div class="text-danger mt-2 d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Role Name</label>
                                    <select name="roles[]" id="role" class="form-control select2" multiple>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
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
                <div class="card-header">List User & Role</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="text-light bg-primary">
                                <tr>
                                    <th width="20">#</th>
                                    <th>User</th>
                                    <th>List Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                                    <td><a href="{{ route('assign-roles.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a></td>
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