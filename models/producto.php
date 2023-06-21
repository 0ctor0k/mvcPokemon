<?php
namespace modelo;

use PDOException;

include_once "conexion.php";

class Productos
{
    
    private $id;
    private $nombreProducto;
    private $precioProducto;
    private $cantidadProducto;
    private $descripcionProducto;
    private $estado;
    public $conexion;

    function __construct()
    {
        $this -> conexion = new \Conexion();
    }

    function create()
    {
        
        try {
            $sql = $this->conexion->getCon()->prepare("INSERT INTO productos(nombrePro,precioPro,contidadPro,descripPro, estado) VALUES (?,?,?,?,'A')");
            $sql->bindParam(1, $this->nombreProducto);
            $sql->bindParam(2, $this->precioProducto);
            $sql->bindParam(3, $this->cantidadProducto);
            $sql->bindParam(4, $this->descripcionProducto);
            $sql->execute();
        return "producto Creado";
        
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }

    }

    function read()
    {

        try {
            $sql = $this->conexion->getCon()->prepare("SELECT * FROM productos");
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
            $sql = $this->conexion->getCon()->prepare("UPDATE productos SET nombrePro=?, precioPro=?,contidadPro=?,descripPro=? WHERE id=?");
            $sql->bindParam(1,$this->nombreProducto);
            $sql->bindParam(2,$this->precioProducto);
            $sql->bindParam(3,$this->cantidadProducto);
            $sql->bindParam(4,$this->descripcionProducto);
            $sql->bindParam(5,$this->id);
            $sql->execute();
            return "producto modificado";
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }
    }

    function delete()
    {
        try {
            $sql = $this->conexion->getCon()->prepare("DELETE FROM productos WHERE id=?");
            $sql->bindParam(1,$this->id);
            $sql->execute();
            return "producto Eliminado";
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }
    }

    function readId()
    {
        try {
            $sql = $this->conexion->getCon()->prepare("SELECT * FROM productos WHERE id=?");
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
            $sql = $this->conexion->getCon()->prepare("UPDATE productos SET estado = ? WHERE id= ?");
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
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombreProducto
     */ 
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set the value of nombreProducto
     *
     * @return  self
     */ 
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get the value of precioProducto
     */ 
    public function getPrecioProducto()
    {
        return $this->precioProducto;
    }

    /**
     * Set the value of precioProducto
     *
     * @return  self
     */ 
    public function setPrecioProducto($precioProducto)
    {
        $this->precioProducto = $precioProducto;

        return $this;
    }

    /**
     * Get the value of cantidadProducto
     */ 
    public function getCantidadProducto()
    {
        return $this->cantidadProducto;
    }

    /**
     * Set the value of cantidadProducto
     *
     * @return  self
     */ 
    public function setCantidadProducto($cantidadProducto)
    {
        $this->cantidadProducto = $cantidadProducto;

        return $this;
    }

    /**
     * Get the value of descripcionProducto
     */ 
    public function getDescripcionProducto()
    {
        return $this->descripcionProducto;
    }

    /**
     * Set the value of descripcionProducto
     *
     * @return  self
     */ 
    public function setDescripcionProducto($descripcionProducto)
    {
        $this->descripcionProducto = $descripcionProducto;

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
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}