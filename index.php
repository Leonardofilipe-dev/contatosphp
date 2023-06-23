<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Contato</title>
</head>
<body>
    <h1>Formulário de Contato</h1>
    <form method="post" action="./create.php">
        <label for="username">Nome:</label>
        <input type="text" name="username" id="username" required>
        <br><br>
        <label for="useremail">Email:</label>
        <input type="email" name="useremail" id="useremail" required>
        <br><br>
        <label for="phonenumber">Telefone:</label>
        <input type="text" name="phonenumber" id="phonenumber" required>
        <br><br>
        <input type="submit" value="Enviar">
        
 </form>
    <br><br>

    <form action="http://localhost/projeto/list.php">
    <input type="submit" value="Consultar todos os contatos listados" />
</form>
 
</body>
</html>


