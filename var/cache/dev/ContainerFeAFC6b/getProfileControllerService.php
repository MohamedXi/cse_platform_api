<?php

namespace ContainerFeAFC6b;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProfileControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\ProfileController' shared autowired service.
     *
     * @return \App\Controller\ProfileController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/ProfileController.php';

        $container->services['App\\Controller\\ProfileController'] = $instance = new \App\Controller\ProfileController();

        $instance->setContainer(($container->privates['.service_locator.W9y3dzm'] ?? $container->load('get_ServiceLocator_W9y3dzmService'))->withContext('App\\Controller\\ProfileController', $container));

        return $instance;
    }
}
