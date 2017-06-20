<?php
$dbopts = parse_url(getenv('DATABASE_URL'));

$data = "host=".$dbopts["host"]." port=".$dbopts["port"]." dbname=".$dbopts["path"]." user=".$dbopts["user"]." password=".$dbopts["pass"];
$dbconn =pg_connect($data);
or die("No se pudo conectar");
  echo "Conectado con éxito<br>";
echo "Entre a la base <br>";
pg_close($dbconn);

?>
