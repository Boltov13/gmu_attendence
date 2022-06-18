<?php
    session_start();
    include 'config/DBconnect.php';

    $teacherID = $_SESSION['user']['teacher_id'];

    $query = "SELECT * FROM temp_attendance WHERE subject_id=(SELECT subject_id FROM subjects WHERE teacher_id=$teacherID)";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $counter = 0;

    $count = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $leader_id = $result[0]['leader_id'];

    $querySelectLeader = "SELECT first_name, second_name, third_name FROM users WHERE id=$leader_id";
    $leaderSelectStatement = $pdo->prepare($querySelectLeader);
    $leaderSelectStatement->execute();
    $leader_Result = $leaderSelectStatement->fetchAll(PDO::FETCH_ASSOC);

    $firstChrName = mb_substr($leader_Result[0]['first_name'], 0, 1);
    $firstChrThirdName = mb_substr($leader_Result[0]['third_name'], 0, 1);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Профиль преподавателя</title>
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
                            Входящие отчёты
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacherReports.php">
                            <span data-feather="file"></span>
                            *В разработке*
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            *В разработке*
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            *В разработке*
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            *В разработке*
                        </a>
                    </li>
                </ul>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php 
                foreach ($result as $row) { $counter ++;
                    ?>
                    <form action="vendor/reportSubmit.php" method="POST">
                    <div class="card border-dark mb-3" style="margin-bottom: 10px; margin-top: 10px;">
                    <h5 class="card-header">Отчёт о посещаемости группы № <?=$result[0]['study_group'] ?></h5>
                    <div class="card-body">
                        <h5 class="card-title">Дата: <?php echo $result[0]['date']?></h5>
                        <p class="card-text fs-5">Отправил - <?php echo $leader_Result[0]['second_name']; echo "."; echo " "; echo $firstChrName; echo "."; echo $firstChrThirdName; echo ".";?></p>
                        <button class="btn btn-success" type="submit" value="<?=$row['id'] ?>" name="SubmitReportID[]">Подтвердить отчёт</button>
                        </form>
                    </div>
                    </div>
                <?php
                }
            ?>
        </main>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
