<html>

    <head>

        <title>Moc</title>
    
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    
        <meta name="description" content="Genera las próximas actividades culturales que tendrán lugar en nuestra comunidad.">

        <meta name="title" content="Moc - Movimientos culturales en la comunidad">
    
        <meta name="keywords" content="actividades culturales, formulario, comunidad">
    
        <link rel="stylesheet" href="CSS\form_styles.css" type="text/css">

        <!-- Buscar qué otras meta tags añadir. Revisar sintaxis de las actuales -->
    
    </head>

    <body>

        <div class="contentBox">
            <div class="contentBoxText">
                <header>
                    <a href="#" class="logo">Moc.</a>
                </header>
                <div class="startingBanner">

                    <h1>Movimientos culturales en la comunidad</h1>

                    <p>¿Cómo funciona? ¡Es muy fácil! Rellena el formulario indicando el tipo de actividad, 
                    la fecha y la ciudad donde tendrá lugar. Añade un título y no te olvides de señalar si
                    el acceso es gratuito.</p>

                    <h2 class="secondary">Rellena el formulario para generar las próximas actividades</h2>

                </div>

                <div class="responseBanner">

                    <!-- Texto que se muestra cuando se ha rellenado el formulario -->

                    <h2>Rellena el formulario de nuevo para generar otra actividad</h2>

                    <!-- PHP que muestra lo rellenado en el form 

                    <?php echo htmlspecialchars($_POST['nombre']); ?>
                    ...

                    -->

                    <span class="primaryButton">Refrescar</span>

                </div>
            </div>

            <div class="backgroundPictures">
                <div class="squarePictures">
                    <img src="imgs/cine2.jpg">
                    <img src="imgs/cine3.jpg">
                </div>
                <div class="rectangularPictures">
                    <img src="imgs/cine.jpg">
                </div>
                <div class="form">

                    <!-- Añadir validación con JS para que no se puedan poner campos vacíos -->
        
                </div>
            </div>
        </div>


        <!-- PHP que cambia las imágenes según lo seleccionado
        
        ...

        -->

        <footer>

            <p>Landing page created by Clara Garnes García - 2022</p>
            <p>Check the code in <u><a href="#">GitHub</a></u></p>
            <a href="https://github.com/ClaraLG"><img src="/imgs/github.png"></a>

        </footer>

    </body>

</html>