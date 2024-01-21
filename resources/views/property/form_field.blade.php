<div class="mb-3">
    <label for="" class="form-label">Property Type Name</label>
    @if (isset($property))
        <input type="text" class="form-control" id="" name="type_name" value="{{ $property->type_name }}"
            autocomplete="off" placeholder="type name">
        @error('type_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @else
        <input type="text" class="form-control" id="" name="type_name" value="{{ old('type_name') }}"
            autocomplete="off" placeholder="type name">
        @error('type_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif
</div>
<div class="mb-3">
    <label for="" class="form-label">Descriptipon</label>
    @if (isset($property))
        <input type="text" class="form-control" id="" autocomplete="off" placeholder="Description"
            value="{{ $property->description }}" name="description">
    @else
        <input type="text" class="form-control" id="" autocomplete="off" placeholder="Description"
            value="{{ old('description') }}" name="description">
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif
</div>


<div class="mb-3">
    <label for="" class="form-label">Property ican </label>
    @if (isset($property))
        <input type="text" class="form-control" id="" name="property_ican" 
            placeholder="property Ican" value="{{ $property->type_ican }}">
    @else
        <input type="text" class="form-control" id="" name="property_ican" 
            placeholder="property Ican" value="{{ old('property_ican') }}">
        @error('property_ican')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif

</div>
