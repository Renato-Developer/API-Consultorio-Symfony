<?php

namespace ContainerOX9sAAW;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder1c26e = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer1040c = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties26ee2 = [
        
    ];

    public function getConnection()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getConnection', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getMetadataFactory', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getExpressionBuilder', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'beginTransaction', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getCache', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getCache();
    }

    public function transactional($func)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'transactional', array('func' => $func), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->transactional($func);
    }

    public function commit()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'commit', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->commit();
    }

    public function rollback()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'rollback', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getClassMetadata', array('className' => $className), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'createQuery', array('dql' => $dql), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'createNamedQuery', array('name' => $name), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'createQueryBuilder', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'flush', array('entity' => $entity), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'clear', array('entityName' => $entityName), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->clear($entityName);
    }

    public function close()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'close', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->close();
    }

    public function persist($entity)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'persist', array('entity' => $entity), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'remove', array('entity' => $entity), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'refresh', array('entity' => $entity), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'detach', array('entity' => $entity), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'merge', array('entity' => $entity), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getRepository', array('entityName' => $entityName), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'contains', array('entity' => $entity), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getEventManager', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getConfiguration', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'isOpen', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getUnitOfWork', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getProxyFactory', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'initializeObject', array('obj' => $obj), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'getFilters', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'isFiltersStateClean', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'hasFilters', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return $this->valueHolder1c26e->hasFilters();
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

        $instance->initializer1040c = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder1c26e) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder1c26e = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder1c26e->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, '__get', ['name' => $name], $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        if (isset(self::$publicProperties26ee2[$name])) {
            return $this->valueHolder1c26e->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1c26e;

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

        $targetObject = $this->valueHolder1c26e;
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
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1c26e;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder1c26e;
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
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, '__isset', array('name' => $name), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1c26e;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder1c26e;
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
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, '__unset', array('name' => $name), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1c26e;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder1c26e;
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
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, '__clone', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        $this->valueHolder1c26e = clone $this->valueHolder1c26e;
    }

    public function __sleep()
    {
        $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, '__sleep', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;

        return array('valueHolder1c26e');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer1040c = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer1040c;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer1040c && ($this->initializer1040c->__invoke($valueHolder1c26e, $this, 'initializeProxy', array(), $this->initializer1040c) || 1) && $this->valueHolder1c26e = $valueHolder1c26e;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder1c26e;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder1c26e;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
