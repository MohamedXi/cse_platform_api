<?php

namespace Symfony\Config;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class NelmioAliceConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $locale;
    private $seed;
    private $functionsBlacklist;
    private $loadingLimit;
    private $maxUniqueValuesRetry;
    
    /**
     * Default locale for the Faker Generator
     * @default 'en_US'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function locale($value): self
    {
        $this->locale = $value;
    
        return $this;
    }
    
    /**
     * Value used make sure Faker generates data consistently across runs, set to null to disable.
     * @default 1
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function seed($value): self
    {
        $this->seed = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function functionsBlacklist($value): self
    {
        $this->functionsBlacklist = $value;
    
        return $this;
    }
    
    /**
     * Alice may do some recursion to resolve certain values. This parameter defines a limit which will stop the resolution once reached.
     * @default 5
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function loadingLimit($value): self
    {
        $this->loadingLimit = $value;
    
        return $this;
    }
    
    /**
     * Maximum number of time Alice can try to generate a unique value before stopping and failing.
     * @default 150
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxUniqueValuesRetry($value): self
    {
        $this->maxUniqueValuesRetry = $value;
    
        return $this;
    }
    
    public function getExtensionAlias(): string
    {
        return 'nelmio_alice';
    }
            
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['locale'])) {
            $this->locale = $value['locale'];
            unset($value['locale']);
        }
    
        if (isset($value['seed'])) {
            $this->seed = $value['seed'];
            unset($value['seed']);
        }
    
        if (isset($value['functions_blacklist'])) {
            $this->functionsBlacklist = $value['functions_blacklist'];
            unset($value['functions_blacklist']);
        }
    
        if (isset($value['loading_limit'])) {
            $this->loadingLimit = $value['loading_limit'];
            unset($value['loading_limit']);
        }
    
        if (isset($value['max_unique_values_retry'])) {
            $this->maxUniqueValuesRetry = $value['max_unique_values_retry'];
            unset($value['max_unique_values_retry']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->locale) {
            $output['locale'] = $this->locale;
        }
        if (null !== $this->seed) {
            $output['seed'] = $this->seed;
        }
        if (null !== $this->functionsBlacklist) {
            $output['functions_blacklist'] = $this->functionsBlacklist;
        }
        if (null !== $this->loadingLimit) {
            $output['loading_limit'] = $this->loadingLimit;
        }
        if (null !== $this->maxUniqueValuesRetry) {
            $output['max_unique_values_retry'] = $this->maxUniqueValuesRetry;
        }
    
        return $output;
    }
    

}
