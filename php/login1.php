<?php

	require 'conexion1.php';

	$contr = $_POST['password'];
	$user = $_POST['usuario'];

	//$pass = md5($contr);

	$query = "select * FROM id where usuario='$user'";

	$result = pg_query($dbconn, $query);
	if (!$result) {
		pg_close($dbconn);
	  	die("Usuario no encontrado");
	}

	while ($row = pg_fetch_row($result)) {

		if($contr == $row[2]){
			session_start();
			$_SESSION['perfil'] = $row[3];
			$_SESSION['usuario'] = $row[1];
			pg_close($dbconn);
			die();
		}else
			pg_close($dbconn);
			die('Contraseña incorrecta');
	}
?>