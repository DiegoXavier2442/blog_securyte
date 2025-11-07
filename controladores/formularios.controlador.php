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

    public function ctrIngreso() {
        if(isset($_POST["ingresoEmail"])){
            $tabla="usuarios";
            $item="email";
            $valor =$_POST["ingresoEmail"];
            $respuesta = ModeloFormularios::mdlSeleccionarIngresos($tabla, $item,$valor);
            if($respuesta["email"]==$_POST["ingresoEmail"]&&$respuesta["contrasenia"]==$_POST["ingresoPassword"]){

                $_SESSION["validarIngreso"]="ok";
                $_SESSION["id"] = $respuesta["id_usuario"];  
            $_SESSION["usuario"] = $respuesta["usuario"]; 
            $_SESSION["email"] = $respuesta["email"];     

                echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                    window.location ="index.php?pagina=inicio ";
                </script>';


            }else{
                            echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                </script>';


                    echo'<div class = "alert alert-danger"> Error al ingresar al sistema el correo o la contraseña es incorrecata </div>';


                
            }
           

        }




    }

     //MOSTRAR PERFIL DEL USUARIO
    static public function ctrMostrarPerfil(){
        if(isset($_SESSION["id"])){
            $tabla = "usuarios";
            $item = "id_usuario";
            $valor = $_SESSION["id"];
            
            $respuesta = ModeloFormularios::mdlSeleccionarIngresos($tabla, $item, $valor);
            return $respuesta;
        }
    }

}