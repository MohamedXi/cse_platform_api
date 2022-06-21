<?php

namespace ContainerTpQLtNW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDefaultSluggableRepositoryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Knp\DoctrineBehaviors\Repository\DefaultSluggableRepository' shared autowired service.
     *
     * @return \Knp\DoctrineBehaviors\Repository\DefaultSluggableRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/knplabs/doctrine-behaviors/src/Repository/DefaultSluggableRepository.php';

        return $container->services['Knp\\DoctrineBehaviors\\Repository\\DefaultSluggableRepository'] = new \Knp\DoctrineBehaviors\Repository\DefaultSluggableRepository(($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()));
    }
}
