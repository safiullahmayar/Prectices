
<div class="mb-3">
    <label for="" class="form-label">Amenities Name</label>
    @if (isset($amenties))
        <input type="text" class="form-control" id="" name="amenites_name" 
            placeholder="Amenite Name" value="{{ $property->type_ican }}">
    @else
        <input type="text" class="form-control" id="" name="amenites_name" 
            placeholder="Amenite Name" value="{{ old('amenites_name') }}">
        @error('amenites_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif

</div>
