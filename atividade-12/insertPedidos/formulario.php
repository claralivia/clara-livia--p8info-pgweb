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

    <script>
        function analisar(){
            var nomeCliente = document.querySelector('#nomeCliente').value;
            var emailCliente = document.querySelector('#emailCliente').value;
            var telefoneCliente = document.querySelector('#telefoneCliente').value;
            var modificacoes = document.querySelector('#modificacoes').value;

            if(nomeCliente === ''){
                alert("Campo NOME em branco.");
            }
            else if(emailCliente === ''){
                alert("Campo EMAIL em branco.");
            }
            else if(telefoneCliente === ''){
                alert("Campo TELEFONE em branco.");
            }
            else if(modificacoes === ''){
                alert("Campo MODIFICAÇÕES em branco.");
            }
            else{
                document.getElementById("formPedido").setAttribute("action","insert.php");
                document.getElementById("formPedido").setAttribute("method","get");
            }
        }
    </script>

    <div class="form_cd">
                <h3>Dados do Pedido</h3>

                    <?php
                            if (!isset($_GET['tipoBolo'])) { //testa o get
                                echo '<br><p>Preencha todos os dados, por favor!<p>';
                                
                            } else {
                                
                                $cookie_key = "tipoBolo";            // chave
                                $cookie_value = $_GET["tipoBolo"];   // valor
                                
                                setcookie($cookie_key, $cookie_value, time() + (86400 * 30), "/");

                            }
                    ?>

                <form id="formPedido">
                    <div id="ajuste">
                        <p>Seu nome:</p><br>
                        <div><input type="text" name="nomeCliente" id="nomeCliente" placeholder="Nome"></div>
                    </div>
                    
                    <div id="ajuste">
                        <p>Seu email:</p><br>
                        <div><input type="email" name="emailCliente" id="emailCliente" placeholder="Email"></div>
                    </div>

                    <div id="ajuste">
                        <p>Seu telefone<br>(somente números):</p><br>
                        <div><input type="text" name="telefoneCliente" id="telefoneCliente" placeholder="Telefone"></div>
                    </div>

                    <div id="ajuste">
                        <p>O que você deseja<br>mudar no bolo?</p><br>
                        <div><input type="text" name="modificacoes" id="modificacoes" placeholder="Modificações"></div>
                    </div>
        
                    <div id="button"><button class="tipoBoloEnviar" onclick="analisar()">Enviar</button></div>
                </form>

    </div>

</body>
</html>
