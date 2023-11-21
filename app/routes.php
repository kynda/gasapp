<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Views\PhpRenderer as Renderer;

$renderer = $app->getContainer()->get(Renderer::class);

return function (App $app) use ($renderer) {
    $app->get('/', function (Request $request, Response $response) use ($renderer) {
        return $renderer->render($response, "edit.php", [
            'title' => 'Index',
        ]);
    });

    $app->get('/entry/view/{entry}', function (Request $request, Response $response) use ($renderer) {
        return $renderer->render($response, "view.php", [
            'title' => 'Hello World',
            'name' => 'Joe',
        ]);
    });

    $app->get('/entry/edit/{entry}', function (Request $request, Response $response) use ($renderer) {
        return $renderer->render($response, "edit.php", [
            'title' => 'Hello World',
            'name' => 'Joe',
        ]);
    });
};
