<?php
    session_start();
?>
<!doctype html>
<html lang="ru" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Глаз - жизнь студента в ВУЗЕ</title>

    <!-- линк на бс -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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



    <link href="css/mainpage.css" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <a href="index.php" class="navbar-brand float-md-start"><img src="img/global_white_eye.png" class="d-inline-block align-text-top" width="40" alt=""></a>
            <h3 class="float-md-start mb-0">Глаз</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link active" aria-current="page" href="">Главная</a>
                <a class="nav-link" href="#">Быстрая проверка</a>
                <a class="nav-link" href="#">FAQ</a>
                <a href="auth.php" class="nav-link">Вход</a>
            </nav>
        </div>
    </header>

    <main class="px-3">
        <h2>Здравствуйте!</h2>
        <p class="lead">
            Наш проект - Глаз.
            Разработан с целью осведомления родителей о жизни студента в Университете.
        </p>
        <p class="lead">
            <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Читать больше</a>
        </p>
    </main>

    <footer class="mt-auto text-white-50">
        <p>From TTL GROUP to AUMSU</a></p>
    </footer>
</div>
</body>
</html>
