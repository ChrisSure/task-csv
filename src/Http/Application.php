<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:01
 */

namespace Base\Http;

use Base\Http\Router\Result;
use Base\Http\Response;
use Base\Db\Pdo;
use Base\Pattern\ServiceLocator\App;
use Base\Pattern\ServiceLocator\ServiceLocator;


class Application
{
    private $result;
    private $request;

    public function __construct(RequestInterface $request, Result $result)
    {
        $this->result = $result;
        $this->request = $request;
        $this->setServiceLocator();
    }

    public function handle(): Response
    {
        $controller = $this->result->getController();
        $action = $this->result->getAction();
        return (new $controller($this->request))->$action();
    }

    private function setServiceLocator(): void
    {
        $pdo = new Pdo();
        App::$serviceLocator = new ServiceLocator;
        App::$serviceLocator->add('db', $pdo);
    }
}