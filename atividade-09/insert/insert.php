<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Atividade 09</title>
</head>
<body>

<?php

        header('Content-type: text/html; charset=utf-8');
            
        include '../conn.php';

        if(isset($_POST['chave'])){
            $chave = $_POST['chave'];
            $chave = intval($chave);
        }
        if(isset($_POST['valor'])){
            $valor = $_POST['valor'];
        }

        $sql = "INSERT INTO formulario VALUES ('$chave','$valor')";

        if ($conn->query($sql) === TRUE) {
            echo'<div class="form_cd">';
            echo    '<h3>Usuário Cadastrado</h3>';
            echo    '<div>';
            echo        '<a href="../update/update.php" target="_blank">Atualizar</a>';
            echo        '<a href="../myDB.php" target="_blank">Voltar</a>';
            echo    '</div>';
            echo'</div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
?>
</body>
</html>