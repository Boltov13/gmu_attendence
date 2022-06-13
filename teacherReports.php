<?php 
    session_start();
    include ('../config/DBconnect.php');

    $teacherFullname = $_SESSION['user']['second_name'] + $_SESSION['user']['first_name'] + $_SESSION['user']['third_name'];

    $query = "SELECT * FROM temp_attendance WHERE subject_teacher='$teacherFullname'";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $counter = 0;
    
    if (($count) > 0) {
        //Поиск дал резульаты
        foreach ($result as $row) { $counter ++;

        }

    } //поиск не дал резульатты
    else {


    }


?>