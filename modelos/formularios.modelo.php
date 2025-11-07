<?php

require_once "conexion.php";

class ModeloFormularios{

    //REGISTRO
    static public function mdlRegistro($tabla, $datos){
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (token, usuario, email, contrasenia) VALUES (:token, :usuario, :email, :contrasenia)");
        
        $stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasenia", $datos["contrasenia"], PDO::PARAM_STR);

        if ($stmt->execute()){
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt->close();
        $stmt = null;
    }

    //SELECCIONAR INGRESOS
    static public function mdlSeleccionarIngresos($tabla, $item, $valor){
        if($item == null && $valor == null){
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha_registro, '%d/%m/%Y') AS fecha_registro FROM $tabla ORDER BY id_usuario DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha_registro, '%d/%m/%Y') AS fecha_registro FROM $tabla WHERE $item = :item ORDER BY id_usuario DESC");
            $stmt->bindParam(":item", $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }

        $stmt->close();
        $stmt = null;
    }

    //ACTUALIZAR PERFIL (Usuario y Email)
    static public function mdlActualizarPerfil($tabla, $datos){
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, email = :email WHERE token = :token");
        
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);  // ← CAMBIAR a PDO::PARAM_STR
        
        if($stmt->execute()){
            return "ok";
        } else {
            print_r(conexion::conectar()->errorInfo());
        }

        $stmt->close();
        $stmt = null;
    }

    //CAMBIAR CONTRASEÑA
    static public function mdlCambiarPassword($tabla, $datos){
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET contrasenia = :contrasenia WHERE token = :token");
        
        $stmt->bindParam(":contrasenia", $datos["contrasenia"], PDO::PARAM_STR);
        $stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);  // ← CAMBIAR a PDO::PARAM_STR
        
        if($stmt->execute()){
            return "ok";
        } else {
            print_r(conexion::conectar()->errorInfo());
        }

        $stmt->close();
        $stmt = null;
    }
}