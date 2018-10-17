<?php
	require_once('../dependencies.php');

	$name = Filters::str($_POST['user']);
    $password = md5($_POST['password']);

    $sql = "SELECT id  ,username ,type FROM tbl_accs WHERE username = '$name' AND password = '$password'";
    $query = $con->query($sql);

    if(!$query->num_rows){
        Session::set('message',"There are no username");
        Redirect::to('../../index.php');
        
        exit();
    }
    
    $result = mysqli_fetch_assoc($query);
    Session::set('message_type',"success");
    Session::set('message',"You Are now logged in as '{$result['username']}' " );
    $type   = $result['type'];

    $_SESSION['user_id']   = $result['id'];
    $_SESSION['user_type'] = $result['type'];
    switch($type){
        case '1':
                Redirect::to('../../index.php');
            break;
        case '2':
                Redirect::to('../../../admin');
            break;
    }
    
?>