<?php
    session_start();
    require_once 'config/DBconnect.php';
    DBconnect();
    include 'vendor/seekAttendance.php';

    $userID = $_SESSION['user']['id'];
    $userLOGIN = $_SESSION['user']['auth_login'];

    $seekRequest = "select * from attendence where student_id=
                    (select account_id from accounts where login='$userLOGIN')";

    $seekAttendanceByID = mysqli_query(DBconnect(), $seekRequest);
    $seekResult = mysqli_fetch_assoc($seekAttendanceByID);
    $seekFETCH = mysqli_fetch_all($seekAttendanceByID);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Посещаемость студента - Глаз</title>
    <link href="css/bootstrap.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="css/profile_style.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Глаз</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Введите дату в виде (31.01.1999)" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="vendor/logout.php">Выйти</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="profile.php">
                            <span data-feather="home"></span>
                            Профиль
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="showAttendance.php">
                            <span data-feather="file"></span>
                            Посещаемость
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Успеваемость
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Личная карточка студента
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Преподавательский состав
                        </a>
                    </li>
                </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2>Отчёт о посещаемости
                <?php
                print_r($_SESSION['user']); #TODO выводить имя пользователя
                ?>
            </h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Предмет</th>
                        <th scope="col">Преподаватель</th>
                        <th scope="col">Причина</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1,001</td>
                        <td>random</td>
                        <td>data</td>
                        <td>placeholder</td>
                        <td>text</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
</body>
</html>