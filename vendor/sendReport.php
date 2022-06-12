<?php
    session_start();
    include('../config/DBconnect.php');

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
    
    $sample_number = $_POST['sendAbsent'];
    $leader_id = $_SESSION['user']['id'];
    $absentDate = $_POST['date_selector'];
    $absentSubject = $_POST['sendSubject'][0];
    $counter = 0;

    if (($absentDate != 0) && ($absentSubject != 'Выбрать..')) {
        echo "<pre>";
            foreach ($sample_number as $str) {

                $absentInfo = divide_sample($str);
                $absentInfo[2] = $absentDate;
                $absentInfo[3] = $absentSubject;  

                if($absentInfo[1] != '') {

                    $query = "INSERT INTO `gmudatabase`.`temp_attendance` (`student_ticket`, `date`, `subject`, `leader`) VALUES ($absentInfo[0], '$absentDate', '$absentSubject', '$leader_id');";
                    $statement = $pdo->prepare($query);
                    $statement->execute();

                    header('Location: ../profile.php');
                    $_SESSION['report'] = 'Отчёт отправлен преподавателю успешно!';

                }
                else {

                }
                
            }
            
        echo "</pre>";
    }
    else {
        unset($absentDate);
        unset($absentSubject);
        $_SESSION['report_err'] = 'Проверьте правильность введённых данных и повторите попытку';
        header('Location: ../profile.php');
    }

?>