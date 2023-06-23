<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['username'] ?? '';
    $email = $_POST['useremail'] ?? '';
    $phone = $_POST['phonenumber'] ?? '';

    include_once('conn.php');

    // Utilizando a extensão MySQLi
    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO contatos (name, email, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $phone);

        if ($stmt->execute()) {
            $msg = "Gravado com sucesso!";
        } else {
            $msg = "Erro ao gravar";
        }

        $stmt->close();
        $conn->close();
    }

    /*
    // Utilizando a extensão PDO
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=listadecontatos', 'nome_de_usuario', 'senha');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("INSERT INTO contatos (name, email, phone) VALUES (:name, :email, :phone)");
        $stmt->execute(array(
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone
        ));

        $msg = "Gravado com sucesso!";
    } catch (PDOException $e) {
        $msg = "Erro ao gravar: " . $e->getMessage();
    }
    */
}
?>
