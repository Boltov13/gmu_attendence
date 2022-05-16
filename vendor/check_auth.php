<?php
    session_start();
    require_once '../config/DBconnect.php';
    DBconnect();

    $auth_login = $_POST['auth_login'];
    $auth_password = $_POST['auth_password'];

    $check_user = mysqli_query(DBconnect(), "SELECT * FROM `accounts` WHERE `login`='$auth_login' AND `password`='$auth_password'");

    if (mysqli_num_rows($check_user) > 0) {
        //успешная авторизация
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "auth_login" => $user['auth_login'],
        ];

        header('Location: ../profile.php');

    } else {
        //неуспешная авторизация
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../auth.php');
    }