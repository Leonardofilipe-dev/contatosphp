<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Agenda de Contatos</title>
</head>
<body>
   <h1>Agenda de contatos</h1>

   
    <form action="./create.php" method="post">
        <label for="name">Contact: </label><br>
        <input type="text" id="name" name="username"><br>

        <label for="email">Email: </label><br>
        <input type="email" id="email" name="useremail"><br>

        <label for="phone">Telefone</label><br>
        <input type="number" id="phone" name="phonenumber"><br>
        
        <input type="submit" id="btn" value="Enviar">



    </form>

        
        <h2>Lista de Contatos:</h2>
    <?php
    
    $listaContatos = file_get_contents('list.php');
    $contatos = explode("\n", $listaContatos);
    foreach ($contatos as $contato) {
        echo $contato . "<br>";
    }
    ?>
</body>
</html>

