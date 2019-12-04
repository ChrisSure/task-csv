<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:41
 */

namespace Base\Http;

use Base\Render\PhpRenderer;

/**
 * Class Controller
 * @package Base\Http
 */
abstract class Controller
{
    /**
     * @var PhpRenderer
     */
    protected $template;

    /**
     * Controller constructor.
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
        $this->template = new PhpRenderer('templates');
    }

    /**
     * Redirect
     */
    public function redirect(): void
    {
        header("Location: http://localhost:7777");
    }
}