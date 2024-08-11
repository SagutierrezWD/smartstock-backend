<?php

require '../vendor/autoload.php';
require "../src/config/db.php";

$app = new \Slim\App();

$db = new db();
$db = $db->connect();

$app->get('/hello[/{name}]', function ($request,$response,$args) {

  $response->write("Hello, " . $args['name'] . ".");

  return $response;

});

require "../src/routes/usuarios.php";

$app->run();