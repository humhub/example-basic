<?php

use acmeCorp\humhub\modules\exampleBasic\Events;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\widgets\TopMenu;

return [
    'id' => 'example-basic',
    'class' => 'acmeCorp\humhub\modules\exampleBasic\Module',
    'namespace' => 'acmeCorp\humhub\modules\exampleBasic',
    'events' => [
        [TopMenu::class, TopMenu::EVENT_INIT, [Events::class, 'onTopMenuInit']],
        [AdminMenu::class, AdminMenu::EVENT_INIT, [Events::class, 'onAdminMenuInit']]
    ],
];
