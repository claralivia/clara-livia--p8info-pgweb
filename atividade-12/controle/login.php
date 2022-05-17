<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ateliê de Bolos</title>
</head>
    
<body> 

<?php

        header('Content-type: text/html; charset=utf-8');
            
        include '../conn.php';

        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['senha'])){
            $senha = $_POST['senha'];
        }

        $sql = "SELECT * FROM funcionario";
        $stmt = mysqli_stmt_init($conn);
        $result = mysqli_query($conn, $sql);
        $stmt_prepared_okay = mysqli_stmt_prepare($stmt,$sql);

        if($stmt_prepared_okay){
                mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
                $stmt_executed_okay = mysqli_stmt_execute($stmt);

                if ($stmt_executed_okay) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $idFuncionario=$row["idFuncionario"];
                        if($email == $row['email']){
                            if($senha == $row['senha']){
                                header('Location: '."../controle/pedidos.php");                                
                            }
                            else{
                                echo 'Senha Incorreta!';
                            }
                        } else{
                            echo 'Usuário não cadastrado!';
                        }
                    }
                } else {
                    echo "Erro de consulta ".
                            mysqli_error($conn);
                    exit;
                }
                    mysqli_stmt_close($stmt);
            }

        $conn->close();
?>
</body>
</html> 