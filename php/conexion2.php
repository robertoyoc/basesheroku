<?php
$dbopts = parse_url(getenv('DATABASE_URL'));

$data = "host=".$dbopts["host"]." port=".$dbopts["port"]." dbname=". ltrim($dbopts["path"],'/')." user=".$dbopts["user"]." password=".$dbopts["pass"];
$dbconn = pg_connect($data)
  or die("No se pudo conectar");
pg_close($dbconn);

?>
