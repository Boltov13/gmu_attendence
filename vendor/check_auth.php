<?php
    session_start();
    include ('../config/DBconnect.php');

    $auth_login = $_POST['auth_login'];
    $auth_password = $_POST['auth_password'];

    $query = "SELECT * FROM accounts WHERE login='$auth_login' AND password='$auth_password'";
    $query_run = $pdo->prepare($query);

    $query_run->execute();
    $count = $query_run->rowCount();
    
    if (($count) > 0) {
        //успешная авторизация
        $user = $query_run->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user'] = [
            "id" => $user['account_id'],
            "auth_login" => $user['login'],
            "teacher_id" => $user['teacher_id']
        ];

        header('Location: ../teacherProfile.php');
    } //неуcпешная авторизация
      else {

        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../auth.php');

    }