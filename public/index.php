<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Carregamento do arquivo ENV
 * 
 * Ele carregará o arquivo ENV que está no diretório raiz do projeto. Toda
 * variável contida no arquivo pode ser obtida pela chamada via $_SERVER ou $_ENV.
 */
$dotenv = new Dotenv();

$dotenv->load(__DIR__.'/../.env');

/**
 * Instantiate App
 *
 * In order for the factory to work you need to ensure you have installed
 * a supported PSR-7 implementation of your choice e.g.: Slim PSR-7 and a supported
 * ServerRequest creator (included with Slim PSR-7)
 */
$app = AppFactory::create();

/**
 * Default Path
 * 
 * Enter the path here to get to the public folder where index.php is.
 */
$app->setBasePath("/projeto/api/public");

// Add Routing Middleware
$app->addRoutingMiddleware();

/**
 * Add Error Handling Middleware
 *
 * @param bool $displayErrorDetails -> Should be set to false in production
 * @param bool $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool $logErrorDetails -> Display error details in error log
 * which can be replaced by a callable of your choice.
 
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

/**
 * Requests
 * 
 * Here api requests will be inserted.
 */
$app->get('/', function (Request $request, Response $response, $args) {

    $name = $args['name'];

    $response->getBody()->write("Hello, $name");
    return $response;
});

// Run app
$app->run();