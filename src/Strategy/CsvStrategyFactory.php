<?php

/*
 * LegoW\Zend-View-CsvStrategy (https://github.com/adamturcsan/zend-view-csvstrategy)
 * 
 * @copyright Copyright (c) 2014-2018 Legow Hosting Kft. (http://www.legow.hu)
 * @license https://opensource.org/licenses/MIT MIT License
 */

namespace LegoW\View\Csv\Strategy;

use LegoW\View\Csv\Renderer\CsvRenderer;
use LegoW\View\Csv\Strategy\CsvStrategy;
use Zend\View\Resolver\TemplateMapResolver;
use Psr\Container\ContainerInterface;

/**
 * Description of CsvStrategyFactory
 *
 * @author Turcsán Ádám <turcsan.adam@legow.hu>
 */
class CsvStrategyFactory
{

    public function __invoke(ContainerInterface $container)
    {
        /* @var $renderer CsvRenderer */
        $renderer = $container->get(CsvRenderer::class);

        $config = $container->get('config');
        $templateMap = (isset($config['view_manager']) && isset($config['view_manager']['template_map']))
                ? $config['view_manager']['template_map']
                : [];

        $resolver = new TemplateMapResolver($templateMap);
        $renderer->setResolver($resolver);

        $helperManager = $container->get('ViewHelperManager');
        $renderer->setHelperPluginManager($helperManager);

        return new CsvStrategy($renderer);
    }

}
