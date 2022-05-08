<?php
#Подключение к базе данных
require_once 'config/DBconnect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Проверить посещаемость</title>
</head>
<body>
    <div class="container mt-4">
        <form method="post" action="vendor/seekUserByname.php">
            <p class="text-uppercase fw-bold text-success">Проверка посещаемости курсанта</p>
            <label>
                <input type="text" name="seekUserSecondname" placeholder="Введите фамилию">
            </label>
            <label>
                <input type="text" name="seekUserFirstname" placeholder="Введите имя">
            </label>
            <label>
                <input type="text" name="seekUserThirdname" placeholder="Введите отчество">
            </label>
            <button type="submit" class="btn btn-success">Найти</button>
        </form>
    </div>
</body>