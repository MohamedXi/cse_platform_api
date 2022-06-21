<?php

namespace ContainerFeAFC6b;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Aws8lJMService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.aws8lJM' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.aws8lJM'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'agencyRepository' => ['privates', 'App\\Repository\\AgencyRepository', 'getAgencyRepositoryService', true],
        ], [
            'agencyRepository' => 'App\\Repository\\AgencyRepository',
        ]);
    }
}
