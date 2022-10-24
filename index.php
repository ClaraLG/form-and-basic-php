<!DOCTYPE html>

<?php require "clases.php"; ?>

<?php

    session_start();
    
    if (!isset($_SESSION["usuario"]) &&
        isset($_COOKIE['cookie_usuario'])) {
        $_SESSION["usuario"] = $_COOKIE['cookie_usuario'];
    }

    if (!isset($_SESSION["usuario"])) {
        header("Location: login.php");
        exit();
    }

    if (!isset($_SESSION["listado_actividades"])) {
        $_SESSION["listado_actividades"] = array();
    }

    if (isset ($_POST["createActivity"]) ||
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

    //Evitar que salte la alarma de reenvío del formulario al recargar la página
    $rand=rand();
    $_SESSION['rand']=$rand;
    //Junto a un script que hay al final del body
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

        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    </head>

    <body>

    <div class="container-fluid">
        <div class="row" id="firstRow">
            <div class="col-md-6">
                <header class="d-flex justify-content-between align-items-center">
                    <a class="btn btn-link" href="#" id="logo" role="button">Mocc.</a>
                    <span>Bienvenido, <?php echo $_SESSION["usuario"] ?></span>
                    <a class="btn btn-link" href="logout.php" role="button">Salir 
                        <i class="bi bi-box-arrow-left"></i>
                    </a>
                </header>
                <div class="contentBox">

                    <h1>Movimientos culturales en la comunidad</h1>

                    <p>¿Cómo funciona? ¡Es muy fácil! Rellena el formulario indicando el tipo de actividad, 
                    la fecha y la ciudad donde tendrá lugar. Añade un título y no te olvides de señalar si
                    el acceso es gratuito.</p>

                    <?php if(isset ($formResults)): ?>

                        <h3>¡Actividad creada!</h3>

                        <a class="btn btn-primary" href="#listadoActividades" role="button">Ver todas las actividades</a>

                    <?php endif; ?>

                </div>
            </div>
            <div class="col-md-6" id="formSection">
                <div class="images">
                    <div class="formulario" id="formImgs">
                        <?php include "formulario.html" ?>
                    </div>
                    <?php if(isset ($formResults)): ?>
                        <div class="activityImg">
                            <img src="assets/imgs/<?php echo $formResults->type ?>2.jpg">
                        </div>
                        <div class="activityImg">
                            <img src="assets/imgs/<?php echo $formResults->type ?>3.jpg">
                        </div>
                        <div class="activityImg">
                            <img src="assets/imgs/<?php echo $formResults->type ?>.jpg">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div id="listadoActividades">

            <h2>Agenda cultural</h2>

            <div class="row d-flex justify-content-center">
                <?php
                    if (!$_SESSION["listado_actividades"]){
        
                        echo
        
                        "<div class='col-12 d-flex justify-content-center'>
                            <p>Ups! Parece que aún no has creado ninguna actividad. 
                            Cuando rellenes el formulario aquí podrás ver las actividades creadas.</p>
                        </div>"
                        ;

                    }
                ?>

                <?php foreach($_SESSION["listado_actividades"] as $actividad_serialized): 
                $actividad = unserialize($actividad_serialized);
                ?>
                    <div class="col-md-3 card" id="activityBox">
                        <img src="assets/imgs/<?php echo $actividad->type ?>.jpg">

                        <ul class="formListResults">
                            <li class="formResult"><b>Título de la actividad:</b> <?php echo $actividad->title ?></li>
                            <hr/>
                            <li class="formResult"><b>Fecha:</b> <?php echo date("d/m/Y", strtotime($actividad->date)) ?></li>
                            <hr/>
                            <li class="formResult"><b>Ciudad:</b> <?php echo $actividad->city ?></li>
                            <hr/>
                            <li class="formResult"><b>Precio:</b> <?php echo $actividad->price ?></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <footer class="row" id="footer">
            <p>Landing page created by Clara Garnes García - 2022</p>
            <p>Check the code in <u><a href="https://github.com/ClaraLG/form-and-basic-php">GitHub</a></u></p>
            <a href="https://github.com/ClaraLG" class="btn btn-link" role="button">
                <img src="assets/imgs/github.png" class="logoRRSS" alt="github logo">
            </a>
        </footer>
    </div>

    <!-- Evitar el reenvío del formulario al recargar la página -->
    <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

    <script>
        if(window.history.replaceState) {
            window.history.replaceState (null, null, window.location.href);
        }
    </script>

    <script src="/assets/js/bootstrap.bundle.js"></script>
    </body>

</html>