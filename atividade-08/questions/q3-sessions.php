<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="css/script.css">
    <title>Questão 3</title>
</head>
<body>
    <header>
        <h1>quiz "o quão cearense você é?"</h1>
    </header>

    <?php

        if (!isset($_GET["qst2"])) { //testa o get
        echo "Erro ao ler o GET <BR>";
        die();
        
        }  else {
        $_SESSION["qst2"] = $_GET["qst2"];

        }



    ?>

    <div id="container">
        <form method="get" action="q4-cookies.php">
            <div id="titulo">
                <h3>qual(is) desses municípios não faz(em) parte da <br> região metropolitana de fortaleza?</h3>
            </div>
            <div id="opcoes">
                <div class="position">
                    <img class="regiao" src="images/metropolitana.svg" alt="Fortaleza">
                </div>
                <div id="selecionar">
                    <input type="checkbox" name="qst3" value="False">
                    <label>pacajus</label><br>
                    <input type="checkbox" name="qst3" value="False">
                    <label>itaitinga</label><br>
                    <input type="checkbox" name="qst3" value="True">
                    <label>sobral</label><br>
                    <input type="checkbox" name="qst3" value="False">
                    <label>chorozinho</label>
                </div>
            </div>
            <div id="button">
                <button>Enviar</button>
            </div>
        </form>
    </div>
    <footer>
        <p style="font-size: 10pt">cookies e sessions por clara lívia ©</p>
    </footer>
</body>
</html>