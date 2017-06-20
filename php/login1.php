<?php

	require 'conexion1.php';

	$contr = $_POST['password'];
	$user = $_POST['usuario'];

	//$pass = md5($contr);

	$query = "select * FROM id where usuario='$user'";

	$result = pg_query($dbconn, $query);
	if (!$result) {
	  echo "Usuario no encontrado.<br>";
	  exit;
	}

	while ($row = pg_fetch_row($result)) {

		if($contr == $row['contra']){
			session_start();
			$_SESSION['perfil'] = $row['perfil'];
			$_SESSION['usuario'] = $row['usuario'];
			die();
		}else
			die('Contraseña incorrecta');
	}
	pg_close($dbconn);
?>