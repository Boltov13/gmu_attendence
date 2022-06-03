<?php
    session_start();
    include('../config/DBconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Создать отчёт</title>
</head>
<body>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2>Создать отчёт о посещаемости</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" id="demo"></th>
                        <th scope="col">ФИО</th>
                        <th scope="col">Присутствие</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $username = $_SESSION['user']['student_card'];
                            $query = "SELECT * FROM `users` WHERE `study_group`= '114' ORDER BY `second_name` ASC";

                            $statement = $pdo->prepare($query);
                            $statement->execute();
                            $counter = 0;

                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            if ($result) {
                                foreach($result as $row) { $counter ++;
                                    ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?php print($row['second_name']); print(' '); print($row['first_name']); print(' '); print($row['third_name']);  ?></td>
                                            <td>
                                                <div>
                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            else {
                                ?>
                                <tr>
                                    <td colspan="5">Ошибка! Обратитесь к администратору!</td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <a href="" class="btn btn-success">Сформировать отчёт</a>
            </div>
        </main>
        <script>document.getElementById("demo").innerHTML = "№"</script>
</body>
</html>
    