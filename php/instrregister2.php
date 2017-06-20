<?php
	require 'conexion1.php';

	$id = $_POST['id'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$last_id;

	$queryusers = "insert into usuarios (usuario, contrasena, perfil) values ('$usuario', '$contrasena', 'instr') returning id;";
	$result = pg_query($dbconn, $queryusers);

	while ($row = pg_fetch_row($result)) {
  	$last_id = $row[0];
	}

	$result = array('status' => "Error", 'msg' => $dbconn->insert_id);
	echo json_encode($result);


	/*while($row = pg_fetch_row($result)){
			$insert = "insert into instructor values ('$last_id', '$nombre', '$nomina', '$correo');";
			$result = pg_query($dbconn, $insert);


		}
		*/





	




	/*

	if ($data->query($queryusers) === TRUE) {
		$id = $_SESSION['id'] = $row[1];
		$queryinstr = "insert into instructor values ('$id', '$nombre', '$nomina', '$correo')";
		if ($data->query($queryinstr) === TRUE) {
			echo "Usuario registrado correctamente";		
			//$result = array('status' => "Aceptado", 'msg'=> "Usuario registrado correctamente");
		}
		elseif($enlace->errno==1062){
			$queryaux = "delete from usuarios where id = '$id'";
			$enlace ->query($queryaux);
			$result = array('status' => "Denegado", 'msg'=> "Esta nomina ya se encuentra registrada");
		}
		else {
		$Error =  "Error: " . $query . "<br>" . $enlace->errno;
		$result = array('status' => "Error", 'msg' => $Error);
		}
	}
	elseif($enlace->errno==1062){
		$result = array('status' => "Denegado", 'msg'=> "Este usuario ya se encuentra registrado");
	}
	else {
		$Error =  "Error: " . $query . "<br>" . $enlace->errno;
		$result = array('status' => "Error", 'msg' => $Error);
	}

	
	echo json_encode($result);
*/


?>