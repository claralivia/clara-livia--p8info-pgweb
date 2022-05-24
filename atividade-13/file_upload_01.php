<?php

//pasta dentro do HTDOCS onde os arquivos serão salvos.
$target_dir = "my_temp/"; 

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1; //Flag

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
// ["tmp_name"] => Caminho para o arquivo no sistema do usuário.
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Infelizamente, o arquivo já existe.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
  echo "Infelizamente, seu arquivo é muito grande.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "doc"
&& $imageFileType != "txt" ) {
  echo "Infelizamente, apenas PDF, DOCX, DOC & TXT são tipos possíveis.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Infelizamente, seu arquivo não foi uploaded.";
// if everything is ok, try to upload file
} else {                 //arquivo fonte                      //destino
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "O arquivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " foi feito o upload com sucesso.";
  } else {
    echo "Infelizamente, houve um erro no upload do arquivo.";
  }
}
?>