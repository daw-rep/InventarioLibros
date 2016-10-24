<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado Libros</title>
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">
    </head>
    <body>

        <div class="cabecera">

            <form action="index.php" method="POST">
                <div class=form-group>
                    <input type="submit" class="button-section btn btn-default" value="Cerrar Sesión" name="cerrarsesion" />
                    <h1>Tu Listado de Libros</h1>
                    <input type="submit" class="btn btn-default" value="Añadir Libro" formaction="librocontroller.php" name="solicitaanyadirlibro" />
                </div>
            </form>
        </div>

        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th>Año de Publicación</th>
                    <th>Número Páginas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($libros as $libro) {
                    echo '<tr>';
                    echo '<td>' . $libro->getId() . '</td>';
                    echo '<td>' . $libro->getTitulo() . '</td>';
                    echo '<td>' . $libro->getAutor() . '</td>';
                    echo '<td>' . $libro->getEditorial() . '</td>';
                    echo '<td>' . $libro->getAnyoPublicacion() . '</td>';
                    echo '<td>' . $libro->getNumPaginas() . '</td>';
                    echo '<td> <form action=librocontroller.php method=POST>  <div class=form-group>'
                    . '<input type=hidden name=libroId value=' . $libro->getId() . '/>'
                    . '<input type=submit class="btn btn-default" value=Borrar name=borrarlibro />'
                    . '</div> </form> </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>

            <script src="bower_components/jquery/dist/jquery.min.js"></script>
            <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>