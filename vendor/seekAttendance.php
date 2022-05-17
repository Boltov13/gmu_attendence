<?php
    session_start();
    DBconnect();

    $userID = $_SESSION['user']['id'];
    $userLOGIN = $_SESSION['user']['auth_login'];

    $seekRequest = "select * from attendence where student_id=
                    (select account_id from accounts where login='$userLOGIN')";

    $seekAttendanceByID = mysqli_query(DBconnect(), $seekRequest);
    $seekResult = mysqli_fetch_assoc($seekAttendanceByID);