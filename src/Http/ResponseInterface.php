<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:33
 */

namespace Base\Http;

/**
 * Interface ResponseInterface
 * @package Base\Http
 */
interface ResponseInterface
{
    /**
     * Emit response
     * @return void
     */
    public function emit(): void;

    /**
     * Get body
     * @return String
     */
    public function getBody(): String;

    /**
     * Get status code
     * @return Int
     */
    public function getStatusCode(): Int;

    /**
     * Get reason phrase
     * @return String
     */
    public function getReasonPhrase(): String;

    /**
     * Has header
     * @param $name
     * @return bool
     */
    public function hasHeader($name): bool;

    /**
     * Set header
     * @param String $name
     * @param $value
     * @return $this
     */
    public function setHeader(String $name, $value): Response;

    /**
     * Get header
     * @param String $name
     * @return mixed|null
     */
    public function getHeader(String $name);

    /**
     * Get headers
     * @return array
     */
    public function getHeaders(): array;
}