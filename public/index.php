<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/slim4/public');

$app->get('/one/{name}', function ($request, $response, $args) {
   echo $args['name'];
    $renderer = new PhpRenderer('../templates');
    return $renderer->render($response, "hello.php",['args'=>$args] );
});


$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world estas avanzando tranquilo!");
    return $response;
});


$app->get('/usuarios', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Usuarios!!!");
    return $response;
});

$app->get('/usuarios/{id}', function (Request $request, Response $response, $args) {
/*    $response->getBody()->write("Usuarios!!!".$args['id']);
    return $response;*/
echo json_encode($args['id']);

});


$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});


$app->run();
?>
