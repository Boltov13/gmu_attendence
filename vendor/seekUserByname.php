<?php
include 'config/DBconnect.php';

$firstname_seek = $_POST['seek_firstname'];
$secondname_seek = $_POST['seek_secondname'];
$thirdname_seek = $_POST['seek_thirdname'];
$seek_result = mysqli_query($connection, query:"SELECT * FROM `users` WHERE `first_name` LIKE '$firstname_seek' AND `second_name` LIKE '$secondname_seek' AND `third_name` LIKE '$thirdname_seek'");
var_dump($seek_result);
$firstname_result = mysqli_fetch_all($seek_result);
var_dump($seek_result);