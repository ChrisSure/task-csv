<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:20
 */

namespace Base\Render;

/**
 * Interface TemplateInterface
 * @package Base\Render
 */
interface TemplateInterface
{

    /**
     * TemplateInterface constructor.
     * @param String $path
     */
    public function __construct(String $path);

    /**
     * Generate template and ibit various
     * @param String $name
     * @param array $params
     * @return string
     */
    public function render($name, array $params = []): string;

    /**
     * Set parent block
     * @param String $view
     * @return string
     */
    public function extend(String $view): void;

    /**
     * Set block
     * @param String $name
     * @param String $content
     * @return void
     */
    public function block(String $name, String $content): void;

    /**
     * Check if isset block and started it
     * @param String $name
     * @return bool
     */
    public function ensureBlock(String $name): bool;

    /**
     * Open start block
     * @param String $name
     * @return void
     */
    public function startBlock(String $name): void;

    /**
     * Clothe block
     * @return void
     */
    public function endBlock(): void;

    /**
     * Render block
     * @param String $name
     * @return string
     */
    public function renderBlock(String $name): string;


}

