<!DOCTYPE html>
<html>
<head>
    <title>Lista de Contatos</title>
</head>
<body>
    <h1>Lista de Contatos</h1>
    <?php
    include_once('conn.php');

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=listadecontatos', $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query('SELECT * FROM contatos');
        $contatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar contatos: " . $e->getMessage();
    }

  // Exibir os dados na tabela
  if (!empty($contatos)) {
    echo '<table>';
    echo '<tr><th>Nome</th><th>Email</th><th>Phone</th><th>Ação</th></tr>';
    foreach ($contatos as $contato) {
        echo '<tr>';
        echo '<td>' . $contato['name'] . '</td>';
        echo '<td>' . $contato['email'] . '</td>';
        echo '<td>' . $contato['phone'] . '</td>';
        echo '<td><a href="./update.php?id=' . $contato['id'] . '">Editar</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'Nenhum contato encontrado.';
}
  
    ?>
</body>
</html>
