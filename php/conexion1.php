<?php
$dbopts = parse_url(getenv('DATABASE_URL'));

      'driver'   => 'pgsql',
                   'user' => $dbopts["user"],
                   'password' => $dbopts["pass"],
                   'host' => $dbopts["host"],
                   'port' => $dbopts["port"],
                   'dbname' => ltrim($dbopts["path"],'/')

$data = "host=".$dbopts["host"]." port=".$dbopts["port"]." dbname=".$dbopts["path"]." user=".$dbopts["user"]." password=".$dbopts["pass"];
$dbconn =pg_connect($data);
echo "Entre a la base <br>";
pg_close($dbconn);

?>
