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
    <title>Questão 2</title>
</head>
<body>
    <header>
        <h1>quiz "o quão cearense você é?"</h1>
    </header>

    <?php

        if (!isset($_GET['qst1'])) { //testa o get
        echo "Erro ao ler o $_GET";
        die(); // fizaliza o script
        
        } else {
        
        $cookie_key = "qst1";            // chave
        $cookie_value = $_GET["qst1"];   // valor
        
        setcookie($cookie_key, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        }

    ?>
    
    <div id="container">
        <form method="get" action="q3-sessions.php">
            <div id="titulo">
                <h3>qual o(a) governador(a) do ceará?</h3>
            </div>
            <div id="opcoes">
                <div class="position">
                    <img class="image" src="images/camilo.jpg" alt="Fortaleza">
                </div>
                <div class="position">
                    <img class="image" src="images/izolda.jpg" alt="Juazeiro">
                </div>
                <div>
                    <select name="qst2">
                        <option value="opc1"></option>
                        <option value="Camilo">camilo santana</option>
                        <option value="Izolda">izolda</option>
                    </select>
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