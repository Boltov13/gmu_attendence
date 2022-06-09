<?php
    session_start();
    include('config/DBconnect.php');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
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



    <link href="css/profile_style.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="profile.php">Глаз</a>
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
                        <a class="nav-link active" href="showAttendance.php">
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
            <h2>Отчёт о посещаемости</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm table-bordered">
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
                        <?php 
                            $username = $_SESSION['user']['student_card'];
                            $query = "SELECT * FROM `attendence` WHERE `student_id`=
                            (SELECT `id` FROM `users` WHERE `student_ticket`='$username')";

                            $statement = $pdo->prepare($query);
                            $statement->execute();
                            $counter = 0;

                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            if ($result) {
                                foreach($result as $row) { $counter ++;
                                    ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?= $row['date'] ?></td>
                                            <td><?= $row['subject'] ?></td>
                                            <td><?= $row['teacher'] ?></td>
                                            <td><?= $row['reason'] ?></td>
                                        </tr>
                                    <?php
                                }
                            }
                            else {
                                ?>
                                <tr>
                                    <td colspan="5">Пропусков не обнаружено!</td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>