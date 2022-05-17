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

    <!-- Formulário para escolha do tipo de visualização -->

        <div id="header">
            <form method="get">
                <div>
                    <select name="tipoPedido">
                        <option value="todos">Todos</option>
                        <option value="vistos">Vistos</option>
                        <option value="atendimento">Em atendimento</option>
                        <option value="finalizados">Finalizados</option>
                        <option value="cancelados">Cancelados</option>
                        <option value="novos">Novos</option>
                        <option value="lixos">Lixos</option>
                    </select>

                    <button class="enviar">Carregar</button>
                </div>
            </form>
        </div>
    

    <!-- Exibindo todos os pedidos // Tela Inicial -->
        <?php

            $tipoPedido = "todos";

            if (isset($_GET['tipoPedido'])){
                $tipoPedido = $_GET['tipoPedido'];
            }
            if($tipoPedido == "vistos"){
                $statusPedido = "Visto";
            }
            else if($tipoPedido == "atendimento"){
                $statusPedido = "Em atendimento";
            }
            else if($tipoPedido == "finalizados"){
                $statusPedido = "Finalizado";
            }
            else if($tipoPedido == "cancelados"){
                $statusPedido = "Cancelado";
            }
            else if($tipoPedido == "novos"){
                $statusPedido = "Novo";
            }
            else if($tipoPedido == "lixos"){
                $statusPedido = "Lixo";
            }

            header('Content-type: text/html; charset=utf-8');
                
            include '../conn.php';

            if($tipoPedido == 'todos'){

                $sql = "SELECT * FROM pedidos ORDER BY idPedido";

                $result = mysqli_query($conn, $sql);

                if (!$result) {
                die("Falha na Execução da Consulta: " . $sql ."<BR>" .
                    mysqli_error($conn));
                }


                $idPedido = "";
                
                # Imprimindo a Tabela

                echo'<div class="form_cd">'.
                            '<form method="get">'.
                                '<div>'.
                                    '<table>'.
                                            '<tr>'.
                                                '<th>idPedido</th>'.
                                                '<th>Cliente</th>'.
                                                '<th>Email</th>'.
                                                '<th>Telefone</th>'.
                                                '<th>Tipo do Bolo</th>'.
                                                '<th>Modificações</th>'.
                                                '<th>Status</th>'.
                                                '<th>Deletar</th>'.
                                                '<th>Atualizar</th>'.
                                            '</tr>';

                    
                    # Laço de repetição para pegar todos os pedidos da tabela do Banco de Dados                        

                    while ($row = mysqli_fetch_assoc($result)) {
                        $idPedido = $row["idPedido"];
                        $cliente = $row["cliente"];
                        $email = $row["email"];
                        $telefone = $row["telefone"];
                        $tipoBolo = $row["tipoBolo"];
                        $modificacoes = $row["modificacoes"];
                        $status = $row["status"];

                        echo                    '<tr>'.
                                                    '<td>'.$idPedido.'</td>'.
                                                    '<td>'.$cliente.'</td>'.
                                                    '<td>'.$email.'</td>'.
                                                    '<td>'.$telefone.'</td>'.
                                                    '<td>'.$tipoBolo.'</td>'.
                                                    '<td>'.$modificacoes.'</td>'.
                                                    '<td>'.$status.'</td>';
                            if ($row["status"] == 'Lixo'){
                                echo                    '<td><a href="delete/delete.php?idPedido='.$idPedido.'"><img width="20px" src="../controle/assets/lixeira.png"></a></td>';
                            } else{
                                echo                '<td>Indisponível</td>';
                            }

                        echo                        '<td><a href="update/update_page.php?idPedido='.$idPedido.'">Sim</a></td>'.
                                                '</tr>';

                    }   echo            '</table>'.       
                                    '<div id="button">'.                     
                                        '<a class="enviar" href="../index.html">Sair</a>'.


                                        # Botão para apagar todos os pedidos que estão com status de "Lixo"

                                        '<a class="enviar" href="delete/delete_lixos.php">Apagar Lixos</a>'.
                                    '</div>'.
                            '</div>'.
                        '</form>'. 
                    '</div>';

                mysqli_free_result($result);
            }

            else {

                $sql = 'SELECT * FROM pedidos WHERE status="'.$statusPedido.'" ORDER BY idPedido';

                $result = mysqli_query($conn, $sql);

                if (!$result) {
                die("Falha na Execução da Consulta: " . $sql ."<BR>" .
                    mysqli_error($conn));
                }


                $idPedido = "";
                
                # Imprimindo a Tabela

                echo'<div class="form_cd">'.
                            '<form method="get">'.
                                '<div>'.
                                    '<table>'.
                                            '<tr>'.
                                                '<th>idPedido</th>'.
                                                '<th>Cliente</th>'.
                                                '<th>Email</th>'.
                                                '<th>Telefone</th>'.
                                                '<th>Tipo do Bolo</th>'.
                                                '<th>Modificações</th>'.
                                                '<th>Status</th>'.
                                                '<th>Deletar</th>'.
                                                '<th>Atualizar</th>'.
                                            '</tr>';

                    
                    # Laço de repetição para pegar todos os pedidos da tabela do Banco de Dados                        

                    while ($row = mysqli_fetch_assoc($result)) {
                        $idPedido = $row["idPedido"];
                        $cliente = $row["cliente"];
                        $email = $row["email"];
                        $telefone = $row["telefone"];
                        $tipoBolo = $row["tipoBolo"];
                        $modificacoes = $row["modificacoes"];
                        $status = $row["status"];

                        echo                    '<tr>'.
                                                    '<td>'.$idPedido.'</td>'.
                                                    '<td>'.$cliente.'</td>'.
                                                    '<td>'.$email.'</td>'.
                                                    '<td>'.$telefone.'</td>'.
                                                    '<td>'.$tipoBolo.'</td>'.
                                                    '<td>'.$modificacoes.'</td>'.
                                                    '<td>'.$status.'</td>';
                            if ($row["status"] == 'Lixo'){
                                echo                    '<td><a href="delete/delete.php?idPedido='.$idPedido.'"><img width="20px" src="../controle/assets/lixeira.png"></a></td>';
                            } else{
                                echo                '<td>Indisponível</td>';
                            }

                        echo                        '<td><a href="update/update_page.php?idPedido='.$idPedido.'">Sim</a></td>'.
                                                '</tr>';
                    }
                        echo            '</table>'.       
                                    '<div id="button">'.                     
                                        '<a class="enviar" href="../index.html">Sair</a>'.


                                        # Botão para apagar todos os pedidos que estão com status de "Lixo"

                                        '<a class="enviar" href="delete/delete_lixos.php">Apagar Lixos</a>'.
                                    '</div>'.
                            '</div>'.
                        '</form>'. 
                    '</div>';

                mysqli_free_result($result);
            }

            


        ?>

</body>
</html> 