<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 9:42
 */

namespace Base\Http;

class Request implements RequestInterface
{
    private $get;

    private $post;

    private $files;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->files = $_FILES;
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    public function getQueries(): array
    {
        return $this->get;
    }

    public function getPosts(): array
    {
        return $this->post;
    }

    public function getFiles(): array
    {
        return $this->files;
    }

    public function getUri(): string
    {
        return explode('?', $this->uri)[0];
    }

}