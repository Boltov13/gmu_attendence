<?php
    session_start();
    include('../config/DBconnect.php');

    $sample_number = $_POST['sendAbsent'];
    $leader_id = $_SESSION['user']['id'];
    $absentDate = $_SESSION['report']['date'];
    $absentSubject = $_SESSION['report']['subject'][0];

    function divide_sample($sample_number){
        $str = trim($sample_number, '1234567890');
        if ($str == '') {
            return [$sample_number, ''];
        } else if (($pos = strpos($sample_number, $str)) === 0) {
            return [$str, substr($sample_number, strlen($str))];
        } else {
            return [substr($sample_number, 0, $pos), substr($sample_number, $pos)];
        }
    }
    echo "<pre>";
    foreach ($sample_number as $str) {
        $absentInfo = divide_sample($str);
        $absentInfo[2] = $absentDate;
        $absentInfo[3] = $absentSubject;  
        print_r($absentInfo);
        
        $query = "INSERT INTO `gmudatabase`.`temp_attendance` (`student_ticket`, `date`, `subject`, `leader`) VALUES ($absentInfo[0], '$absentDate', '$absentSubject', '$leader_id');";
        $statement = $pdo->prepare($query);
        $statement->execute();
    }
    echo "</pre>";
    if ($statement) {
        print "okey suka";
    }
    else {
        "huyna";
    }
?>