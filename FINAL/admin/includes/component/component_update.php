<?php
    $sql = "SELECT * FROM tbl_parts where id ='$id'";

    $query = $con->query($sql);

    $result = mysqli_fetch_assoc($query);
?>
<h2>Update Guitar Part</h2> 
    <form method="post" action="handlers/forms/parts_update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $result['id']?>" >
        <input type="hidden" name="cur_image" value="<?php echo $result['image']?>" >
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="part_name">Wood Name</label>
                    <input type="text" name="part_name" id="part_name" class="form-control" 
                           value="<?php echo $result['part_name'];?>">
                </div>

                <div class="form-group">
                    <label for="thickness">Thickness</label>
                    <input type="number" name="thickness" id="thickness" placeholder="thickness" class="form-control" value="<?php echo $result['thickness'];?>">
                </div>
            </div>
            <div class="col-md-6" id="display_image">
                <img src="../images/<?php echo $result['image']?>">
            </div>
        </div>
        
       
        
        
        <div class="form-group col-md-6">
            <label for="image">File Input</label>
            <input type="file" name="image" id="image">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" placeholder="price" class="form-control" 
                   value="<?php echo $result['price'];?>">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">
                <?php echo $result['description'];?>
            </textarea>
        </div>
        
        <input type="submit" value="Update" class="form-control btn btn-danger">
    </form>