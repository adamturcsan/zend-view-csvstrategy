[![Build Status](https://travis-ci.org/adamturcsan/zend-view-csvstrategy.svg?branch=master)](https://travis-ci.org/adamturcsan/zend-view-csvstrategy)
[![Coverage Status](https://coveralls.io/repos/github/adamturcsan/zend-view-csvstrategy/badge.svg?branch=master)](https://coveralls.io/github/adamturcsan/zend-view-csvstrategy?branch=master)

# zend-view-csvstrategy

CsvStrategy extension for zendframework/zend-view

## How It Works?

1. Configure the CsvStrategy to the ViewManager in `module.config.php`
    ```php
        <?php 

        return [
            'view_manager' => [
                'template_path_stack' => [
                    __DIR__ . '/../view',
                ],
                'template_map' => [
                    'export/csv' => __DIR__.'/../view/refuels/index/export.pcsv'
                ],
                'strategies' => [
                    View\Strategy\CsvStrategy::class
                ]
            ]
        ]
    ```
2. Create csv view file as `export.pcsv`
    ```php
        <?php 

        foreach($this->data as $row) {
            echo implode($row, ';').PHP_EOL;
        }
    ```
3. Use it in controller actions
    ```php
        <?php

        namespace Test;

        use LegoW\View\Model\CsvModel;

        class TestController extends AbstractActionController
        {
            public function indexAction()
            {
                $view = new CsvModel();
                $view->setTerminate(true)
                     ->setVariables([
                         "data" => [
                             range(1,26),
                             range('a','z')
                         ]
                     ]);
                return $view;
            }
        }
    ```
