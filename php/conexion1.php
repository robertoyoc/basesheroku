<?php
$dbopts = parse_url(getenv('DATABASE_URL'));

$data = "host=".$dbopts["host"]." port=".$dbopts["port"]." dbname=".$dbopts["path"]." user=".$dbopts["user"]." password=".$dbopts["pass"];
echo $data;

?>
