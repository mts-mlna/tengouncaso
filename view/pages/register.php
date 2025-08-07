<?php
session_start();
include '../../controller/conexionBD.php'; 
if (!isset($conn)) {
    die("Error: la conexión no se estableció correctamente.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 

    $stmt = $conn->prepare("INSERT INTO usuarios (email, nombre, apellido, contraseña) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $nombre, $apellido, $password);

    if ($stmt->execute()) {
        header("Location: login.php"); 
        exit();
    } else {
        echo "<script>alert('Error al registrar: " . $conn->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo">
            <a href="../../index.php"><img src="../media/Tuc-Logo.png" alt=""></a>
        </div>
        <div class="nav">
            <nav class="links">
                <a href="../../index.php">Servicios</a>
                <a href="cliente.php">Recursos</a>
                <a href="../../index.php">Ayuda</a>
                <a href="../../index.php">Nosotros</a>
            </nav>
            <nav class="login-contact">
                <a href="" style="background: #ff8647; color: white; padding: 15px; border-radius: 10px; font-weight: bold;">Contacto</a>
            </nav>
        </div>
    </header>
    <main>
        <section class="login">
            <h1>CREAR UNA CUENTA</h1>
            <form action="" method="post" class="login-form">
                <div class="email">
                    <label for="">Correo electrónico</label>
                    <input type="email" name="email" id="">
                </div>
                <div class="nom-ape">
                    <div class="nombre">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" id="">
                    </div>
                    <div class="apellido">
                        <label for="">Apellido</label>
                        <input type="text" name="apellido" id="">
                    </div>
                </div>
                <div class="password">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" id="">
                </div>
                <p>¿Ya tienes cuenta? <a href="login.html">Inicia sesión</a></p>
                <input type="submit" value="Crear cuenta" class="login-button">
            </form>
        </section>
        <section class="end-contact">
            <div class="end-one">
                <p>11 3045-7715</p>
                <p>ENVIAR MAIL</p>
                <p>Lunes a Viernes, 9am a 6pm</p>
            </div>
            <div class="end-two">
                <h1>¿Problemas legales?</h1>
                <p>Recibí una consulta gratuita y comenzá tu reclamo.</p>
            </div>
            <div class="end-button">
                <a href="../../index.php">PEDIR CONSULTA</a>
            </div>
        </section>
    </main>
            <hr>
    <footer>
        <p>Tengo un Caso © 2025. All Rights Reserved.</p>
    </footer>
</body>
</html>