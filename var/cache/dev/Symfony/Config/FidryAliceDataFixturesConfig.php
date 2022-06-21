<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'FidryAliceDataFixtures'.\DIRECTORY_SEPARATOR.'DbDriversConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class FidryAliceDataFixturesConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $defaultPurgeMode;
    private $dbDrivers;
    
    /**
     * @default 'delete'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultPurgeMode($value): self
    {
        $this->defaultPurgeMode = $value;
    
        return $this;
    }
    
    public function dbDrivers(array $value = []): \Symfony\Config\FidryAliceDataFixtures\DbDriversConfig
    {
        if (null === $this->dbDrivers) {
            $this->dbDrivers = new \Symfony\Config\FidryAliceDataFixtures\DbDriversConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "dbDrivers()" has already been initialized. You cannot pass values the second time you call dbDrivers().');
        }
    
        return $this->dbDrivers;
    }
    
    public function getExtensionAlias(): string
    {
        return 'fidry_alice_data_fixtures';
    }
            
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['default_purge_mode'])) {
            $this->defaultPurgeMode = $value['default_purge_mode'];
            unset($value['default_purge_mode']);
        }
    
        if (isset($value['db_drivers'])) {
            $this->dbDrivers = new \Symfony\Config\FidryAliceDataFixtures\DbDriversConfig($value['db_drivers']);
            unset($value['db_drivers']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->defaultPurgeMode) {
            $output['default_purge_mode'] = $this->defaultPurgeMode;
        }
        if (null !== $this->dbDrivers) {
            $output['db_drivers'] = $this->dbDrivers->toArray();
        }
    
        return $output;
    }
    

}
