<?php 


class ControladorFormularios{

    //registro


    static public function ctrRegistro() {
    if (isset($_POST["registroNombre"])) {

        $tabla = "usuarios";

        $datos = array( 
                        "usuario" => $_POST["registroNombre"],
                        "email" => $_POST["registroEmail"],
                        "contrasenia" => $_POST["registroPassword"]);

        $respuesta = ModeloFormularios::mdlRegistro($tabla,  $datos);

        return  $respuesta;






    }
}

}