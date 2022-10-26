<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $role->name }}">
        </div>
        @error('name')
            <div class="text-danger mt-2 d-block">{{ $message }}</div>
        @enderror
    </div>
</div>

<button type="submit" class="btn btn-primary mt-4">{{ $submit }}</button>