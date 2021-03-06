<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:07
 */

namespace Base\Http\Router;

use Base\Exception\HttpNotFoundException;
use Base\Http\RequestInterface;

/**
 * Class Router
 * @package Base\Http\Router
 */
class Router
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var array
     */
    private $routes;

    /**
     * Router constructor.
     * @param RequestInterface $request
     * @param array $routes
     */
    public function __construct(RequestInterface $request, array $routes)
    {
        $this->request = $request;
        $this->routes = $routes;
    }

    /**
     * Match uri
     * @return Result|null
     * @throws HttpNotFoundException
     */
    public function match(): ?Result
    {
        foreach ($this->routes as $key => $value) {
            if ($this->request->getUri() == $key) {
                return new Result($key, $value['controller'], $value['action']);
            }
        }
        throw new HttpNotFoundException("Uri not found");
    }
}