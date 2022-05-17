<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Ateliê de Bolos</title>
</head>
<body>
            
        <?php
                if (!isset($_GET['idPedido'])) { //testa o get
                    echo '<br><p>Preencha todos os dados, por favor!<p>';
                    
                } else {
                    
                    $cookie_key = "idPedido";            // chave
                    $cookie_value = $_GET["idPedido"];   // valor
                    
                    setcookie($cookie_key, $cookie_value, time() + (86400 * 30), "/");

                }
                
        ?>

                <div class="form_cd">
                    <h3>Atualização de Status</h3><br>
                    <form method="get" action="update.php">
                            <div>
                                <p>Número do Pedido:</p><br>
                                <div>
                                    <select name="status">
                                        <?php echo'<option value="'.$_COOKIE["idPedido"].'">'.$_COOKIE["idPedido"].'</option>';?>
                                    </select>
                                </div><br>

                                <p>Novo Status:</p><br>
                                <div>
                                    <select name="status">
                                        <option value="Visto">Visto</option>
                                        <option value="Em atendimento">Em atendimento</option>
                                        <option value="Finalizado">Finalizado</option>
                                        <option value="Cancelado">Cancelado</option>
                                        <option value="Novo">Novo</option>
                                        <option value="Lixo">Lixo</option>
                                    </select>
                                </div><br>

                                <button class="enviar">Atualizar</button>
                            </div>
                    </form>
                </div>
</body>
</html>