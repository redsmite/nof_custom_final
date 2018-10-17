<?php

    require_once('../init.php');

    session_destroy();

    Session::set('message',"You've Successfully logged out");

    Redirect::to('index.php');
?>