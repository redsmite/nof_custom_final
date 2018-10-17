<?php
    require_once('../init.php');

    session_destroy();

    Session::set('message',"You've Successfully logged out");
    Session::set('message_type',"success");

    Redirect::to('index.php');
?>