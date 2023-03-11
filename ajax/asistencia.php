<?php 
require_once "../modelos/Asistencia.php";

$asistencia=new Asistencia();

$codigo_persona=isset($_POST["codigo_persona"])? limpiarCadena($_POST["codigo_persona"]):"";
$iddepartamento=isset($_POST["iddepartamento"])? limpiarCadena($_POST["iddepartamento"]):"";


		$result=$asistencia->verificarcodigo_persona($codigo_persona);

      	if($result > 0) {
			date_default_timezone_set('America/Caracas');
      		$fecha = date("Y-m-d");
			$hora = date("H:i:s");

			$result2=$asistencia->seleccionarcodigo_persona($codigo_persona);
     		$count2 = mysqli_num_rows($result2);			   
     		$par = abs($count2%2); 

			if ($par == 0){ 													
					$rspta=$asistencia->registrar_entrada($codigo_persona);
					//$movimiento = 0;
					//echo $rspta ? '<h3><strong> '.$result['imagen'].' AhorarraNombres: </strong> '. $result['nombre'].' '.$result['apellidos'].'</h3><div class="alert alert-success"> Ingreso registrado '.$hora.'</div>' : 'No se pudo registrar el ingreso';
					if ($rspta){
						echo '<h3><strong> Nombresote: </strong> '. $result['nombre'].' '.$result['apellidos'].'</h3><div class="alert alert-success"> Ingreso registrado '.$hora.'</div>';						?>
						<center><img style="width: 50%;" class = "img-thumbnail " src="..\admin\files\usuarios\<?php echo $result['imagen']?>" alt=""></center> <?php						
					}else{ echo 'No se pudo registrar el ingreso';}
			}else{ 					
					$rspta=$asistencia->registrar_salida($codigo_persona);
					//$movimiento = 1;					
					//echo $rspta ? '<h3><strong>'.$result['imagen'].' Nombres: </strong> '. $result['nombre'].' '.$result['apellidos'].'</h3><div class="alert alert-danger"> Salida registrada '.$hora.'</div>' : 'No se pudo registrar la salida';             
					if ($rspta){
						echo '<h3><strong> Nombres: </strong> '. $result['nombre'].' '.$result['apellidos'].'</h3><div class="alert alert-danger"> Salida registrada '.$hora.'</div>';?>
						<center><img style="width: 50%; " class = "img-fluid img-thumbnail rounded my-2 w-25 p-3" src="..\admin\files\usuarios\<?php echo $result['imagen']?>" alt=""></center>						<?php						
					}else{ echo 'Error al intentar realizar el registro';}
				} 
        } else {
		         echo '<div class="alert alert-danger">
                       <i class="icon fa fa-warning"></i> No hay empleado registrado con esa código...!
                         </div>';
        }

?>