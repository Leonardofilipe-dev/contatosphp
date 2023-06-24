<!DOCTYPE html>
<html>
<head>
    <title>Editar Contato</title>
</head>
<body>
    <?php
    include_once('conn.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? '';
        $name = $_POST['username'] ?? '';
        $email = $_POST['useremail'] ?? '';
        $phone = $_POST['phonenumber'] ?? '';

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=listadecontatos', $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('UPDATE contatos SET nome = :nome, email = :email, phone = :phone WHERE id = :id');
            $stmt->execute(array(
                ':id' => $id,
                ':nome' => $name,
                ':email' => $email,
                ':phone' => $phone
            ));

            $msg = "Contato atualizado com sucesso!";
        } catch (PDOException $e) {
            $msg = "Erro ao atualizar contato: " . $e->getMessage();
        }
    }

    // Verificar se foi fornecido um ID válido na URL
    $id = $_GET['id'] ?? '';
    if (!empty($id)) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=listadecontatos', $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('SELECT * FROM contatos WHERE id = :id');
            $stmt->execute(array(':id' => $id));
            $contato = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar contato: " . $e->getMessage();
        }

        if (!$contato) {
            echo "Contato não encontrado.";
        } else {
            ?>
            <h1>Editar Contato</h1>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $contato['id']; ?>">
                <label for="username">Nome:</label>
                <input type="text" name="username" id="username" value="<?php echo $contato['name']; ?>" required>
                <br><br>
                <label for="useremail">Email:</label>
                <input type="email" name="useremail" id="useremail" value="<?php echo $contato['email']; ?>" required>
                <br><br>
                <label for="phonenumber">Phone:</label>
                <input type="text" name="phonenumber" id="phonenumber" value="<?php echo $contato['phone']; ?>" required>
                <br><br>
                <input type="submit" value="Atualizar Contato">
            </form>
            <?php
        }
    } else {
        echo "ID do contato não fornecido.";
    }
    ?>
</body>
</html>

