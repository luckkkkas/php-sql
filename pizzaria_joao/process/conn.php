<?php
    session_start();

    $user = "root";
    $pass = "Skoi7617@";
    $db = "pizzaria";
    $host = "localhost";

    try{
        $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }catch(PDOException $e){
        echo "Falha na conexão:" . $e->getMessage();
        die();
    }
?>