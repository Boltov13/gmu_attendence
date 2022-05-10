<?php
header("Content-Type: text/plain; charset=utf-8");
include '../config/DBconnect.php';
#Создаём переменные с методом post(от кнопки)
$firstname_seek = $_POST['seekUserFirstname'];
$secondname_seek = $_POST['seekUserSecondname'];
$thirdname_seek = $_POST['seekUserThirdname'];

if (empty($secondname_seek))
{
    echo 'По вашему запросу нет результатов';
}
else
{
    $seekUserQuery = ("SELECT * FROM users WHERE  
    second_name='$secondname_seek'");
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

}