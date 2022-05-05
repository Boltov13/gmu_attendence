<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Посещаемость курсанта!</title>
</head>
<body>
    <div class="container mt-4">
        <form method="post" action="vendor/seek.php">
            <p>Проверка посещаемости курсанта/студента</p>
            <input type="text" name="seek_secondname" placeholder="Введите фамилию"> <br>
            <input type="text" name="seek_firstname" placeholder="Введите имя"> <br>
            <input type="text" name="seek_thirdname" placeholder="Введите отчество"> <br>
            <button type="submit" class="btn btn-success">Найти</button>
        </form>
    </div>
</body>