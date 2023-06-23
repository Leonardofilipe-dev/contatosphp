<?php
include_once('conn.php');

// Consulta SQL para selecionar todos os contatos
$sql = "SELECT * FROM contatos";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum contato encontrado.";
}

$conn->close();
