<?php
session_start();
include '../controller/conexionBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contrasenia = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($contrasenia, $usuario["contraseña"])) {
            $_SESSION["usuario"] = $usuario["email"];
            $_SESSION["rol"] = $usuario["confirmado"];// 0 = cliente, 1 = abogado

            if ($usuario["confirmado"] == 1) {
                header("Location: ../view/pages/abogado.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta');</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado');</script>";
    }
}
?>
