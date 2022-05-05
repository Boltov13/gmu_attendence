<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Проверить посещаемость</title>
</head>
<body>
    <div class="container mt-4">
        <form method="post" action="vendor/seekUserByName">
            <p>Проверка посещаемости курсанта</p>
            <label>
                <input type="text" name="seekUserSecondname" placeholder="Введите фамилию">
            </label>
            <label>
                <input type="text" name="seekUserFirstname" placeholder="Введите имя">
            </label>
            <label>
                <input type="text" name="seekUserThirdname" placeholder="Введите отчество">
            </label>
            <button type="submit" class="btn btn-success">Найти</button>
        </form>
    </div>
</body>