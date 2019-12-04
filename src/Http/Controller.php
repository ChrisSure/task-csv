<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:41
 */

namespace Base\Http;

use Base\Render\PhpRenderer;


abstract class Controller
{
    protected $template;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
        $this->template = new PhpRenderer('templates');
    }
}