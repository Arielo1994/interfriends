<?php 
	include 'mysqli.php';
	if($_POST){
		$name = $_POST["nombre"];
		$clave = $_POST["clave"];	
	}


	$conexion = conectar(); 
	if(!$conexion) die("Error de conexion".mysqli_connect_error());

	$query = "SELECT  contrasena as contrasena from estudiante where nombreUsuario= '$name' ;";

	
	$row= getQuery($query);
	if($row){
		if( $row[0][0]==$clave){
		session_start();
		$_SESSION["nombre"] = $name;
		header("Location:miPagina.html");

				//echo "bienvenido";
		}else{
				header("Location:index.html");
		}

		
	}else{
		echo "datos incorrectos";
				

		
	}




?>