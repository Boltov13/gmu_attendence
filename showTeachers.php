<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Профиль студента - Глаз</title>
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


    <link href="css/profile_style.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Глаз</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Поиск по сайту.." aria-label="Search">
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
                            <a class="nav-link active" href="showTeachers.php">
                                <span data-feather="file"></span>
                                Преподавательский состав
                            </a>
                        </li>
                    </ul>
            </nav>
        </div>
    </div>

</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>