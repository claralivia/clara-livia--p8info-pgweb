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
            
        include 'conn.php';

        $sql = "SELECT chave, valor FROM formulario";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
        die("Falha na Execução da Consulta: " . $sql ."<BR>" .
            mysqli_error($conn));
        }

        $chave="";

        echo'<div class="form_cd">';
            echo    '<h3>Usuários<br> Cadastrados</h3><br>';
            echo    '<form method="get">';

        while ($row = mysqli_fetch_assoc($result)) {
            $chave=$row["chave"];
            echo        '<p>Chave: '.$chave.'</p>';
            echo        '<p>Valor: '.$row["valor"].'</p>';
            echo        '<a href="delete/delete.php?chave='.$chave.'">Deletar</a><br><br>';
        }
            echo        '<div>';
            echo        '<a href="update/update.php" target="_blank">Atualizar</a>';
            echo        '<a href="insert/cadastro.html" target="_blank">Inserir</a>';
            echo        '</div>';

            echo     '</form>';
        echo    '</div>';

        mysqli_free_result($result); 

    ?>

</body>
</html> 