<?php

declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use App\Infrastructure\SqlitePDO;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer as Renderer;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        PDO::class => function(ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);
            return SqlitePDO::create($settings->get('db'));
        },
        Renderer::class => function(ContainerInterface $c) {
            $renderer = new Renderer(__DIR__ . '/../templates');
            $renderer->setLayout('layout.php');
            return $renderer;
        }
    ]);
};
