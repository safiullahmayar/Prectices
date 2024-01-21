
<div class="mb-3">
    <label for="" class="form-label">Amenities Name</label>
    @if (isset($property))
        <input type="text" class="form-control" id="" name="amenite" 
            placeholder="Amenite Name" value="{{ $property->type_ican }}">
    @else
        <input type="text" class="form-control" id="" name="amenite" 
            placeholder="Amenite Name" value="{{ old('amenite') }}">
        @error('amenite')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif

</div>
