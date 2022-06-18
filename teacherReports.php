<?php 
    session_start();
    include ('config/DBconnect.php');

    $teacherID = $_SESSION['user']['teacher_id'];

    $query = "SELECT * FROM temp_attendance WHERE subject_id=(SELECT subject_id FROM subjects WHERE teacher_id=$teacherID)";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $counter = 0;

    $count = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    if (($count) > 0) { print 123;
        //Поиск дал резульаты
        

    } //поиск не дал резульатты
    else {

        print 1234;
    }

?>