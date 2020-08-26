<?php

declare(strict_types=1);

use App\CriterionInterface;
use App\PostPublish;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use function Symfony\Component\DependencyInjection\Loader\Configurator\tagged_locator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure();

    $services->load('App\\', __DIR__.'/../src/')
        ->exclude(
            [
                __DIR__.'/../src/DependencyInjection/',
                __DIR__.'/../src/Entity/',
                __DIR__.'/../src/Kernel.php',
                __DIR__.'/../src/Tests/',
            ]
        );

    $services->load('App\Controller\\', __DIR__.'/../src/Controller/')
        ->tag('controller.service_arguments');

    $services->instanceof(CriterionInterface::class)
        ->tag('app.post');

    $services->set(PostPublish::class)
        ->args([tagged_locator('app.post')]);
};
