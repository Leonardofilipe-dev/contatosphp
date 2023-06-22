<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['username'] ?? '';
    $email = $_POST['useremail'] ?? '';
    $phone = $_POST['phonenumber'] ?? '';

    $conteudo = "Nome: " .$nome ."\n";
    $conteudo .= "Email: " .$email . "\n";
    $conteudo .= "phone Number : ". $phone ."\n";

    $arquivo = 'list.php';

    $resultado = file_put_contents($arquivo, $conteudo, FILE_APPEND | LOCK_EX);


}


?>



