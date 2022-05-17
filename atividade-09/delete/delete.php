<?php
    
    include '../conn.php';

    $chave = $_GET["chave"];

    $sql = "DELETE FROM formulario WHERE chave=".$chave;

    echo "<br>" .$sql;

    $result = mysqli_query($conn, $sql);

    echo "<br>" .$sql;

    header('Location: '."../myDB.php");

?>