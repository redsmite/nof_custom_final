<?php
    
    require_once('../dependencies.php');
    $file = new FileUpload();

    /*INSERT COMPONENT*/
    $errors = array();

    
    $part_type = $_POST['part_type'];
    $part_name = $_POST['part_name'];
    $thickness = $_POST['thickness'];
    $description = $_POST['description'];
    $price  =  $_POST['price'];

    $newname;


    $image = $file->image('image');

    
    $file_errors = $file->errors();
    
    if(!empty($file_errors)) {
        foreach($file_errors as $error) {
            $errors[] = $error;
        }
        
        
        print_r($errors);
        exit();
    }

    $newname = $file->newName();


    $sql = "INSERT INTO tbl_parts(part_type,part_name,thickness,description,image,price)";

    $sql .="VALUES('$part_type','$part_name','$thickness','$description','$newname','$price')";


    $query = $con->query($sql);

    if($query) {
        
        Session::set('message','Guitar part added');
        Session::set('message_type','success');
        Redirect::to('../../component.php');
    }


    

?>