<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";

class Asistencia{
	//implementamos nuestro constructor
	public function __construct(){
	}

	//listar registros
	public function listar(){
		$sql="SELECT a.idasistencia,a.codigo_persona,a.fecha_hora,a.tipo,a.fecha,concat (u.nombre,' ',u.apellidos) as nombres, d.nombre as departamento, u.imagen, a.horaentrada, a.horasalida FROM asistencia a INNER JOIN usuarios u INNER JOIN departamento d ON u.iddepartamento=d.iddepartamento WHERE a.codigo_persona=u.codigo_persona";
		return ejecutarConsulta($sql);
	}

	public function listaru($idusuario){
		$sql="SELECT a.idasistencia,a.codigo_persona,a.fecha_hora,a.tipo,a.fecha,concat (u.nombre, ' ', u.apellidos) as nombres,d.nombre as departamento, u.imagen, a.horaentrada, a.horasalida FROM asistencia a INNER JOIN usuarios u INNER JOIN departamento d ON u.iddepartamento=d.iddepartamento WHERE a.codigo_persona=u.codigo_persona AND u.idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	public function listar_asistencia($fecha_inicio,$fecha_fin){
		$sql="SELECT a.idasistencia,a.codigo_persona,a.fecha_hora,a.tipo,a.fecha,concat (u.nombre, ' ', u.apellidos) as nombres, u.imagen, a.horaentrada, a.horasalida, d.nombre FROM asistencia a INNER JOIN usuarios u ON  a.codigo_persona=u.codigo_persona INNER JOIN departamento d ON  u.iddepartamento=d.iddepartamento WHERE DATE(a.fecha)>='$fecha_inicio' AND DATE(a.fecha)<='$fecha_fin' ";
		return ejecutarConsulta($sql);
	}
}

 ?>
