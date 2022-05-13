<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>ЭМКУ результат поиса</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost">СОР</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="">*</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">*</a>
                </li>
            </ul>
            <form class="d-flex" action="../auth.php">
                <button class="btn btn-outline-light btn-white">Вход в ЭМКУ</button>
            </form>
        </div>
    </div>
</nav>

<section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3 result_class">
                <?php
                echo '123S';
                include '../config/DBconnect.php';
                #Создаём переменные с методом post(от кнопки)
                $firstname_seek = $_POST['seekUserFirstname'];
                $secondname_seek = $_POST['seekUserSecondname'];
                $thirdname_seek = $_POST['seekUserThirdname'];

                if (empty($secondname_seek))
                {
                    echo 'По вашему запросу нет результатов';
                }
                else
                {
                    $seekUserQuery = ("SELECT * FROM users WHERE  
                     second_name='$secondname_seek'");
                    #переменная the_rows - массив
                    $the_rows = array();
                    #переменная seek_result - объект mysqli_result
                    $seek = mysqli_query(DBconnect(), $seekUserQuery);
                    #перебираю массив на строки
                    while ($row = $seek->fetch_array()){$the_rows[] = $row;}
                    foreach ($the_rows as $row)
                    {
                        #вывожу строки
                        echo "\nid = ", $row[0];
                        echo "\nfirstname = ", $row[2];
                        echo "\nsecondname = ", $row[3];
                        echo "\nthirdname = ", $row[4];
                        echo "\ngroup = ", $row[5];
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <h1><?php
                    print_r($seek)?></h1>
            </div>
        </div>
    </div>
</section>
</body>
</html>
