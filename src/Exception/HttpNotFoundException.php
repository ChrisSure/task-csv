<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:14
 */

namespace Base\Exception;


class HttpNotFoundException  extends \Exception
{
    public function __construct($message = '')
    {
        parent::__construct($message, 404);
    }
}