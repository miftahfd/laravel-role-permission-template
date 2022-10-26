@extends('layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function() {
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
                    <form action="{{ route('assign-roles.edit', $user) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user">User</label>
                                    <select name="user" id="user" class="form-control">
                                        <option disabled selected>Choose a user</option>
                                        @foreach($users as $item)
                                            <option {{ $user->id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
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
                                            <option {{ $user->roles()->find($role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <div class="text-danger mt-2 d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Sync</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection