<?php

require_once 'BD.php';
require_once 'Usuario.php';

class Libro {

    protected $id;
    protected $titulo;
    protected $editorial;
    protected $autor;
    protected $anyoPublicacion;
    protected $numPaginas;
    protected $usuarioId;
    

    function __construct($titulo = null, $autor = null, $editorial = null, $anyoPublicacion = null, $numPaginas = null, $usuarioId = null) {
        $this->titulo = $titulo;
        $this->editorial = $editorial;
        $this->autor = $autor;
        $this->anyoPublicacion = $anyoPublicacion;
        $this->numPaginas = $numPaginas;
        $this->usuarioId = $usuarioId;
    }

    public static function getById($id) {
        $bd = BD::getConexion();
        $sqlSelectLibro = "select * from libros where id = :id";
        $sthSqlSelectLibro = $bd->prepare($sqlSelectLibro);
        $sthSqlSelectLibro->execute([":id" => $id]);
        $sthSqlSelectLibro->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Libro');
        $libroObj = $sthSqlSelectLibro->fetch();
        return $libroObj;
    }

    public static function getLibrosByUserId($id) {
        $bd = BD::getConexion();
        $sqlSelectLibros = "select id from libros where usuarioId = :usuarioId";
        $sthSqlSelectLibros = $bd->prepare($sqlSelectLibros);
        $sthSqlSelectLibros->execute([":usuarioId" => $id]);
        $listaLibros = $sthSqlSelectLibros->fetchAll(PDO::FETCH_FUNC, ['Libro', 'getById']);
        return ($listaLibros);
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getEditorial() {
        return $this->editorial;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getAnyoPublicacion() {
        return $this->anyoPublicacion;
    }

    public function getNumPaginas() {
        return $this->numPaginas;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setEditorial($editorial) {
        $this->editorial = $editorial;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setAnyoPublicacion($anyoPublicacion) {
        $this->anyoPublicacion = $anyoPublicacion;
    }

    public function setNumPaginas($numPaginas) {
        $this->numPaginas = $numPaginas;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function persist() {

        $bd = BD::getConexion();
        $sqlInsertLibro = "insert into libros (titulo, editorial, autor, anyoPublicacion, numPaginas, usuarioId) values (:titulo, :editorial, :autor, :anyoPublicacion, :numPaginas, :usuarioId)";
        $sthSqlInsertLibro = $bd->prepare($sqlInsertLibro);
        $result = $sthSqlInsertLibro->execute([":titulo" => $this->titulo, ":editorial" => $this->editorial, ":autor" => $this->autor, ":anyoPublicacion" => $this->anyoPublicacion, ":numPaginas" => $this->numPaginas, ":usuarioId" => $this->usuarioId]);
        $this->id = (int) $bd->lastInsertId();
    }

    public function delete() {

        $bd = BD::getConexion();
        $sqlDeleteLibro = "delete from libros where id = :id";
        $sthSqlDeleteLibro = $bd->prepare($sqlDeleteLibro);
        $result = $sthSqlDeleteLibro->execute([":id" => $this->id]);
    }

}
