<?php

require_once 'classes/Usuario.php';
require_once 'classes/Libro.php';


session_start();
$message = '';
if (isset($_SESSION['usuario'])) {
    if (isset($_POST['solicitaanyadirlibro'])) {
        include 'views/libroform.php';
    } elseif (isset($_POST['borrarlibro'])) {
        $libroId = (int) $_POST['libroId'];
        $usuarioObj = $_SESSION['usuario'];
        $libroObj = $usuarioObj->borraLibro($libroId);
        $libroObj->delete();
        $libros = $usuarioObj->getLibros();
        include 'views/listalibros.php';
    } elseif (isset($_POST['anyadirlibro'])) {
        $usuarioObj = $_SESSION['usuario'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editorial = ($_POST['editorial']) ? $_POST['editorial'] : null;
        $anyoPublicacion = $_POST['anyoPublicacion'];
        $numPaginas = $_POST['numPaginas'];
        $usuarioId = $usuarioObj->getId();
        $libroObj = new Libro($titulo, $autor, $editorial, $anyoPublicacion, $numPaginas, $usuarioId);
        $libroObj->persist();
        $usuarioObj->anyadeLibro($libroObj);
        $libros = $usuarioObj->getLibros();
        include 'views/listalibros.php';
    } elseif (isset($_GET['getlibros'])) {
        $usuarioObj = $_SESSION['usuario'];
        $libros = $usuarioObj->getLibros();
        include 'views/listalibros.php';
    }
} else {
    include 'views/login.php';
}



    