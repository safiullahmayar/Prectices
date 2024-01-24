<div class="mb-3">
    <label for="" class="form-label"> Permission Name<span class="text-danger">*</span></label>
   
        <input type="text" class="form-control" id="" name="name"
        @if (isset($permission))    value="{{ $permission ? $permission->name : '' }}" @endif autocomplete="off" placeholder="type name">

        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
  
</div>
<div class="mb-3">
    <label for="" class="form-label">Group named <span class="text-danger">*</span></label>
  
        <select name="group_name" id="group_name" class="form-control">
            <option value="propertytype" @if (isset($permission) && $permission->propertytype) selected @endif>
                Property Type
            </option>
            
            <option value="state"  @if (isset($permission) && $permission->group_name=='state') selected @endif>state</option>
            <option value="package_history"  @if (isset($permission) && $permission->group_name=='package_history') selected @endif>package history</option>
            <option value="property_message"  @if (isset($permission) && $permission->group_name=='property_message') selected @endif>property message</option>
            <option value="manage_agents"  @if (isset($permission) && $permission->group_name=='manage_agents') selected @endif>manage agents</option>
            <option value="blog_category"  @if (isset($permission) && $permission->group_name=='blog_category') selected @endif>blog category</option>
            <option value="blog_comments"  @if (isset($permission) && $permission->group_name=='blog_comments') selected @endif>blog comments</option>
            <option value="amenites"  @if (isset($permission) && $permission->group_name=='amenites') selected @endif>Amenites</option>
            <option value="role_permission"  @if (isset($permission) && $permission->group_name=='role_permission') selected @endif>Role and Permission</option>
        </select>
 
   
    @error('group_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
