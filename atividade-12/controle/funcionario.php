<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ateliê de bolos</title>
</head>
<body>
    <script>
        function verificar(){
            var email = document.querySelector('#email').value;
            var senha = document.querySelector('#senha').value;

            if (email === ''){
                alert("Campo EMAIL em branco.");
            }
            else if(senha === ''){
                alert("Campo SENHA em branco.");
            }
            else{
                document.getElementById("login").setAttribute("method","post");
            }
        }
    </script>

    <div class="form_cd">
        <h3>Login</h3>
        <form id="login">
            <div class="login_painel">
                <div id="ajuste">
                    <p>Seu email:</p><br>
                    <div><input type="email" name="email" id="email" placeholder="Email"></div>
                </div>

                <div id="ajuste">
                    <p>Sua senha:</p><br>
                    <div><input type="password" name="senha" id="senha" placeholder="Senha"></div>
                </div>
            </div>

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
                                    $message = 0;

                                    if($email == $row['email']){
                                        if($senha == $row['senha']){
                                            header('Location: '."pedidos.php");                                
                                        }
                                        else{
                                             echo '<h4>Senha incorreta ou</h4>';
                                        }
                                    } else if($email !== $row['email'] && ($email !== null)) {
                                        echo '<h4>Usuário não cadastrado.</h4>';
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

            <div id="button">
                <button class="enviar" type="submit" name="acao" onclick="verificar()">Entrar</button>
                <a class="voltar" href="../index.html">Início</a> 
            </div> 
        </form>
    </div>
</body>
</html>