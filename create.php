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

        ($stmt->execute());
          
        $stmt->close();
        $conn->close();

        

        
    }

}
?>
