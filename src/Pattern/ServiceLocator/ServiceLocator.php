<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 12:16
 */

namespace Base\Pattern\ServiceLocator;


class ServiceLocator
{

    /**
     * Array of services field
     */
    private $services = [];

    /**
     * Adding service
     * @param string $serviceName
     * @param any $service
     * @return void
     */
    public function add($serviceName, $service): void
    {
        $this->services[$serviceName] = $service;
    }

    /**
     * Checking if isset service
     * @param string $serviceName
     * @return bool
     */
    public function has($serviceName): bool
    {
        return isset($this->services[$serviceName]);
    }

    /**
     * Returning service
     * @param string $serviceName
     * @return any
     */
    public function get($serviceName)
    {
        return $this->services[$serviceName];
    }
}