<?php

namespace ContainerTpQLtNW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authentication_Provider_Guard_ApiService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.authentication.provider.guard.api' shared service.
     *
     * @return \Symfony\Component\Security\Guard\Provider\GuardAuthenticationProvider
     *
     * @deprecated Since symfony/security-bundle 5.3: The "security.authentication.provider.guard.api" service is deprecated, use the new authenticator system instead.
     */
    public static function do($container, $lazyLoad = true)
    {
        trigger_deprecation('symfony/security-bundle', '5.3', 'The "security.authentication.provider.guard.api" service is deprecated, use the new authenticator system instead.');

        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/UserCheckerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/InMemoryUserChecker.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/password-hasher/Hasher/UserPasswordHasherInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/password-hasher/Hasher/UserPasswordHasher.php';

        return $container->privates['security.authentication.provider.guard.api'] = new \Symfony\Component\Security\Guard\Provider\GuardAuthenticationProvider(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['App\\Security\\TokenAuthenticator'] ?? $container->load('getTokenAuthenticatorService'));
        }, 1), ($container->privates['security.user.provider.concrete.app_user_provider'] ?? $container->load('getSecurity_User_Provider_Concrete_AppUserProviderService')), 'api', new \Symfony\Component\Security\Core\User\InMemoryUserChecker(), new \Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher(($container->privates['security.password_hasher_factory'] ?? $container->load('getSecurity_PasswordHasherFactoryService'))));
    }
}
