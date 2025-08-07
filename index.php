<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/style/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="view/media/Tuc-Logo.png" alt=""></a>
        </div>
        <div class="nav">
            <nav class="links">
                <a href="">Servicios</a>
                <a href="">Recursos</a>
                <a href="">Ayuda</a>
                <a href="view/pages/abogado.php">Nosotros</a>
            </nav>
            <nav class="login-contact">
                <?php if (!isset($_SESSION["usuario"])): ?>
                <a href="view/pages/login.php" style="border: 1px solid #404040; padding: 10px; border-radius: 10px;">
                    <img src="view/media/contacto.png" alt="">Acceder
                </a>    
                <?php else: ?>
                <a href="controller/logout.php"
                    style="border: 1px solid #404040; padding: 10px; border-radius: 10px; color: red;">
                    <img src="view/media/contacto.png" alt="">Cerrar Sesión
                </a>
                <?php endif; ?>
                <a href=""
                    style="background: #ff8647; color: white; padding: 15px; border-radius: 10px; font-weight: bold;">Contacto</a>
            </nav>
        </div>
    </header>
    <main>
        <section class="intro">
            <div class="texto-intro">
                <h1>¿Crees Tener Un Caso?</h1>
                <p>Entendemos que navegar asuntos legales puede ser complejo, por eso hicimos nuestra misión
                    proporcionarte con una solución rápida y sencilla.</p>
                <p>¡Transforma "creo" a "tengo"!</p>
            </div>
            <div class="select">
                <h1>Conseguir asesoría</h1>
                <div class="case-type">
                    <a href="">Lesión Física</a>
                    <a href="">Lesión por Accidente Automovilístico</a>
                    <a href="">Lesión por Mordedura de Perro</a>
                    <a href="">Víctima de Abuso Sexual</a>
                    <a href="">Acoso Sexual en el Trabajo</a>
                    <a href="">Problema de Empleo</a>
                    <a href="view/pages/cliente.php" class="submit">Consultar</a>
                </div>
            </div>
        </section>
        <section class="info-cases">
            <h1>Tipos De Casos</h1>
            <div class="case-grid">
                <div class="case-template">
                    <div class="image"><img src="view/media/injury (1).png" alt=""></div>
                    <p><b>Lesión Física</b></p>
                    <p>¿Fuiste herido por el error de alguien más? Trabajaremos sin descanso para compensar tus facturas
                        médicas, sueldos perdidos, y dolor y sufrimiento. Déjanos conseguirte la justicia que mereces.
                    </p>
                </div>
                <div class="case-template">
                    <div class="image"><img src="view/media/car-crash.png" alt=""></div>
                    <p><b>Lesión por Accidente Automovilístico</b></p>
                    <p>Desde pequeños golpes hasta colisiones graves, las consecuencias de un accidente automovilístico
                        pueden dejarle abrumado e inseguro sobre qué hacer. Afortunadamente, estamos aquí para guiarte a
                        través del proceso legal para que recibas la máxima compensación posible.</p>
                </div>
                <div class="case-template">
                    <div class="image"><img src="view/media/dog-head.png" alt=""></div>
                    <p><b>Lesión por Mordedura de Perro</b></p>
                    <p>Las mordeduras de perro son una experiencia traumática, pero también pueden tener consecuencias
                        graves. Si usted o un ser querido ha sido mordido por un perro, nuestro bufete está aquí para
                        ayudarle. Lucharemos por sus derechos para que reciba la compensación y la justicia que merece.
                    </p>
                </div>
                <div class="case-template">
                    <div class="image"><img src="view/media/injury.png" alt=""></div>
                    <p><b>Lesión en el Trabajo</b></p>
                    <p>¿Lesionado en el trabajo? Entendemos el impacto que las lesiones laborales tienen en su bienestar
                        físico y financiero. Nos dedicamos a defenderlo y a garantizar que las compañías de seguros y
                        los empleadores lo traten de manera justa.</p>
                </div>
                <div class="case-template">
                    <div class="image"><img src="view/media/palm-of-hand.png" alt=""></div>
                    <p><b>Abuso Sexual</b></p>
                    <p>Entendemos la naturaleza sensible y compleja de los casos de abuso sexual. Nos dedicamos a
                        brindar representación legal compasiva y eficaz a las sobrevivientes de abuso. Permítanos
                        ayudarle a luchar por la justicia y a exigir responsabilidades a los responsables.</p>
                </div>
                <div class="case-template">
                    <div class="image"><img src="view/media/employment.png" alt=""></div>
                    <p><b>Problemas de Empleo</b></p>
                    <p>Desde casos de acoso sexual hasta salarios injustos, despidos injustificados y discriminación,
                        nos comprometemos a obtener justicia para nuestros clientes. Permítanos ayudarle a navegar estos
                        complejos asuntos legales.</p>
                </div>
            </div>
        </section>
        <section class="clients">
            <p>Testimonios</p>
            <h2>Historias de clientes satisfechos</h2>
            <h1>“</h1>
            <div class="story-grid">
                <div class="story">
                    <p>"Después de un accidente en mi trabajo, la ART no quería reconocer mi lesión. Me sentía perdido
                        hasta que contacté a Tengo un Caso. Me guiaron en todo el proceso y lograron que me pagaran la
                        indemnización que correspondía. Fueron profesionales y atentos en cada paso. ¡Gracias por
                        ayudarme a recuperar lo que era justo!"</p>
                    <hr>
                    <p class="location">- Lucas, Córdoba</p>
                </div>
                <div class="story">
                    <p>"La ART me daba vueltas y no quería cubrir mi tratamiento médico. Busqué ayuda y encontré a Tengo
                        un Caso. Me explicaron mis derechos y lograron que me autorizaran la atención que necesitaba.
                        Sin ellos, no sé qué hubiera hecho. ¡Los recomiendo totalmente!"</p>
                    <hr>
                    <p class="location">- Sofía, Rosario</p>
                </div>
                <div class="story">
                    <p>"Tuve un accidente laboral y la ART me ofrecía una compensación mínima que no cubría mis gastos.
                        Gracias a Tengo un Caso, pude reclamar lo que realmente me correspondía. Me acompañaron en todo
                        el proceso y consiguieron una indemnización justa. Son un equipo increíble."</p>
                    <hr>
                    <p class="location">- Martín, Rosario</p>
                </div>
            </div>
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
                <a href="view/pages/cliente.php">PEDIR CONSULTA</a>
            </div>
        </section>
    </main>
    <hr>
    <footer>
        
        <p>Tengo un Caso © 2025. All Rights Reserved.</p>
    </footer>
</body>

</html>