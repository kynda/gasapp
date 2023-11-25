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
        return $renderer->render($response, "index.php", [
            'title' => 'GasApp',
            'vehicles' => [
                [
                    'nick'  => 'Bomby',
                    'make'  => 'Toyota',
                    'model' => 'Tacoma',
                    'year'  => '2014',
                    'tank'  => 20
                ],
                [
                    'nick'  => 'Mortimer',
                    'make'  => 'Suzuki',
                    'model' => 'Swift',
                    'year'  => '2001',
                    'tank'  => 10
                ],
            ],
            'entry' => [],
            'entries' => [],
        ]);
    });

    $app->get('/list', function (Request $request, Response $response) use ($renderer) {
        return $renderer->render($response, "list.php", [
            'entries' => [
                [
                    'id' => 1,
                    'date' => '2023-11-22',
                    'gallons' => 17.55,
                    'total' => 17.55*3.89,
                    'trip' => 325,
                    'odometer' => 100325,
                    'mpg' => 325.0 / 17.55
                ],
                [
                    'id' => 2,
                    'date' => '2023-11-23',
                    'gallons' => 13.50,
                    'total' => 13.50*3.89,
                    'trip' => 312,
                    'odometer' => 100325 + 312,
                    'mpg' => 312.0 / 13.50
                ],
                [
                    'id' => 2,
                    'date' => '2023-11-24',
                    'gallons' => 15.62,
                    'total' => 15.62*3.89,
                    'trip' => 330,
                    'odometer' => 100325 + 312 + 330,
                    'mpg' => 330.0 / 15.62
                ],
            ],
        ]);
    });

    $app->get('/edit', function (Request $request, Response $response) use ($renderer) {
        return $renderer->render($response, "edit.php", [
            'entry' => [
                'id' => 1,
                'date' => '2023-11-22',
                'gallons' => 17.55,
                'total' => 17.55*3.89,
                'trip' => 325,
                'odometer' => 100325,
                'mpg' => 325.0 / 17.55
            ],
            'vehicles' => [
                [
                    'nick'  => 'Bomby',
                    'make'  => 'Toyota',
                    'model' => 'Tacoma',
                    'year'  => '2014',
                    'tank'  => 20
                ],
                [
                    'nick'  => 'Mortimer',
                    'make'  => 'Suzuki',
                    'model' => 'Swift',
                    'year'  => '2001',
                    'tank'  => 10
                ],
            ],
        ]);
    });

    $app->post('/entry', function (Request $request, Response $response) use ($renderer) {
        return $renderer->render($response, "list.php", [
            'entries' => [
                [
                    'id' => 1,
                    'date' => '2023-11-22',
                    'gallons' => 17.55,
                    'total' => 17.55*3.89,
                    'trip' => 325,
                    'odometer' => 100325,
                    'mpg' => 325.0 / 17.55
                ],
                [
                    'id' => 2,
                    'date' => '2023-11-23',
                    'gallons' => 13.50,
                    'total' => 13.50*3.89,
                    'trip' => 312,
                    'odometer' => 100325 + 312,
                    'mpg' => 312.0 / 13.50
                ],
                [
                    'id' => 2,
                    'date' => '2023-11-24',
                    'gallons' => 15.62,
                    'total' => 15.62*3.89,
                    'trip' => 330,
                    'odometer' => 100325 + 312 + 330,
                    'mpg' => 330.0 / 15.62
                ],
            ],
        ]);
    });

    $app->delete('/entry', function(Request $request, Response $response) use ($renderer) {
        return $renderer->render($response, "list.php", [
            'entries' => [
                [
                    'id' => 1,
                    'date' => '2023-11-22',
                    'gallons' => 17.55,
                    'total' => 17.55*3.89,
                    'trip' => 325,
                    'odometer' => 100325,
                    'mpg' => 325.0 / 17.55
                ],
                [
                    'id' => 2,
                    'date' => '2023-11-23',
                    'gallons' => 13.50,
                    'total' => 13.50*3.89,
                    'trip' => 312,
                    'odometer' => 100325 + 312,
                    'mpg' => 312.0 / 13.50
                ],
            ]
        ]);
    });
};
