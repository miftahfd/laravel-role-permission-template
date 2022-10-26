<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="parent">Parent Menu</label>
            <select name="parent" id="parent" class="form-control select2">
                <option disabled selected>Choose a parent menu</option>
                @foreach($parent_menu_navigations as $parent_menu_navigation)
                    <option {{ $menu_navigation->parent()->find($parent_menu_navigation->id) ? 'selected' : '' }} value="{{ $parent_menu_navigation->id }}">{{ $parent_menu_navigation->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="permission">Permission</label>
            <select name="permission" id="permission" class="form-control select2">
                <option disabled selected>Choose a permission</option>
                @foreach($permissions as $permission)
                    <option {{ $menu_navigation->permission()->find($permission->id) ? 'selected' : '' }} value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>
        @error('permission')
            <div class="text-danger mt-2 d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $menu_navigation->name }}">
        </div>
        @error('name')
            <div class="text-danger mt-2 d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="route_name">Route Name</label>
            <input type="text" name="route_name" id="route_name" class="form-control" value="{{ old('name') ?? $menu_navigation->route_name }}">
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mt-4">{{ $submit }}</button>