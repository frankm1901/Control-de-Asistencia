<?php 
require_once "../modelos/Asistencia.php";

if (strlen(session_id())<1) 
	session_start();

$asistencia=new Asistencia();

$codigo_persona=isset($_POST["codigo_persona"])? limpiarCadena($_POST["codigo_persona"]):"";
$iddepartamento=isset($_POST["iddepartamento"])? limpiarCadena($_POST["iddepartamento"]):"";



switch ($_GET["op"]) {
	case 'guardaryeditar':
		$result=$asistencia->verificarcodigo_persona($codigo_persona);

      	if($result > 0) {
			date_default_timezone_set('America/Caracas');
      		echo $fecha = date("Y-m-d");
			echo "<br>".$hora = date("H:i:s");

			$result2=$asistencia->seleccionarcodigo_persona($codigo_persona);			   
     		$par = abs($result2%2);

			if ($par == 0){     
					$tipo = "Entrada";
					$rspta=$asistencia->registrar_entrada($codigo_persona,$tipo);
					//$movimiento = 0;

					echo $rspta ? '<br><h3><strong>aasdadasdNombressss: </strong> '. $result['nombre'].' '.$result['apellidos'].'</h3><div class="alert alert-success"> Ingreso registrado '.$hora.'</div>' : 'No se pudo registrar el ingreso';
			}
			if ($par == 1){
					$tipo = "Salida";					
					$rspta=$asistencia->registrar_salida($codigo_persona,$tipo);
					//$movimiento = 1;
					echo $rspta ? '<br><h3>Salio <strong>sdadasdNombresss: </strong> '. $result['nombre'].' '.$result['apellidos'].'</h3><div class="alert alert-danger"> Salida registrada '.$hora.'</div>' : 'No se pudo registrar la salida';             
        	} 
        } else {
		         echo '<div class="alert alert-danger">
                       <i class="icon fa fa-warning"></i> No hay empleado registrado con esa código...!
                         </div>';
        }
	 break;	
	case 'mostrar':
		$rspta=$asistencia->mostrar($idasistencia);
		echo json_encode($rspta);
	 break;	
	case 'listar':
		$rspta=$asistencia->listar();
		//declaramos un array
		$data=Array();
//Recorrido para mostrar listado de asistencia en la seccion de asistencia del Sistema
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>',
				"1"=>$reg->fecha,
				"2"=>$reg->codigo_persona,
				"3"=>$reg->nombres,
				"4"=>$reg->departamento,
				"5"=>$reg->horaentrada,
				"6"=>$reg->horasalida
				);
		}

		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

	break;

	case 'listaru':
    $idusuario=$_SESSION["idusuario"];
		$rspta=$asistencia->listaru($idusuario);
		//declaramos un array
		$data=Array();

//Recorrido a mostrar para la vista del formato de asistencia
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>',
				"1"=>$reg->fecha,
				"2"=>$reg->codigo_persona,
				"3"=>$reg->nombres,
				"4"=>$reg->departamento,
				"5"=>$reg->horaentrada
				);
		}

		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

	break;

	case 'listar_asistencia':
    $fecha_inicio=$_REQUEST["fecha_inicio"];
    $fecha_fin=$_REQUEST["fecha_fin"];
    //$codigo_persona=$_REQUEST["idcliente"]; 
		$rspta=$asistencia->listar_asistencia($fecha_inicio,$fecha_fin);
		//declaramos un array
		$data=Array();


		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>$reg->fecha,
        "1"=>$reg->codigo_persona,
				"2"=>$reg->nombres,
        "3"=>$reg->nombre,
				"4"=>$reg->horaentrada,
				"5"=>$reg->horasalida		
        
				);
		}

		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

	break;
	case 'listar_asistenciau':
    $fecha_inicio=$_REQUEST["fecha_inicio"];
    $fecha_fin=$_REQUEST["fecha_fin"];
    //$codigo_persona=$_SESSION["codigo_persona"]; 
		$rspta=$asistencia->listar_asistencia($fecha_inicio,$fecha_fin);
		//declaramos un array
		$data=Array();


		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>$reg->fecha,
        "1"=>$reg->codigo_persona,
				"2"=>$reg->nombres,
        "3"=>$reg->nombre,
				"4"=>$reg->horaentrada,
				"5"=>$reg->horasalida		
				);
		}

		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

	break;

		case 'selectPersona':
			require_once "../modelos/Usuario.php";
			$usuario=new Usuario();

			$rspta=$usuario->listar();

			while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->codigo_persona.'>'.$reg->nombre.' '.$reg->apellidos.'</option>';
			}
			break;

}
?>