<?php

require_once 'DB.php';
require_once 'Collection.php';
require_once 'Libro.php';

class Usuario
{

    protected $id;
    protected $nomUsuario;
    protected $clave;
    protected $libros;

    public static function getByCredencial($nomUsuario, $clave)
    {
        $bd = BD::getConexion();
        $sqlSelectUsuario = 'select * from usuarios where nomUsuario=:nomUsuario and clave=:clave';
        $sthSqlSelectUsuario = $bd->prepare($sqlSelectUsuario);
        $sthSqlSelectUsuario->execute([":nomUsuario" => $nomUsuario, ":clave" => $clave]);
        $sthSqlSelectUsuario->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
        $usuarioObj = $sthSqlSelectUsuario->fetch();
        if ($usuarioObj) {
            $listaLibros = Libro::getLibrosByUserId($usuarioObj->id);
            foreach ($listaLibros as $libro) {
                $usuarioObj->anyadeLibro($libro);
            }
        }
        return $usuarioObj;
    }

    public function __construct($nomUsuario = null, $clave = null)
    {
        $this->nomUsuario = $nomUsuario;
        $this->clave = $clave;
        $this->libros = new Collection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNomUsuario()
    {
        return $this->nomUsuario;
    }

    public function setUsuario($nomUsuario)
    {
        $this->nomUsuario = $nomUsuario;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function anyadeLibro($libro)
    {
        $this->libros->add($libro);
    }

    public function borraLibro($libroId)
    {
        $libro = $this->libros->getByProperty('id', $libroId);
        $this->libros->removeByProperty('id', $libroId);
        return $libro;
    }

    public function getLibros()
    {
        $libros = array();
        if (!$this->libros->isEmpty()) {
            $this->libros->resetIterator();
            while ($libro = $this->libros->iterate()) {
                $libros[] = $libro;
            }
        }
        return $libros;
    }

    public function persist()
    {
        $bd = BD::getConexion();
        $sqlInsertUsuario = "insert into usuarios (nomUsuario, clave) values (:nomUsuario, :clave)";
        $sthSqlInsertUsuario = $bd->prepare($sqlInsertUsuario);
        $result = $sthSqlInsertUsuario->execute([":nomUsuario" => $this->nomUsuario, ":clave" => $this->clave]);
        $this->id = (int) $bd->lastInsertId();
        return($result);
    }

}
