<?php 

    session_start();
    include ('../config/DBconnect.php');

    $isAbsent = $_POST['absent'];
    print_r($isAbsent);
?>