<?php


require_once "conexion.php";

class ModeloFormularios{

    //REGISTRO
//registro metodo estatico publico 
// parametros en las funciones sirven para enviar funciones de un archivo a otro ($tabla, $datos)
// $tabla = nombre de la tabla / $datos 0 los datos que quiero almacenar 
    static public function mdlRegistro ($tabla, $datos){


        $stmt = conexion:: conectar()-> prepare("INSERT INTO $tabla (usuario, email, contrasenia) VALUES (:usuario, :email, :contrasenia)");

        $stmt-> bindParam(":usuario",$datos["usuario"],PDO::PARAM_STR);
        $stmt-> bindParam(":email",$datos["email"],PDO::PARAM_STR);
        $stmt-> bindParam(":contrasenia",$datos["contrasenia"],PDO::PARAM_STR);

        if ($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt->close();

        $stmt->null;




    }
}