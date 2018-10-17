<?php
    session_start();

    $con = mysqli_connect("localhost","root","","db_final");//connection
    

//    require_once('classes/Redirect.php');
    //require the defines


    spl_autoload_register(function($class){
        require_once('classes/'.$class.'.php');
    });

    require_once('functions.php');
?>