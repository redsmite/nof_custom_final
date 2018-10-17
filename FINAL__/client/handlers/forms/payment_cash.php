<?php
	require_once('../dependencies.php');
    $file = new FileUpload();


    $order_id = $_POST['order_id'];
    $guitar_id = $_POST['guitar_id'];
    $client_id = Session::get('user_id');
    $amount =  $_POST['amount'];
    $sender_name = $_POST['sender_name'];

    $image = $file->image('image');

    $file_errors = $file->errors();

    if(!empty($file_errors)) {
        
        foreach($file_errors as $error) {
            echo $error;
        }
        
        
        exit();
    }
    
    $image = $file->newName();
    $sql = "INSERT INTO guitar_payments (orders_id , amount ,date_paid , sender_name , file,status)";

    $sql .="VALUES('$order_id','$amount',now(),'$sender_name','$image','1')";

    $query = $con->query($sql);


    if(!$query) {
        Session::set('message',"Payment Attachment Not been sent");
        Session::set('message_type',"error");
    }

    else{
        Session::set('message',"Payment Attachment Has been sent");
        Session::set('message_type',"success");
    }

    Redirect::to('../../guitar_tracking.php?order_id='.$order_id.'&guitar_id='.$guitar_id);
?>

