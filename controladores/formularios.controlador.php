<?php 

class ControladorFormularios{

    //REGISTRO
    static public function ctrRegistro() {
        if (isset($_POST["registroNombre"])) {
            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) &&
        preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
        preg_match('/^[0-9a-zA-Z]+$/', $_POST["registroPassword"])){

            $tabla = "usuarios";
            $token = md5($_POST["registroNombre"]."+".$_POST["registroEmail"]);
            $datos = array( 
                "token" => $token,
                "usuario" => $_POST["registroNombre"],
                "email" => $_POST["registroEmail"],
                "contrasenia" => $_POST["registroPassword"]
            );
            $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
            return $respuesta;
            }else{
                $respuesta="error";
                return $respuesta;
            }
        }
    }

    //INGRESO
    public function ctrIngreso() {
        if(isset($_POST["ingresoEmail"])){
            $tabla = "usuarios";
            $item = "email";
            $valor = $_POST["ingresoEmail"];
            $respuesta = ModeloFormularios::mdlSeleccionarIngresos($tabla, $item, $valor);
            
            if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["contrasenia"] == $_POST["ingresoPassword"]){
                $_SESSION["validarIngreso"] = "ok";
                $_SESSION["id"] = $respuesta["token"];  
                $_SESSION["usuario"] = $respuesta["usuario"]; 
                $_SESSION["email"] = $respuesta["email"];     

                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=inicio";
                </script>';
            } else {
                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-danger">Error al ingresar al sistema, el correo o la contraseña es incorrecta</div>';
            }
        }
    }

    //MOSTRAR PERFIL DEL USUARIO
    static public function ctrMostrarPerfil(){
        if(isset($_SESSION["id"])){
            $tabla = "usuarios";
            $item = "token";
            $valor = $_SESSION["id"];
            
            $respuesta = ModeloFormularios::mdlSeleccionarIngresos($tabla, $item, $valor);
            return $respuesta;
        }
    }

    //ACTUALIZAR PERFIL (Usuario y Email)
    static public function ctrActualizarPerfil() {
        if (isset($_POST["actualizarNombre"])) {
            // Validar datos
            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["actualizarNombre"]) &&
               preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["actualizarEmail"])){
                
                // Obtener usuario actual y verificar token
                $usuario = ModeloFormularios::mdlSeleccionarIngresos("usuarios", "token", $_POST["tokenUsuario"]);
                $compararToken = md5($usuario["usuario"]."+".$usuario["email"]);
                
                if($compararToken == $_POST["tokenUsuario"]){
                    $tabla = "usuarios";
                    $datos = array(
                        "token" => $_SESSION["id"],
                        "usuario" => $_POST["actualizarNombre"],
                        "email" => $_POST["actualizarEmail"]
                    );

                    $respuesta = ModeloFormularios::mdlActualizarPerfil($tabla, $datos);
                    
                    if($respuesta == "ok"){
                        // Actualizar sesión
                        $_SESSION["usuario"] = $_POST["actualizarNombre"];
                        $_SESSION["email"] = $_POST["actualizarEmail"];
                        
                        echo '<script>
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.href);
                            }
                        </script>';
                        echo '<div class="alert alert-success">El perfil ha sido actualizado correctamente</div>';
                    } else {
                        echo '<div class="alert alert-danger">Error al actualizar el perfil</div>';
                    }
                    
                    return $respuesta;
                } else {
                    echo '<script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div class="alert alert-danger">Token de seguridad inválido</div>';
                    return "error";
                }
            } else {
                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-danger">No están permitidos caracteres especiales</div>';
                return "error";
            }
        }
    }

    //CAMBIAR CONTRASEÑA
    static public function ctrCambiarPassword() {
        if (isset($_POST["actualizarPassword"])) {
            // Validar formato de contraseña
            if(preg_match('/^[0-9a-zA-Z]+$/', $_POST["nuevaPassword"])){
                
                // Verificar que la contraseña actual sea correcta
                if($_POST["actualizarPassword"] == $_POST["passwordActual"]){
                    
                    // Verificar que las nuevas contraseñas coincidan
                    if($_POST["nuevaPassword"] == $_POST["confirmarPassword"]){
                        
                        $tabla = "usuarios";
                        $datos = array(
                            "token" => $_POST["tokenUsuario"],
                            "contrasenia" => $_POST["nuevaPassword"]
                        );

                        $respuesta = ModeloFormularios::mdlCambiarPassword($tabla, $datos);
                        
                        if($respuesta == "ok"){
                            echo '<script>
                                if (window.history.replaceState) {
                                    window.history.replaceState(null, null, window.location.href);
                                }
                            </script>';
                            echo '<div class="alert alert-success">La contraseña ha sido actualizada correctamente</div>';
                        } else {
                            echo '<div class="alert alert-danger">Error al actualizar la contraseña</div>';
                        }
                        
                    } else {
                        echo '<script>
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.href);
                            }
                        </script>';
                        echo '<div class="alert alert-danger">Las contraseñas nuevas no coinciden</div>';
                    }
                    
                } else {
                    echo '<script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div class="alert alert-danger">La contraseña actual es incorrecta</div>';
                }
            } else {
                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-danger">La contraseña solo puede contener letras y números</div>';
            }
        }
    }
}