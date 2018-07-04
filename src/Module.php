<?php

/*
 * LegoW\View\Strategy\CsvStrategy (https://github.com/adamturcsan/zend-view-csvstrategy)
 *
 * @copyright Copyright (c) 2014-2018 Legow Hosting Kft. (http://www.legow.hu)
 * @license https://opensource.org/licenses/MIT MIT License
 */

declare (strict_types = 1);

namespace LegoW\View\Csv;

/**
 * Description of Module
 *
 * @author Turcsán Ádám <turcsan.adam@legow.hu>
 */
class Module implements \Zend\ModuleManager\Feature\ConfigProviderInterface
{
    public function getConfig()
    {
        $configProvider = new ConfigProvider();
        return [
            'service_manager' => $configProvider()['dependencies']
        ];
    }
}
