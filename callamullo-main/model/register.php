<?php
include '../controller/conexionBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $contrasenia = $_POST["password"];

    // Verifica si el email ya está registrado
    $check = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('El correo ya está registrado');</script>";
    } else {
        $hashed = password_hash($contrasenia, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO usuarios (email, nombre, apellido, contraseña, confirmado) VALUES (?, ?, ?, ?, 1)");
        $stmt->bind_param("ssss", $email, $nombre, $apellido, $hashed);

        if ($stmt->execute()) {
            echo "<script>alert('Cuenta creada exitosamente'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error al crear cuenta');</script>";
        }
    }
}
?>
