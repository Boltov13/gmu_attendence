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
            <form action="vendor/sendReport.php" method="POST">
                <input type="date" name="date_selector">
                    <select class="form-select" id="floatingSelect" name="sendSubject[]">
                        <option selected>Выбрать..</option>
                        <option value="Математика">Матем</option> 
                        <option value="ТУС">Тус</option>
                        <option value="БЖД">БЖД</option>
                        <option value="ОПЗ">ОПЗ</option>
                    </select>
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
                                                <td>
                                                    <?= $counter ?>
                                                </td>
                                                <td>
                                                    <?php                                                     
                                                    
                                                   $firstChrName = mb_substr($row['first_name'], 0, 1);
                                                   $firstChrThirdName = mb_substr($row['third_name'], 0, 1);
                                                   echo($row['second_name']); echo " "; echo $firstChrName; echo "."; echo " "; echo $firstChrThirdName; echo ".";
                                                    

                                                    ?>
                                                </td>
                                                <td>
                                                <select class="form-select" id="floatingSelect" name="sendAbsent[]">
                                                    <option selected value="0">Присутствовал</option>
                                                    <option value="<?php echo $row['student_ticket']; echo 'NP'; ?>">Неуважительная</option> 
                                                    <option value="<?php echo $row['student_ticket']; echo 'C'; ?>">Служебная</option>
                                                    <option value="<?php echo $row['student_ticket']; echo 'B'; ?>">Болезнь</option>
                                                    <option value="<?php echo $row['student_ticket']; echo 'N'; ?>">Наряд</option>
                                                    <option value="<?php echo $row['student_ticket']; echo 'O'; ?>">Отпуск</option>
                                                    <option value="<?php echo $row['student_ticket']; echo 'K'; ?>">Командировка</option>
                                            </select>
                                            </td>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else {
                                    ?>
                                    <tr>
                                        <td colspan="5">Ошибка! Обратитесь к администратору! vk.com/boltov13</td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                <button type="submit" class="btn text-white bg-dark">Сформировать отчёт</button>
            </form>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>