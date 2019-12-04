<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:39
 */

namespace Base\Exception;

/**
 * Class NotTemplateException
 * @package Base\Exception
 */
class NotTemplateException extends \Exception
{
    public function __construct($message = '')
    {
        parent::__construct($message, 404);
    }
}