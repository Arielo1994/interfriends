<?php
	include 'mysqli.php';
	if($_POST){
		$nombreUsuario = $_POST["nombreUsuario"];
	}
	$conexion = conectar(); 
	if(!$conexion) die("Error de conexion".mysqli_connect_error());

	$query = "SELECT nombreUsuario FROM estudiante WHERE nombreUsuario = '$nombreUsuario'";
	
	$row = getQuery($query);



	if(!$row){
		$json1 = array('boolean' => FALSE);
		echo json_encode($json1);
	}else{
				if($row[0][0]==$nombreUsuario){
						$json2 = array('boolean' => TRUE);
					echo json_encode($json2);
				}else{
				$json3 = array('boolean' => FALSE);
				echo json_encode($json3);
				}
	}

?>