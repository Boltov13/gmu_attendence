<?php
    session_start();
    include ('../config/DBconnect.php');

    $reportID = $_POST['SubmitReportID'];
    print_r($reportID);

    $query = "SELECT * FROM temp_attendance WHERE id = $reportID";
    $statement = $pdo->prepare($query);
    $statement->execute();
?>
