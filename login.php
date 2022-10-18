<!DOCTYPE html>

<?php 

session_start();

if (isset($_POST["login"])){
    if ($_POST["usuario"] == "ifp" && $_POST["password"] == "2022"){

        $nombre_usuario = $_POST["usuario"];
        $_SESSION["usuario"] = $nombre_usuario;

        header("Location: index.php");
        exit();
    }
}
else {
    $error = "El usuario o la contraseña son incorrectos";
}

?>

<html lang="es">
<head>
    
    <title>Mocc. | Iniciar sesión</title>
    
    <meta charset="UTF-8">

    <meta name="robots" content="noindex, nofollow">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/form_styles.css" type="text/css">
    
    <link rel="stylesheet" href="CSS/form_styles.css" type="text/css">

    <meta name="title" content="Mocc - Iniciar sesión">
</head>

<body>
    <div class="container">
        <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group row">
                <label for="inputUsuario" class="col-sm-2 col-form-label">Usuario</label>
                <input type="text" class="form-control" id="inputUsuario" 
                name="usuario" placeholder="Nombre de usuario">
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
                <input type="password" class="form-control" id="inputPassword" 
                name="password" placeholder="Contraseña">               
            </div>
            <div class="form-group row">
                <input type="submit" value="Acceder" name="login" class="btn btn-primary">               
            </div>
        </form>
        <?php 
        
        if (isset($error)){
            echo $error;
        }

        ?>
    </div>
</body>
</html>