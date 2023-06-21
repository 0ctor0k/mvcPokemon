<?php
namespace modelo;

use PDOException;

include_once "conexion.php";

class Usuarios
{
    private $id;
    private $tipoDoc;
    private $identificacion;
    private $nombre;
    private $apellido;
    private $correo;
    private $password;
    private $direccion;
    private $telefono;
    private $genero;
    private $idRol;
    private $estado;
    public $conexion;

    function __construct()
    {
        $this -> conexion = new \Conexion();
    }

    function create()
    {
        
        try {
            $sql = $this->conexion->getCon()->prepare("INSERT INTO usuario(tipoDoc,identificacion,nombre,apellido,correo,password,direccion,telefono,genero,idRol,estado) VALUES (?,?,?,?,?,?,?,?,?,?,'A')");
            $sql->bindParam(1, $this->tipoDoc);
            $sql->bindParam(2, $this->identificacion);
            $sql->bindParam(3, $this->nombre);
            $sql->bindParam(4, $this->apellido);
            $sql->bindParam(5, $this->correo);
            $sql->bindParam(6, $this->password);
            $sql->bindParam(7, $this->direccion);
            $sql->bindParam(8, $this->telefono);
            $sql->bindParam(9, $this->genero);
            $sql->bindParam(10, $this->idRol);
            $sql->execute();
            return "Usuario Agregado Correctamente";
        
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }

    }

    function read()
    {

        try {
            $sql = $this->conexion->getCon()->prepare("SELECT * FROM usuario");
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
            $sql = $this->conexion->getCon()->prepare("UPDATE usuario SET tipoDoc=?, identificacion=?,nombre=?,apellido=?,correo=?,direccion=?,password=?,telefono=?,genero=?,idRol=? WHERE id=?");
            $sql->bindParam(1,$this->tipoDoc);
            $sql->bindParam(2,$this->identificacion);
            $sql->bindParam(3,$this->nombre);
            $sql->bindParam(4,$this->apellido);
            $sql->bindParam(5,$this->correo);
            $sql->bindParam(6,$this->password);
            $sql->bindParam(7,$this->direccion);
            $sql->bindParam(8,$this->telefono);
            $sql->bindParam(9,$this->genero);
            $sql->bindParam(10,$this->idRol);
            $sql->bindParam(11,$this->id);
            $sql->execute();
            return "Usuario modificado";
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }
    }

    function delete()
    {
        try {
            $sql = $this->conexion->getCon()->prepare("DELETE FROM usuario WHERE id=?");
            $sql->bindParam(1,$this->id);
            $sql->execute();
            return "Usuario Eliminado";
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }
    }

    function login()
    {
        try {
            $sql = $this->conexion->getCon()->prepare("SELECT FROM usuario WHERE correo=? AND password=?");
            $sql->bindParam(1,$this->correo);
            $sql->bindParam(2,$this->password);
            $sql->execute();
            $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
            if(isset($result)) {
                session_start();
                $_SESSION["nombre"] = $result["nombre"];
                $_SESSION["rol"] = $result["idRol"];

            }
            return $result;
        } catch(PDOException $e) {
            return "Error: ".$e->getMessage();
        }
    }

    function readId()
    {
        try {
            $sql = $this->conexion->getCon()->prepare("SELECT * FROM usuario WHERE id=?");
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
            $sql = $this->conexion->getCon()->prepare("UPDATE usuario SET estado = ? WHERE id= ?");
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
     * Get the value of tipoDoc
     */ 
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    /**
     * Set the value of tipoDoc
     *
     * @return  self
     */ 
    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;

        return $this;
    }

    /**
     * Get the value of identificacion
     */ 
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * Set the value of identificacion
     *
     * @return  self
     */ 
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of idRol
     */ 
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * Set the value of idRol
     *
     * @return  self
     */ 
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

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

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}