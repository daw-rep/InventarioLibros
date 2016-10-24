<?php

require_once 'classes/Usuario.php';
require_once 'classes/Libro.php';

session_start();
$message = '';
// Si el usuario no se ha autenticado
if (!isset($_SESSION['usuario'])) {
    // Si el mensaje es GET y no contiene parametros
    if (isset($_POST['login'])) {
        $usuarioObj = Usuario::getByCredencial($_POST['nomusuario'], $_POST['clave']);
        if ($usuarioObj) {
            $_SESSION['usuario'] = $usuarioObj;
            header('Location: librocontroller.php?getlibros');
        } else {
            $message = "Datos login incorrectos";
            include 'views/login.php';
        }
    } elseif (isset($_POST['solicitaregistro'])) {
        include 'views/usuarioform.php';
    } elseif (isset($_POST['registra'])) {
        $usuario = new Usuario($_POST['nomusuario'], $_POST['clave']);
        if ($usuario->persist()) {
            include 'views/login.php';
        } else {
            $message = "Problemas con los datos de registro";
            include 'views/usuarioform.php';
        }
    } else {
        include 'views/login.php';
    }
} else {
    if (isset($_POST['cerrarsesion'])) {
        session_unset();
        session_destroy();
        include 'views/login.php';
    } else {
        header('Location: librocontroller.php?getlibros');
    }
}
// Si el usuario no se ha autenticado