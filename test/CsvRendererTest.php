<?php

/*
 * LegoW\View\Strategy\CsvStrategy (https://github.com/adamturcsan/zend-view-csvstrategy)
 * 
 * @copyright Copyright (c) 2014-2018 Legow Hosting Kft. (http://www.legow.hu)
 * @license https://opensource.org/licenses/MIT MIT License
 */

namespace LegoW\View\Test;

use LegoW\View\Csv\Renderer\CsvRenderer;
use PHPUnit\Framework\TestCase;
use Zend\View\HelperPluginManager;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Resolver\TemplateMapResolver;

/**
 * Description of CsvRendererTest
 *
 * @author Turcsán Ádám <turcsan.adam@legow.hu>
 */
class CsvRendererTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        touch('renderertest.pcsv');
    }
    public function testRenderer()
    {
        $renderer = new CsvRenderer(new PhpRenderer());
        $resolver = $this->createMock(TemplateMapResolver::class);
        $resolver->method('resolve')
                 ->willReturn('renderertest.pcsv');

        $helperPluginManager = $this->createMock(HelperPluginManager::class);

        $renderer->setResolver($resolver);
        $renderer->setHelperPluginManager($helperPluginManager);

        $output = $renderer->render('None');
    }

    protected function tearDown()
    {
        parent::tearDown();
        unlink('renderertest.pcsv');
    }
}
