<?php
    include_once("process/conn.php");

    $msg = "";
    if(isset($_SESSION["msg"])){
        $msg = $_SESSION["msg"];
        $status = $_SESSION["status"];

        $_SESSION["msg"] = "";
        $_SESSION["status"] = "";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu pedido!!!</title>
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstratp-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg">
            <a href="index.php" class="navbar-brand">
                oi
            </a>
            <div>
                <ul class="navbar-nav">
                    <li><a href=""></a>pedidos</li>
                    <li><a href=""></a>sabores</li>
                    <li><a href=""></a>massas</li>
                </ul>
            </div>
        </nav>
    </header>
    <?php if($msg !=""):?>
        <div class="alert alert-<?= $status?>">
            <p>
                <?= $msg ?>
            </p>
        </div>
    <?php endif;?>