<?php

require_once "modelos/conexion.php";
$conexion = Conexion::conectar();
echo '<pre>'; print_r($conexion); echo '</pre>';