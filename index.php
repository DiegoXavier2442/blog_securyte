<?php

#require() establece que el código del archivo invocado es requerido, es decir, 
//obligatorio para el funcionamiento del programa. Por ello, si el archivo especificado en la función require() 
// no se encuentra saltará un error “PHP Fatal error” y el programa PHP se detendrá.

//require_once  impide la carga de mas de una ves de un archivo 
require_once "controladores/plantilla.controlador.php";

require_once "controladores/formularios.controlador.php";

require_once "modelos/formularios.modelo.php";

// Objeto: $plantilla  por que en el MVC cambiamos un poco el diccionario ya no hablamos de variables si no de objetos
//instaciamos una clase new ControladorPlantilla();

$plantilla = new ControladorPlantilla();

// para ejecutar una metodo que este dentro de esa clase $plantilla -> ctrTraerPlantilla() ejecutamos el metodo 

$plantilla -> ctrTraerPlantilla();

//require_once "modelos/conexion.php";
//$conexion = Conexion::conectar();
//echo '<pre>'; print_r($conexion); echo '</pre>';