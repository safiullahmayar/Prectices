
<div class="mb-3">
    <label for="" class="form-label">Property Type Name</label>
    <input type="text" class="form-control" id="" name="type_name" value="{{ old('type_name') }}"
        autocomplete="off" placeholder="type name">
    @error('type_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="" class="form-label">Descriptipon</label>
    <input type="text" class="form-control" id="" autocomplete="off" placeholder="Description"
        value="{{ old('description') }}" name="description">
</div>
@error('description')
    <span class="text-danger">{{ $message }}</span>
@enderror
<div class="mb-3">
    <label for="" class="form-label">Property ican </label>
    <input type="text" class="form-control" id="" name="property_ican" value=""
        placeholder="property Ican" value="{{ old('property_ican') }}">

</div>
@error('property_ican')
    <span class="text-danger">{{ $message }}</span>
@enderror
