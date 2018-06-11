<?php

/*
 * LegoW\Zend-View-CsvStrategy (https://github.com/adamturcsan/zend-view-csvstrategy)
 * 
 * @copyright Copyright (c) 2014-2018 Legow Hosting Kft. (http://www.legow.hu)
 * @license https://opensource.org/licenses/MIT MIT License
 */

namespace LegoW\View\Csv\Renderer;

use Zend\View\Renderer\PhpRenderer;
use Zend\View\Renderer\RendererInterface;
use Zend\View\Renderer\TreeRendererInterface;
use Zend\View\Resolver\ResolverInterface;

/**
 * Description of CsvRenderer
 *
 * @author Turcsán Ádám <turcsan.adam@legow.hu>
 */
class CsvRenderer implements RendererInterface, TreeRendererInterface
{
    /**
     * @var PhpRenderer
     */
    private $phpRenderer;

    public function __construct(PhpRenderer $phpRenderer)
    {
        $this->phpRenderer = $phpRenderer;
    }

    public function render($nameOrModel, $values = null)
    {
        $output = $this->phpRenderer->render($nameOrModel, $values);
        $utf16Output = chr(255) . chr(254) .  mb_convert_encoding($output,
                        'UTF-16LE', 'UTF-8');
        return $utf16Output;
    }

    public function canRenderTrees(): bool
    {
        return $this->phpRenderer->canRenderTrees();
    }

    public function getEngine()
    {
        return $this->phpRenderer->getEngine();
    }

    public function setResolver(ResolverInterface $resolver): RendererInterface
    {
        return $this->phpRenderer->setResolver($resolver);
    }

    public function resolver($name = null)
    {
        return $this->phpRenderer->resolver($name);
    }

    public function setVars($variables)
    {
        return $this->phpRenderer->setVars($variables);
    }

    public function vars($key = null)
    {
        return $this->phpRenderer->vars($key);
    }

    public function get($key)
    {
        return $this->phpRenderer->get($key);
    }

    public function __get($name)
    {
        return $this->phpRenderer->{$name};
    }

    public function __set($name, $value)
    {
        return $this->phpRenderer->{$name} = $value;
    }

    public function __isset($name)
    {
        return isset($this->phpRenderer->{$name});
    }

    public function __unset($name)
    {
        unset($this->phpRenderer->{$name});
    }

    public function setHelperPluginManager($helpers)
    {
        return $this->phpRenderer->setHelperPluginManager($helpers);
    }
}
