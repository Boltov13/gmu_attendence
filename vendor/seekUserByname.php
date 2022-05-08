<?php
include '../config/DBconnect.php';
$seek_result = mysqli_query(DBconnect(), query: "SELECT * FROM users WHERE first_name='Илья' AND second_name='Товстяк'");
var_dump($seek_result);
while ($row = $seek_result->fetch_array()){$the_rows[] = $row;}
foreach ($the_rows as $row)
{
    echo $row[0];
    echo $row[1];
    echo $row[2];
    echo $row[3];
    echo $row[4];
    echo $row[5];
    echo $row[6];
    echo $row[7];
}