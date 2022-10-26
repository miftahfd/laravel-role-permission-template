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
                <div class="card-header">Assign Role to Permission</div>

                <div class="card-body">
                    <form action="{{ route('assign-permissions.edit', $role) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Role Name</label>
                                    <select name="role" id="role" class="form-control">
                                        <option disabled selected>Choose a role</option>
                                        @foreach($roles as $item)
                                            <option {{ $role->id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
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
                                            <option {{ $role->permissions()->find($permission->id) ? 'selected' : '' }} value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('permissions')
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