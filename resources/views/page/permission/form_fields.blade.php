<div class="mb-3">
    <label for="" class="form-label"> Permission Name<span class="text-danger">*</span></label>

    <input type="text" class="form-control" id="" name="name" value=""
        autocomplete="off" placeholder="type name">
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
<div class="mb-3">
    <label for="" class="form-label">Group named <span class="text-danger">*</span></label>
    <select name="group_name" id="group_name" class="form-control">
        <option value="propertytype">Property Type</option>
        <option value="state">state</option>
        <option value="package_history">package history</option>
        <option value="property_message">property message</option>
        <option value="manage_agents">manage agents</option>
        <option value="blog_category">blog category</option>
        <option value="blog_comments">blog comments</option>
        <option value="amenites">Amenites</option>
        <option value="role_permission">Role and Permission</option>


    </select>
</div>
