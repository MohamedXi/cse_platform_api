<?php

namespace ContainerTpQLtNW;
include_once \dirname(__DIR__, 4).'/vendor/theofidry/alice-data-fixtures/src/LoaderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/nelmio/alice/src/IsAServiceTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/theofidry/alice-data-fixtures/src/Loader/SimpleLoader.php';

class SimpleLoader_4473cb1 extends \Fidry\AliceDataFixtures\Loader\SimpleLoader implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Fidry\AliceDataFixtures\Loader\SimpleLoader|null wrapped object, if the proxy is initialized
     */
    private $valueHolder2ec2a = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerfd718 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties235e2 = [
        
    ];

    public function load(array $fixturesFiles, array $parameters = [], array $objects = [], ?\Fidry\AliceDataFixtures\Persistence\PurgeMode $purgeMode = null) : array
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'load', array('fixturesFiles' => $fixturesFiles, 'parameters' => $parameters, 'objects' => $objects, 'purgeMode' => $purgeMode), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->load($fixturesFiles, $parameters, $objects, $purgeMode);
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Fidry\AliceDataFixtures\Loader\SimpleLoader $instance) {
            unset($instance->filesLoader, $instance->logger);
        }, $instance, 'Fidry\\AliceDataFixtures\\Loader\\SimpleLoader')->__invoke($instance);

        $instance->initializerfd718 = $initializer;

        return $instance;
    }

    public function __construct(\Nelmio\Alice\FilesLoaderInterface $fileLoader, ?\Psr\Log\LoggerInterface $logger = null)
    {
        static $reflection;

        if (! $this->valueHolder2ec2a) {
            $reflection = $reflection ?? new \ReflectionClass('Fidry\\AliceDataFixtures\\Loader\\SimpleLoader');
            $this->valueHolder2ec2a = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Fidry\AliceDataFixtures\Loader\SimpleLoader $instance) {
            unset($instance->filesLoader, $instance->logger);
        }, $this, 'Fidry\\AliceDataFixtures\\Loader\\SimpleLoader')->__invoke($this);

        }

        $this->valueHolder2ec2a->__construct($fileLoader, $logger);
    }

    public function & __get($name)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, '__get', ['name' => $name], $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        if (isset(self::$publicProperties235e2[$name])) {
            return $this->valueHolder2ec2a->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Fidry\\AliceDataFixtures\\Loader\\SimpleLoader');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder2ec2a;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder2ec2a;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        $realInstanceReflection = new \ReflectionClass('Fidry\\AliceDataFixtures\\Loader\\SimpleLoader');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder2ec2a;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder2ec2a;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, '__isset', array('name' => $name), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        $realInstanceReflection = new \ReflectionClass('Fidry\\AliceDataFixtures\\Loader\\SimpleLoader');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder2ec2a;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder2ec2a;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, '__unset', array('name' => $name), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        $realInstanceReflection = new \ReflectionClass('Fidry\\AliceDataFixtures\\Loader\\SimpleLoader');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder2ec2a;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder2ec2a;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, '__clone', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        $this->valueHolder2ec2a = clone $this->valueHolder2ec2a;
    }

    public function __sleep()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, '__sleep', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return array('valueHolder2ec2a');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Fidry\AliceDataFixtures\Loader\SimpleLoader $instance) {
            unset($instance->filesLoader, $instance->logger);
        }, $this, 'Fidry\\AliceDataFixtures\\Loader\\SimpleLoader')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerfd718 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerfd718;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'initializeProxy', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder2ec2a;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder2ec2a;
    }
}

if (!\class_exists('SimpleLoader_4473cb1', false)) {
    \class_alias(__NAMESPACE__.'\\SimpleLoader_4473cb1', 'SimpleLoader_4473cb1', false);
}
