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

            if(isset($_GET['nomeCliente'])){
                $nomeCliente = $_GET['nomeCliente'];
            }
            if(isset($_GET['emailCliente'])){
                $emailCliente = $_GET['emailCliente'];
            }
            if(isset($_GET['telefoneCliente'])){
                $telefoneCliente = $_GET['telefoneCliente'];
            }
            if(isset($_COOKIE['tipoBolo'])){
                $tipoBolo = $_COOKIE['tipoBolo'];
                $imagem = '';
                if ($tipoBolo == 'tipoUm'){
                    $imagem = 'assets/1-5/tipoUm.jpg';

                }
                else if ($tipoBolo == 'tipoDois'){
                    $imagem = 'assets/1-5/tipoDois.jpg';

                }
                else if ($tipoBolo == 'tipoTres'){
                    $imagem = 'assets/1-5/tipoTres.jpg';

                }
                else if ($tipoBolo == 'tipoQuatro'){
                    $imagem = 'assets/1-5/tipoQuatro.jpg';

                }
                else if ($tipoBolo == 'tipoCinco'){
                    $imagem = 'assets/1-5/tipoCinco.jpg';

                }
                else if ($tipoBolo == 'tipoSeis'){
                    $imagem = 'assets/6-10/tipoSeis.jpg';

                }
                else if ($tipoBolo == 'tipoSete'){
                    $imagem = 'assets/6-10/tipoSete.jpg';

                }
                else if ($tipoBolo == 'tipoOito'){
                    $imagem = 'assets/6-10/tipoOito.jpg';

                }
                else if ($tipoBolo == 'tipoNove'){
                    $imagem = 'assets/6-10/tipoNove.jpg';

                }
                else if ($tipoBolo == 'tipoDez'){
                    $imagem = 'assets/6-10/tipoDez.jpg';

                }
                else if ($tipoBolo == 'tipoOnze'){
                    $imagem = 'assets/11-15/tipoOnze.jpg';

                }
                else if ($tipoBolo == 'tipoDoze'){
                    $imagem = 'assets/11-15/tipoDoze.jpg';

                }
                else if ($tipoBolo == 'tipoTreze'){
                    $imagem = 'assets/11-15/tipoTreze.jpg';

                }
                else if ($tipoBolo == 'tipoQuatorze'){
                    $imagem = 'assets/11-15/tipoQuatorze.jpg';

                }
                else if ($tipoBolo == 'tipoQuinze'){
                    $imagem = 'assets/11-15/tipoQuinze.jpg';

                }
                else if ($tipoBolo == 'tipoDezesseis'){
                    $imagem = 'assets/16-20/tipoDezesseis.jpg';

                }
                else if ($tipoBolo == 'tipoDezessete'){
                    $imagem = 'assets/16-20/tipoDezessete.jpg';

                }
                else if ($tipoBolo == 'tipoDezoito'){
                    $imagem = 'assets/16-20/tipoDezoito.jpg';

                }
                else if ($tipoBolo == 'tipoDezenove'){
                    $imagem = 'assets/16-20/tipoDezenove.jpg';

                }
                else if ($tipoBolo == 'tipoVinte'){
                    $imagem = 'assets/16-20/tipoVinte.jpg';

                }
                else if ($tipoBolo == 'tipoVinteUm'){
                    $imagem = 'assets/21-23/tipoVinteUm.jpg';

                }
                else if ($tipoBolo == 'tipoVinteDois'){
                    $imagem = 'assets/21-23/tipoVinteDois.jpg';

                }
                else if ($tipoBolo == 'tipoVinteTres'){
                    $imagem = 'assets/21-23/tipoVinteTres.jpg';

                }
            }
            if(isset($_GET['modificacoes'])){
                $modificacoes = $_GET['modificacoes'];
            }
            
            $sql = "INSERT INTO pedidos (cliente, email, telefone, tipoBolo, modificacoes, status) VALUES (?,?,?,?,?,?)";

            $stmt = mysqli_stmt_init($conn);
            $stmt_prepared_okay = mysqli_stmt_prepare($stmt,$sql);

            if($stmt_prepared_okay){
                mysqli_stmt_bind_param($stmt, "ssssss", $nomeCliente, $emailCliente, $telefoneCliente, $tipoBolo, $modificacoes, $status);
                $status = "Novo";

                $stmt_executed_okay = mysqli_stmt_execute($stmt);     

                if ($stmt_executed_okay) {
                    echo'<div class="form_cd">';
                    echo    '<h3>Seu pedido foi gravado na nossa base. Em breve entraremos em contato. Obrigado</h3>';
                    echo    '<div>';
                    echo        '<table>'.
                                    '<tr>'.
                                        '<th>Nome do Cliente</th>'.
                                        '<th>Email do Cliente</th>'.
                                        '<th>Telefone do Cliente</th>'.
                                        '<th>Tipo do Bolo</th>'.
                                        '<th>Modificações</th>'.
                                    '</tr>'.
                                    '<tr>'.
                                        '<td>'.$nomeCliente.'</td>'.
                                        '<td>'.$emailCliente.'</td>'.
                                        '<td>'.$telefoneCliente.'</td>'.
                                        '<td><img src="'.$imagem.'"></td>'.
                                        '<td>'.$modificacoes.'</td>'.
                                    '</tr>'.
                                '</table><br><br>'.
                                '<a class="voltarDois" href="../index.html">Início</a>';
                    echo'</div>';   
                } else {
                    echo "Não foi possível executar a inserção de ".
                        "$nomeCliente, $emailCliente, $telefoneCliente, $tipoBolo, $modificacoes no banco de dados". 
                        mysqli_error($conn);
                    exit;
                }
                    mysqli_stmt_close($stmt);
            }

            $conn->close();
    ?>

</body>
</html>

