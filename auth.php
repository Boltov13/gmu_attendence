<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Вход в Глаз</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
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


    <!-- Custom styles for this template -->
    <link href="css/sign.css" rel="stylesheet">
</head>
<body class="text-center bg-dark">

<main class="form-signin">
    <form>
        <img class="mb-4" src="img/top_logo.png" alt="" width="100" height="100">
        <h1 class="h3 mb-3 fw-normal">Вход в систему</h1>

        <div class="form-floating bg-dark">
            <input type="text" class="form-control bg-dark" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Логин</label>
        </div>
        <div class="form-floating bg-dark">
            <input type="password" class="form-control bg-dark" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Пароль</label>
        </div>

        <div class="checkbox mb-3">
            <label class="">
                <input type="checkbox" value="remember-me"> Запомнить меня
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-dark border-white" type="submit">Войти</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2T GROUP</p>
    </form>
</main>
</body>
</html>