@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">Edit Permission</div>

                <div class="card-body">
                    <form action="{{ route('permissions.edit', $permission) }}" method="post">
                        @csrf
                        @method('PUT')
                        @include('pages.role-permissions.permissions.partials.form-control', ['submit' => 'Update'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection