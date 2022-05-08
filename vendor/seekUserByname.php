<?php
include '../config/DBconnect.php';
#Создаём переменные с методом post(от кнопки)
$firstname_seek = $_POST['seekUserFirstname'];
$secondname_seek = $_POST['seekUserSecondname'];
$thirdname_seek = $_POST['seekUserThirdname'];
#переменная the_rows - массив
$the_rows = array();
#переменная seek_result - объект mysqli_result
$seek_result = mysqli_query(DBconnect(), query: "SELECT * FROM users WHERE first_name='$firstname_seek' AND second_name='$secondname_seek' AND third_name='$thirdname_seek'");
#перебираю массив на строки
while ($row = $seek_result->fetch_array()){$the_rows[] = $row;}
foreach ($the_rows as $row)
{
    #вывожу строки
    echo 'id = ', $row[0];
    echo 'student_card =', $row[1];
    echo 'firstname = ', $row[2];
    echo 'secondname = ', $row[3];
    echo 'thirdname = ', $row[4];
    echo 'group = ', $row[5];
    echo 'direction = ', $row[6];
    echo 'year = ', $row[7];
}