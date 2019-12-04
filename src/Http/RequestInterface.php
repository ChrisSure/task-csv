<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:24
 */

namespace Base\Http;


interface RequestInterface
{
    public function getQueries(): array;

    public function getPosts(): array;

    public function getFiles(): array;

    public function getUri(): string;
}