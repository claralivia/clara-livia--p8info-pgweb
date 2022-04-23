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
    <title>Questão 4</title>
</head>
<body>
    <header>
        <h1>quiz "o quão cearense você é?"</h1>
    </header>
    <?php

        if (!isset($_GET['qst3'])) {
        echo "Erro ao ler o $_GET";
        die();
        
        } else {
        
        $cookie_key = "qst3"; 
        $cookie_value = $_GET["qst3"]; 
        
        setcookie($cookie_key, $cookie_value, time() + (86400 * 30), "/");

        }

    ?>
    <div id="container">
        <form method="get" action="result.php">
            <div id="titulo">
                <h3>quantos municípios existem no ceará?</h3>
            </div>
            <div id="opcoes">
                <div class="position">
                    <img class="regiao" src="images/mapa.jpg" alt="Mapa">
                </div>
                <div id="municipios">
                    <input type="radio" name="qst4" value=72>
                    <label>72</label>
                    <input type="radio" name="qst4" value=116>
                    <label>116</label>
                    <input type="radio" name="qst4" value=167>
                    <label>167</label>
                    <input type="radio" name="qst4" value=184>
                    <label>184</label>
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