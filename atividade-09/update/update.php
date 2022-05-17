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
    <script>
        function verificar(){

            var valor = document.querySelector('#valor').value;

            if(valor === ''){
                alert("Campo VALOR em branco.");
            }
            else{
                document.getElementById("formulario").setAttribute("method","get");
            }
        }
    </script>
    <?php

        header('Content-type: text/html; charset=utf-8');
            
        include '../conn.php';

        $sql = "SELECT chave, valor FROM formulario";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
        die("Falha na Execução da Consulta: " . $sql ."<BR>" .
            mysqli_error($conn));
        }

        $chave="";
        echo'<div class="form_cd">';
            echo    '<h3>Cadastro</h3><br>';
            echo    '<form id="formulario" method="">';
            echo            '<div><label for="chave">Chave:</label></div>';
            echo        '<select name="chave" id="chave">';
        while ($row = mysqli_fetch_assoc($result)) {
            $chave=$row["chave"];
            echo            '<option value="'.$chave.'">'.$chave.'</option>';

        }
        echo            '</select><br><br>';
        echo            '<div><label for="valor">Valor:</label></div>';
        echo            '<div><input type="text" name="valor" id="valor" placeholder="Valor"></div><br>';
        echo            '<div>';
        echo                '<input type="submit" name="acao" value="Atualizar" onclick="verificar()">';
        echo                '<a href="../myDB.php" target="_blank">Usuários</a>';
        echo            '</div>';
        echo        '</form>';
        echo    '</div>';

        mysqli_free_result($result);

        if ($_GET["chave"] && $_GET["valor"]){

            $sql = "UPDATE formulario SET valor='".$_GET["valor"]."' WHERE chave = ".$_GET["chave"];

            $result = mysqli_query($conn, $sql);

            if (!$result) {
            die("Falha na Execução da Consulta: " . $sql ."<BR>" .
                mysqli_error($conn));
            }

            header('Location: '."../myDB.php");
        }

    ?>
</body>
</html>