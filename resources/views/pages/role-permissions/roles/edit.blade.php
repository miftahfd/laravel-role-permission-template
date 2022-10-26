@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">Edit Role</div>

                <div class="card-body">
                    <form action="{{ route('roles.edit', $role) }}" method="post">
                        @csrf
                        @method('PUT')
                        @include('pages.role-permissions.roles.partials.form-control', ['submit' => 'Update'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection