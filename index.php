<!DOCTYPE html>

<?php require "clases.php"; ?>

<?php 

    if(isset ($_POST["createActivity"]) ||
    $_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $formResults = new FormResults (
        $_POST["title"],
        $_POST["date"],
        $_POST["city"],
        $_POST["type"],
        $_POST["price"],
        );
    }

?>

<html lang="es">
    <head>

        <title>Moc</title>
    
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    
        <meta name="description" content="Genera las próximas actividades culturales que tendrán lugar en nuestra comunidad.">

        <meta name="title" content="Moc - Movimientos culturales en la comunidad">
    
        <meta name="keywords" content="actividades culturales, formulario, comunidad">
    
        <link rel="stylesheet" href="CSS\form_styles.css" type="text/css">

        <!-- TODO Buscar qué otras meta tags añadir. Revisar sintaxis de las actuales -->
    
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
                    
                    <?php if(isset ($formResults)): ?>

                    <ul class="formListResults">
                        <li class="formResult"><?php echo $formResults->title ?></li>
                        <li class="formResult"><?php echo date("d/m/Y", strtotime($formResults->date)) ?></li>
                        <li class="formResult"><?php echo $formResults->city ?></li>
                        <li class="formResult"><?php echo $formResults->price ?></li>
                    </ul>

                    <?php endif; ?>

                </div>
            </div>

            <div class="backgroundPictures">
                <div class="formulario">
                    <?php include "formulario.html" ?>
                </div>
                <?php if(isset ($formResults)): ?>
                    <div class="squarePictures">
                        <img src="imgs/<?php echo $formResults->type ?>2.jpg" alt="actividad cultural">
                        <img src="imgs/<?php echo $formResults->type ?>3.jpg" alt="actividad cultural">
                    </div>
                    <div class="rectangularPictures">
                        <img src="imgs/<?php echo $formResults->type ?>.jpg" alt="actividad cultural">
                    </div>
                <?php endif; ?>
            </div>

        </div>

        


        <footer>

            <p>Landing page created by Clara Garnes García - 2022</p>
            <p>Check the code in <u><a href="https://github.com/ClaraLG/form-and-basic-php">GitHub</a></u></p>
            <a href="https://github.com/ClaraLG"><img src="imgs/github.png" class="logoRRSS" alt="github logo"></a>

        </footer>

    </body>

</html>
