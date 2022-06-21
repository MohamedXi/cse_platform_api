<?php

namespace ContainerTpQLtNW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTimestampableEventSubscriberService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Knp\DoctrineBehaviors\EventSubscriber\TimestampableEventSubscriber' shared autowired service.
     *
     * @return \Knp\DoctrineBehaviors\EventSubscriber\TimestampableEventSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/event-manager/lib/Doctrine/Common/EventSubscriber.php';
        include_once \dirname(__DIR__, 4).'/vendor/knplabs/doctrine-behaviors/src/EventSubscriber/TimestampableEventSubscriber.php';

        return $container->services['Knp\\DoctrineBehaviors\\EventSubscriber\\TimestampableEventSubscriber'] = new \Knp\DoctrineBehaviors\EventSubscriber\TimestampableEventSubscriber('datetimetz');
    }
}
