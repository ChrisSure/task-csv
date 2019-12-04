<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:20
 */

namespace Base\Render;

use Base\Exception\NotTemplateException;


class PhpRenderer implements TemplateInterface
{
    /**
     * @var String
     */
    private $path;

    /**
     * @var
     */
    private $extend;

    /**
     * @var array
     */
    private $blocks = [];

    /**
     * @var \SplStack
     */
    private $blockNames;


    /**
     * PhpRenderer constructor.
     * @param String $path
     */
    public function __construct(String $path)
    {
        $this->path = $path;
        $this->blockNames = new \SplStack();
    }

    /**
     * Generate template and ibit various
     * @param String $name
     * @param array $params
     * @return string
     */
    public function render($name, array $params = []): string
    {
        $level = ob_get_level();
        $templateFile = $this->path . '/' . $name . '.php';
        $this->extend = null;
        try {
            ob_start();
            extract($params, EXTR_OVERWRITE);
            if (!include_once $templateFile) {
                throw new NotTemplateException('Немає даного шаблона - ' . $name);
            }
            $content = ob_get_clean();
        } catch (\Throwable|\Exception $e) {
            while (ob_get_level() > $level) {
                ob_end_clean();
            }
            throw $e;
        }
        if (!$this->extend) {
            return $content;
        }
        return $this->render($this->extend);
    }

    /**
     * Set parent block
     * @param String $view
     * @return string
     */
    public function extend(String $view): void
    {
        $this->extend = $view;
    }

    /**
     * Set block
     * @param String $name
     * @param String $content
     * @return void
     */
    public function block(String $name, String $content): void
    {
        if ($this->hasBlock($name)) {
            return;
        }
        $this->blocks[$name] = $content;
    }

    /**
     * Check if isset block and started it
     * @param String $name
     * @return bool
     */
    public function ensureBlock(String $name): bool
    {
        if ($this->hasBlock($name)) {
            return false;
        }
        $this->beginBlock($name);
        return true;
    }

    /**
     * Open start block
     * @param String $name
     * @return void
     */
    public function startBlock(String $name): void
    {
        $this->blockNames->push($name);
        ob_start();
    }

    /**
     * Clothe block
     * @return void
     */
    public function endBlock(): void
    {
        $content =  ob_get_clean();
        $name = $this->blockNames->pop();
        if ($this->hasBlock($name)) {
            return;
        }
        $this->blocks[$name] = $content;
    }

    /**
     * Render block
     * @param String $name
     * @return string
     */
    public function renderBlock(String $name): string
    {
        $block = $this->blocks[$name] ?? null;
        if ($block instanceof \Closure) {
            return $block();
        }
        return $block ?? '';
    }

    /**
     * Check if isset block
     * @param String $name
     * @return bool
     */
    private function hasBlock(String $name): bool
    {
        return array_key_exists($name, $this->blocks);
    }



    /**
     * Filter htmlspecialchars
     * @param String $string
     * @return bool
     */
    public function encode(String $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE);
    }

}