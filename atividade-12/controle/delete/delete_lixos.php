<?php
    
    include 'conn.php';

    $status = "Lixo";

    $sql = "DELETE FROM pedidos WHERE status=?";

    $stmt = mysqli_stmt_init($conn);
    $stmt_prepared_okay =  mysqli_stmt_prepare($stmt, $sql);

    if ($stmt_prepared_okay) {
        mysqli_stmt_bind_param($stmt, "s", $status);

        $stmt_executed_okay = mysqli_stmt_execute($stmt);

        if ($stmt_executed_okay) {
            header('Location: '."../pedidos.php");
        } else {
            echo "Não foi possível deletar ".
                "os pedidos solicitados." . 
                mysqli_error($conn);
            exit;
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);

?>