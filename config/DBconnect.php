<?php
    $servername = "localhost";
    $username = "boltov";
    $password = "Olesya29!";
    $database = "gmudatabase";

    try {

    $dsn = 'mysql:host=localhost;dbname=gmudatabase';
    $pdo = new PDO($dsn, 'boltov', 'Olesya29!');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Success!";

    } catch (PDOException $e) {
        echo "Connection failed" .$e->getMessage();
    }