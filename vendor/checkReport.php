<?php 

    session_start();
    include ('../config/DBconnect.php');

    $absentCadets = $_POST['absent'];
    $counter = 0;
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

<form action="">
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Причина</th>
                </tr>
            </thead>

            <tbody>
                    <?php 

                            foreach($absentCadets as $row) {

                                $query = "SELECT `first_name`, `second_name`, `third_name` FROM `users` WHERE `student_ticket`= '$row'";
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
                                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                <option selected>Выбрать..</option>
                                                <option value="1">НП</option>
                                                <option value="2">С</option>
                                                <option value="3">Б</option>
                                                <option value="4">Н</option>
                                                <option value="5">Отпуск</option>
                                                <option value="6">Командировка</option>
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
</form>