<?php 
    session_start();
    include '../config/DBconnect.php';

    $studentCard = $_POST['seekNumber'];

    $query = "SELECT * FROM `users` WHERE `student_ticket`='$studentCard'";
    $query_run = $pdo->prepare($query);

    $query_run->execute();
    $count = $query_run->rowCount();
  
    if (($count) > 0) {
        //по поиску ЕСТЬ резульаты
        $user = $query_run->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user'] = [
            "student_card" => $user['student_ticket'],
            "id" => $user['account_id'],
            "first_name" => $user['first_name'],
            "second_name" => $user['second_name'],
            "third_name" => $user['third_name'],
            "study_group" => $user['study_group'],
            "direction" => $user['direction'],
            "year" => $user['year']
        ];

        print_r($_SESSION['user']);

        header('Location: ../profile.php');
    } //Результатов нет
      else {

        $_SESSION['message'] = 'Нет результатов по вашему запросу.';
        header('Location: ../seekForm.php');

    }
?>