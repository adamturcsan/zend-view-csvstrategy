<?php

/*
 * LegoW\View\Strategy\CsvStrategy (https://github.com/adamturcsan/zend-view-csvstrategy)
 * 
 * @copyright Copyright (c) 2014-2018 Legow Hosting Kft. (http://www.legow.hu)
 * @license https://opensource.org/licenses/MIT MIT License
 */

declare (strict_types = 1);

namespace LegoW\View\Csv;

use LegoW\View\Csv\Renderer\CsvRenderer;
use LegoW\View\Csv\Renderer\CsvRendererFactory;
use LegoW\View\Csv\Strategy\CsvStrategy;
use LegoW\View\Csv\Strategy\CsvStrategyFactory;

/**
 * Description of ConfigProvider
 *
 * @author Turcsán Ádám <turcsan.adam@legow.hu>
 */
class ConfigProvider
{
    public function __invoke()
    {
        return [
            'dependencies' => [
                'factories' => [
                    CsvRenderer::class => CsvRendererFactory::class,
                    CsvStrategy::class => CsvStrategyFactory::class
                ]
            ]
        ];
    }
}
