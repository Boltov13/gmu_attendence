<?php
    session_start();
    include('config/DBconnect.php');
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
            <h2>Создать отчёт о посещаемости</h2>
            <form action="vendor/checkReport.php" method="POST">
            <div class="table-responsive">
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">ФИО</th>
                        <th scope="col">Отсутствие</th>
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
                                            <td>
                                                <?php print($row['second_name']); print(' '); print($row['first_name']); print(' '); print($row['third_name']);  ?>
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="checkbox" id="defaultCheck1" name="absent[]" value=
                                                "<?php echo $row['second_name']; echo $row['first_name']; echo $row['third_name'] ?>">
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
                <button type="submit" class="btn text-white bg-dark">Сформировать отчёт</button>
            </form>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>