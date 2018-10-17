<?php
    require_once('../dependencies.php');

    $guitar_id = $_POST['guitar_id'];
    $client_id = Session::get('user_id');
    $amount    = $_POST['amount'];
    $status     = '1';


    $sql = "INSERT INTO guitar_orders(guitar_id , client_id ,amount , payment_type ,status)";
    
    if(isset($_POST['btncash'])) {
        $sql .="VALUES('$guitar_id','$client_id','$amount','1','$status')";
        

        $query = $con->query($sql);
    }

    else if($_POST['btninstallment']){
         $sql .="VALUES('$guitar_id','$client_id','$amount','2','$status')";


        $query = $con->query($sql);
    }

    if($query){
       
        $last_id  = mysqli_insert_id($con);

        Session::set('message',"Your Order has been sent");
        Session::set('message_type',"success");
        Redirect::to('../../guitar_tracking.php?order_id='.$last_id.'&guitar_id='.$guitar_id);
    }

    else{
        die(mysqli_error($con));
    }
?>