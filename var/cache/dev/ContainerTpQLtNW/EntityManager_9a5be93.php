<?php

namespace ContainerTpQLtNW;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
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

    public function getConnection()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getConnection', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getMetadataFactory', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getExpressionBuilder', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'beginTransaction', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getCache', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getCache();
    }

    public function transactional($func)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'transactional', array('func' => $func), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->transactional($func);
    }

    public function commit()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'commit', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->commit();
    }

    public function rollback()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'rollback', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getClassMetadata', array('className' => $className), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'createQuery', array('dql' => $dql), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'createNamedQuery', array('name' => $name), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'createQueryBuilder', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'flush', array('entity' => $entity), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'clear', array('entityName' => $entityName), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->clear($entityName);
    }

    public function close()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'close', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->close();
    }

    public function persist($entity)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'persist', array('entity' => $entity), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'remove', array('entity' => $entity), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'refresh', array('entity' => $entity), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'detach', array('entity' => $entity), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'merge', array('entity' => $entity), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getRepository', array('entityName' => $entityName), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'contains', array('entity' => $entity), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getEventManager', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getConfiguration', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'isOpen', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getUnitOfWork', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getProxyFactory', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'initializeObject', array('obj' => $obj), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'getFilters', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'isFiltersStateClean', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, 'hasFilters', array(), $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        return $this->valueHolder2ec2a->hasFilters();
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

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializerfd718 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder2ec2a) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder2ec2a = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder2ec2a->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerfd718 && ($this->initializerfd718->__invoke($valueHolder2ec2a, $this, '__get', ['name' => $name], $this->initializerfd718) || 1) && $this->valueHolder2ec2a = $valueHolder2ec2a;

        if (isset(self::$publicProperties235e2[$name])) {
            return $this->valueHolder2ec2a->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

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

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

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

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

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

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

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
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
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

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
