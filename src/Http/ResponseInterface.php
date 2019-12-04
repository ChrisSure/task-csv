<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:33
 */

namespace Base\Http;


interface ResponseInterface
{
    public function emit(): void;

    public function getBody(): String;

    public function getStatusCode(): Int;

    public function getReasonPhrase(): String;

    public function hasHeader($name): bool;

    public function setHeader(String $name, $value): Response;

    public function getHeader(String $name);

    public function getHeaders(): array;
}