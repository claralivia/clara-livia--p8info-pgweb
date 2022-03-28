<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/images/favicon.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <title>Quiz</title>
    </head>
<style>
    #button{
    text-align: center;
    }
    button{
        margin-top: 30px;
        cursor: pointer;
        padding: 10px 20px;
        font-family: 'Poppins', sans-serif;
        font-size: 17px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        background-color: #E0FFFF;
        border-radius: 10px;
        border: none;
        color: #5F9EA0;
    }
    button:hover{
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        transform: scale(1.09);
        color: #000;
    }
</style>
<body>
        <div class="resul">
            <?php
            $gabarito = array("Haiti","Áustria","Cazaquistão","True","Italia");
            $resp = array();
            $pontos = 0;
        
            if(isset($_POST['qst1'])){$resp[0] = $_POST['qst1'];}
            if(isset($_POST['qst2'])){$resp[1] = $_POST['qst2'];}
            if($_POST['qst3'] != "opc1"){$resp[2] = $_POST['qst3'];}
            if(isset($_POST['qst4'])){$resp[3] = $_POST['qst4'];}
            if(isset($_POST['qst5'])){$resp[4] = $_POST['qst5'];}
            if(empty($resp)){
                echo "<h1>Por Favor, selecione 1 opção";
                echo "<br><button id='button'><a href='index.html'>Voltar</a></button>" ;
            }
            else {
                foreach ($resp as $key => $v) {if($gabarito[$key] == $v){$pontos += 1;}}
                if($pontos !=0 ){
                    echo "<h1>Você Acertou :$pontos/5</h1>";
                    echo "<h1>Parabéns!</h1> ";
                    echo "<br><button id='button'><a href='index.html'>Voltar</a></button>" ;
                }
                else{
                    echo "<h1>Você Acertou :$pontos/5</h1>";
                    echo "<h1>Por favor, tente novamente!</h1> ";
                    echo "<br><button id='button'><a href='index.html'>Voltar</a></button>" ;

                }
            }
            ?> 
            </div>

</body>