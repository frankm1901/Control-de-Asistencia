<?php

require "../admin/config/Conexion.php";
$fecha = date("Y-m-d");
$codigo_persona = 444;

$sql = $conexion -> prepare("SELECT * FROM asistencia");





$sql -> execute();

$ver = $sql -> fetchAll();

foreach ($ver as $valor) {
    echo "fecha = ". $valor['fecha'];
    echo "<br>";
}

?>

