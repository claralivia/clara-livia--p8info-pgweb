<?php

    header('Content-type: text/html; charset=utf-8');

    include 'conn.php';

    if(isset($_GET["status"])){
        $status = $_GET["status"];
    }

    if(isset($_COOKIE['idPedido'])){
        $idPedido = $_COOKIE['idPedido'];
    }

    $sql = "UPDATE pedidos SET status=? WHERE idPedido =".$idPedido;

    $stmt = mysqli_stmt_init($conn);
    $stmt_prepared_okay = mysqli_stmt_prepare($stmt,$sql);

    if ($stmt_prepared_okay) {

        mysqli_stmt_bind_param($stmt, "s", $status);

        $stmt_executed_okay = mysqli_stmt_execute($stmt);

        if ($stmt_executed_okay) {
            header('Location: '."../pedidos.php");
        } else {
            echo "Não foi possível executar a atualização de ".
                "$idPedido para $statusno banco de dados" . 
                mysqli_error($conn);
            exit;
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);


?>