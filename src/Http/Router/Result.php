<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:15
 */

namespace Base\Http\Router;

/**
 * Class Result
 * @package Base\Http\Router
 */
class Result
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    private $controller;

    /**
     * @var string
     */
    private $action;

    /**
     * Result constructor.
     * @param $uri
     * @param $controller
     * @param $action
     */
    public function __construct($uri, $controller, $action)
    {
        $this->uri = $uri;
        $this->controller = $controller;
        $this->action = $action;
    }

    /**
     * Get uri
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * Get controller
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * Get action
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
}