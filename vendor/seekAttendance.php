<?php
    session_start();
    include ('../config/DBconnect.php');

    $userID = $_SESSION['user']['id'];
    $userLOGIN = $_SESSION['user']['auth_login'];
    print_r($userLOGIN);

    $query = "SELECT * FROM `attendence` WHERE `student_id`=
    (SELECT `account_id` FROM `accounts` WHERE `login`='$userLOGIN')";
    $query_run = $pdo->prepare($query);

    $query_run->execute();

    $count = $query_run->rowCount();
    print_r ($count);
    
    if (($count) > 0) {

        print 'пропусков есть';
    } else {
        print 'пропуски нет';
    }
//sql 5.7

    // $seekAttendanceByID = mysqli_query(DBconnect(), $seekRequest);
    // $seekResult = mysqli_fetch_assoc($seekAttendanceByID);
    // $seekFETCH = mysqli_fetch_all($seekAttendanceByID);
