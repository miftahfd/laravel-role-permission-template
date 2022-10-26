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
                <div class="card-header">Create Menu Navigation</div>

                <div class="card-body">
                    <form action="{{ route('menu-navigations.store') }}" method="post">
                        @csrf
                        @include('pages.settings.menu-navigations.partials.form-control', ['submit' => 'Create'])
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">List Menu Navigation</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="text-light bg-primary">
                                <tr>
                                    <th width="20">#</th>
                                    <th>Parent Menu Name</th>
                                    <th>Menu Name</th>
                                    <th>Route Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menu_navigations as $index => $menu_navigation)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $menu_navigation->parent->name ?? null }}</strong></td>
                                    <td>{{ $menu_navigation->name }}</td>
                                    <td>{{ $menu_navigation->route_name ?? null }}</td>
                                    <td>{{ $menu_navigation->created_at->format('d F Y H:i') }}</td>
                                    <td><a href="{{ route('menu-navigations.edit', $menu_navigation) }}" class="btn btn-warning btn-sm">Edit</a></td>
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