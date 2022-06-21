<?php

namespace Symfony\Config;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class HautelookAliceConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $fixturesPath;
    private $rootDirs;
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function fixturesPath($value): self
    {
        $this->fixturesPath = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function rootDirs($value): self
    {
        $this->rootDirs = $value;
    
        return $this;
    }
    
    public function getExtensionAlias(): string
    {
        return 'hautelook_alice';
    }
            
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['fixtures_path'])) {
            $this->fixturesPath = $value['fixtures_path'];
            unset($value['fixtures_path']);
        }
    
        if (isset($value['root_dirs'])) {
            $this->rootDirs = $value['root_dirs'];
            unset($value['root_dirs']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->fixturesPath) {
            $output['fixtures_path'] = $this->fixturesPath;
        }
        if (null !== $this->rootDirs) {
            $output['root_dirs'] = $this->rootDirs;
        }
    
        return $output;
    }
    

}
