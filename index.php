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
    
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <meta name="description" content="Genera las próximas actividades culturales que tendrán lugar en nuestra comunidad.">

        <meta name="title" content="Moc - Movimientos culturales en la comunidad">
    
        <meta name="keywords" content="actividades culturales, formulario, comunidad">

        <meta name="robots” content="index, follow">
    
        <link rel="stylesheet" href="CSS\form_styles.css" type="text/css">

        <!-- TODO Buscar qué otras meta tags añadir. Revisar sintaxis de las actuales -->
    
    </head>

    <body>

        <section class="banner">

            <div class="box content">

                <header>
                    <a href="#" class="logo">Moc.</a>
                </header>

                <div class="contentBox">

                    <h1>Movimientos culturales en la comunidad</h1>

                    <p>¿Cómo funciona? ¡Es muy fácil! Rellena el formulario indicando el tipo de actividad, 
                    la fecha y la ciudad donde tendrá lugar. Añade un título y no te olvides de señalar si
                    el acceso es gratuito.</p>

                    <?php if(isset ($formResults)): ?>

                        <h2>¡Actividad creada!</h2>

                        <ul class="formListResults">
                            <li class="formResult">Título de la actividad: <?php echo $formResults->title ?></li>
                            <hr/>
                            <li class="formResult">Fecha: <?php echo date("d/m/Y", strtotime($formResults->date)) ?></li>
                            <hr/>
                            <li class="formResult">Ciudad: <?php echo $formResults->city ?></li>
                            <hr/>
                            <li class="formResult">Precio: <?php echo $formResults->price ?></li>
                        </ul>

                    <?php endif; ?>

                </div>

            </div>
             
            <div class="box images">
                <div class="formulario">
                    <?php include "formulario.html" ?>
                </div>
                <?php if(isset ($formResults)): ?>
                    <div class="activityImg">
                        <img src="imgs/<?php echo $formResults->type ?>2.jpg">
                    </div>
                    <div class="activityImg">
                        <img src="imgs/<?php echo $formResults->type ?>3.jpg">
                    </div>
                    <div class="activityImg">
                        <img src="imgs/<?php echo $formResults->type ?>.jpg">
                    </div>
                    <?php endif; ?>
            </div>

        </section>

        <footer>

            <p>Landing page created by Clara Garnes García - 2022</p>
            <p>Check the code in <u><a href="https://github.com/ClaraLG/form-and-basic-php">GitHub</a></u></p>
            <a href="https://github.com/ClaraLG"><img src="imgs/github.png" class="logoRRSS" alt="github logo"></a>
            
        </footer>

    </body>

</html>
