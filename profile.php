<?php
    session_start();
    include 'config/DBconnect.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Быстрая проверка - Глаз</title>
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


    <!-- Cвои стили-->
    <link href="css/profile_style.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5" href="#">Глаз</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
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
                        <a class="nav-link active" aria-current="page" href="profile.php">
                            <span data-feather="home"></span>
                            Профиль
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="showAttendance.php">
                            <span data-feather="file"></span>
                            Посещаемость
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="showMarks.php">
                            <span data-feather="file"></span>
                            Успеваемость
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="showPrivateCard.php">
                            <span data-feather="file"></span>
                            Личная карточка студента
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="showTeachers.php">
                            <span data-feather="file"></span>
                            Преподавательский состав
                        </a>
                    </li>
                    
                    <?php 
                        if ($_SESSION['user']['user_role'] != 'Курсант') {
                            echo '<li class="nav-item">
                                    <a class="nav-link text-danger" href="reports.php">
                                        <span data-feather="file"></span>
                                        Отчёты
                                    </a>
                                    </li>';
                        }
                    ?>

                </ul>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 style="margin: 10px; padding:10px;" class="fs-1">
                <?php

                print($_SESSION['user']['second_name']); 
                print(" ");
                print_r($_SESSION['user']['first_name']);
                print(" ");
                print_r($_SESSION['user']['third_name']);

                ?>
            </h2>

            <div class="card border-dark" style="margin: 10px;">
                <div class="card-body text-dark">
                    <h4 class="fs-5">Учебная группа № <?php print($_SESSION['user']['study_group']); ?></h4>
                </div>
            </div>
            <div class="card border-dark" style="margin: 10px;">
                <div class="card-body text-dark">
                    <h4 class="fs-5">Факультет: <?php print($_SESSION['user']['direction']); ?></h4>
                </div>
            </div>
            <div class="card border-dark" style="margin: 10px;">
                <div class="card-body text-dark">
                    <h4 class="fs-5">Курс: <?php print($_SESSION['user']['year']); ?></h4>
                </div>
            </div>
            <div class="card border-dark" style="margin: 10px;">
                <div class="card-body text-dark">
                    <h4 class="fs-5">Курсантский билет № <?php print($_SESSION['user']['student_card']); ?></h4>
                </div>
            </div>
            <div class="card border-dark" style="margin: 10px;">
                <div class="card-body text-dark">
                    <h4 class="fs-5">Роль: <?php print($_SESSION['user']['user_role']); ?></h4>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
