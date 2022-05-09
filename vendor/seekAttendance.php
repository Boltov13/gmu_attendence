<?php
header("Content-Type: text/plain; charset=utf-8");
include '../config/DBconnect.php';
#Создаём переменные с методом post(от кнопки)
$firstname_seek = $_POST['seekUserFirstname'];
$secondname_seek = $_POST['seekUserSecondname'];
$thirdname_seek = $_POST['seekUserThirdname'];

if (empty($secondname_seek)) {
    echo 'По вашему запросу нет результатов';
}
else
{
    $firstname_seek = mysqli_query(DBconnect(), query: "SELECT first_name FROM users WHERE second_name=$secondname_seek");
    var_dump($firstname_seek);
    $thirdname_seek = mysqli_query(DBconnect(), query: "SELECT third_name FROM users WHERE third_name=$thirdname_seek");
    $seekUserQuery = ("SELECT * FROM users WHERE  
    second_name='$secondname_seek'");

    $seekAttendanceQuery = ("SELECT * FROM attendence WHERE 
    student_id=(SELECT id FROM users WHERE 
    first_name='$firstname_seek' AND
    second_name='$secondname_seek' AND
    third_name='$thirdname_seek'");

#переменная the_rows - массив
    $the_rows = array();
#переменная seek_result - объект mysqli_result
    $seek = mysqli_query(DBconnect(), $seekUserQuery);
#перебираю массив на строки
    while ($row = $seek->fetch_array()){$the_rows[] = $row;}
    foreach ($the_rows as $row)
    {
        #вывожу строки
        echo "\nid = ", $row[0];
        echo "\nfirstname = ", $row[2];
        echo "\nsecondname = ", $row[3];
        echo "\nthirdname = ", $row[4];
        echo "\ngroup = ", $row[5];
    }

    $attendance = mysqli_query(DBconnect(), $seekAttendanceQuery);
    $the_rows = array();
#перебираю массив на строки
    while ($row = $attendance->fetch_array()){$the_rows[] = $row;}
    foreach ($the_rows as $row)
    {
        #вывожу строки
        echo "\nid = ", $row[0];
        echo "\nsubject = ", $row[1];
        echo "\ndate = ", $row[2];
        echo "\nhours_lost = ", $row[3];
        echo "\nteacher_name = ", $row[4];
    }
}