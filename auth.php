<?php
    session_start();

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Tovstyak Ilya and Tulchinsiy Mark in 2T group">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <title>Вход в Глаз</title>

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

</head>
<body class="text-center bg-dark">
    <main class="form-signin">
        <form action="vendor/check_auth.php" method="post">
            <img class="mb-4" src="img/main_ico.png" alt="#" width="100" height="100">
            <h1 class="h3 mb-3 fw-normal text-light">Вход в систему</h1>

            <div class="form-floating bg-dark">
                <input name="auth_login" type="text" class="form-control bg-dark text-secondary border-secondary border-white" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Логин</label>
            </div>
            <div class="form-floating bg-dark">
                <input name="auth_password" type="password" class="form-control bg-dark text-secondary border-secondary border-white" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Пароль</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me" class="text-secondary"> Запомнить меня
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-secondary border-dark" type="submit">Войти</button>

            <?php
            ini_set(error_reporting(0), 0);
                if ($_SESSION['message']) {
                    echo '
                            <div class="alert alert-dark" role="alert">' . $_SESSION['message'] . '
                            <a href="#" class="alert-link">Обратиться к администратору</a>
                            </div>';
                }
                unset($_SESSION['message']);
            ?>

            <p class="mt-5 mb-3 text-muted">&copy;2T GROUP</p>
        </form>
    </main>
</body>
</html>