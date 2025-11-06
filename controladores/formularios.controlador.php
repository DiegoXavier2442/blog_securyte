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
}