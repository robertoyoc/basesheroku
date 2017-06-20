<?php

	require 'conexion2.php';
	echo "Hola";

	$conn = pg_pconnect("dbname=ltrim($dbopts["path"],'/')");
if (!$conn) {
  echo "Ocurrió un error.\n";
  exit;
}

$result = pg_query($conn, "SELECT usuario, contra FROM id");
if (!$result) {
  echo "Ocurrió un error.\n";
  exit;
}

while ($row = pg_fetch_row($result)) {
	session_start();
  echo "Usuario: $row[1]  Perfil: $row[3]";
  echo "<br />\n";
}
	/*

	$contr = $_POST['password'];
	$user = $_POST['usuario'];

	$pass = md5($contr);

	$query = "select * FROM usuarios where usuario='$user'";

	$enlace->real_query($query);
	$resultado = $enlace->use_result();
	
	if($resultado){
		
		$fila = $resultado->fetch_assoc();

		if($pass == $fila['contrasena']){
			session_start();
			$_SESSION['perfil'] = $fila['perfil'];
			$_SESSION['usuario'] = $fila['usuario'];
			die();
		}else
			die('Contraseña incorrecta');
	}
	else
	{
		die('Usuario no encontrado');
	}

mysqli_close($enlace);
*/
?>