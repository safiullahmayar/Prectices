<div class="mb-3">
    <label for="" class="form-label"> Role Name<span class="text-danger">*</span></label>

    <input type="text" class="form-control" id="" name="name"
        {{-- @if (isset($permission)) value="{{ $permission ? $permission->name : '' }}" @endif autocomplete="off" --}}
        placeholder="type name">

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
