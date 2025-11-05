<?php

#require() establece que el código del archivo invocado es requerido, es decir, 
//obligatorio para el funcionamiento del programa. Por ello, si el archivo especificado en la función require() 
// no se encuentra saltará un error “PHP Fatal error” y el programa PHP se detendrá.


require_once "controladores/plantilla.controlador.php";





$plantilla = new ControladorPlantilla();


$plantilla -> ctrTraerPlantilla();

//require_once "modelos/conexion.php";
//$conexion = Conexion::conectar();
//echo '<pre>'; print_r($conexion); echo '</pre>';