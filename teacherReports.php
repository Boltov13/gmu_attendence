<?php 
    session_start();
    include ('config/DBconnect.php');

    $teacherID = $_SESSION['user']['teacher_id'];

    $query = "SELECT * FROM temp_attendance WHERE subject_id=(SELECT subject_id FROM subjects WHERE teacher_id=$teacherID)";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $counter = 0;

    $count = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<pre>";
    print_r($result[0]);
    echo "</pre>";
    
    if (($count) > 0) { print 123;
        //Поиск дал резульаты
       foreach($result as $row) {
        ?> 
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <?php 
        
       }

    } //поиск не дал резульатты
    else {

        print 1234;
    }

?>