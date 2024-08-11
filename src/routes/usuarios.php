<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

  $app->get('/usuarios', function (Request $request, Response $response, array $args) use ($app, $db) {

    try {
      
        $query = "SELECT id, nombre FROM usuarios";

        $validate = $db->prepare($query);

        $validate->execute();
        
        if($validate->rowCount()>0){
          $res = $validate->fetchAll(PDO::FETCH_ASSOC);
          return $this->response->withJson(array('estado'=>true, 'mensaje'=> $res));
        }else{
          //Retornar que no se encontro nada
          return $this->response->withJson(array('estado'=>false, 'mensaje'=> "No hay usuarios!"));
        }
    } catch(PDOException $e) {
        return $this->response->withJson(array('estado'=>false, 'mensaje'=> $e->getMessage()));
    }
  });