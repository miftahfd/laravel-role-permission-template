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
            <div class="card mb-4">
                <div class="card-header">Edit Menu Navigation</div>

                <div class="card-body">
                    <form action="{{ route('menu-navigations.edit', $menu_navigation) }}" method="post">
                        @csrf
                        @method('PUT')
                        @include('pages.settings.menu-navigations.partials.form-control', ['submit' => 'Update'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection