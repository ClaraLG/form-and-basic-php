<!DOCTYPE html>

<?php 

session_start();

if (isset($_POST["login"])){
    if ($_POST["nombre"] == "ifp" && $_POST["password"] == "2022") {

        $nombre_usuario = $_POST["nombre"];
        $_SESSION["usuario"] = $nombre_usuario;

        setcookie('cookie_usuario', $nombre_usuario, time() +3600, '/');

        header("Location: index.php");
        exit();
    }
    else {
        $error = "El usuario o la contraseña son incorrectos";
    }
}


?>

<html lang="es">
<head>
    
    <title>Mocc. | Iniciar sesión</title>
    
    <meta charset="UTF-8">

    <meta name="robots" content="noindex, nofollow">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="title" content="Mocc - Iniciar sesión">
    
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

</head>

<body>

    <div class="container" id="formRow">
        <form id="formLogin"
        method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3 row justify-content-md-center">
                <label for="inputUsuario" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputUsuario" 
                    name="nombre" placeholder="Nombre de usuario">
                </div>
            </div>
            <div class="mb-3 row justify-content-md-center">
                <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" id="inputPassword" 
                    name="password" placeholder="Contraseña">
                </div>             
            </div>
            <div class="row d-flex justify-content-center" id="acceder">
                <button type="submit" name="login" class="btn btn-primary col-sm-1">Acceder</button>   
            </div>  
        </form>
        
        <?php 
        
        if (isset($error)){
        
            echo
            
                "<div class='row alert alert-danger' role='alert'>
                    <div class='col-12 d-flex justify-content-between'>
                        ".$error."
                        <i class='bi bi-x-circle'></i>
                    </div>    
                </div>"
            ;

        }
        ?>
        
    </div>
</body>
</html>