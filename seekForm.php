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

    <link rel="stylesheet" href="css/fastcheck.css">

</head>
<body class="text-center bg-dark">
    <main class="form-signin">
        <form action="vendor/seekStudentByCadetNumber.php" method="post">
            <img class="mb-4" src="img/main_ico.png" alt="#" width="100" height="100">
            <h1 class="h3 mb-3 fw-normal text-light">Поиск по номеру курсантского билета</h1>

            <div class="form-floating bg-dark">
                <input name="seekNumber" type="text" class="form-control bg-dark text-secondary border-secondary border-white" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Номер билета</label>
            </div>
            <button class="w-100 btn btn-lg btn-success border-dark" type="submit" style="margin-top: 20px;">Найти</button>
            <?php
            ini_set(error_reporting(0), 0);
                if ($_SESSION['message']) {
                    echo '
                            <div class="alert alert-dark" role="alert">' . $_SESSION['message'] . '
                            <a href="https://t.me/Ilya_Boltov" class="alert-link">Обратиться к администратору</a>
                            </div>';
                }
                unset($_SESSION['message']);
            ?>
            <p class="mt-5 mb-3 text-muted">&copy;TTL GROUP</p>
        </form>
    </main>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>