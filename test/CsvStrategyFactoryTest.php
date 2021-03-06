<?php

/*
 * LegoW\Zend-View-CsvStrategy (https://github.com/adamturcsan/zend-view-csvstrategy)
 * 
 * @copyright Copyright (c) 2014-2016 Legow Hosting Kft. (http://www.legow.hu)
 * @license https://opensource.org/licenses/MIT MIT License
 */

namespace LegoW\View\Test;

use Interop\Container\ContainerInterface;
use LegoW\View\Csv\Renderer\CsvRenderer;
use LegoW\View\Csv\Strategy\CsvStrategy;
use LegoW\View\Csv\Strategy\CsvStrategyFactory;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\PluginManagerInterface;
use Zend\View\Resolver\ResolverInterface;

/**
 * Description of CsvStrategyFactoryTest
 *
 * @author Turcsán Ádám <turcsan.adam@legow.hu>
 */
class CsvStrategyFactoryTest extends TestCase
{
    public function testFactory()
    {
        $mockContainer = $this->createMock(ContainerInterface::class);
        
        $mockViewHelperManager = $this->createMock(PluginManagerInterface::class);
        $mockRenderer = $this->createMock(CsvRenderer::class);
        $mockResolver = $this->createMock(ResolverInterface::class);
        
        $mockContainer->method('get')
                    ->will($this->onConsecutiveCalls(
                        $mockRenderer,
                        $mockResolver,
                        [],
                        $mockViewHelperManager
                    ));
        
        $csvStrategyFactory = new CsvStrategyFactory();
        
        $this->assertInstanceOf(CsvStrategy::class, $csvStrategyFactory($mockContainer));
    }
}
