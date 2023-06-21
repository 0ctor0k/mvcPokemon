<?php
namespace modelo;

use Exception;
use PDOException;

include_once "conexion.php";

Class Roles
{
    private $id;
    private $nombreRol;
    private $estado;
    public $conexion;

    function __construct()
    {
        $this -> conexion = new \Conexion();
    }
    
    function create()
    {
        
        try {
            $sql = $this->conexion->getCon()->prepare("INSERT INTO roles(nombreRol, estado) VALUES (?,'A')");
            $sql->bindParam(1, $this->nombreRol);
            $sql->execute();
        return "Rol Creado";
        
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }

    }

    function read()
    {

        try {
            $sql = $this->conexion->getCon()->prepare("SELECT * FROM roles");
            $sql->execute();
            $response = $sql->fetchAll(\PDO::FETCH_ASSOC);
            return $response;
        
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }
    }

    function update()
    {
        try {
            $sql = $this->conexion->getCon()->prepare("UPDATE roles SET nombreRol=? WHERE id=?");
            $sql->bindParam(1,$this->nombreRol);
            $sql->bindParam(2,$this->id);
            $sql->execute();
            return "Rol modificado";
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }
    }

    function delete()
    {
        try {
            $sql = $this->conexion->getCon()->prepare("DELETE FROM roles WHERE id=?");
            $sql->bindParam(1,$this->id);
            $sql->execute();
            return "Rol Eliminado";
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }
    }
    function readId()
    {
        try {
            $sql = $this->conexion->getCon()->prepare("SELECT * FROM roles WHERE id=?");
            $sql->bindParam(1,$this->id);
            $sql->execute();
            $response = $sql->fetchAll(\PDO::FETCH_ASSOC);
            return $response;
        } catch (PDOException $e) {
            return "Error ". $e->getMessage();
        }
    }
    function estado()
    {
        try {
            $sql = $this->conexion->getCon()->prepare("UPDATE roles SET estado = ? WHERE id= ?");
            $sql->bindParam(1, $this->estado);
            $sql->bindParam(2, $this->id);
            $sql -> execute();
            return "estado modificado";
        
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombreRol
     */
    public function getNombreRol()
    {
        return $this->nombreRol;
    }

    /**
     * Set the value of nombreRol
     */
    public function setNombreRol($nombreRol): self
    {
        $this->nombreRol = $nombreRol;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

}