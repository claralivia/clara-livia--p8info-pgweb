<?php
    
    include 'conn.php';

    $idPedido = $_GET["idPedido"];

    $sql = "DELETE FROM pedidos WHERE idPedido=?";

    $stmt = mysqli_stmt_init($conn);
    $stmt_prepared_okay =  mysqli_stmt_prepare($stmt, $sql);

    if ($stmt_prepared_okay) {
        mysqli_stmt_bind_param($stmt, "i", $idPedido);

        $stmt_executed_okay = mysqli_stmt_execute($stmt);

        if ($stmt_executed_okay) {
            header('Location: '."../pedidos.php");
        } else {
            echo "Não foi possível deletar ".
                "o pedido de número $idPedido no banco de dados". 
                mysqli_error($conn);
            exit;
        }
        mysqli_stmt_close($stmt);
    } else{
        echo "Error: ".$sql;
    }

    mysqli_close($conn);

?>