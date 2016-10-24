<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Libro</title>
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">
    </head>
    <body>
        <h1>Formulario de libro</h1>
        <div class="capaform">
            <form action="librocontroller.php" method="POST">  
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input id="titulo" type="text" class="form-control" name="titulo" required="required" autofocus size="30" />
                </div>
                <div class="form-group">
                    <label for="editorial">Editorial:</label>
                    <input id="editorial" type="text" class="form-control" name="editorial" size="30" />
                </div>
                <div class="form-group">
                    <label for="autor">Autor:</label>
                    <input id="autor" type="text" class="form-control" name="autor" required="required" size="30" /> </br>
                </div>
                <div class="form-group">
                    <label for="anyoPublicacion">Año de publicación:</label>
                    <input id="anyoPublicacion" pattern="^\d{4}$" type="text" class="form-control" name="anyoPublicacion" size="30" /> </br>
                </div>
                <div class="form-group">
                    <label for="numPaginas">Número de páginas:</label>
                    <input id="numPaginas" type="number" class="form-control" name="numPaginas" size="30" /> </br>
                </div>
                <input type="submit" class="btn btn-default" value="Enviar" name="anyadirlibro" />
            </form>
        </div>
    </body>
</html>

