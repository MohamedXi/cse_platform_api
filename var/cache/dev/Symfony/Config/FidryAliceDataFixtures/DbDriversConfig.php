<?php

namespace Symfony\Config\FidryAliceDataFixtures;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class DbDriversConfig 
{
    private $doctrineOrm;
    private $doctrineMongodbOdm;
    private $doctrinePhpcrOdm;
    private $eloquentOrm;
    
    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function doctrineOrm($value): self
    {
        $this->doctrineOrm = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function doctrineMongodbOdm($value): self
    {
        $this->doctrineMongodbOdm = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function doctrinePhpcrOdm($value): self
    {
        $this->doctrinePhpcrOdm = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function eloquentOrm($value): self
    {
        $this->eloquentOrm = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['doctrine_orm'])) {
            $this->doctrineOrm = $value['doctrine_orm'];
            unset($value['doctrine_orm']);
        }
    
        if (isset($value['doctrine_mongodb_odm'])) {
            $this->doctrineMongodbOdm = $value['doctrine_mongodb_odm'];
            unset($value['doctrine_mongodb_odm']);
        }
    
        if (isset($value['doctrine_phpcr_odm'])) {
            $this->doctrinePhpcrOdm = $value['doctrine_phpcr_odm'];
            unset($value['doctrine_phpcr_odm']);
        }
    
        if (isset($value['eloquent_orm'])) {
            $this->eloquentOrm = $value['eloquent_orm'];
            unset($value['eloquent_orm']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->doctrineOrm) {
            $output['doctrine_orm'] = $this->doctrineOrm;
        }
        if (null !== $this->doctrineMongodbOdm) {
            $output['doctrine_mongodb_odm'] = $this->doctrineMongodbOdm;
        }
        if (null !== $this->doctrinePhpcrOdm) {
            $output['doctrine_phpcr_odm'] = $this->doctrinePhpcrOdm;
        }
        if (null !== $this->eloquentOrm) {
            $output['eloquent_orm'] = $this->eloquentOrm;
        }
    
        return $output;
    }
    

}
