<?php
return [

    'components' =>
        [
            'dbV3project' => [
                'class' => 'v3toys\skeeks\V3DbConnection',
            ],

            'v3toysApi' =>
                [
                    'class' => 'v3toys\skeeks\V3toysApi'
                ],

            'v3projectApi' =>
                [
                    'class' => 'v3toys\skeeks\V3projectApi'
                ],

            'v3toysSettings' =>
                [
                    'class' => 'v3toys\skeeks\components\V3toysSettings'
                ],

            'v3toys' =>
                [
                    'class' => 'v3toys\skeeks\components\V3toysComponent'
                ],

            'i18n' =>
                [
                    'translations' =>
                        [
                            'v3toys/skeeks' =>
                                [
                                    'class' => 'yii\i18n\PhpMessageSource',
                                    'basePath' => '@v3toys/skeeks/messages',
                                    'fileMap' => [
                                        'v3toys/skeeks' => 'main.php',
                                    ],
                                ]
                        ]
                ],
        ],

    'modules' =>
        [
            'v3toys' =>
                [
                    'class' => 'v3toys\skeeks\V3toysModule',
                    "controllerNamespace" => 'v3toys\skeeks\console\controllers'
                ]
        ]
];