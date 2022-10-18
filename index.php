<!DOCTYPE html>

<?php require "clases.php"; ?>

<?php

    session_start();
    
    if(!isset($_SESSION["usuario"])) {
        header("Location: login.php");
        exit();
    }

    if(!isset($_SESSION["listado_actividades"])) {
        $_SESSION["listado_actividades"] = array();
    }

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

        array_push($_SESSION["listado_actividades"], serialize($formResults));
    }

?>

<html lang="es">
    
    <head>

        <title>Mocc. | Movimientos Culturales en la Comunidad</title>
    
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
        <meta name="description" content="Genera las próximas actividades culturales que tendrán lugar en nuestra comunidad.">

        <meta name="title" content="Moc - Movimientos culturales en la comunidad">
    
        <meta name="keywords" content="actividades culturales, formulario, comunidad">

        <meta name="robots" content="index, follow">
    
        <link rel="stylesheet" href="assets/css/styles.css">

    </head>

    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <header>
                    <a href="#" id="logo">Mocc.</a>
                    <a href="logout.php">Salir</a><i class="fa-regular fa-arrow-up-right-from-square"></i>
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
            <div class="col-md-6">
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
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2>Agenda cultural</h2>

                <?php foreach($_SESSION["listado_actividades"] as $actividad_serialized): 
                $actividad = unserialize($actividad_serialized);
                ?>
                    <div class="activityBox">
                        <img src="imgs/<?php echo $actividad->type ?>.jpg">

                        <ul class="formListResults">
                            <li class="formResult">Título de la actividad: <?php echo $actividad->title ?></li>
                            <hr/>
                            <li class="formResult">Fecha: <?php echo date("d/m/Y", strtotime($actividad->date)) ?></li>
                            <hr/>
                            <li class="formResult">Ciudad: <?php echo $actividad->city ?></li>
                            <hr/>
                            <li class="formResult">Precio: <?php echo $actividad->price ?></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <footer class="justify-content-md-center">
            <p>Landing page created by Clara Garnes García - 2022</p>
            <p>Check the code in <u><a href="https://github.com/ClaraLG/form-and-basic-php">GitHub</a></u></p>
            <a href="https://github.com/ClaraLG"><img src="imgs/github.png" class="logoRRSS" alt="github logo"></a>
        </footer>
    </div>

    </body>

</html>
