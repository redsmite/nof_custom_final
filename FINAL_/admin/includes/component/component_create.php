<div class="col-lg-3">
    <h2>Create Part</h2> 
    <form method="post" action="handlers/forms/parts_create.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="part_type">Wood Type</label>
            <select name="part_type" id="part_types" class="form-control">
                <option value="1"> Wood Head </option>
                <option value="2"> Wood Neck </option>
                <option value="3"> Wood Body </option>
            </select>
        </div>

        <div class="form-group">
            <label for="part_name">Wood Name</label>
            <input type="text" name="part_name" id="part_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="thickness">Thickness</label>
            <input type="number" name="thickness" id="thickness" placeholder="thickness" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">File Input</label>
            <input type="file" name="image" id="image">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" placeholder="price" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        
        <input type="submit" value="Create" class="form-control btn btn-danger">
    </form>
    </div>