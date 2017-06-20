<?php

$dbopts = parse_url(getenv('DATABASE_URL'));
$enlace->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
               array(
                'pdo.server' => array(
                   'driver'   => 'pgsql',
                   'user' => $dbopts["user"],
                   'password' => $dbopts["pass"],
                   'host' => $dbopts["host"],
                   'port' => $dbopts["port"],
                   'dbname' => ltrim($dbopts["path"],'/')
                   )
               )
);

echo "hola";
if (!$enlace) {
   	echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
   	echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
   	echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
   	exit;
}

$enlace->get('/db/', function() use($app) {
  $st = $enlace['pdo']->prepare('SELECT name FROM test_table');
  $st->execute();

  $names = array();
  while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
    $enlace['monolog']->addDebug('Row ' . $row['name']);
    $names[] = $row;
  }

  return $app['twig']->render('database.twig', array(
    'names' => $names
  ));
});

?>