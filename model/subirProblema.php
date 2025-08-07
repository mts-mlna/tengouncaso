<?php
include '../controller/conexionBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $descripcion = $_POST["descripcion"];

    $stmt = $conn->prepare("INSERT INTO problemas (nombre, apellido, telefono, email, descripcion) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $apellido, $telefono, $email, $descripcion);

    if ($stmt->execute()) {
        echo "<script>alert('Problema enviado correctamente'); window.location.href='../view/pages/cliente.php';</script>";
    } else {
        echo "<script>alert('Error al enviar el problema');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
