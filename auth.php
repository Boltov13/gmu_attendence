<!doctype html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход в ЭМКУ</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ЭМКУ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="http://localhost">Домашння страница</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Проверить легитимность украины</a>
                </li>
            </ul>
            <form class="d-flex" action="auth.php">
                <button class="btn btn-outline-light btn-white">Вход в ЭМКУ</button>
            </form>
        </div>
    </div>
</nav>
<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">

                <div class="px-5 ms-xl-4">
                    <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #625e5e;">Государственный Морской Университет имени Ф.Ф.Ушакова</i>
                    <span class="h1 fw-bold mb-0"></span>
                </div>

                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                    <form style="width: 23rem; margin-bottom: 150px">

                        <h3 class="fw-normal mb-3 pb-3 text-uppercase" style="letter-spacing: 1px;">Вход в ЭМКУ</h3>

                        <div class="form-outline mb-4">
                            <input type="text" id="form2Example18" class="form-control form-control-lg" placeholder="Логин" />
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="form2Example28" class="form-control form-control-lg" placeholder="Пароль" />
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn text-white bg-dark btn-lg btn-block" type="button">Войти</button>
                        </div>

                    </form>

                </div>

            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="img/logo.jpg"
                     alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>
</section>
</body>
</html>