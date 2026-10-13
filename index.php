<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASOVITA</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="cabecera">
        <div class="cabecera-interna">
            <a class="marca" href="index.php"><img src="img/logo.png" alt="ASOVITA"></a>
            <nav>
                <a class="activo" href="index.php">Inicio</a>
                <a href="productos.php">Productos</a>
                <a href="registro.php">Registro</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="banner">
            <div class="contenedor banner-interno">
                <div>
                    <h1>Ají, maíz, amaranto y maní del centro de Chuquisaca</h1>
                    <p>ASOVITA es una organización económica asociativa campesina. Cuatro asociaciones de productores seleccionan, procesan y comercializan lo que cultivan.</p>
                    <a class="boton-amarillo" href="productos.php">Ver productos</a>
                    <a class="boton-borde" href="registro.php">Crear una cuenta</a>
                </div>
                <div class="sello">
                    <small>Fundada en</small>
                    <strong>2004</strong>
                    <small>Chuquisaca centro</small>
                </div>
            </div>
        </section>

        <div class="franja-cultivos">
            <div class="tono-0">Ají</div>
            <div class="tono-1">Maíz</div>
            <div class="tono-2">Amaranto</div>
            <div class="tono-3">Maní</div>
        </div>

        <section class="seccion">
            <div class="contenedor">
                <h2 class="titulo-centrado">ASOVITA</h2>
                <div class="texto-centrado">
                    <p>ASOVITA se fundó el 5 de octubre de 2004, por convocatoria de un comité impulsor formado por los presidentes de APA, APAFAM y APROCMI, para agrupar de forma voluntaria a las organizaciones dedicadas a producir, transformar y comercializar productos agropecuarios.</p>
                    <p>En 2006 se incorporó APASTA, y desde entonces son cuatro las asociaciones de productores que forman y son dueñas de ASOVITA.</p>
                </div>

                <div class="asociaciones">
                    <div class="asociacion">
                        <h3>APA</h3>
                        <p>Asociación de Productores Agropecuarios de Alcalá</p>
                    </div>
                    <div class="asociacion">
                        <h3>APAFAM</h3>
                        <p>Asociación de Productores Agropecuarios Forestales de Ají y Maní</p>
                    </div>
                    <div class="asociacion">
                        <h3>APROCMI</h3>
                        <p>Asociación de Productores Agropecuarios de la Cuenca del Río Milanés</p>
                    </div>
                    <div class="asociacion">
                        <h3>APASTA</h3>
                        <p>Asociación de Productores Agropecuarios San Pedro Tarvita</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="seccion fondo-alt">
            <div class="contenedor origen">
                <div>
                    <h2>De dónde viene el nombre</h2>
                    <p>ASOVITA nació para vender con más valor agregado la producción de cuatro cultivos excedentarios de los productores de Chuquisaca centro: ají, maíz, amaranto y maní.</p>
                    <p>En 2001 se formaron tres asociaciones productivas, a través del proyecto de Desarrollo de Capacidades Productivas 1999-2001 de la Fundación ACLO Regional Chuquisaca. El proyecto se centró primero en transformar y comercializar ají en polvo: selección, limpieza, deshidratado, molido y envasado.</p>
                    <p>El nombre es un acrónimo de los cuatro municipios donde trabajamos.</p>
                </div>

                <div class="acronimo">
                    <div class="tono-0"><b>A</b>Alcalá</div>
                    <div class="tono-1"><b>SO</b>Sopachuy</div>
                    <div class="tono-2"><b>VI</b>El Villar</div>
                    <div class="tono-3"><b>TA</b>Tarvita</div>
                </div>
            </div>
        </section>

        <p class="banda-negra">Todos los productos de las cuatro asociaciones cuentan con <strong>registro sanitario de SENASAG</strong>.</p>

        <section class="seccion video">
            <div class="contenedor">
                <h2 class="titulo-centrado">Video</h2>
                <video controls>
                    <source src="https://asovita.org/wp-content/uploads/2022/09/1_mp4asovita-para-annie.mp4" type="video/mp4">
                </video>
                <p class="centro"><a class="boton" href="productos.php">Ver todos los productos</a></p>
            </div>
        </section>

        <section class="seccion fondo-alt mapa">
            <div class="contenedor">
                <h2 class="titulo-centrado">Dónde estamos</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.3142651924795!2d-65.24610088509925!3d-19.049915487102872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51176d7c7bd2d77!2zMTnCsDAyJzU5LjciUyA2NcKwMTQnMzguMSJX!5e0!3m2!1ses!2sbo!4v1662577793431!5m2!1ses!2sbo"></iframe>
            </div>
        </section>
    </main>

    <footer class="pie">
        <div class="contenedor pie-interno">
            <span>Copyright © ASOVITA <?= date('Y') ?></span>
            <a href="https://www.facebook.com/asovita.bo" target="_blank">Facebook</a>
        </div>
    </footer>
</body>
</html>
