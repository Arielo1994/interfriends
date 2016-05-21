
<?php
	// Para usar este archivo deben escribir "include 'mysqli.php';" sin comillas
	// Defino constantes, esto me da la ventaja de solo cambiar los valores
	define("BD_host","localhost");
	define("BD_usuario","root");
	define("BD_contrasena","");
	define("BD_basedatos","web");
	
	//funcion que me permite conectar a la base de datos, si no funciona retorna null
	function conectar()
		{
			//Conecto base de datos
			$connect = new mysqli(BD_host,BD_usuario,BD_contrasena,BD_basedatos);
			$char = mysqli_set_charset($connect, "utf8");
			//Si no funciona retorna null
			if(!$connect)
			{
				return NULL;
			}
			//retorna coneccion
		return $connect;
	}
	
	// Esta funcion  solo ejecuta querys, es ideal para los INSERT,DELETE, CREATE TABLE, etc.
	function execQuery($query) {
		//invoco coneccion
        $coneccion = conectar();
		//Si no funciona coneccion retorna null
		if (!$coneccion) return NULL;
		//Ejecuto query
		$result = mysqli_query($coneccion, $query);
		//Si no funciona o no retorna nada, retorna null
		if (!$result) {
		    return null;
		}
		//Retorna ejecucion
		return $result;
    }
	// Esta funcion es ideal para retornar valores de un SELECT o funcion
	function getQuery($query){
		//reutilizo la funcion execQuery()
		$ejecucion = execQuery($query);
		//Si la ejecucion no retorna nada, retorna null
		if(!$ejecucion){
			return null;
		}
		//Retorna un arreglo (puede ser una matriz) con todos los resultados de la consulta
		$row = mysqli_fetch_all($ejecucion,MYSQLI_BOTH);
		return $row;
	}
	
	function getQueryAssoc($query){
		$ejecucion = execQuery($query);
		if(!$ejecucion){
			return null;
		}
		$row = mysqli_fetch_assoc($ejecucion);
		return $row;
	}
?>