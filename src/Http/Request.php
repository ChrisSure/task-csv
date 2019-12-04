<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 9:42
 */

namespace Base\Http;

/**
 * Class Request
 * @package Base\Http
 */
class Request implements RequestInterface
{
    /**
     * @var array
     */
    private $get;

    /**
     * @var array
     */
    private $post;

    /**
     * @var array
     */
    private $files;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->files = $_FILES;
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    /**
     * Get queries $_get
     * @return array
     */
    public function getQueries(): array
    {
        return $this->get;
    }

    /**
     * Get posts $_post
     * @return array
     */
    public function getPosts(): array
    {
        return $this->post;
    }

    /**
     * Get files $_files
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * Get uri
     * @return array
     */
    public function getUri(): string
    {
        return explode('?', $this->uri)[0];
    }

}