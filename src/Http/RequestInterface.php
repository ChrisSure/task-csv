<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:24
 */

namespace Base\Http;

/**
 * Interface RequestInterface
 * @package Base\Http
 */
interface RequestInterface
{
    /**
     * Get queries $_get
     * @return array
     */
    public function getQueries(): array;

    /**
     * Get posts $_post
     * @return array
     */
    public function getPosts(): array;

    /**
     * Get files $_files
     * @return array
     */
    public function getFiles(): array;

    /**
     * Get uri
     * @return array
     */
    public function getUri(): string;
}