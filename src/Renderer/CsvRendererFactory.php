<?php

/*
 * LegoW\View\Strategy\CsvStrategy (https://github.com/adamturcsan/zend-view-csvstrategy)
 *
 * @copyright Copyright (c) 2014-2018 Legow Hosting Kft. (http://www.legow.hu)
 * @license https://opensource.org/licenses/MIT MIT License
 */

declare (strict_types = 1);

namespace LegoW\View\Csv\Renderer;

use LegoW\View\Csv\Renderer\CsvRenderer;
use Psr\Container\ContainerInterface;
use Zend\View\Renderer\PhpRenderer;

/**
 * Description of CsvRendererFactory
 *
 * @author Turcsán Ádám <turcsan.adam@legow.hu>
 */
class CsvRendererFactory
{
    public function __invoke(ContainerInterface $container): CsvRenderer
    {
        $phpRenderer = $container->get(PhpRenderer::class);
        return new CsvRenderer($phpRenderer);
    }
}
