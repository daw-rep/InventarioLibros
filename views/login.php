<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Login</title>
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">
    </head>
    <body>
        <h1>Inventario Libros</h1>
        <h1>Login</h1>
        <div class="capaform">
            <h1><?php echo $message ?></h1>
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="usuario">Nombre de Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="nomusuario" autofocus size="30" />
                </div>
                <div class="form-group">
                    <label for="clave">Contraseña:</label>
                    <input type="password" class="form-control" id="clave" name="clave" size="30" /> 
                </div> 
                    <input type="submit" class="btn btn-default" value="Login" name="login" />
                    <input class="button-section btn btn-default" type="submit" value="Si no tienes cuenta ...." name="solicitaregistro" />
        </div>
    </form>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>