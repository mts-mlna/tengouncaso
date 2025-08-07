<?php
session_start();
include '../../controller/conexionBD.php'; 
if (!isset($conn)) {
    die("Error: la conexión no se estableció correctamente.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($password, $usuario["contraseña"])) {
            $_SESSION["usuario"] = $usuario["email"];
            $_SESSION["rol"] = $usuario["confirmado"]; // 0 = cliente, 1 = abogado
            // echo "ROL: " . $usuario["confirmado"];exit();
            header("Location: ../../index.php"); 
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta');</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado');</script>";
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
            <h1>INICIAR SESIÓN</h1>
            <form action="" method="post" class="login-form">
                <div class="email">
                    <label for="">Correo electrónico</label>
                    <input type="email" name="email" id="">
                </div>
                <div class="password">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" id="">
                </div>
                <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
                <input type="submit" value="Iniciar sesión" class="login-button">
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
                <button>PEDIR CONSULTA</button>
            </div>
        </section>
    </main>
            <hr>
    <footer>
        <p>Tengo un Caso © 2025. All Rights Reserved.</p>
    </footer>
</body>
</html>