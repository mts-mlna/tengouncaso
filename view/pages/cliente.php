<?php
include '../../controller/conexionBD.php';
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != 0) {
    echo "Acceso restringido solo para clientes.";
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
        <h2 class="problematitulo">Subí tu problema</h2>
        <form action="../../model/subirProblema.php" method="POST" class="problema-form">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Apellido:</label>
            <input type="text" name="apellido" required>

            <label>Teléfono:</label>
            <input type="text" name="telefono" required>

            <input type="hidden" name="email" value="<?php echo $_SESSION['usuario']; ?>">

            <label>Descripción del problema:</label>
            <textarea name="descripcion" rows="5" required></textarea>

            <button type="submit">Subir</button>
        </form>
        <h2 class="problematitulo">Respuestas recibidas</h2>
        <?php
        $email_cliente = $_SESSION["usuario"];
        $result = $conn->query("SELECT * FROM problemas WHERE email = '$email_cliente' AND respuesta IS NOT NULL");

        while ($row = $result->fetch_assoc()) {
            echo "<div class='respuesta-box'>";
            echo "<p><strong>Tu problema:</strong> {$row['descripcion']}</p>";
            echo "<p><strong>Respuesta del abogado:</strong> {$row['respuesta']}</p>";
            echo "<p><strong>Contacto del abogado:</strong> {$row['email_abogado']}</p>";
            echo "</div><hr>";
        }
        ?>
    </main>
    <footer>
        <p>Tengo un Caso © 2025. All Rights Reserved.</p>
    </footer>
</body>
</html>