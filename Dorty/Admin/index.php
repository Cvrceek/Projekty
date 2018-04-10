<?php
    session_start();
    include('../class.MySQLDB.php');
    include('../class.Functions.php');
    
    if(!is_login()) {
        include('web/login.php');
    } else {
        include('web/frame.php');
    }
?>