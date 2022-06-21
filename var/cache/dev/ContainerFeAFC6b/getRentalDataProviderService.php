<?php

namespace ContainerFeAFC6b;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRentalDataProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\DataProvider\RentalDataProvider' shared autowired service.
     *
     * @return \App\DataProvider\RentalDataProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/DataProvider/RestrictedDataProviderInterface.php';
        include_once \dirname(__DIR__, 4).'/src/DataProvider/RentalDataProvider.php';

        return $container->privates['App\\DataProvider\\RentalDataProvider'] = new \App\DataProvider\RentalDataProvider(($container->privates['App\\Repository\\RentalRepository'] ?? $container->load('getRentalRepositoryService')), ($container->privates['security.helper'] ?? $container->load('getSecurity_HelperService')), new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['api_platform.doctrine.orm.query_extension.filter'] ?? $container->load('getApiPlatform_Doctrine_Orm_QueryExtension_FilterService'));
            yield 1 => ($container->privates['api_platform.doctrine.orm.query_extension.filter_eager_loading'] ?? $container->load('getApiPlatform_Doctrine_Orm_QueryExtension_FilterEagerLoadingService'));
            yield 2 => ($container->privates['api_platform.doctrine.orm.query_extension.eager_loading'] ?? $container->load('getApiPlatform_Doctrine_Orm_QueryExtension_EagerLoadingService'));
            yield 3 => ($container->privates['api_platform.doctrine.orm.query_extension.order'] ?? $container->load('getApiPlatform_Doctrine_Orm_QueryExtension_OrderService'));
            yield 4 => ($container->privates['api_platform.doctrine.orm.query_extension.pagination'] ?? $container->load('getApiPlatform_Doctrine_Orm_QueryExtension_PaginationService'));
        }, 5));
    }
}
