<div class="mb-3">
    <label for="" class="form-label">Amenities Name</label>
    <div class="form-group">
        @if (isset($amenties))
            <input type="text" class="form-control" id="" name="amenites_name" placeholder="Amenite Name"
                value="{{ $amenties->amenites_name }}">
        @else
            <input type="text" class="form-control" id="" name="amenites_name" placeholder="Amenite Name"
                value="{{ old('amenites_name') }}">
        @endif
    </div>

</div>
