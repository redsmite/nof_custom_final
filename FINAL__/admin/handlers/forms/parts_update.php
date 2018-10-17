<?php
    
    require_once('../dependencies.php');
    $file = new FileUpload();


    $cur_image = $_POST['cur_image'];
    $id        = $_POST['id'];

    $part_name = Filters::str($_POST['part_name']);
    $thickness = $_POST['thickness'];
    $description = Filters::str($_POST['description']);
    $price  =  $_POST['price'];

    if(!empty($_FILES['image']['name'])) {
        $image = $file->image('image');
        
        $file_errors = $file->errors();
        
        if(!empty($file_errors)) {
            
            foreach($file_errors as $errors) {
                
                echo $errors;
            }
            
            exit();
        }
        
        else{
            $cur_image = $file->newName();
        }
    }

    $sql = "UPDATE tbl_parts set part_name = '$part_name' , thickness = '$thickness',description='$description',image='$cur_image',
    price='$price' where id ='$id'";

   $query = $con->query($sql);

   if($query) {
       
       //add sesion
       
       Redirect::to('../../component.php?id='.$id);
   }

?>