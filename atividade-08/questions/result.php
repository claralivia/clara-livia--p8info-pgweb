<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="css/script.css">
    <title>Resultados</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    tr:hover {background-color: #268C3F;}
</style>
<body>
    <?php

    if (!isset($_GET["qst4"])) { //testa o get
        echo "Erro ao ler o GET <BR>";
        die();
    
    }  else {
        $_SESSION["qst4"] = $_GET["qst4"];

    }

    $pontos = 0;

    if($_COOKIE["qst1"] == "Fortaleza"){
        $pontos++;
        $resultado1 = "certo";
    } else {
        $resultado1 = "errado";
    }

    if ($_SESSION["qst2"] == "Izolda") { 
        $pontos++;
        $resultado2 = "certo";
    } else {
        $resultado2 = "errado";
    }

    if ($_COOKIE["qst3"] == "True") { 
        $pontos++;
        $resultado3 = "certo";
    } else {
        $resultado3 = "errado";
    } 

    if ($_SESSION["qst4"] == 184) { 
        $pontos++;
        $resultado4 = "certo";
    } else {
        $resultado4 = "errado";
    } 

    ?>

    <header>
        <h1>quiz "o quão cearense você é?"</h1>
    </header>

    <div id="principal">
        <table>
            <tr>
                <th>questão</th>
                <th>resposta certa</th>
                <th>você está...</th>
            </tr>
            <tr>
                <td>qual a capital do ceará?</td>
                <td>fortaleza</td>
                <td><?php echo $resultado1;?></td>
            </tr>
            <tr>
                <td>qual o(a) governador(a) do ceará?</td>
                <td>izolda cela</td>
                <td><?php echo $resultado2;?></td>
            </tr>
            <tr>
                <td>qual município não faz parte da <br>região metropolitana de fortaleza?</td>
                <td>sobral</td>
                <td><?php echo $resultado3;?></td>
            </tr>
            <tr>
                <td>quantos municípos existem no ceará?</td>
                <td>184</td>
                <td><?php echo $resultado4;?></td>
            </tr>
        </table>
        
        <h2>você fez <?php echo $pontos;?>/4 pontos</h2>
        <form method="get" action="./q1.html">
            <div class="total">
                <h4>deseja tentar novamente?</h4>
                <div id="button">
                    <button>eu quero!</button>
                </div>
            </div>
        </form>
    </div>

    <footer>
        <p style="font-size: 10pt">cookies e sessions por clara lívia ©</p>
    </footer>

</body>
</html>