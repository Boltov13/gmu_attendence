<?php
    session_start();
    include ('../config/DBconnect.php');

    $reportID = $_POST['SubmitReportID'];

    $query = "SELECT * FROM `temp_attendance` WHERE `id` = '$reportID'";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $teacherID = $_SESSION['user']['teacher_id'];
    $subject = $result[0]['subject_id'];
    $date = $result[0]['date'];
    $student_ticket = $result[0]['student_ticket'];

    $takeStudentID = "SELECT `id` FROM `gmudatabase`.`users` WHERE `student_ticket`= '$student_ticket'";
    $takeStudentID_query = $pdo->prepare($takeStudentID);
    $takeStudentID_query->execute();
    $takeStudentIDResult = $takeStudentID_query->fetchAll(PDO::FETCH_ASSOC);
    $Competely_ID = $takeStudentIDResult[0]['id'];
   
    $deleteReport_query = "DELETE FROM `temp_attendance` WHERE `id` = '$reportID'";
    $deleteStatement = $pdo->prepare($deleteReport_query);
    $deleteStatement->execute();

    $insert_query = "INSERT INTO `attendence` (`student_id`, `subject`, `date`, `hour_lost`, `teacher`, `reason`) 
    VALUES ('$Competely_ID', '$subject', '$date', '1', '$teacherID', '1')";
    $insertStatement = $pdo->prepare($insert_query);
    $insertStatement->execute();

    header('Location: ../teacherProfile.php');
?>