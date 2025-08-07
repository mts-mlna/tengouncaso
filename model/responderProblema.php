<?php
include '../controller/conexionBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $respuesta = $_POST["respuesta"];
    $email_abogado = $_POST["email_abogado"];

    $stmt = $conn->prepare("UPDATE problemas SET respuesta = ?, email_abogado = ? WHERE id = ?");
    $stmt->bind_param("ssi", $respuesta, $email_abogado, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Respuesta enviada'); window.location.href='../view/pages/abogado.php';</script>";
    } else {
        echo "<script>alert('Error al enviar la respuesta');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
