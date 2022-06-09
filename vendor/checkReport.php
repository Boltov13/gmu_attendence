<?php 

    session_start();
    include ('../config/DBconnect.php');

    $absentCadets = $_POST['absent'];
    $dateAbsent = $_POST['date_selector'];
    $counter = 0;

    $_SESSION['report'] = [
        "date" => $_POST['date_selector'],
        "subject" => $_POST['sendSubject'],
    ];

    print_r($_SESSION['report']['subject']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Отправить отчёт</title>
</head>

<form action="sendReport.php" method="POST">
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Предмет</th>
                    <th scope="col">Причина</th>
                </tr>
            </thead>

            <tbody>
                    <?php 

                            foreach($absentCadets as $row) {

                                $query = "SELECT `first_name`, `second_name`, `third_name`, `student_ticket` FROM `users` WHERE `student_ticket`= '$row'";
                                $statement = $pdo->prepare($query);
                                $statement->execute();
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                
                                foreach($result as $row) { $counter ++;
                                    ?>
                                           <tr>
                                            <td><?= $counter ?></td>
                                            <td>
                                                <?php print($row['second_name']); print(' '); print($row['first_name']); print(' '); print($row['third_name']);  ?>
                                            </td>
                                            <td>
                                                <?php print $dateAbsent ?>
                                            </td>
                                            <td>
                                                <?php echo $_SESSION['report']['subject'][0] ?>
                                            </td>
                                            <td>
                                            <select class="form-select" id="floatingSelect" name="sendAbsent[]">
                                                <option selected>Выбрать..</option>
                                                <option value="<?php echo $row['student_ticket']; echo 'NP'; ?>">Неуважительная</option> 
                                                <option value="<?php echo $row['student_ticket']; echo 'C'; ?>">Служебная</option>
                                                <option value="<?php echo $row['student_ticket']; echo 'B'; ?>">Болезнь</option>
                                                <option value="<?php echo $row['student_ticket']; echo 'N'; ?>">Наряд</option>
                                                <option value="<?php echo $row['student_ticket']; echo 'O'; ?>">Отпуск</option>
                                                <option value="<?php echo $row['student_ticket']; echo 'K'; ?>">Командировка</option>
                                            </select>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                    ?>
            </tbody>
        </table>
    </div>
    <button class="btn btn-dark" type="submit">Отправить отчёт</button>
</form>
