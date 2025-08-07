<?php
include '../../controller/conexionBD.php';
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != 1) {
    echo "Acceso restringido solo para abogados.";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
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
                <a href="abogado.php">Recursos</a>
                <a href="../../index.php">Ayuda</a>
                <a href="../../index.php">Nosotros</a>
            </nav>
            <nav class="login-contact">
                <a href="" style="background: #ff8647; color: white; padding: 15px; border-radius: 10px; font-weight: bold;">Contacto</a>
            </nav>
        </div>
    </header>
    <main>
        <h2 class="boxtitulo">Problemas recibidos</h2>
        <?php
        $result = $conn->query("SELECT * FROM problemas");

        while ($row = $result->fetch_assoc()) {
            echo "<div class='problema-box'>";
            echo "<p><strong>Cliente:</strong> {$row['nombre']} {$row['apellido']}</p>";
            echo "<p><strong>Teléfono:</strong> {$row['telefono']}</p>";
            echo "<p><strong>Email:</strong> {$row['email']}</p>";
            echo "<p><strong>Descripción:</strong> {$row['descripcion']}</p>";

            if ($row['respuesta']) {
                echo "<p><strong>Respuesta enviada:</strong> {$row['respuesta']}</p>";
                echo "<p><strong>Por:</strong> {$row['email_abogado']}</p>";
            } else {
                echo "<form action='../../model/responderProblema.php' method='POST'>";
                echo "<input type='hidden' name='id' value='{$row['id']}'>";
                echo "<textarea name='respuesta' rows='3' placeholder='Escribí tu respuesta...' required></textarea>";
                echo "<input type='hidden' name='email_abogado' value='{$_SESSION["usuario"]}'>";
                echo "<button type='submit'>Responder</button>";
                echo "</form>";
            }

            echo "</div><hr>";
        }
        ?>
    </main>
    <footer>
        <p>Tengo un Caso © 2025. All Rights Reserved.</p>
    </footer>
</body>
</html>